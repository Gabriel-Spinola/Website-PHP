$(function () {
    function contactLoad() {
        other = '[realtime]'

        $(other).click(() => {
            var page = $(other).attr('realtime')
            
            $('.main-container').hide()
            $('.main-container').load(`${include_path}pages/${page}.php`)

            setTimeout(() => {
                initialize()
                addMarker(-27.609959, -48.576585, '', "Sample", undefined, false)
            }, 10)

            $('.main-container').fadeIn(750)

            window.history.pushState('', '', `${page}`)

            return false
        })
    } 
    
    contactLoad()
})