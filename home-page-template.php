<?php 
/*
	Template Name: home-page-template
*/
?>
<?php get_header(); ?>
    
	<article class="banner-post-wrapper">
       <div class="banner-container owl-carousel">
		<?php 
        $args = array(
			'post_type' => 'post',
		);
		$wp_query = new WP_Query( $args ); 
		while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
			<div class="banner-wrapper">
				<div class="banner-post">
					<div class="banner-thumbanial">
						 <?php if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'full' );
						} else {
				                the_content();
					    } ?>
                    </div>
                    <div class="banner-content-wrapper">
						<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
						<?php if( has_excerpt() ) { ?>
								<p><?php the_excerpt(); ?></p>
                        <?php } else { ?>
								<p><?php the_content(); ?></p>
                         <?php } ?>
					</div>
				</div>

				
			</div>

		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

	</article>

    <div class="page-parent-wrapper" id="tabs">
	    <div class="tab-content-wrapper">
			<?php $parent_page_id = 12;
				?> <ul class="tabs"> <?php
					$args = array(
						'post_parent' => $parent_page_id,
						'post_type'   => 'page', 
						'numberposts' => -1,
						'post_status' => 'publish' 
					);
					 
					$pages = get_children( $args );
					foreach( $pages as $page ) { ?>
						
							<li data-tab="tab-<?php echo $page->ID; ?>" class="tab-link"><?php echo $page->post_title;?></li>
							
					
					<?php } ?>
               </ul>

            <div class="tabs-content-wrapper">  
			<?php $parent_page_id = 12;
				/* wp_list_pages( array(
					'child_of' => $parent_page_id
				) );  */
				$args = array(
					'post_parent' => $parent_page_id,
					'post_type'   => 'page', 
					'numberposts' => -1,
					'post_status' => 'publish' 
				);

				$pages = get_children( $args );
                foreach( $pages as $page ) {
                   ?><div class="tab-content" id="tab-<?php echo $page->ID; ?>">
						
							<?php $args_sub = array(
								'post_parent' => $page->ID,
								'post_type'   => 'page', 
								'numberposts' => -1,
								'post_status' => 'publish' 
							);


                           
                            $pages_sub = get_children( $args_sub );
							 /* echo "<pre>";
								print_r($pages_sub);
                            echo "</pre>"; */
							 ?>
                             <?php  foreach( $pages_sub as $page_grand ) { 
								
							?>
								
									<div class="sub-page-listing">
                                      
									     <div class="parent-child-thumbnail"><?php echo $page_img   = get_the_post_thumbnail( $page_grand->ID, 'full' );?></div>
										
										<div class="sub-page-title"><?php echo $page_grand->post_title; ?></div>
										<p class="parent-child-content"><?php echo $page_grand->post_content; ?></p>
                                       
									</div>
								
                             <?php } ?>
							
                          
					 </div>
                <?php } ?>
              </div>
			
   
		</div> 
      </div>		
	</div>
 
<?php 
get_footer(); ?>