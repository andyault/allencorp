//variables
var carousel = document.getElementsByClassName('carousel-content')[0];

var slides = document.getElementsByClassName('carousel-slide');
var dots = document.getElementsByClassName('carousel-dot');

var curIndex = 0;

var arrows = document.getElementsByClassName('carousel-arrow');

var arrPrev = arrows[0];
var arrNext = arrows[1];

var lastRotate = Date.now();
var rotateInterval = 5000;

//hooking
arrPrev.onclick = function() {
	showSlide(curIndex - 1);

	window.clearInterval(int);

	return false;
}

arrNext.onclick = function() {
	showSlide(curIndex + 1);

	window.clearInterval(int);

	return false;
}

//slides
var showSlide = function(index) {
	if(index < 0) index += slides.length;
	if(index >= slides.length) index -= slides.length;

	for(var i = 0; i < slides.length; i++) {
		var curSlide = slides[i];

		//slide moving
		if(i < index)
			curSlide.style.marginLeft = '-100%';
		else
			curSlide.style.marginLeft = 0;

		//slide heights and dots
		if(i == index)
			dots[index].classList.add('active');
		else
			dots[i].classList.remove('active');
	}

	carousel.style.height = slides[index].children[0].scrollHeight + 'px';

	curIndex = index;
}

//init to 0 to fix dot highlighting
showSlide(0);

//auto rotate - todo: disable on mobile, allow swipe
var int = window.setInterval(function() {
	if(window.innerWidth > 480) {
		var now = Date.now();

		var isHovered = carousel.parentElement.querySelector(':hover') === carousel;

		if(now > lastRotate + rotateInterval && !isHovered) {
			showSlide(curIndex + 1);

			lastRotate = now;
		} 
	}
}, 500);