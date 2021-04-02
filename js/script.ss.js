$(function(){
		$(window).scroll(function(){
			if ( $(this).scrollTop() > 50 ) {
				$('.navbar').addClass('solid bg-info');
 			} else {
 				$('.navbar').removeClass('solid bg-info');
 			}
 		});
});

$('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i=0;i<4;i++) {
    next=next.next();
    if (!next.length) {
      next=$(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
  }
});