/**
 * Custom front page js
 */

var behaviors = [
  //invert color on title on front page
//function(context) {
//  $('.whoami:not(.decolored)', context).addClass('decolored');
//}
  function(context) {
    $('.whoami:not(.decolored)', context).animate({
        color: '#888888',
        'text-shadow': '0px 0px 18px #888888',
    }, 1000, function() {
//    console.log('gahh!! why is color: ignored!?!?');
    }).addClass('decolored');
  }
];

$(document).ready(function() {
  for (var i = 0; i < behaviors.length; i++) {
    behaviors[i](document);
  }
});
