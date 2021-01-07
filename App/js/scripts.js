/*
	|-- Abrir menu através do fadein
	| if (menuList.is(':hidden')){
	|	menuList.fadeIn()
	| }
	| else {
	|	menuList.fadeOut()
	| }
	|
	|-- Abrir ou fechar sem efeitos
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
		//O elemento existe, portanto precisamos dar o scroll em algum elemento.
		var elemento = `#${ $('target').attr('target') }`

		var divScroll = $(elemento).offset().top

		$('html, body').animate({
			scrollTop: divScroll
		}, 2000)
	}
})