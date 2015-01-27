(function(global, namespace, $){
    
    'use strict';
    var ns = streamText.addNamespace(namespace);


    ns.isPositiveInteger = function(val){
        return val.match(/^[0-9]+$/) ? true : false; 
    };


    ns.zeroBind = function(val, digits){

        var zero = '';
        for(var i = 0; i < digits - 1; i++){
            zero += '0'; 
        }       

        return (zero + val).slice(-digits);
    }


})(this, 'streamText.util', jQuery);
