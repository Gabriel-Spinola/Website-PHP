$(function () {
    function asideOC(clickTarget) {
        var windowSize = $(window)[0].innerWidth
        var openMenu = windowSize > 768 ? true : false
        var asideMenuSize = windowSize > 768 ? 300 : 200

        $(clickTarget).click(() => {
            if (openMenu) {
                $('aside.menu').animate({
                    'width' : '0',
                    'padding' : '0'
                }, () => {
                    openMenu = false
                })

                $('.main-container, .header-container').animate({
                    'left' : '0'
                }, () => {
                    openMenu = false
                })

                $('.main-container, .header-container').css('width', '100%')
            } 
            else {
                $('aside.menu').animate({
                    'width' : `${asideMenuSize}px`,
                    'padding' : '10px'
                }, () => {
                    openMenu = true
                })

                $('.main-container, .header-container').animate({
                    'left' : `${asideMenuSize}px`
                }, () => {
                    openMenu = true
                })
            }
        })
    }

    asideOC('.menu-btn i')
})