=== Simple Responsive Menu ===
Contributors: sutharinfo
Tags: menu, navigation, jquery, wordpress, responsive
Requires at least: 3.0
Tested up to: 3.8
Stable tag: 2.1
License: GPLv2 or later


== Description ==

Make your site simple menu to responsive menu. This plugin is convert WordPress menu to simple responsive menu. 


Features:

*   Customizable color options for menu by admin side.
*   Created shortcode of menu, now you can add any where in your website.



== Installation ==

= Install =


1. Log into your WordPress admin panel
2. Navigate to Plugins => Add New
3. Click Upload 
4. Click Choose File and select the sr-menu zip.
5. Click Install Now.
6. Activate the plugin through the 'Plugins' menu in WordPress.
7. Go to Dashboard => SR Menu and set your general setting.



= Uninstall =

1. Deactivate Simple Responsive Menu in the 'Plugins' menu in Wordpress.
2. After Deactivation a 'Delete' link appears below the plugin name, follow the link and confim with 'Yes, Delete these files'.
3. This will delete all the plugin files from the server as well as erasing all options the plugin has stored in the database.


= Settings =

1. Add shortcode in your theme(header.php) or replace your current menu.

	 [srMenu theme_location=primary]
	              OR
    `<?php echo do_shortcode('[srMenu theme_location=primary]');?>`

2. Go to "Dashboard" => "SR Menu" section and set your general option settings.
3. For multi-level menu.
 * Go to  "Dashboard" => "Appearance" => "Menus".
 * "Edit/Create Menus" and "Manage Locations".
 * Help for developers you can manage menu location in shortcode "[srMenu theme_location=primary]"


= Technical Support Questions =
Write a email to us on sutharinfo@gmail.com


== Frequently Asked Questions ==

= Where can I send bug reports? =

Write a email to us on sutharinfo@gmail.com


== Screenshots ==

1. Admin general setting.
2. Front side navigation menu.
3. Front side navigation menu.
4. Front side navigation menu.


== Changelog ==

= 2.1 =

*Solved problem "headers already sent"(some time create in Wordpress 3.8).

= 2.0 =

* Created shortcode of menu, now you can add any where in your website.
* Added option for menu title, now you can change menu title.
* Added option for toggle on and toggle off menu.


= 1.0 =

* A intial version.

== Upgrade Notice ==

= 2.0 =
* Created shortcode and also added option for menu title,toggle on and toggle off.