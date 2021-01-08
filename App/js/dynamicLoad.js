$(function () {
    function contactLoad() {
        $('[realtime]').click(() => {
            var page = $(this).attr('realtime')

            $('.main-container').hide()
            $('.main-container').load(`${ include_path }Pages/${ page }.php`)
            
            setTimeout(() => {
                initialize()
                addMarker(-27.609959, -48.576585, '', "Sample", undefined, false)
            }, 1000)

            $('.main-container').fadeIn(750)

            window.history.pushState('', '', page)

            return false
        })
	} contactLoad()
})