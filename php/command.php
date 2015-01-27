<?php

if($_SERVER["REQUEST_METHOD"] != "POST"){

    header('HTTP', true, 400); 

}else{

    if(isset($_POST['command']) && isset($_POST['value'])){

        $command = array(
            'command' => $_POST['command'],
            'value'   => $_POST['value']
        );

        $context = new ZMQContext();
        $socket  = $context->getSocket(ZMQ::SOCKET_PUSH, 'pusher');
        $socket->connect('tcp://localhost:5555');

        $socket->send(json_encode($command));

    }

    echo 'success';

}
