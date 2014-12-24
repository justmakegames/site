
EasySocial.require()
.library('popbox')
.done(function($)
{
	var html 	= $('[data-module-dropdown-menu]').html();
		pos 	= $('[data-module-dropdown-menu]').data('dropdown-position'),
		pos 	= pos ? pos : 'bottom-right';


		$('[data-module-dropdown-menu-wrapper]').popbox(
		{
			content 	: html,
			id 			: "fd",
			component 	: "es",
			type 		: "dropdown-menu",
			toggle 		: "click",
			position 	: pos,
			collision	: "flip none"
		})
		.attr('data-popbox', '');

});
