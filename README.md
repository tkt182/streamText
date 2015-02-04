# StreamText

## 概要
DBに入力したテキストメッセージを画面に表示するデモアプリです。
特徴は、表示されるメッセージに対してWebSocketを経由して別タブからエフェクトをかけることができる点です。  


## テスト環境
* PHP 5.4.34 (ZeroMQの拡張モジュール"zmq.so"が必要)
* MySQL 5.5.38


## 準備
1. ダウンロードしたソースをWebサーバの公開ディレクトリ内に保存
2. php/dbInfo.php.baseをphp/dbInfo.phpにリネームし、DBに関連する情報を入力
3. sql/create_text_archive.sqlを実行し、テーブルを作成
4. php composer.phar installを実行し、Ratchet及びReact/ZMQのパッケージをインストール
5. js/controlText.js及びjs/streamText.js内の"example.com"を自身のサーバ名に変更
6. 5555、8080のポートを閉じている場合は開ける  
   ※ ポートを変更する場合は、wsServer/pusher-server.php内の該当箇所を変更する
   

## 起動
* サーバにsshでログインし、以下のコマンドにてWebSocketサーバを起動する

> php wsServer/pusher-server.php

* サーバが起動したら、ブラウザからindex.phpに対してアクセスする


## 参考資料
* Ratchet : http://socketo.me/docs/push
* ZeroMQ  : http://zeromq.org/intro:read-the-manual
