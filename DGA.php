<?php
/*
Plugin Name: Demographic data in Google Analytics
Plugin URI:  http://www.userreport.com/userreport-wordpress-plugin/
Description: A Plugin to add UserReport Analytics code on your pages, thus enabling the ability to transfer user data to Google Analytics. You simply enter your UserReport code snippet.
Version: 1.0.2
Author: UserReport
Author URI: http://www.userreport.com
*/

	
add_action('init', 'DGA_launch_i18n') ;
add_action('admin_menu', 'DGA_menu') ;
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'DGA_plugin_action_links') ;
	
function DGA_launch_i18n() {
	$lngPath = basename(dirname(__FILE__)) . '/languages' ;
	load_plugin_textdomain('DGA', false, $lngPath) ;
}

function DGA_menu() {
	add_options_page('Demographic data in Google Analytics', __('DGA (UserReport)'), 'administrator', __FILE__, 'DGA_settings') ;
	add_action( 'admin_init', 'DGA_register_mysettings') ;
}
	
function DGA_plugin_action_links($links) {
	$link = '<a href="' . menu_page_url ( plugin_basename(__FILE__) , false ) . '">' . __('Settings') .'</a>' ;
	array_unshift($links, $link) ;
	return $links ;
}
	
function DGA_register_mysettings() {
	register_setting('sga-settings-group', 'analytics_id') ;
}
	
function DGA_settings() {

	?>
		<div class="wrap">
			
			<h2><?php _e('Demographic data in Google Analytics', 'DGA') ; ?></h2>
			<p>
				<?php
					_e('This plugin allows you to easily add your UserReport code snippet to all your WordPress pages which will enable you to transfer background information about your visitors to google analytics. <br>If you do not have a code snippet, follow the 3 simple steps outlined below to get one:', 'DGA') ;
					echo '<br/>' ;
					_e('<li>Go to UserReport.com and create a free account</li><li>After your free UserReport account has been created, you will be asked to register your website (after completing this task, you will get a codesnippet).</li><li>Copy-paste the code snippet into the textbox below and save your changes.</li>', 'DGA') ;
					echo '' ;
					_e('', 'DGA') ;
				?>
			</p>
	
			<form method="post" action="options.php" id="google_form">
				<?php settings_fields('sga-settings-group'); ?>
		
				<table class="form-table">
					<tr valign="top">					
					<textarea name="analytics_id" rows="2" cols="120"><?php echo get_option('analytics_id');?></textarea>
					<br>Still unsure where to get the code snippet from? <a href="http://www.userreport.com/userreport-wordpress-plugin/" target="_blank">Click here</a> for more detailed instrictions.	
					</tr>
				</table>
				<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
			</form>
		
			<p>
				<?php
					_e('<b>If you need any help?</b><br>Please <a href="http://www.userreport.com/support-and-news/forum/#/categories/wordpress-plugin" target="_blank">go to our friendly support forum</a>', 'DGA') ;
					echo '<br/><br/>' ,
						 '' ,
						 '' ;
					_e('', 'simple_google_analytics') ;
					echo '<br/><br/>' ;
					_e('', 'simple_google_analytics') ;
					echo '<br/>' ;
				?>
			</p>
		</div>
	<?php
}
	
	add_action('wp_head', 'DGA_function');

	function DGA_function() {echo get_option('analytics_id');}
?>
