<?php
/**
* @package 		EasySocial
* @copyright	Copyright (C) 2010 - 2013 Stack Ideas Sdn Bhd. All rights reserved.
* @license 		Proprietary Use License http://stackideas.com/licensing.html
* @author 		Stack Ideas Sdn Bhd
*/
defined( '_JEXEC' ) or die( 'Unauthorized Access' );
?>

EasySocial.require()
.script( 'site/search/advanced' )
.done( function($){

	// // Implement main stream controller.
	$( '[data-adv-search]' ).implement( "EasySocial.Controller.Search.Advanced" );
});
