<?php

require_once('database.php');
require_once('dbInfo.php');


date_default_timezone_set('Asia/Tokyo');


$result['result'] = 0;      // レスポンスとして送る値 

$user = isset($_POST['user']) ? $_POST['user'] : '';
$msg  = isset($_POST['msg']) ? $_POST['msg'] : '';

if(empty($user)) $user = 'unknown';

if(empty($msg)){
    echo json_encode($result);
    return false;
}


$db = new DataBase($host, $dbname, $dbUser, $passwd);


try{

    $db->connect();
    
    $sql = "insert into text_archives (user, txt) values (:user, :msg)";

    $db->prepare($sql);
    $db->bind(':user', $user, PDO::PARAM_STR); 
    $db->bind(':msg', $msg, PDO::PARAM_STR);
    $db->execute();

    $db->close();


    // 登録成功 
    $result['result'] = 1;
    echo json_encode($result);


}catch(PDOException $e){

    error_log($e->getMessage(), 0);

    // 登録失敗
    $result['result'] = 0;     
    echo json_encode($result);

}
