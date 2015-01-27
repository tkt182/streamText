$(function(){

    'use strict';
    var date    = new Date();

    var cYear    = String(date.getFullYear());
    var cMonth   = String(date.getMonth() + 1);
    var cDay     = String(date.getDate());
    var cHour    = String(date.getHours());
    var cMinute  = String(date.getMinutes());


    cMonth  = streamText.util.zeroBind(cMonth, 2); 
    cDay    = streamText.util.zeroBind(cDay, 2); 
    cHour   = streamText.util.zeroBind(cHour, 2); 
    cMinute = streamText.util.zeroBind(cMinute, 2); 


    $('#year').val(cYear);
    $('#month').val(cMonth);
    $('#day').val(cDay);
    $('#hour').val(cHour);
    $('#minute').val(cMinute);



    $('#startDate').on('submit', function(e){

        var tmpYear   = $('#year').val();
        var tmpMonth  = $('#month').val();
        var tmpDay    = $('#day').val(); 
        var tmpHour   = $('#hour').val();
        var tmpMinute = $('#minute').val();

        if(!streamText.util.isPositiveInteger(tmpYear)){
            alert('「年」の値が不正です'); 
            return false; 
        }

        if(!streamText.util.isPositiveInteger(tmpMonth)){
            alert('「月」の値が不正です'); 
            return false; 
        }

        if(!streamText.util.isPositiveInteger(tmpDay)){
            alert('「日」の値が不正です'); 
            return false; 
        }

        if(!streamText.util.isPositiveInteger(tmpHour)){
            alert('「時」の値が不正です'); 
            return false; 
        }

        if(!streamText.util.isPositiveInteger(tmpMinute)){
            alert('「分」の値が不正です'); 
            return false; 
        }


        var date = new Date(tmpYear, tmpMonth, tmpDay, tmpHour, tmpMinute);
        if(date.toString() === "Invalid Date"){
            alert('不正な値があります'); 
            return false;
        }

        var year    = String(date.getFullYear());
        var month   = String((date.getMonth() % 12) == 0 ? 12 : date.getMonth()); // 力技
        var day     = String(date.getDate());
        var hour    = String(date.getHours());
        var minute  = String(date.getMinutes());
       
        
        month  = streamText.util.zeroBind(month, 2);
        day    = streamText.util.zeroBind(day, 2);
        hour   = streamText.util.zeroBind(hour, 2);
        minute = streamText.util.zeroBind(minute, 2);


        var msg = '開始時間は ' + year + '/' + month + '/' + day + ' ' + hour + ':' + minute + ':00 となりますが、よいでしょうか';   

        if(window.confirm(msg)){
            $('#year').val(year);
            $('#month').val(month);
            $('#day').val(day);
            $('#hour').val(hour);
            $('#minute').val(minute);
            
            return true; 
        }

        return false;

    });


});
