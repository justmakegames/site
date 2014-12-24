
EasySocial.ready(function($)
{
	var selector 	= "[data-es-comment-readmore-<?php echo $uid;?>]";

	$( selector ).on( 'click' , function()
	{
		var parent 		= $( this ).parent(),
			balance		= $( parent ).find( '[data-es-comment-balance]' );
		
		// Hide the anchor link
		$( this ).hide();

		// Show the balance
		$( balance ).show();
	});
	
});