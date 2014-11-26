$(window).scroll(function() {
	if ($(window).width() >= 768) {
		var viewHeight = $(window).outerHeight();
		if ($(this).scrollTop() > viewHeight / 2) {
			$(".back-top").show();
		} else {
			$(".back-top").hide();
		}
	}
});
$('.back-top').click(function() {
	$('html,body').animate({
		scrollTop: 0
	},
	500);
	return false
});
