define([
    'jquery'   
], function ($) {
    'use strict';
    return function (validator) {        
           validator.addRule(
           'validate-pobox',
           function (value) {				
			var regex2 = /\bP(ost|ostal)?([ \.]*(O|0)(ffice)?)?([ \.]*Box)?\b/ig;
    		if(value.match(regex2))
		   {
			return false; 
		   }
		   else
		   {
		    return true;    
			   
		    }
	             
            },
            $.mage.__('We dont ship to P.O. Please use a different address')
        );

        return validator;
    };
});
