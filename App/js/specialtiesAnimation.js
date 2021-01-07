$(function () {
	let atual = -1
	let maximo = $('.box-especialidade').length - 1
	let timer
	let animacaoDelay = 1

	$('.box-especialidade').hide()

	timer = setInterval(Animation, animacaoDelay * 1000)

	function Animation() {
		atual++

		if (atual > maximo) {
			clearInterval(timer)

			return false
		}

		$('.box-especialidade').eq(atual).fadeIn()
	}
})