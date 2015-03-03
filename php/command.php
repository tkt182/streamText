<?php

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('HTTP/1.1 400 Bad Request'); 
    die();
}

$command = filter_input(INPUT_POST, 'command');
$value   = filter_input(INPUT_POST, 'value');

if(is_null($command) || is_null($value)){
    header('HTTP/1.1 400 Bad Request');
    die();
}


$control = array(
    'command' => $command,
    'value'   => $value
);


$context = new ZMQContext();
$socket  = $context->getSocket(ZMQ::SOCKET_PUSH, 'pusher');
$socket->connect('tcp://localhost:5555');
$socket->send(json_encode($control));
