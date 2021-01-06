$(function () {
    function contactLoad() {
        $('.container-principal').hide()
        $('.container-principal').load(`${ include_path }Pages/contato.php`)
        
        setTimeout(() => {
            initialize()
            addMarker(-27.609959, -48.576585, '', "Minha casa", undefined, false)
        }, 1000)

        $('.container-principal').fadeIn(750)

        window.history.pushState('', '', pagina)

        return false
	} contactLoad()
})