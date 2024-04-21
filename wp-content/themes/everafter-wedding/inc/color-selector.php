<?php


//-----------------------------Site Identity Color----------------

	$everafter_wedding_site_identity_color = get_theme_mod('everafter_wedding_site_identity_color');
	$everafter_wedding_site_identity_tagline_color = get_theme_mod('everafter_wedding_site_identity_tagline_color');

	


//=====================Whole CSS===================================


	$custom_css ='.display_only h1 a,.display_only p{';
	
	$custom_css .='}';





//==============Main Setting Section===========================================


// ----------------Site Identity Color--------------------

	if($everafter_wedding_site_identity_color != false){
		$custom_css .='.display_only h1 a{';
			if($everafter_wedding_site_identity_color != false)
		    	$custom_css .='color: '.esc_html($everafter_wedding_site_identity_color).'!important;';
		$custom_css .='}';
	}

	if($everafter_wedding_site_identity_tagline_color != false){
		$custom_css .='.display_only p{';
			if($everafter_wedding_site_identity_tagline_color != false)
		    	$custom_css .='color: '.esc_html($everafter_wedding_site_identity_tagline_color).'!important;';
		$custom_css .='}';
	}



?>