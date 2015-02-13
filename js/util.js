(function(global, namespace, $){
    
    'use strict';
    var ns = streamText.addNamespace(namespace);


    ns.isPositiveInteger = function(val){
        return val.match(/^[0-9]+$/) ? true : false; 
    }

    ns.checkDatetime = function(year, month, day, hour, minute){
  
        if(month >= 0 && month <= 11
            && day    >= 0 && day    <= 31
            && hour   >= 0 && hour   <= 59
            && minute >= 0 && minute <= 59){
   
            var cDate = new Date(year, month, day, hour, minute);
            if(isNaN(cDate)){
                return false; 
            }else if(cDate.getFullYear() == year
                && cDate.getMonth()  == month
                && cDate.getDate()   == day 
                && cDate.getHours()   == hour
                && cDate.getMinutes() == minute){
               
                return true;    

            }else{
                return false; 
            } 

        } 

        return false;
    
    }

    ns.zeroBind = function(val, digits){

        var zero = '';
        for(var i = 0; i < digits - 1; i++){
            zero += '0'; 
        }       

        return (zero + val).slice(-digits);
    }


})(this, 'streamText.util', jQuery);
