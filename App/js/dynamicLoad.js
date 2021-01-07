$(function () {
    function contactLoad() {
        $('.principal-container').hide()
        $('.principal-container').load(`${ include_path }Pages/contact.php`)
        
        setTimeout(() => {
            initialize()
            addMarker(-27.609959, -48.576585, '', "Minha casa", undefined, false)
        }, 1000)

        $('.principal-container').fadeIn(750)

        window.history.pushState('', '', 'contact.php')

        return false
	} contactLoad()
})