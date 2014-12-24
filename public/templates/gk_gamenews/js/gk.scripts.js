/**
 * jQuery Cookie plugin
 *
 * Copyright (c) 2010 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */
jQuery.noConflict();
jQuery.cookie = function (key, value, options) {

    // key and at least value given, set cookie...
    if (arguments.length > 1 && String(value) !== "[object Object]") {
        options = jQuery.extend({}, options);

        if (value === null || value === undefined) {
            options.expires = -1;
        }

        if (typeof options.expires === 'number') {
            var days = options.expires, t = options.expires = new Date();
            t.setDate(t.getDate() + days);
        }

        value = String(value);

        return (document.cookie = [
            encodeURIComponent(key), '=',
            options.raw ? value : encodeURIComponent(value),
            options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
            options.path ? '; path=' + options.path : '',
            options.domain ? '; domain=' + options.domain : '',
            options.secure ? '; secure' : ''
        ].join(''));
    }

    // key and possibly options given, get cookie...
    options = value || {};
    var result, decode = options.raw ? function (s) { return s; } : decodeURIComponent;
    return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
};


/**
 *
 * Template scripts
 *
 **/

// onDOMLoadedContent event
jQuery(document).ready(function() {	
	
	// style area
	if(jQuery('#gkStyleArea')){
		jQuery('#gkColors').find('a').each(function(i, element){
			jQuery(element).click(function(e){
	            e.preventDefault();
	            e.stopPropagation();
				changeStyle(i+1);
			});
		});
		
		jQuery('#gkBackgrounds').find('a').each(function(i, element){
			element.addEvent('click',function(e){
		        e.preventDefault();
		        e.stopPropagation();
				changeBg(i+1);
			});
		});
	}
	
	// font-size switcher
	if(jQuery('#gkTools') && jQuery('#gkMainbody')) {
		var current_fs = 100;
		
		jQuery('#gkMainbody').css('font-size', current_fs+"%");
		
		jQuery('#gkToolsInc').click(function(e){ 
			e.stopPropagation();
			e.preventDefault(); 
			if(current_fs < 150) {  
				jQuery('#gkMainbody').animate({ 'font-size': (current_fs + 10) + "%"}, 200); 
				current_fs += 10; 
			} 
		});
		jQuery('#gkToolsReset').click(function(e){ 
			e.stopPropagation();
			e.preventDefault(); 
			jQuery('#gkMainbody').animate({ 'font-size' : "100%"}, 200); 
			current_fs = 100; 
		});
		jQuery('#gkToolsDec').click(function(e){ 
			e.stopPropagation();
			e.preventDefault(); 
			if(current_fs > 70) { 
				jQuery('#gkMainbody').animate({ 'font-size': (current_fs - 10) + "%"}, 200); 
				current_fs -= 10; 
			} 
		});
	}
	
	
	// Function to change styles
	function changeStyle(style){
		var file1 = $GK_TMPL_URL+'/css/style'+style+'.css';
		var file2 = $GK_TMPL_URL+'/css/typography/typography.style'+style+'.css';
		var file3 = $GK_TMPL_URL+'/css/typography/typography.iconset.style'+style+'.css';
		jQuery('head').append('<link rel="stylesheet" href="'+file1+'" type="text/css" />');
		jQuery('head').append('<link rel="stylesheet" href="'+file2+'" type="text/css" />');
		jQuery('head').append('<link rel="stylesheet" href="'+file3+'" type="text/css" />');
		jQuery.cookie('gk_gamenews_j25_style', style, { expires: 365, path: '/' });
	}
	
	// Function to change backgrounds
	function changeBg(bg){
		document.body.setAttribute('data-bg', bg);
		jQuery.cookie('gk_gamenews_j25_bg' , bg, { expires: 365, path: '/' });
	}
	
});


