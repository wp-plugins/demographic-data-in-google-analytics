<?php
/*
Plugin Name: Demographic data in Google Analytics
Plugin URI:  http://www.userreport.com/userreport-wordpress-plugin/
Description: A Plugin to add UserReport Analytics code on your pages, enabling the ability to transfer user data to Google Analytics.
Version: 1.0.6
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
					_e('The plugin allows you to easily add your UserReport code snippet to all your WordPress pages which will enable you to transfer background information about your visitors to google analytics. <br>If you do not have a code snippet, follow the 3 simple steps outlined below to get one:', 'DGA') ;
					echo '<br/><br/>' ;
					_e('1. Go to <a href="http://www.userreport.com/?utm_source=Wordpress&utm_medium=Plugin&utm_campaign=GA" target="_blank">UserReport.com</a> and create a free account</br>2. After your free UserReport account has been created - register your website (after completing this task you will get the code-snippet).</br>3. Copy-paste the code snippet into the text box below and save your changes.', 'DGA') ;
					echo '' ;
					_e('<br/><br/><b>Important!</b> The UserReport script is disabled when you are logged in to your Wordpress account. In order to test - logout first - and then re-visit your website.', 'DGA') ;
					_e('', 'DGA') ;
				?>
			</p>
	<h2>Let's get started</h2><br/><i>Insert your UserReport code snippet below:</i></br>  
			<form method="post" action="options.php" id="google_form">
				<?php settings_fields('sga-settings-group'); ?>
		
				<table class="form-table">
					<tr valign="top">					
					<textarea name="analytics_id" rows="8" cols="100"><?php echo get_option('analytics_id');?></textarea><p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>	
					</tr>
				</table>
			</form>
			<p>
				<?php
					_e('<b>If you need any help?</b><br>
					- Still a bit unsure about where to get the code snippet from? <a href="http://www.userreport.com/userreport-wordpress-plugin/?utm_source=Wordpress&utm_medium=Plugin&utm_campaign=GA" target="_blank">Click here to read more detailed instructions</a> .
					<br>- Or <a href="http://www.userreport.com/support-and-news/forum/#/categories/wordpress-plugin" target="_blank">go to our friendly support forum</a> and submit your questions.', 'DGA') ;
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
	
	
	function DGA_function() {
	
	if ( is_user_logged_in() ) {
	
	/* User is logged in - suppress script */
	
	} 
	else 
	{
	/* User is not logged in - execute script */
	echo get_option('analytics_id');
	}
	}

	add_action('wp_footer', 'DGA_function',1)
	
?>