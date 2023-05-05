/* Мобильное Меню */
jQuery(document).ready(function($) {
	$('.header__burger').click(function(event) {
		$('.header__burger, .nav-mobile').toggleClass('active');
		$('body').toggleClass('lock');
	});
});

/* Cart Hover */
// jQuery(document).ready(function($) {
// 	$('.cart').click(function(event) {
// 		$('.cart, .cart-popup').toggleClass('active');
// 	});
// });


jQuery(document).ready(function($) {

	/* Мобильный Поиск */
	$('.search-mobile').click(function(event) {
		$('.m-search').toggleClass('active');
		$('body').toggleClass('lock');
	});

	/* клик по Каталогу */
	$('.catalog-group, .m-catalog').click(function(event) {
		$('.catalog-group').toggleClass('active');
		$('.catalog_m-block').toggleClass('active');
		$('.catalog_m-fixed').toggleClass('active');
		$('body').toggleClass('lock');
	});

	/* Показать категории / скрыть */

	$('.s1-catalog-see, .s1-catalog-hide').click(function(event) {
		$('.s1-part-2').slideToggle(300);
		$('.s1-catalog-see').toggleClass('none');
		$('.s1-catalog-hide').toggleClass('active');
	});

	/* К форме плавающие лейблы */

	$(`
		.popup-form input[type=email], 
		.popup-form input[type=date], 
		.popup-form input[type=number], 
		.popup-form input[type=text], 
		.popup-form input[type=tel], 
		.popup-form input[type=password], 
		.popup-form .inputwrapper span,
		.popup-form textarea
	`).each(function(e){
		var placeholder = $(this).attr('placeholder');
		$(this).wrap('<div class="inputwrapper"></div>').before('<span>'+placeholder+'</span>');
		$(this).on('focus',function(){
			var inputContent = $(this).val();
			// if(inputContent == ''){
				$(this).prev().addClass('visible');
			// }

		});
		$(this).on('blur',function(){
			var inputContent = $(this).val();
			if(inputContent == ''){
				$(this).prev().removeClass('visible');
			}
		});

		if ( $(this).hasClass('form-control') && $(this).val() != '' ) {
			$(this).prev().addClass('visible');
		}

	});

	/* Модальное окно открытие / закрытие */
	$('.header-button').click(function(event) {
		$('.myPopup-1').addClass('fadeIn');
		$('.myPopup-1').removeClass('fadeOut');
		$('body').addClass('lock');

		/* вне области */
		if ($('.myPopup-1').hasClass('fadeIn')) {
			$(document).mouseup(function (e) {
				var container = $(".myPopup-1");
				if (container.has(e.target).length === 0){
					container.addClass('fadeOut');
					$('body').removeClass('lock');
				}
			});
		};

	});
	$('.close-button').click(function(event) {
		$('.myPopup-1').addClass('fadeOut');
		$('.myPopup-1').removeClass('fadeIn');
		$('body').removeClass('lock');
	});



	$('.user-profile').click(function(event) {
		$('.myPopup-2').addClass('fadeIn');
		$('.myPopup-2').removeClass('fadeOut');
		$('body').addClass('lock');

		/* вне области */
		if ($('.myPopup-2').hasClass('fadeIn')) {
			$(document).mouseup(function (e) {
				var container = $(".myPopup-2");
				if (container.has(e.target).length === 0){
					container.addClass('fadeOut');
					$('body').removeClass('lock');
				}
			});
		};

	});
	$('.close-button').click(function(event) {
		$('.myPopup-2').addClass('fadeOut');
		$('.myPopup-2').removeClass('fadeIn');
		$('body').removeClass('lock');
	});

	/* Товары в линию или нет */
	$('.c-grid-line').click(function(event) {
		$(`.category .tool-col, 
			.category .tool-col .c-group-link,
			.category .tool-col-img,
			.category .tool-group-1,
			.category .product-num,
			.category .tool-col-img-block,
			.category .tool-col-name-block,
			.category .tool-count,
			.category .newp-cart,
			.category .newp-price,
			.category .c-cool-price,
			.category .newp-cart-d,
			.category .tool-col-name
			`).addClass('line-active');
	});
	$('.c-grid-sort').click(function(event) {
		$(`.category .tool-col, 
			.category .tool-col .c-group-link,
			.category .tool-col-img,
			.category .tool-group-1,
			.category .product-num,
			.category .tool-col-img-block,
			.category .tool-col-name-block,
			.category .tool-count,
			.category .newp-cart,
			.category .newp-price,
			.category .c-cool-price,
			.category .newp-cart-d,
			.category .tool-col-name
			`).removeClass('line-active');
	});

	$('.c-grid-line').click(function(event) {
		$('.c-grid-line').addClass('active');
		$('.c-grid-sort').removeClass('active');
	});
	$('.c-grid-sort').click(function(event) {
		$('.c-grid-sort').addClass('active');
		$('.c-grid-line').removeClass('active');
	});

});








// Swiper Slider
new Swiper('.swiper-1', {
	// Navigation arrows
	navigation: {
		nextEl: '.swiper-1-n',
		prevEl: '.swiper-1-p',
	},

	pagination: {
		el: '.swiper-pagination-1',
		// Bullet
		clickable: true,
		dynamicBullets: true,
	},

	/* Количество слайдов для показа */
	slidesPerView: 1,
	
	/* Количество пролистываемых слайдов */
	slidesPerGroup: 1,

	/* Отступ между слайдами */
	spaceBetween: 20,

	loop: true,

});

// Swiper Slider
new Swiper('.swiper-2', {
	// Navigation arrows
	navigation: {
		nextEl: '.swiper-2-n',
		prevEl: '.swiper-2-p',
	},

	pagination: {
		el: '.swiper-pagination-2',
		// Bullet
		clickable: true,
		dynamicBullets: true,
	},

	/* Количество слайдов для показа */
	slidesPerView: 5,
	
	/* Количество пролистываемых слайдов */
	slidesPerGroup: 1,

	/* Отступ между слайдами */
	spaceBetween: 21,

	loop: true,
	// effect: "fade",

	// autoplay: {
	// 	delay: 6000,
	// 	disableOnInteraction: false,
	// },
	
	breakpoints: {
		0: {
			slidesPerView: '1',
			spaceBetween: 21,
		},

		480: {
			slidesPerView: '2',
			spaceBetween: 21,
		},

		768: {
			slidesPerView: '2',
			spaceBetween: 21,
		},

		992: {
			slidesPerView: '3',
			spaceBetween: 20,
		},

		1199: {
			slidesPerView: '4',
			spaceBetween: 21,
		},

		1399: {
			slidesPerView: '4',
			spaceBetween: 21,
		},

		1599: {
			slidesPerView: '5',
			spaceBetween: 21,
		},
   },

});


// Swiper Slider
new Swiper('.swiper-3', {
	// Navigation arrows
	navigation: {
		nextEl: '.swiper-3-n',
		prevEl: '.swiper-3-p',
	},

	pagination: {
		el: '.swiper-pagination-3',
		// Bullet
		clickable: true,
		dynamicBullets: true,
	},

	/* Количество слайдов для показа */
	slidesPerView: 4,
	
	/* Количество пролистываемых слайдов */
	slidesPerGroup: 1,

	/* Отступ между слайдами */
	spaceBetween: 20,

	loop: true,
	// effect: "fade",

	// autoplay: {
	// 	delay: 6000,
	// 	disableOnInteraction: false,
	// },
	
	breakpoints: {
		0: {
			slidesPerView: '1',
			spaceBetween: 20,
		},

		480: {
			slidesPerView: '2',
			spaceBetween: 20,
		},

		768: {
			slidesPerView: '2',
			spaceBetween: 20,
		},

		992: {
			slidesPerView: '3',
			spaceBetween: 20,
		},

		1199: {
			slidesPerView: '4',
			spaceBetween: 20,
		},
   },

});



// Swiper Slider
new Swiper('.swiper-4', {
	// Navigation arrows
	navigation: {
		nextEl: '.swiper-4-n',
		prevEl: '.swiper-4-p',
	},

	pagination: {
		el: '.swiper-pagination-4',
		// Bullet
		clickable: true,
		dynamicBullets: true,
	},

	/* Количество слайдов для показа */
	slidesPerView: 5,
	
	/* Количество пролистываемых слайдов */
	slidesPerGroup: 1,

	/* Отступ между слайдами */
	spaceBetween: 20,

	loop: true,
	// effect: "fade",

	// autoplay: {
	// 	delay: 6000,
	// 	disableOnInteraction: false,
	// },
	
	breakpoints: {
		0: {
			slidesPerView: '1',
			spaceBetween: 20,
		},

		480: {
			slidesPerView: '2',
			spaceBetween: 20,
		},

		768: {
			slidesPerView: '2',
			spaceBetween: 20,
		},

		992: {
			slidesPerView: '3',
			spaceBetween: 20,
		},

		1199: {
			slidesPerView: '4',
			spaceBetween: 20,
		},

		1399: {
			slidesPerView: '5',
			spaceBetween: 20,
		},
   },

});



// Swiper Slider
new Swiper('.swiper-productImgMini', {
	// Navigation arrows
	navigation: {
		nextEl: '.swiper-productImgMini-n',
		prevEl: '.swiper-productImgMini-p',
	},

	pagination: {
		el: '.swiper-pagination-productImgMini',
		// Bullet
		clickable: true,
		dynamicBullets: true,
	},

	direction: 'vertical',

	/* Количество слайдов для показа */
	slidesPerView: 4,
	
	/* Количество пролистываемых слайдов */
	slidesPerGroup: 1,

	/* Отступ между слайдами */
	spaceBetween: 10,

	loop: true,
	// effect: "fade",

	// autoplay: {
	// 	delay: 1000,
	// 	disableOnInteraction: false,
	// },
	
	breakpoints: {
		0: {
			slidesPerView: '4',
			spaceBetween: 10,
		},

		480: {
			slidesPerView: '4',
			spaceBetween: 10,
		},

		768: {
			slidesPerView: '4',
			spaceBetween: 10,
		},

		992: {
			slidesPerView: '4',
			spaceBetween: 10,
		},

		1199: {
			slidesPerView: '4',
			spaceBetween: 10,
		},

		1399: {
			slidesPerView: '4',
			spaceBetween: 10,
		},
   },

});


/* Scroll Top */
var header_top = $('.header-top'),
scrollPrev = 0;

var header_bottom = $('.header-bottom');
var logo_desc = $('.logo-desc-header');

$(window).scroll(function() {
	var scrolled = $(window).scrollTop();

	if ( scrolled > 100 && scrolled > scrollPrev ) {
		header_top.addClass('out');
		header_bottom.addClass('out');
		logo_desc.addClass('out');
	} else {
		header_top.removeClass('out');
		header_bottom.removeClass('out');
		logo_desc.removeClass('out');
	}
	// scrollPrev = scrolled;
});