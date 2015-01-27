<?php

require dirname(__DIR__) . '/vendor/autoload.php';

$loop    = React\EventLoop\Factory::create();
$pusher  = new StreamText\Pusher;
$context = new React\ZMQ\Context($loop);

$pull = $context->getSocket(ZMQ::SOCKET_PULL);

// 127.0.0.1へのバインドは、自身からの接続しか許可しないことを意味する
// ※ 5555はZeroMQとWebSocketサーバの通信用ポート
$pull->bind('tcp://127.0.0.1:5555');

// messageイベント発生時にonCommandを実行
$pull->on('message', array($pusher, 'onCommand'));


$webSock = new React\Socket\Server($loop);

// 0.0.0.0へのバインドは、リモートからの接続の許可を意味する 
$webSock->listen(8080, '0.0.0.0');
$webServer = new Ratchet\Server\IoServer(
    new Ratchet\Http\HttpServer(
        new Ratchet\WebSocket\WsServer(
            new Ratchet\Wamp\WampServer(
                $pusher
            )
        )
    ),
    $webSock
);


$loop->run();
