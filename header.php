<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Test-paper
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <div class="site-wrapper">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'test-paper' ); ?></a>

		
		<header id="masthead" class="site-header" role="banner">
				<div class="site-header-main">
					<div class="site-branding">
                    <?php 
						if ( has_custom_logo() ) {
							   the_custom_logo();
                              
						} else {
								?>
						  <div class="cust-head-logo">
							<img src="<?php echo get_template_directory_uri().'/images/default_logo.png'; ?>" alt="logo">
						 </div>
						<?php } ?>
					</div><!-- .site-branding -->
                    <div class="menu-toggle-wrapper">
						<button id="menu-toggle" class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>
                    </div>
						<div id="site-header-menu" class="site-header-menu">
							
								<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'test-paper' ); ?>">
									<?php
										
										wp_nav_menu( array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
											'menu_class'     => 'primary-menu'
										) );
											
									?>
								</nav><!-- .main-navigation -->
							
						</div><!-- .site-header-menu -->
					
				</div><!-- .site-header-main -->

			</header><!-- .site-header -->
        </div>
		<div id="content" class="site-content">
