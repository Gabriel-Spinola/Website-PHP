/*
	|-- Open menu with fadein
	| if (menuList.is(':hidden')){
	|	menuList.fadeIn()
	| }
	| else {
	|	menuList.fadeOut()
	| }
	|
	|-- Open or Close without effects
	| if(menuList.is(':hidden')){
	|	//menuList.show()
	|	menuList.css('display', 'block')
	| }
	| else{
	|	//menuList.hide()
	|	menuList.css('display', 'none')
	| }
*/

$(function () {
	$('nav.mobile').click(() => {
		var menuList = $('nav.mobile ul')

		if (menuList.is(':hidden')) {
			//fa fa-times
			//fa fa-bars
			//var icon =  $('.menu-mobile-button i')

			var icon = $('.menu-mobile-button').find('i')

			icon.removeClass('fa-bars')
			icon.addClass('fa-times')

			menuList.slideToggle()
		}
		else {
			var icon = $('.menu-mobile-button').find('i')

			icon.removeClass('fa-times')
			icon.addClass('fa-bars')

			menuList.slideToggle()
		}
	})

	if ($('target').length > 0){
		// the element exists, so we need scroll to a nelement.
		var elemento = `#${ $('target').attr('target') }`

		var divScroll = $(elemento).offset().top

		$('html, body').animate({
			scrollTop: divScroll
		}, 2000)
	}
})