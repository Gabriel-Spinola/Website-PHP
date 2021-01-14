$(function () {
	let atual = -1
	let maximo = $('.specialtie-box').length - 1
	let timer
	let animacaoDelay = 0.8

	$('.specialtie-box').hide()

	timer = setInterval(Animation, animacaoDelay * 1000)

	function Animation() {
		atual++

		if (atual > maximo) {
			clearInterval(timer)

			return false
		}

		$('.specialtie-box').eq(atual).fadeIn()
	}
})