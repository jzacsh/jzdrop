/**
 * Framework for the site's js to run neatly on.
 */

// necessary
var JzDrop = JzDrop || { behaviors : {}, settings : {} };

// run each function stored in settings.
$(document).ready(function(context) {
    JzDrop.behaviors.each(behave, function(context) {
      $(this).attach();
      console.log("behave is: "+behave);
    });
});
