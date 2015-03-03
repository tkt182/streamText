$(function(){

    'use strict';
    
    /////// WebSocketサーバとの接続 ///////

    var conn = new ab.Session(
        'ws://example.com:8080',
        function() {

            console.log('WebSocketサーバとの通信を開始しました');

            // 色変更のコマンドを受け取る 
            conn.subscribe('color', function(topic, command){
                drawParams['color'] = command['value']; 
            });

            // フィードバックエフェクトの有無を受け取る
            conn.subscribe('feedback', function(topic, command){
                drawParams['feedback'] = command['value']; 
            });

        },
        function() {
            console.log('WebSocketサーバとの通信を終了しました');
        },
        {'skipSubprotocolCheck': true}
    
    );


    
    /////// レンダリング///////
    
    var texts      = new Array();  
    var maxId      = 0; 
    var canvas     = $('#screen');

    var drawParams = {
        'color'    : 'white'  ,
        'feedback' : 'disable'
    };



    /**
     * 指定した範囲の乱数(整数)を取得する
     */
    var getRandomVal = function(min, max){
   
        var val = Math.random() * (max - min) + min; 
        Math.floor(val);

        return val;

    };


    /**
     * canvasに表示するテキストのアップデート
     */
    var updateStreamText = function(data){

        var newDataNum = data.length; 
   
        for(var i = 0; i < newDataNum; i++){

            var tmpText     = new Array();
            tmpText['id']   = data[i].id; 
            tmpText['user'] = data[i].user;
            tmpText['txt']  = data[i].txt;
            tmpText['posx'] = getRandomVal(0, canvas.width()); 
            tmpText['posy'] = getRandomVal(0, canvas.height());
            tmpText['vel']  = getRandomVal(6, 50);

            texts.push(tmpText); 
        }
    
    
    };

    
    /**
     * テキストIDの最後(最大値)を取得する
     */
    var getMaxTextId = function(){

        var dataNum = texts.length;
        return dataNum === 0 ? 0 : texts[dataNum - 1].id; 
    
    };


    /**
     * canvasのサイズを変更する
     */
    var sizing = function(){

        $('#screen').attr({width:$('#container').width()});
        $('#screen').attr({height:$('#container').height()});
    };
    

    /**
     * テキストを非同期で取得する
     */    
    var getDrawData = function(){

        var url  = '../streamText/php/getText.php'
        var data = {startTime : startTime, maxId : maxId};

        streamText.ajaxFunc.getData(url, data)
            .then(
                function(data){
                    var code = data['result'];
                    switch(code){
                        case 0:
                            console.log('データの取得に失敗しました.');
                            break; 
                        case 1:
                            updateStreamText(data['text']); 
                            maxId = getMaxTextId();
                            break;
                    }
                },
                function(xhr, textStatus, error){
                    // メイン画面へのalertはNG
                    console.log('サーバに接続できませんでした'); 
                }
            );

        setTimeout(getDrawData, 10000);


    };


    /**
     * テキストを描画する
     */
    var drawText = function(){

        var context = canvas.get(0).getContext('2d');
        
        if(drawParams['feedback'] === 'disable'){
            context.clearRect(0, 0, canvas.width(), canvas.height()); 
        }
        
        context.fillStyle = drawParams['color'];
        context.font = "64px 'MS 明朝'";
        context.textAlign = "left";
        context.textBaseline = "top";

        var dataNum = texts.length;

        for(var i = 0; i < dataNum; i++){
        
            context.fillText(texts[i].txt,
                texts[i].posx, texts[i].posy); 

        }

        setTimeout(drawText, 50); 
    
    };


    /**
     * テキストの位置を更新する
     */
    var updateTextPos = function(){
    
        var dataNum = texts.length;      
   
        for(var i = 0; i < dataNum; i++){
   
            // X座標のみ変更
            texts[i].posx -= texts[i].vel; 
            
            // 一番左端(-1000)になったら、右端に移動する 
            if(texts[i].posx < -1000){
           
                texts[i].posx = canvas.width() + 100; 
            
            } 

        }

        setTimeout(updateTextPos, 100);
    
    };


    sizing();
    getDrawData();
    drawText();
    updateTextPos();



    /////// イベント ///////
    
    $(window).resize(function(){
        sizing(); 
    });

    
});
