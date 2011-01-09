/**
 * Framework for the site's js to run neatly on.
 */

// necessary
var JzDrop = JzDrop || { behaviors : {}, settings : {} };

// run each function stored in settings.
//@TODO: this seems to be fail whale
$(document).ready(function(context) {
    JzDrop.behaviors.each(behave, function(context) {
      $(this).attach();
      console.log("behave is: "+behave); //@TODO: remove me!!
    });
});
