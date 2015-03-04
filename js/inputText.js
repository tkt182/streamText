$(function(){

    'use strict';
    $('#inputTextForm').on('submit', function(e){
   
        e.preventDefault();
    
        var form      = $(this);
        var submitBtn = form.find('submit');

        streamText.ajaxFunc.sendData(form.attr('action'), form.serialize(), submitBtn)
            .then(
                function(data){
                    var code = data['result'];
                    switch(code){
                        case 0:
                            alert('登録に失敗しました.');
                            break; 
                        case 1:
                            // 成功したらフォームの入力値を初期化
                            form[0].reset();
                            alert('登録が完了しました.'); 
                            break;
                    }
                },
                function(xhr, textStatus, error){
                    alert('サーバに接続できませんでした.'); 
                }
            );

    });

});
