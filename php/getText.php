<?php

require_once('database.php');
require_once('dbInfo.php');


date_default_timezone_set('Asia/Tokyo');

$startDate = $_POST['startTime'];
$maxId     = $_POST['maxId'];

$db = new DataBase($host, $dbname, $dbUser, $passwd);

try{
    
    $db->connect();

    $sql = "SELECT id, user, txt FROM text_archives WHERE created > :startDate AND id > :maxId";
    
    $db->prepare($sql); 
    $db->bind(':startDate', $startDate, PDO::PARAM_STR);
    $db->bind(':maxId', $maxId, PDO::PARAM_INT);
    $db->execute();
    
    $txtArray = $db->resultset();
     
    $db->close();
    
    echo json_encode($txtArray); 


}catch(PDOException $e){

    error_log($e->getMessage(), 0);

}
