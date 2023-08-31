
jQuery(document).ready(function($) {

	// Your JavaScript goes here

});

const swiperBanners = function(){
	return swiper = new Swiper('.swiper', {
	  // Default parameters
	  slidesPerView: 1,
	  spaceBetween: 10,
	  speed: 500,
	  autoplay: {
		delay: 4000,
	  },
	  navigation: {
		  nextEl: '.swiper-button-next',
		  prevEl: '.swiper-button-prev',
	  },
	  pagination: {
		el: '.swiper-pagination',
		type: 'bullets',
		clickable: true,
	  }, 
	  // Responsive breakpoints
	  breakpoints: {
		// when window width is >= 640px
		640: {
		  slidesPerView: 1,
		  spaceBetween: 10,
		},   
	  }
	})
  }
  
  swiperBanners();