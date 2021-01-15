$(function () {
	function ToggleDropDownMenu() {
		$('nav.mobile').click(() => {
			var menuList = $('nav.mobile ul')

			// toggle menu icon ("fa-bars" to open, "fa-times" to close)
			if (menuList.is(':hidden')) {
				var icon = $('.menu-mobile-button').find('i')

				icon.removeClass('fa-bars')
				icon.addClass('fa-times')

				menuList.slideToggle()
			}
			else {
				var icon = $('.menu-mobile-button').find('i')

				icon.removeClass('fa-times')
				icon.addClass('fa-bars')

				menuList.slideToggle()
			}
		})
	}

	function ScrollToItem() {
		if ($('target').length > 0) {
			// Get Element.
			var element = `#${ $('target').attr('target') }`

			// Set offset
			var divScroll = $(element).offset().top

			// Scroll
			$('html, body').animate({
				scrollTop: divScroll
			}, 2000)
		}
	}

	function SpecialtiesAnimation() {
		let actual = -1
		let maximum = $('.specialty-box').length - 1
		let timer
		let animationDelay = 0.8

		$('.specialty-box').hide()

		timer = setInterval(Animation, animationDelay * 1000)
		
		function Animation() {
			actual++ 

			if (actual > maximum) {
				clearInterval(timer)

				return false
			}

			$('.specialty-box').eq(actual).fadeIn()
		}
	}

	ScrollToItem()
	SpecialtiesAnimation()

	// Mobile
	ToggleDropDownMenu()
})