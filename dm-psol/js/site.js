
  const swiperNews = function(){
	return swiper = new Swiper('.swiper', {
	  // Default parameters
	  slidesPerView: 1,
	  spaceBetween: 10,
	  pagination: {
		el: '.swiper-pagination',
		type: 'bullets',
		dynamicBullets: true,
		clickable: true,
	  }, 
	  navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	  },
	  // Responsive breakpoints
	  breakpoints: {
		// when window width is >= 640px
		768: {
			slidesPerView: 2,
			spaceBetween: 10,
		},
		992: {
			slidesPerView: 3,
			spaceBetween: 10,
		},
		1140: {
			slidesPerView: 4,
			spaceBetween: 10,
		},   
	  }
	})
  }
  
  swiperNews();