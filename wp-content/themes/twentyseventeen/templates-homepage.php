<?php
/**
 * The front page template file
 Template Name: Homepage
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<script>
	jQuery(document).ready(function($){
		$('#slider').anythingSlider({ theme : 'default', 
		mode                : "horiz",
		resizeContents		: false,
		buildArrows         : false,
		buildStartStop  	: false,
		buildNavigation 	: true,
		enableNavigation 	: true,
		forwardText         : "&raquo;",
		backText            : "&laquo;",
		enableArrows        : true,
		hashTags : false, 
		pauseOnHover : true, 
		autoPlay :true,
		delay : 2000
		});
	});
</script>

<div class="wrap">


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			// Services
			$obj = get_post_type_object( 'services' );
			echo '<h2>' . $obj->labels->singular_name . '</h2>';
		
			$query1 = new WP_Query( array ( 'post_type'=>'services',
											'post_status' => 'publish',
											'posts_per_page' => -1,
											)); 
			while( $query1->have_posts() ){
				$query1->the_post();
				get_template_part( 'template-parts/page/content', 'services' );
			}
			wp_reset_postdata();

			// Portfolio 
			
			$obj = get_post_type_object( 'portfolio' );
			echo '<h2>' . $obj->labels->singular_name . '</h2>';
			$query2 = new WP_Query(array ( 'post_type'=>'portfolio',
											'post_status' => 'publish',
											'posts_per_page' => -1,
											)); 
			while( $query2->have_posts() ){
				$query2->the_post();
				get_template_part( 'template-parts/page/content', 'portfolio' );

			}
			wp_reset_postdata();

			// Reviews
			
			$obj = get_post_type_object( 'reviews' );
			echo '<h2>' . $obj->labels->singular_name . '</h2>';
			$query3 = new WP_Query(array ( 'post_type'=>'reviews',
											'post_status' => 'publish',
											'posts_per_page' => -1,
											)); 
											
			echo '<ul id="slider">';							
			while( $query3->have_posts() ){
				$query3->the_post();
				
				
				$social_network = '';
				if (!empty (get_post_meta($post->ID, 'facebook_url', 1))) {
					$social_network .= '<a href="' . get_post_meta($post->ID, 'facebook_url', 1) . '" target="_blank">Facebook </a>'; 
				}
				if (!empty (get_post_meta($post->ID, 'twitter_url', 1))) {
					$social_network .= '<a href="' . get_post_meta($post->ID, 'twitter_url', 1) . '" target="_blank">Twitter </a>'; 
				}
				if (!empty (get_post_meta($post->ID, 'linkedin_url', 1))) {
					$social_network .= '<a href="' . get_post_meta($post->ID, 'linkedin_url', 1) . '" target="_blank">LinkedIn </a>'; 
				}
				
			?>
			<li>
				<?php if ( '' !== get_the_post_thumbnail() ) { ?>
					<div class="post-thumbnail">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
						</a>
					</div><!-- .post-thumbnail -->
				<?php } else { ?>
					<div class="post-thumbnail">
						<a class="no_image" href="<?php the_permalink(); ?>">
							No images
						</a>
					</div><!-- .post-thumbnail -->
				
				<?php } ?>
				<div class="entry-excerpt">
					<?php the_excerpt(); ?>
				</div><!-- .entry-excerpt -->
				<div class="entry-link">
					<?php echo $social_network; ?>
				</div><!-- .entry-link -->
			</li>	

			<?php	
			}
			echo '</ul>';
			wp_reset_postdata();
			
			?>
			

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php // get_sidebar(); ?>
</div><!-- .wrap -->

<?php
get_footer();

