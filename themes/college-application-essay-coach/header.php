<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package College Application Essay Coach
 */


if (is_front_page() == TRUE){
    $heading = 'h1';
    $description = 'h2';
}
elseif (is_singular() == TRUE) {
    $heading = 'h4';
    $description = 'h5';
}
else {
    $heading = 'h3';
    $description = 'h4';
}

$lwi_logo = get_option('theme_options_lwi_logo');
$is_active_sidebar_1 = is_active_sidebar( 'sidebar-1' );
$is_active_sidebar_2 = is_active_sidebar( 'sidebar-2' );
$is_active_sidebar_3 = is_active_sidebar( 'sidebar-3' );
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if (gte IE 9)|!(IE)]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<![endif]--> 
<!-- Internet Explorer condition - HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->   
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'college-application-essay-coach' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-container">
                        <!-- Logo -->                       
                        <div class="site-branding">
                            <?php if (!empty($lwi_logo)): ?>
                                <span itemscope itemtype="http://schema.org/Organization">
                                    <a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <img itemprop="logo" class="logo" alt="<?php bloginfo('name'); ?>" src="<?php echo wp_get_attachment_url($lwi_logo[0]) ?>" />
                                    </a>
                                </span>
                            <?php endif; ?>
                                <<?php echo $heading; ?> class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></<?php echo $heading; ?>>
                                <<?php echo $description; ?> class="site-description"><?php bloginfo( 'description' ); ?></<?php echo $description; ?>>
                        </div>
                        <!-- Top Items --> 
                        <ul id="headerInfo" class="widget-area top-items" role="complementary">
                            <?php if ($is_active_sidebar_1 === TRUE){
                                dynamic_sidebar( 'sidebar-1' );
                            } ?>
                        </ul>
                        <!-- Top Items End --> 
                    </div>
                </div> 
             </div>
        </div>
		<nav id="site-navigation" class="main-navigation navbar" role="navigation">
			<!-- <button class="menu-toggle"><?php // _e( 'Primary Menu', 'college-application-essay-coach' ); ?></button> -->
            <div class="navbar-inner">
                <div class="container">
                    <span id="menuLabel">Menu</span>
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => NULL, 'container_class' => '', 'menu_id' => 'nav', 'menu_class' => 'nav navbar-nav' ) ); ?>
                    <?php $socialMenuArgs = array( 'theme_location' => 'social', 'container' => FALSE, 'container_class' => FALSE, 'menu_id' => FALSE, 'menu_class' => 'social-top social-6','items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>', 'echo' => FALSE, 'depth' => 0 ); ?>
                    <?php echo strip_tags(wp_nav_menu( $socialMenuArgs ), '<a><i><div>' ); ?>
                </div>
            </div>
		</nav><!-- #site-navigation -->
        <div id="banner-wrapper" class="row">
            <div id="banner" class="container">
                <div id="banner-left" class="col-md-8">
                    <?php if ($is_active_sidebar_2 === TRUE){
                        dynamic_sidebar( 'sidebar-2' );
                    } ?>
                </div>
                <div id="banner-right" class="col-md-4">
                    <?php
                    if ($is_active_sidebar_3 === TRUE){
                        dynamic_sidebar( 'sidebar-3' );
                    }
                    ?>
                </div>
            </div>
        </div>
	</header><!-- #masthead -->

    <div class="space40"></div>

	<div id="content" class="site-content container">
	    <div class="row">
