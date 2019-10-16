<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Test-paper
 */

?>

	</div><!-- #content -->

		<footer id="colophon" class="site-footer">
			<div class="site-info">
               <div id="footer-sidebar" class="secondary">
					<div id="footer-sidebar1">
						<?php
						if( is_active_sidebar( 'footer-sidebar-1' ) ){
						dynamic_sidebar( 'footer-sidebar-1' );
						}
						?>
					</div>
					<div id="footer-sidebar2">
						<?php
						if( is_active_sidebar( 'footer-sidebar-2' ) ){
						dynamic_sidebar( 'footer-sidebar-2' );
						}
						?>
					</div>
					<div id="footer-sidebar3">
						<?php
						if(is_active_sidebar( 'footer-sidebar-3' ) ){
						dynamic_sidebar( 'footer-sidebar-3' );
						}
						?>
					</div>
					<div id="footer-sidebar4">
						<?php
						if(is_active_sidebar( 'footer-sidebar-4' ) ){
						dynamic_sidebar( 'footer-sidebar-4' );
						}
						?>
					</div>
				</div> 
            </div><!-- .site-info -->
				<div class="footer_content-wrapper">
                    <div class="footer-content-left">
						<div class="footer-menu">
							<?php wp_nav_menu( array(
											'theme_location' => 'footer-menu',
											'menu_id'        => 'footer-menu-1',
											'menu_class'     => 'footer-menu-1'
										) );
                              ?>
						</div>
                        <p class="footer-content">
							<?php echo esc_attr( get_option('footer_content') ); ?>
                        </p>
                    </div>
					<?php if( get_option('footer_logo') != '' )  { ?>
						<div class="footer-content-right">
							<img src="<?php echo esc_attr( get_option('footer_logo') ) ?>">
						</div>
					<?php } else { ?>
					    <div class="footer-content-right">
							<div class="cust-head-logo">
								<img src="<?php echo get_template_directory_uri().'/images/default_logo.png'; ?>" alt="logo">
							</div>
						</div>
					 <?php } ?>
                </div>
               
			
		</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
