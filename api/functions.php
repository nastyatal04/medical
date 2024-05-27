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
        echo "<label for='serv_select'>Услуги</label>";
        echo "<select name='services' id='serv_select'>";
        echo "<option value=''>-- Выберите услугу --</option>";
        while($row = $result->fetch_array()){
            echo "<option value=".$row['serv_id'].">".$row['name_serv']."</option>";
        }
        echo "</select>";
    }
}

function getDoc($conn, $serv = "") {
    $sql = 
    "SELECT doctors.doc_id, `fullname` FROM `doc_serv` 
    INNER JOIN `doctors` ON doc_serv.doc_id = doctors.doc_id
    WHERE `serv_id` = '".$serv."';"; 

    if($result = $conn->query($sql)){
        echo "<label for='doc_select'>Врачи</label>";
        echo "<select name='doctors' id='doc_select'>";
        echo "<option value=''>-- Выберите врача --</option>";
        while($row = $result->fetch_array()){
            echo "<option value=".$row['doc_id'].">".$row['fullname']."</option>";
        }
        echo "</select>";
    }
}
?>

<!-- 
        Есть два выпадающих списка:
    1) Услуги (содержит все услуги, которые предоставляет клиника)
    2) Врачи (содержит врачей, выполняющих выбранную в списке "Услуги" услугу)
        По умолчанию в обоих списках выбрано поле "-- Выберите услугу --" и "-- Выберите врача --" соответственно
        Если в списке "Услуги" выбрано поле не по умолчанию (т.е. выбрана какая-то услуга), то в список "Врачи" подгружается врачи, оказывающие именно выбранную услугу   
-->