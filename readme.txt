=== wp-require-login ===
Contributors: richard4339, cmwelsh
Donate link: http://www.digitalxero.com/
Tags: admin, login, private
Author URI: http://www.digitalxero.com/
Plugin URI: http://www.digitalxero.com/software-development/wp-require-login/
Requires at least: 3.3.0
Tested up to: 4.1.1
Stable tag: 1.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A plugin for Wordpress that redirects users to the login page whenever they try to visit any page/post/etc on the blog.

== Description ==

A simple plugin for Wordpress that redirects users to the login page whenever they try to visit any page/post/etc on the blog, with an option menu to turn this functionality on or off. When enabled, the entire blog essentially becomes a private blog.

== Installation ==

1. Upload `wp-require-login.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Navigate to the 'Require Login' Settings menu and enable.

== Frequently Asked Questions ==

= How do I enable this plugin? =

Once the plugin itself is installed, navigate to the 'Require Login' Settings menu, check the lone checkbox, and click 'Update Options'.

= I'm running a build of Wordpress that is older than 3.3. Can I use this plugin? =

I personally wrote this for a Wordpress installation in early 2008. When I revived it a few days ago, I did have to make some changes. In all honesty, it should work with 3.2 onwards, or on even earlier versions with the Settings menu portions removed from the code. I'm only listing 3.3.0 since this is the earliest version I can guarantee it works with.

= I found a bug! =
Please report the bug on our [issue tracker](https://github.com/richard4339/wp-require-login/issues) at [GitHub](https://github.com/richard4339/wp-require-login/issues).

== Screenshots ==

1. The Require Login Settings page.

== Changelog ==

= 1.0.3 =

* Added cmwelsh as a contributor

= 1.0.2 =

* Update to README only for version verification.

= 1.0.1 =

* Minor update from [cmwelsh](https://github.com/cmwelsh): Replaced deprecated user level requirement with manage_options requirement.

= 1.0 =

* Added plugin installation and uninstall functions to aid option table cleanup.

= 0.5.1 =

* First published version.

== Upgrade Notice ==

= 1.0.3 =

* Non-critical update: Update to README only

= 1.0.2 =

* Non-critical update: Update to README only for version verification.

= 1.0.1 =

* Minor update: Replaced deprecated user level requirement with manage_options requirement.

= 1.0 =
Added plugin installation and uninstall functions to aid option table cleanup.

= 0.5.1 =
Initial version.

== To Do ==

* Nothing currently. If you have any requests, please submit them on [GitHub](https://github.com/richard4339/wp-require-login/issues).

== Git/Subversion ==

In addition to the subversion access that Wordpress is providing, this plugin is available through git at [GitHub](https://github.com/richard4339/wp-require-login).
