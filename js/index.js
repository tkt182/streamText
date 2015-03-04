$(function(){

    'use strict';
    
    // もう少し設計を考えたら綺麗にする
    var date    = new Date();

    var cYear   = String(date.getFullYear());
    var cMonth  = String(date.getMonth() + 1);
    var cDay    = String(date.getDate());
    var cHour   = String(date.getHours());
    var cMinute = String(date.getMinutes());


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


        var year   = $('#year').val();
        var month  = $('#month').val();
        var day    = $('#day').val(); 
        var hour   = $('#hour').val();
        var minute = $('#minute').val();

        if(!streamText.util.isPositiveInteger(year)){
            alert('「年」の値が不正です'); 
            return false; 
        }

        if(!streamText.util.isPositiveInteger(month)){
            alert('「月」の値が不正です'); 
            return false; 
        }

        if(!streamText.util.isPositiveInteger(day)){
            alert('「日」の値が不正です'); 
            return false; 
        }

        if(!streamText.util.isPositiveInteger(hour)){
            alert('「時」の値が不正です'); 
            return false; 
        }

        if(!streamText.util.isPositiveInteger(minute)){
            alert('「分」の値が不正です'); 
            return false; 
        }

        if(!streamText.util.checkDatetime(year, month - 1, day, hour, minute)){
            alert('不正な値があります'); 
            return false;
        }

        month  = streamText.util.zeroBind(String(month), 2);
        day    = streamText.util.zeroBind(String(day), 2);
        hour   = streamText.util.zeroBind(String(hour), 2);
        minute = streamText.util.zeroBind(String(minute), 2);

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
