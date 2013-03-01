=== Demographic data in Google Analytics ===
Author: userreport
Contributors: userreport
Tags: Analytics, Google, javascript, google analytics, custom variables, UserReport
Plugin link: http://www.userreport.com/userreport-wordpress-plugin/
Requires at least: 2.7
Tested up to: 3.4.1
Version: 1.0.6
Stable tag: 1.0.6

== Description ==
This plugin adds the required javascript for the UserReport-service which will enable you to transfer background information about your visitors to google analytics.

'Demographic data in Google Analytics' supports transferring up to 5 custom variables into google analytics. The google analytics custom variables can contain information such as: Gender, Age, Education and much more. The demographic data transferred to google analytics is collected using the free UserReport service.

This plugin does not provide the tracking code for Google Analytics. For that you will need to use a plugin like [Google Analytics for WordPress](http://wordpress.org/extend/plugins/google-analytics-for-wordpress/).

For more information, visit the google analytics app gallery post [Get demographic data in Google Analytics with UserReport](http://www.google.com/analytics/apps/about?app_id=1174001) where you can learn more about the service

Or visit the [Wordpress plugin homepage on UserReport](http://www.userreport.com/userreport-wordpress-plugin/?utm_source=Wordpress&utm_medium=Plugin&utm_campaign=GA)

== Installation ==
This section describes how to install the plugin:

1. Upload the 'demographic-data-in-google-analytics.zip' file to the `/wp-content/plugins/` directory.
2. Unzip the 'demographic-data-in-google-analytics.zip' which will create the folder to the directory `/wp-content/plugins/DGA`
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Configure the plugin through 'DGA (UserReport)' submenu in the the 'Settings' section of the Wordpress administrator menu
5. Add your UserReport code snippet 
6. Save

In other words, just follow the [standard WordPress installation method](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins)

== Frequently Asked Questions ==

= Where can I find the Userreport code snippet? =
Login to userreport.com and go to settings. Select Website-details and copy-paste the snippet from here

= Can I get any support using this plugin? =
Yes, we have created a support forum to help answers any questions relating to this plugin

[Click here to go to our Wordpress Plugin support forum](http://www.userreport.com/support-and-news/forum/#/categories/wordpress-plugin)

== Screenshots ==

1. Screenshot of the custom variables in Google Analytics.
2. Screenshot of the custom variables in Google Analytics.
3. Screenshot of the basic settings panel for this plugin.

== Changelog ==
= version 1.0.0 =
* First released version

= version 1.0.3 =
* Fixed versionen screwup - 1.0.0 was referred to as 1.0.2

= version 1.0.4 =
* Fixed problem with header-conflict appearing at some installations. Script is moved to footer before </body> + script is automatically disabled when logged into Wordpress.

= version 1.0.6
* Removed unicode BOM character that caused some problems.