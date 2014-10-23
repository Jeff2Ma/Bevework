/**
 * Prints out the inline javascript needed for the colorpicker and choosing
 * the tabs in the panel.
 */

jQuery(document).ready(function($) {
	
	// Fade out the save message
	$('.fade').delay(1000).fadeOut(1000);
	
	$('.of-color').wpColorPicker();
	
	// Switches option sections
	$('.group').hide();
	var active_tab = '';
	if (typeof(localStorage) != 'undefined' ) {
		active_tab = localStorage.getItem("active_tab");
	}
	if (active_tab != '' && $(active_tab).length ) {
		$(active_tab).fadeIn();
	} else {
		$('.group:first').fadeIn();
	}
	$('.group .collapsed').each(function(){
		$(this).find('input:checked').parent().parent().parent().nextAll().each( 
			function(){
				if ($(this).hasClass('last')) {
					$(this).removeClass('hidden');
						return false;
					}
				$(this).filter('.hidden').removeClass('hidden');
			});
	});
	if (active_tab != '' && $(active_tab + '-tab').length ) {
		$(active_tab + '-tab').addClass('nav-tab-active');
	}
	else {
		$('.nav-tab-wrapper a:first').addClass('nav-tab-active');
	}
	
	$('.nav-tab-wrapper a').click(function(evt) {
		$('.nav-tab-wrapper a').removeClass('nav-tab-active');
		$(this).addClass('nav-tab-active').blur();
		var clicked_group = $(this).attr('href');
		if (typeof(localStorage) != 'undefined' ) {
			localStorage.setItem("active_tab", $(this).attr('href'));
		}
		$('.group').hide();
		$(clicked_group).fadeIn();
		evt.preventDefault();
		
		// Editor Height (needs improvement)
		$('.wp-editor-wrap').each(function() {
			var editor_iframe = $(this).find('iframe');
			if ( editor_iframe.height() < 30 ) {
				editor_iframe.css({'height':'auto'});
			}
		});
	
	});
           					
	$('.group .collapsed input:checkbox').click(unhideHidden);
				
	function unhideHidden(){
		if ($(this).attr('checked')) {
			$(this).parent().parent().parent().nextAll().removeClass('hidden');
		}
		else {
			$(this).parent().parent().parent().nextAll().each( 
			function(){
				if ($(this).filter('.last').length) {
					$(this).addClass('hidden');
					return false;		
					}
				$(this).addClass('hidden');
			});
           					
		}
	}
	
	// Image Options
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');		
	});
		
	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();
		 		
});	

jQuery(document).ready(function() {


//例子
	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	
	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}

	jQuery('#md_rss').click(function() {
        jQuery('#section-md_rss_url').fadeToggle(400);});   
    if (jQuery('#md_rss:checked').val() !== undefined) {
        jQuery('#section-md_rss_url').show();
    }


	jQuery('#md_mail').click(function() {
        jQuery('#section-md_mail_url').fadeToggle(400);});   
    if (jQuery('#md_mail:checked').val() !== undefined) {
        jQuery('#section-md_mail_url').show();
    }

    jQuery('#md_wechat').click(function() {
        jQuery('#section-md_wechat_img').fadeToggle(400);
        jQuery('#section-md_wechat_tip').fadeToggle(400);
    });   
    if (jQuery('#md_wechat:checked').val() !== undefined) {
        jQuery('#section-md_wechat_img').show();
        jQuery('#section-md_wechat_tip').show();
    }


	jQuery('#md_weibo').click(function() {
        jQuery('#section-md_weibo_url').fadeToggle(400);});   
    if (jQuery('#md_weibo:checked').val() !== undefined) {
        jQuery('#section-md_weibo_url').show();
    }

	jQuery('#md_qq').click(function() {
        jQuery('#section-md_qq_url').fadeToggle(400);});   
    if (jQuery('#md_qq:checked').val() !== undefined) {
        jQuery('#section-md_qq_url').show();
    }

	jQuery('#md_renren').click(function() {
        jQuery('#section-md_renren_url').fadeToggle(400);});   
    if (jQuery('#md_renren:checked').val() !== undefined) {
        jQuery('#section-md_renren_url').show();
    }

	jQuery('#md_douban').click(function() {
        jQuery('#section-md_douban_url').fadeToggle(400);});   
    if (jQuery('#md_douban:checked').val() !== undefined) {
        jQuery('#section-md_douban_url').show();
    }

	jQuery('#md_tt').click(function() {
        jQuery('#section-md_tt_url').fadeToggle(400);});   
    if (jQuery('#md_tt:checked').val() !== undefined) {
        jQuery('#section-md_tt_url').show();
    }

	jQuery('#md_fb').click(function() {
        jQuery('#section-md_fb_url').fadeToggle(400);});   
    if (jQuery('#md_fb:checked').val() !== undefined) {
        jQuery('#section-md_fb_url').show();
    }

	jQuery('#md_github').click(function() {
        jQuery('#section-md_github_url').fadeToggle(400);});   
    if (jQuery('#md_github:checked').val() !== undefined) {
        jQuery('#section-md_github_url').show();
    }

    });

jQuery(document).ready(function() {

	jQuery('input[name="optionsframework_bliss[enable_excerpt]"]').click(function() {
		jQuery('#section-excerpt_length').toggleClass('hide');
	});


	if( jQuery('input[name="optionsframework_bliss[enable_excerpt]"]').is(':checked') ){
		jQuery('#section-excerpt_length').removeClass('hide');
	}

});