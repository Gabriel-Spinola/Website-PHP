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

                    location.reload()
                })

                $('.main-container, .header-container').animate({
                    'left' : `${asideMenuSize}px`
                }, () => {
                    openMenu = true

                    location.reload()
                })
            }
        })

        $(window).resize(() => {
            if (windowSize <= 768) {
                $('.menu').css('width', '0').css('padding', '0')

                $('.main-container, .header-container').css('width', '100%').css(
                    'left', '0'
                )

                openMenu = false
            } else {
                openMenu = true

                $('main-container').css('width', 'calc(100% - 250px)').css(
                    'left', '250px'
                )

                $('aside.menu').css('width', '250px').css('padding', '10px', '0')
            }
        })
    }

    asideOC('.menu-btn i')
})