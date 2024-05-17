<?
$conn = new mysqli('localhost', 'root', '', 'medical');
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
?>