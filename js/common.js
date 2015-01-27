(function(global, namespace) {
    
    'use strict';
    
    function Namespace(str) {
        var ns = str.split('.');
        var here = global;
        for (var i = 0, l = ns.length; i < l; i++){
            if (typeof(here[ns[i]]) == 'undefined') here[ns[i]] = {};
            here = here[ns[i]];
        }
        return here;
    }

    var ns = Namespace(namespace);
    ns.addNamespace = Namespace;


})(this, "streamText");
