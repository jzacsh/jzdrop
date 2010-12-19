
/*

	com.EdwardHotchkiss.Debug.js
	version 0.1.1
	MIT / (More accurately - X11 License)
	First Created: 6/27/2008
	Last Revised: 09/31/2009
	http://www.edwardhotchkiss.com
	edward@edwardhotchkiss.com

*/


// Are we Developing?
areDeveloping = true;


(function($) {

	$.Debug = function(options) {
	
		if (areDeveloping == true) {
			
			// Specify Alerts or Console Debugging or die
    		if (options.length < 1) { 
    			alert("Please Specify Options!");
        		return false; 
    		}

			// Overrideable Variables and Methods
    		var settings = {
    			msg      : null,
    			dStyle   : "alert",
    			onBefore : function() {},
				onAfter  : function() {},
				onError  : function() { alert("Debug Settings Failure") }
    		}

			// Apply New Variables and Methods
    		if (options) {
        		jQuery.extend(settings, options);
   	 		}
		
			// onBefore Function, null
			settings.onBefore.apply(this);

			// Check Debug Style
			if (settings.dStyle == "alert") {
				alert(settings.msg);
			} else if (settings.dStyle = "console") {	
				if (window.console) {
					if (clearConsoleFirst == true) {
						_FirebugCommandLine.clear();
					}
					if (settings.msg != null) {
						console.log(settings.msg);	
					} else {
						settings.onError.apply(this);
					}
				}
			} else {
				settings.onError.apply(this);
			}
			
			// After Function, null
			settings.onAfter.apply(this);
		}

	};

})(jQuery);


/*

EXAMPLE USAGE: 

	$.Debug({ msg:"I'm a message", dStyle: "alert" });

*/
