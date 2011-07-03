/**
 * Custom front page js
 */

var behaviors = [
  //invert color on title on front page
  function(context) {
    $('.whoami', context).addClass('decolored');
  }
];

$(document).ready(function() {
  for (var i = 0; i < behaviors.length; i++) {
    behaviors[i](document);
  }
});
