//slajder
$(document).ready(function(){
  slideShow();
});

function slideShow() {
  var current = $('#slajder .show');
 var next=current.next().length ? current.next() : current.parent().children(':first');
  
  current.hide().removeClass('show');
  next.fadeIn().addClass('show');
  
  setTimeout(slideShow, 3000);
}