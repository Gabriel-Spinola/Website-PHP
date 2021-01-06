$(function () {
	let atual = -1
	let maximo = $('.box-especialidade').length - 1
	let timer
	let animacaoDelay = 1

	executarAnimacao()

	function executarAnimacao() {
		$('.box-especialidade').hide()

		timer = setInterval(logicaAnimacao, animacaoDelay * 1000)

		function logicaAnimacao() {
			atual++

			if (atual > maximo) {
				clearInterval(timer)

				return false
			}

			$('.box-especialidade').eq(atual).fadeIn()
		}
	}
})