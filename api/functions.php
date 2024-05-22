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

function showServices ($conn) {
    $sql = 
    "SELECT `id`, doctors.doc_id, `fullname`, `specialization`, `experience`, `img`, services.serv_id, `name_serv` FROM `doc_serv` 
    INNER JOIN `doctors` ON doc_serv.doc_id = doctors.doc_id 
    INNER JOIN `services` ON doc_serv.serv_id = services.serv_id"; 

    // "SELECT `id`,`fullname`, doc_serv.serv_id FROM `doc_serv` 
    // INNER JOIN `doctors` ON doc_serv.doc_id = doctors.doc_id 
    // WHERE doc_serv.serv_id = 1"

    
    // spl php разбить результат запроса на массив
    //$row_array = array_merge($row_array, ibase_fetch_row($result));
    if($result = $conn->query($sql)){
        while($row = $result->fetch_array()){
            $serv_id = $row['services.serv_id'];
            $name_serv = $row['name_serv'];
            // $specialization = $row['specialization'];
            // $experience = $row['experience'];
            // $description = $row['description'];
            // $img = $row['img'];
            require 'components/min_doc_card.php';
        }
    }
}

?>