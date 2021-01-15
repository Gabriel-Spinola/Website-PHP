$(function () {
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
})