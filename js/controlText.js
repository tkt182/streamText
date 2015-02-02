$(function(){

    'use strict';
    var conn   = null;   // WebSocketサーバとの接続
    var viewer = null;   // Viwerウィンドウ 



    $("#colorWhite").on('click', function(){

        var url    = '../streamText/php/command.php'; 
        var cmd    = {command : 'color', value : 'white'}; 
        var cmdBtn = $(this);

        streamText.ajaxFunc.sendData(url, cmd, cmdBtn)
            .then(
                function(result){
                },
                function(xhr, textStatus, error){
                    console.log('操作コマンドの送信に失敗しました'); 
                }
            );

    }); 
    
    
    $("#colorRed").on('click', function(){

        var url    = '../streamText/php/command.php'; 
        var cmd    = {command : 'color', value : 'red'}; 
        var cmdBtn = $(this);

        streamText.ajaxFunc.sendData(url, cmd, cmdBtn)
            .then(
                function(result){
                },
                function(xhr, textStatus, error){
                    console.log('操作コマンドの送信に失敗しました'); 
                }
            );

    });


    $("#feedbackEnable").on('click', function(){

        var url    = '../streamText/php/command.php'; 
        var cmd    = {command : 'feedback', value : 'enable'}; 
        var cmdBtn = $(this);

        streamText.ajaxFunc.sendData(url, cmd, cmdBtn)
            .then(
                function(result){
                },
                function(xhr, textStatus, error){
                    console.log('操作コマンドの送信に失敗しました'); 
                }
            );

    }); 


    $("#feedbackDisable").click(function(){

        var url    = '../streamText/php/command.php'; 
        var cmd    = {command : 'feedback', value : 'disable'}; 
        var cmdBtn = $(this);

        streamText.ajaxFunc.sendData(url, cmd, cmdBtn)
            .then(
                function(result){
                },
                function(xhr, textStatus, error){
                    console.log('操作コマンドの送信に失敗しました'); 
                }
            );

    }); 

    
    $("#systemStart").on('click', function(){
  
        /* 
        if(conn === null || conn.sessionid() === null){

            conn = new ab.Session(
                'ws://example.com:8080',
                function() {
                    alert('WebSocketサーバとの通信を開始しました');
                },
                function() {
                    alert('WebSocketサーバとの通信を終了しました');
                },
                {'skipSubprotocolCheck': true}
            );
     

            var viewerUrl = '../streamText/streamText.php?startTime=' + startTime; 
            viewer        = window.open(encodeURI(viewerUrl), 'streamText Viewr'); 
        
        }
        */

        var viewerUrl = '../streamText/streamText.php?startTime=' + startTime; 
        viewer        = window.open(encodeURI(viewerUrl), 'streamText Viewr'); 

    });

    
    $("#systemStop").on('click', function(){

        if(conn !== null && conn.sessionid() !== null){
            conn.close();
            conn = null; 
        }

        if(viewer !== null){
            viewer.close(); 
        }

    });
      

});
