<?php

require_once('database.php');
require_once('dbInfo.php');


date_default_timezone_set('Asia/Tokyo');


if($_SERVER['REQUEST_METHOD'] !== 'GET'){
    header('HTTP/1.1 400 Bad Request');
    die();
}    


$startDate = filter_input(INPUT_GET, 'startTime');
$maxId     = filter_input(INPUT_GET, 'maxId');

if(is_null($startDate) || is_null($maxId)){
    header('HTTP/1.1 400 Bad Request');
    die();
}


$result['result'] = 0;      // レスポンスとして送る値 

$db = new DataBase($host, $dbname, $dbUser, $passwd);

try{

    $db->connect();

    $sql = "SELECT id, user, txt FROM text_archives WHERE created > :startDate AND id > :maxId";

    $db->prepare($sql); 
    $db->bind(':startDate', $startDate, PDO::PARAM_STR);
    $db->bind(':maxId'    , $maxId    , PDO::PARAM_INT);
    $db->execute();

    $txtArray         = $db->fetch();
    $result['text']   = $txtArray;
    $result['result'] = 1;
    echo json_encode($result); 


}catch(PDOException $e){

    error_log($e->getMessage(), 0);

    echo json_encode($result);

}


$db->close();
