<?php

require_once('database.php');
require_once('dbInfo.php');

date_default_timezone_set('Asia/Tokyo');


if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('HTTP/1.1 400 Bad Request');
    die();
}


$user = filter_input(INPUT_POST, 'user');
$msg  = filter_input(INPUT_POST, 'msg');

$user = $user ?: 'unknown';
$msg  = $msg  ?: NULL;      // NULLにすると、SQLでExceptionが発生する


$result['result'] = 0;      // レスポンスとして送る値 

$db = new DataBase($host, $dbname, $dbUser, $passwd);

try{

    $db->connect();

    $sql = "insert into text_archives (user, txt) values (:user, :msg)";

    $db->prepare($sql);
    $db->bind(':user', $user, PDO::PARAM_STR); 
    $db->bind(':msg' , $msg , PDO::PARAM_STR);
    $db->execute();

    // 登録成功 
    $result['result'] = 1;
    echo json_encode($result);

}catch(PDOException $e){

    error_log($e->getMessage(), 0);

    // 登録失敗
    echo json_encode($result);
}


$db->close();
