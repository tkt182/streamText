(function(global, namespace, $){
    
    'use strict';
    var ns = streamText.addNamespace(namespace);


    ns.sendData = function(url, data, btn){

        var jqXHR = $.ajax({ 
            url: url,
            type: 'post',  
            dataType: 'json',
            timeout: 10000,
            data: data,
            beforeSend: function(xhr){
                // ボタンを無効化し、2重送信を防止
                btn.attr('disabled', true); 
            },
            complete: function(xhr){
                // ボタンを有効化し、再送信を許可
                btn.attr('disabled', false);
            }
        });
        return jqXHR.promise();
    
    };  


    ns.getData = function(url, data){

        var jqXHR = $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            timeout: 10000,
            data: data 
        }); 
        return jqXHR.promise(); 
    };


})(this, 'streamText.ajaxFunc', jQuery);
