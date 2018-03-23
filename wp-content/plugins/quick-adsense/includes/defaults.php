<?php
add_action('init', 'quick_adsense_defaults_init');
function quick_adsense_defaults_init() {
	$settings = get_option('quick_adsense_settings');
	if(isset($settings) && is_array($settings)) { // Existing 2.1 User
		return;
	} else { // New User OR V2.0 User OR V1.X User
		$quickAdsense2 = get_option('quick_adsense_2_settings');
		if(isset($quickAdsense2) && is_array($quickAdsense2) && (count($quickAdsense2) > 1)) {  // V2.0 User
			$settings = quick_adsense_get_defaults();
			if(isset($quickAdsense2['AdsDisp']) && ($quickAdsense2['AdsDisp'] != '')) { $settings['max_ads_per_page'] = $quickAdsense2['AdsDisp']; }
			
			if(isset($quickAdsense2['BegnAds']) && ($quickAdsense2['BegnAds'] != '')) { $settings['enable_position_beginning_of_post'] = $quickAdsense2['BegnAds']; }
			if(isset($quickAdsense2['BegnRnd']) && ($quickAdsense2['BegnRnd'] != '')) { $settings['ad_beginning_of_post'] = $quickAdsense2['BegnRnd']; }
			if(isset($quickAdsense2['MiddAds']) && ($quickAdsense2['MiddAds'] != '')) { $settings['enable_position_middle_of_post'] = $quickAdsense2['MiddAds']; }
			if(isset($quickAdsense2['MiddRnd']) && ($quickAdsense2['MiddRnd'] != '')) { $settings['ad_middle_of_post'] = $quickAdsense2['MiddRnd']; }
			if(isset($quickAdsense2['EndiAds']) && ($quickAdsense2['EndiAds'] != '')) { $settings['enable_position_end_of_post'] = $quickAdsense2['EndiAds']; }
			if(isset($quickAdsense2['EndiRnd']) && ($quickAdsense2['EndiRnd'] != '')) { $settings['ad_end_of_post'] = $quickAdsense2['EndiRnd']; }
			
			if(isset($quickAdsense2['MoreAds']) && ($quickAdsense2['MoreAds'] != '')) { $settings['enable_position_after_more_tag'] = $quickAdsense2['MoreAds']; }
			if(isset($quickAdsense2['MoreRnd']) && ($quickAdsense2['MoreRnd'] != '')) { $settings['ad_after_more_tag'] = $quickAdsense2['MoreRnd']; }
			if(isset($quickAdsense2['LapaAds']) && ($quickAdsense2['LapaAds'] != '')) { $settings['enable_position_before_last_para'] = $quickAdsense2['LapaAds']; }
			if(isset($quickAdsense2['LapaRnd']) && ($quickAdsense2['LapaRnd'] != '')) { $settings['ad_before_last_para'] = $quickAdsense2['LapaRnd']; }
			
			for($i = 1; $i <= 3; $i++) {
				if(isset($quickAdsense2['Par'.$i.'Ads']) && ($quickAdsense2['Par'.$i.'Ads'] != '')) { $settings['enable_position_after_para_option_'.$i] = $quickAdsense2['Par'.$i.'Ads']; }
				if(isset($quickAdsense2['Par'.$i.'Rnd']) && ($quickAdsense2['Par'.$i.'Rnd'] != '')) { $settings['ad_after_para_option_'.$i] = $quickAdsense2['Par'.$i.'Rnd']; }
				if(isset($quickAdsense2['Par'.$i.'Nup']) && ($quickAdsense2['Par'.$i.'Nup'] != '')) { $settings['position_after_para_option_'.$i] = $quickAdsense2['Par'.$i.'Nup']; }
				if(isset($quickAdsense2['Par'.$i.'Con']) && ($quickAdsense2['Par'.$i.'Con'] != '')) { $settings['enable_jump_position_after_para_option_'.$i] = $quickAdsense2['Par'.$i.'Con']; }
			}
			
			for($i = 1; $i <= 1; $i++) {
				if(isset($quickAdsense2['Img'.$i.'Ads']) && ($quickAdsense2['Img'.$i.'Ads'] != '')) { $settings['enable_position_after_image_option_'.$i] = $quickAdsense2['Img'.$i.'Ads']; }
				if(isset($quickAdsense2['Img'.$i.'Rnd']) && ($quickAdsense2['Img'.$i.'Rnd'] != '')) { $settings['ad_after_image_option_'.$i] = $quickAdsense2['Img'.$i.'Rnd']; }
				if(isset($quickAdsense2['Img'.$i.'Nup']) && ($quickAdsense2['Img'.$i.'Nup'] != '')) { $settings['position_after_image_option_'.$i] = $quickAdsense2['Img'.$i.'Nup']; }
				if(isset($quickAdsense2['Img'.$i.'Con']) && ($quickAdsense2['Img'.$i.'Con'] != '')) { $settings['enable_jump_position_after_image_option_'.$i] = $quickAdsense2['Img'.$i.'Con']; }
			}
			
			if(isset($quickAdsense2['AppPost']) && ($quickAdsense2['AppPost'] != '')) { $settings['enable_on_posts'] = $quickAdsense2['AppPost']; }
			if(isset($quickAdsense2['AppPage']) && ($quickAdsense2['AppPage'] != '')) { $settings['enable_on_pages'] = $quickAdsense2['AppPage']; }
			
			if(isset($quickAdsense2['AppHome']) && ($quickAdsense2['AppHome'] != '')) { $settings['enable_on_homepage'] = $quickAdsense2['AppHome']; }
			if(isset($quickAdsense2['AppCate']) && ($quickAdsense2['AppCate'] != '')) { $settings['enable_on_categories'] = $quickAdsense2['AppCate']; }
			if(isset($quickAdsense2['AppArch']) && ($quickAdsense2['AppArch'] != '')) { $settings['enable_on_archives'] = $quickAdsense2['AppArch']; }
			if(isset($quickAdsense2['AppTags']) && ($quickAdsense2['AppTags'] != '')) { $settings['enable_on_tags'] = $quickAdsense2['AppTags']; }
			if(isset($quickAdsense2['AppMaxA']) && ($quickAdsense2['AppMaxA'] != '')) { $settings['enable_all_possible_ads'] = $quickAdsense2['AppMaxA']; }
			
			if(isset($quickAdsense2['AppSide']) && ($quickAdsense2['AppSide'] != '')) { $settings['disable_widgets_on_homepage'] = $quickAdsense2['AppSide']; }
			
			if(isset($quickAdsense2['AppLogg']) && ($quickAdsense2['AppLogg'] != '')) { $settings['disable_for_loggedin_users'] = $quickAdsense2['AppLogg']; }
			
			if(isset($quickAdsense2['QckTags']) && ($quickAdsense2['QckTags'] != '')) { $settings['enable_quicktag_buttons'] = $quickAdsense2['QckTags']; }
			if(isset($quickAdsense2['QckRnds']) && ($quickAdsense2['QckRnds'] != '')) { $settings['disable_randomads_quicktag_button'] = $quickAdsense2['QckRnds']; }
			if(isset($quickAdsense2['QckOffs']) && ($quickAdsense2['QckOffs'] != '')) { $settings['disable_disablead_quicktag_buttons'] = $quickAdsense2['QckOffs']; }
			if(isset($quickAdsense2['QckOfPs']) && ($quickAdsense2['QckOfPs'] != '')) { $settings['disable_positionad_quicktag_buttons'] = $quickAdsense2['QckOfPs']; }
			
			for($i = 1; $i <= 10; $i++) {
				if(isset($quickAdsense2['AdsCode'.$i]) && ($quickAdsense2['AdsCode'.$i] != '')) { $settings['onpost_ad_'.$i.'_content'] = $quickAdsense2['AdsCode'.$i]; }
				if(isset($quickAdsense2['AdsAlign'.$i]) && ($quickAdsense2['AdsAlign'.$i] != '')) { $settings['onpost_ad_'.$i.'_alignment'] = $quickAdsense2['AdsAlign'.$i]; }
				if(isset($quickAdsense2['AdsMargin'.$i]) && ($quickAdsense2['AdsMargin'.$i] != '')) { $settings['onpost_ad_'.$i.'_margin'] = $quickAdsense2['AdsMargin'.$i]; }
				
				if(isset($quickAdsense2['WidCode'.$i]) && ($quickAdsense2['WidCode'.$i] != '')) { $settings['widget_ad_'.$i.'_content'] = $quickAdsense2['WidCode'.$i]; }
			}
			update_option('quick_adsense_settings', $settings);
			update_option('quick_adsense_2_settings_bak', $quickAdsense2);
			delete_option('quick_adsense_2_settings');
		} else { // New User OR V1.X User
			$quickAdsense1AdsDisp = get_option('AdsDisp');
			if(isset($quickAdsense1AdsDisp) && in_array($quickAdsense1AdsDisp, array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'))) { // V1.X User
				$settings = quick_adsense_get_defaults();
				$temp = get_option('AdsDisp'); if(isset($temp) && ($temp != '')) { $settings['max_ads_per_page'] = $temp; }
				
				$temp = get_option('BegnAds'); if(isset($temp) && ($temp != '')) { $settings['enable_position_beginning_of_post'] = $temp; }
				$temp = get_option('BegnRnd'); if(isset($temp) && ($temp != '')) { $settings['ad_beginning_of_post'] = $temp; }
				$temp = get_option('MiddAds'); if(isset($temp) && ($temp != '')) { $settings['enable_position_middle_of_post'] = $temp; }
				$temp = get_option('MiddRnd'); if(isset($temp) && ($temp != '')) { $settings['ad_middle_of_post'] = $temp; }
				$temp = get_option('EndiAds'); if(isset($temp) && ($temp != '')) { $settings['enable_position_end_of_post'] = $temp; }
				$temp = get_option('EndiRnd'); if(isset($temp) && ($temp != '')) { $settings['ad_end_of_post'] = $temp; }
				
				$temp = get_option('MoreAds'); if(isset($temp) && ($temp != '')) { $settings['enable_position_after_more_tag'] = $temp; }
				$temp = get_option('MoreRnd'); if(isset($temp) && ($temp != '')) { $settings['ad_after_more_tag'] = $temp; }
				$temp = get_option('LapaAds'); if(isset($temp) && ($temp != '')) { $settings['enable_position_before_last_para'] = $temp; }
				$temp = get_option('LapaRnd'); if(isset($temp) && ($temp != '')) { $settings['ad_before_last_para'] = $temp; }
				
				for($i = 1; $i <= 3; $i++) {
					$temp = get_option('Par'.$i.'Ads'); if(isset($temp) && ($temp != '')) { $settings['enable_position_after_para_option_'.$i] = $temp; }
					$temp = get_option('Par'.$i.'Rnd'); if(isset($temp) && ($temp != '')) { $settings['ad_after_para_option_'.$i] = $temp; }
					$temp = get_option('Par'.$i.'Nup'); if(isset($temp) && ($temp != '')) { $settings['position_after_para_option_'.$i] = $temp; }
					$temp = get_option('Par'.$i.'Con'); if(isset($temp) && ($temp != '')) { $settings['enable_jump_position_after_para_option_'.$i] = $temp; }
				}
				
				for($i = 1; $i <= 1; $i++) {
					$temp = get_option('Img'.$i.'Ads'); if(isset($temp) && ($temp != '')) { $settings['enable_position_after_image_option_'.$i] = $temp; }
					$temp = get_option('Img'.$i.'Rnd'); if(isset($temp) && ($temp != '')) { $settings['ad_after_image_option_'.$i] = $temp; }
					$temp = get_option('Img'.$i.'Nup'); if(isset($temp) && ($temp != '')) { $settings['position_after_image_option_'.$i] = $temp; }
					$temp = get_option('Img'.$i.'Con'); if(isset($temp) && ($temp != '')) { $settings['enable_jump_position_after_image_option_'.$i] = $temp; }
				}

				$temp = get_option('AppPost'); if(isset($temp) && ($temp != '')) { $settings['enable_on_posts'] = $temp; }
				$temp = get_option('AppPage'); if(isset($temp) && ($temp != '')) { $settings['enable_on_pages'] = $temp; }
				
				$temp = get_option('AppHome'); if(isset($temp) && ($temp != '')) { $settings['enable_on_homepage'] = $temp; }
				$temp = get_option('AppCate'); if(isset($temp) && ($temp != '')) { $settings['enable_on_categories'] = $temp; }
				$temp = get_option('AppArch'); if(isset($temp) && ($temp != '')) { $settings['enable_on_archives'] = $temp; }
				$temp = get_option('AppTags'); if(isset($temp) && ($temp != '')) { $settings['enable_on_tags'] = $temp; }
				$temp = get_option('AppMaxA'); if(isset($temp) && ($temp != '')) { $settings['enable_all_possible_ads'] = $temp; }
				
				$temp = get_option('AppSide'); if(isset($temp) && ($temp != '')) { $settings['disable_widgets_on_homepage'] = $temp; }
				
				$temp = get_option('AppLogg'); if(isset($temp) && ($temp != '')) { $settings['disable_for_loggedin_users'] = $temp; }
				
				$temp = get_option('QckTags'); if(isset($temp) && ($temp != '')) { $settings['enable_quicktag_buttons'] = $temp; }
				$temp = get_option('QckRnds'); if(isset($temp) && ($temp != '')) { $settings['disable_randomads_quicktag_button'] = $temp; }
				$temp = get_option('QckOffs'); if(isset($temp) && ($temp != '')) { $settings['disable_disablead_quicktag_buttons'] = $temp; }
				$temp = get_option('QckOfPs'); if(isset($temp) && ($temp != '')) { $settings['disable_positionad_quicktag_buttons'] = $temp; }
				
				for($i = 1; $i <= 10; $i++) {
					$temp = get_option('AdsCode'.$i); if(isset($temp)) { $settings['onpost_ad_'.$i.'_content'] = $temp; }
					$temp = get_option('AdsAlign'.$i); if(isset($temp) && ($temp != '')) { $settings['onpost_ad_'.$i.'_alignment'] = $temp; }
					$temp = get_option('AdsMargin'.$i); if(isset($temp) && ($temp != '')) { $settings['onpost_ad_'.$i.'_margin'] = $temp; }
					
					$temp = get_option('WidCode'.$i); if(isset($temp)) { $settings['widget_ad_'.$i.'_content'] = $temp; }
				}
				
				update_option('quick_adsense_settings', $settings);
				delete_option('AdsDisp');
			} else { // New User
				update_option('quick_adsense_settings', quick_adsense_get_defaults());
			}
		}
	}
}

function quick_adsense_get_defaults() {
	$settings = array();
	
	$settings['max_ads_per_page'] = '3';
	
	$settings['enable_position_beginning_of_post'] = '1';
	$settings['ad_beginning_of_post'] = '1';
	$settings['enable_position_middle_of_post'] = '0';
	$settings['ad_middle_of_post'] = '0';
	$settings['enable_position_end_of_post'] = '1';
	$settings['ad_end_of_post'] = '0';
	
	$settings['enable_position_after_more_tag'] = '0';
	$settings['ad_after_more_tag'] = '0';
	$settings['enable_position_before_last_para'] = '0';
	$settings['ad_before_last_para'] = '0';
	
	for($i = 1; $i <= 3; $i++) {
		$settings['enable_position_after_para_option_'.$i] = '0';
		$settings['ad_after_para_option_'.$i] = '0';
		$settings['position_after_para_option_'.$i] = '1';
		$settings['enable_jump_position_after_para_option_'.$i] = '0';
	}
	
	for($i = 1; $i <= 1; $i++) {
		$settings['enable_position_after_image_option_'.$i] = '0';
		$settings['ad_after_image_option_'.$i] = '0';
		$settings['position_after_image_option_'.$i] = '1';
		$settings['enable_jump_position_after_image_option_'.$i] = '0';
	}
	
	$settings['enable_on_posts'] = '1';
	$settings['enable_on_pages'] = '1';
	
	$settings['enable_on_homepage'] = '0';
	$settings['enable_on_categories'] = '0';
	$settings['enable_on_archives'] = '0';
	$settings['enable_on_tags'] = '0';
	$settings['enable_all_possible_ads'] = '0';
	
	$settings['disable_widgets_on_homepage'] = '0';
	
	$settings['disable_for_loggedin_users'] = '0';
	
	$settings['enable_quicktag_buttons'] = '1';
	$settings['disable_randomads_quicktag_button'] = '0';
	$settings['disable_disablead_quicktag_buttons'] = '0';
	$settings['disable_positionad_quicktag_buttons'] = '0';
	
	$settings['onpost_enable_global_style'] = '0';
	$settings['onpost_global_alignment'] = '2';
	$settings['onpost_global_margin'] = '10';
	
	for($i = 1; $i <= 10; $i++) {
		$settings['onpost_ad_'.$i.'_content'] = '';
		$settings['onpost_ad_'.$i.'_alignment'] = '2';
		$settings['onpost_ad_'.$i.'_margin'] = '10';
		
		$settings['widget_ad_'.$i.'_content'] = '';
	}
	return $settings;
}
?>