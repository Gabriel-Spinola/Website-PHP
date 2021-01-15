$(function () {
	let curSlide = 0
	let maxSlide = $('.banner-single').length - 1
	let delay = 3

	initSlider()
	changeSlide()

	function initSlider() {
		$('.banner-single').css('opacity', '0')
		$('.banner-single').eq(0).css('opacity', '1')
		
		for (let i in maxSlide + 1) {
			var content = $('.bullets').html()

			if (i == 0) content += '<span class="active-slider"></span>'
			else content += '<span></span>'
				
			$('.bullets').html(content)
		}
	}

	function changeSlide() {
		setInterval(() => {
			$('.banner-single').eq(curSlide).animate({
				'opacity': '0'
			}, 2000)

			curSlide++

			if (curSlide > maxSlide)
				curSlide = 0

			$('.banner-single').eq(curSlide).animate({
				'opacity': '1'
			}, 2000)

			// Change the bullets from the slider!
			$('.bullets span').removeClass('active-slider')
			$('.bullets span').eq(curSlide).addClass('active-slider')
		}, delay * 1400)
	}

	$('body').on('click', '.bullets span', () => {
		var currentBullet = $(this)

		$('.banner-single').eq(curSlide).animate({
			'opacity': '0'
		}, 2000)

		curSlide = currentBullet.index()
		
		$('.banner-single').eq(curSlide).animate({
			'opacity': '1'
		}, 2000)

		$('.bullets span').removeClass('active-slider')

		currentBullet.addClass('active-slider')
	})
})