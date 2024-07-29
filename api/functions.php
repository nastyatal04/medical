<?
require_once "connect.php";

function showHeader () {
    require 'components/header.php';
}

function showFooter () {
    require 'components/footer.php';
}

function showTitle ($title) {
    require 'components\title.php';
}

function showDoctors ($conn) {
    $sql = "SELECT * FROM `doctors`";
    if($result = $conn->query($sql)){
        while($row = $result->fetch_array()){
            $id = $row['doc_id'];
            $name = $row['fullname'];
            $specialization = $row['specialization'];
            $experience = $row['experience'];
            $description = $row['description'];
            $img = $row['img'];
            require 'components/doc_card.php';
        }
    }
}

function calcExperience($experience) {
    $res = date_parse($experience);
    $date = new DateTimeImmutable();
    $res2 = date_parse($date->format('Y-m-d'));
    $itog = $res2['year'] - $res['year'];
    if($itog % 10 == 1) {
        return "Стаж ".$itog." год";
    }
    else if($itog % 10 == 2 || $itog % 10 == 3 || $itog % 10 == 4) {
        return "Стаж ".$itog." года";
    }
    else
    {
        return "Стаж ".$itog." лет";
    }
}

function showServices($conn) {
    $sql = "SELECT * FROM `services`";
    if($result = $conn->query($sql)){
        while($row = $result->fetch_array()){
            $title = $row['name_serv'];
            require 'components/min_title.php';
            echo "<div class='desc_serv'>".$row['description']."</div>";
            echo "<div class='doc_wrapper'>";
            showDocServices ($conn, $title);
            echo "</div>";
        }
    }
}

function showDocServices ($conn, $serv) {
    $sql = 
    "SELECT `id`, doctors.doc_id, `fullname`, `specialization`, `experience`, `img`, services.serv_id, `name_serv` FROM `doc_serv` 
    INNER JOIN `doctors` ON doc_serv.doc_id = doctors.doc_id 
    INNER JOIN `services` ON doc_serv.serv_id = services.serv_id
    WHERE `name_serv` = '".$serv."';"; 

    if($result = $conn->query($sql)){
        while($row = $result->fetch_array()){
            $serv_id = $row['services.serv_id'];
            $name_serv = $row['name_serv'];
            $id = $row['doctors.doc_id'];
            $name = $row['fullname'];
            $specialization = $row['specialization'];
            $experience = $row['experience'];
            $img = $row['img'];

            $specialization = $row['specialization'];
            $experience = $row['experience'];
            $description = $row['description'];
            $img = $row['img'];
            require 'components/min_doc_card.php';
        }
    }
}

function getServ($conn) {
    $sql = "SELECT `serv_id`, `name_serv` FROM `services`";
    if($result = $conn->query($sql)){
        echo "<label for='services' class='form_label'>Услуги";
        echo "<select name='services' id='services'>";
        echo "<option class='select' value='select'>-- Выберите услугу --</option>";
        while($row = $result->fetch_array()){
            echo "<option value=".$row['serv_id'].">".$row['name_serv']."</option>";
        }
        echo "</select></label>";
    }
}

function getDoc($conn) {
    $sql = 
    "SELECT doctors.doc_id, `fullname`, `serv_id` FROM `doc_serv` 
    INNER JOIN `doctors` ON doc_serv.doc_id = doctors.doc_id;"; 

    if($result = $conn->query($sql)){
        echo "<label for='doc_select' class='form_label'>Врачи";
        echo "<select name='doc_select' id='doc_select'>";
        echo "<option class='select' value='select'>-- Выберите врача --</option>";
        while($row = $result->fetch_array()){
            echo "<option class=".$row['serv_id']." value=".$row['doc_id'].">".$row['fullname']."</option>";
        }
        echo "</select></label>";
    }
}

function getTime($conn) {
    $sql = 
    "SELECT `id`, `doc_id`, `time` FROM `date_time`;"; 
    
    if($result = $conn->query($sql)){
        echo "<label for='time_select' class='form_label'>Время записи";
        echo "<select name='time_select' id='time_select'>";
        echo "<option class='select' value='select'>-- Выберите время --</option>";
        while($row = $result->fetch_array()){
            echo "<option class=".$row['doc_id']." value=".$row['time'].">".$row['time']."</option>";
        }
        echo "</select></label>";
    }
}

function sendingRequest($conn, $doc_id, $fullname, $phone, $date, $time) {
    if(!validData($fullname, $phone, $doc_id, $time)) {
        $_SESSION['errorsData'] = "Вы неверно заполнили свои личные данные, поробуйте ещё раз:)";
    }
    else if(!validRequest($conn, $doc_id, $date, $time)){
        $_SESSION['errorsRequest'] = "К сожалению, эта запись уже занята, попробуйте выбрать другое время:)";
    }
    else {
        $sql = "INSERT INTO `records`(`rec_id`, `doc_id`, `fullname`, `phone`, `date`, `time`) VALUES (NULL, '$doc_id','$fullname','$phone','$date','$time')";
        mysqli_query($conn, $sql);
        $_SESSION['noErrors'] = 'Вы записаны на приём в нашу клинику '.date('d.m.Y', strtotime($date)).' числа в '.$time.' часов. Ждём Вас:)';
    }
}

function validData($fullname, $phone, $doc_id, $time) {
    if ($doc_id == 'select' || $time == 'select' || empty($phone) || !preg_match("/^((\+7|7|8)+([0-9]){10})$/", $phone) || empty($fullname) || strlen($fullname) > 255) {
        unset($_SESSION["errorsData"]);
        return false;
    }
    else {
        unset($_SESSION["errorsData"]);
        return true;        
    }
}

function validRequest($conn, $doc_id, $date, $time) {
    $sql = "SELECT `rec_id` FROM `records` WHERE `doc_id` = '$doc_id' AND `date` = '$date' AND `time` = '$time'";
    echo $sql;
    if($result = $conn->query($sql)) {
        if($result->num_rows == 0) {
            unset($_SESSION["errorsRequest"]);
            return true;
        }
    }
    unset($_SESSION["errorsData"]);
    return false;
}
?>