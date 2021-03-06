=== ZigWidgetClass ===
Contributors: ZigPress
Donate link: http://www.zigpress.com/donations/
Tags: widgets, widget, widget instance, custom class, classes, css, widget logic, widget context, wp page widgets, zig, zigpress
Requires at least: 3.6
Tested up to: 4.2
Stable tag: 0.7.3

Lets you add a custom CSS class to each widget instance.

== Description ==

NOTE: ZIGWIDGETCLASS NOW REQUIRES PHP 5.3!

ZigWidgetClass adds a free text field to each widget control form on your widget admin page. Enter a CSS class name in the box and it will be added to the classes that WordPress applies to that widget instance. To add multiple classes, simply separate them with a space.

It has been tested and verified to work with the Widget Logic plugin, the Widget Context plugin, the WP Page Widget plugin and the Display Widgets plugin. If you have problems getting it to work with one of those plugins, make sure you are using the latest version(s).

It only works with widgets that were created by properly using WordPress's Widgets API. If it appears not to work on a certain widget, that widget probably breaks the API rules somehow.

Also, if you have trouble getting it to work with the WP Page Widget plugin, you should create and save each page widget first, before adding the CSS class, then save again.

Requires WordPress 3.6+ and PHP 5.3+.

For further information and support, please visit [the ZigWidgetClass home page](http://www.zigpress.com/plugins/zigwidgetclass/).

== Installation ==

1. Unzip the installer and upload the resulting 'zigwidgetclass' folder into the `/wp-content/plugins/` directory.  Alternatively, go to Admin > Plugins > Add New and enter ZigWidgetClass in the search box.
2. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

For further information and support, please visit [the ZigWidgetClass home page](http://www.zigpress.com/plugins/zigwidgetclass/).

== Changelog ==

= 0.7.3 =
* Confirmed compatibility with WordPress 4.2
* Increased minimum PHP version to 5.3 in accordance with ZigPress policy of gradually dropping support for deprecated platforms
= 0.7.2 =
* Confirmed compatibility with WordPress 4.1
= 0.7.1 =
* Added tiny credit link to widget control panel
* Input field label now reads 'CSS Classes' (instead of 'CSS Class'
* Tested successfully with the Display Widgets plugin
* Various documentation improvements (in this readme and on the plugin admin page)
= 0.7 =
* Confirmed compatibility with WordPress 4.0
* Added admin information page
= 0.6.2 =
* Confirmed compatibility with WordPress 3.9
* Confirmed continued compatibility with WP Page Widgets plugin
* Confirmed continued compatibility with Widget Logic plugin
* Confirmed continued compatibility with Widget Context plugin
= 0.6.1 =
* Confirmed compatibility with WordPress 3.8
* Confirmed continued compatibility with WP Page Widgets plugin
* Confirmed continued compatibility with Widget Logic plugin
* Confirmed continued compatibility with Widget Context plugin
* Increased minimum WordPress version to 3.6 in accordance with ZigPress policy of encouraging WordPress updates
= 0.6 =
* Now compatible with WP Page Widget plugin - thanks to Edwin Ricaurte for suggesting that it should be
* Confirmed continued compatibility with Widget Logic plugin
* Confirmed continued compatibility with Widget Context plugin
* Confirmed compatibility with WordPress 3.7.1
= 0.5 =
* Confirmed continued compatibility with Widget Logic plugin
* Tested and verified compatibility with Widget Context plugin
* Custom class box is now simply labelled "CSS Class"
* Confirmed compatibility with WordPress 3.5.2
* Set minimim WordPress version to 3.5
= 0.4.1 =
* Confirmed compatibility with WordPress 3.5
= 0.4 =
* Coding style improvements and refactoring
* Updated plugin URL
* Confirmed compatibility with WordPress 3.4.2
= 0.3.2 =
* Confirmed compatibility with WordPress 3.4.x
= 0.3.1 =
* Confirmed compatibility with WordPress 3.3.x
= 0.3 =
* Now does actually work in conjunction with Widget Logic (so much for earlier testing)
* Updated PHP version requirement in readiness for WordPress 3.2
* Updated WordPress version requirement as new code only tested on most recent versions
= 0.2 =
* Confirmed compatibility with WordPress 3.1.1
= 0.1 =
* First public release

