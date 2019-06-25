<?php
/**
 * The front page template file
 Template Name: Blog
 *
 * If the user has selected a static page for their blog, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">


	<div id="primary" class="content-area blog">
		<main id="main" class="site-main" role="main">
			<header class="entry-header-blog">
				<?php the_title( '<h2 class="entry-title-blog">', '</h2>' ); ?>
			</header><!-- .entry-header -->

			<?php
			// Blog
			$i = 1;
			$query1 = new WP_Query( array ( 'post_type'=>'post',
											'post_status' => 'publish',
											'posts_per_page' => -1,
											)); 
			while( $query1->have_posts() ){
				$query1->the_post();
				
				if ($i%2 == 0) {
				  $class = 'right';
				} else {
				  $class = 'left';
				}
				
				if ( $i == 2 ){ ?>
					<div class="blog_adv"></div>
				<?php } ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>


					<?php if ( '' !== get_the_post_thumbnail() ) { ?>
						<div class="post-thumbnail">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
							</a>
							<span class="blog_count <?=$class; ?>"><?=$i; ?><span>
						</div><!-- .post-thumbnail -->
					<?php } else { ?>
						<div class="post-thumbnail">
							<a class="no_image" href="<?php the_permalink(); ?>">
								No images
							</a>
							<span class="blog_count <?=$class; ?>"><?=$i; ?><span>
						</div><!-- .post-thumbnail -->
					
					<?php } ?>
					
					<header class="entry-header">
						<?php
						the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
						?>
					</header><!-- .entry-header -->
					
					<div class="entry-excerpt">
						<?php the_excerpt(); ?>
					</div><!-- .entry-excerpt -->

	
				</article><!-- #post-<?php the_ID(); ?> -->
				
				
				<?php
				
				$i++;
				
			}
			wp_reset_postdata();

			
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php // get_sidebar(); ?>
</div><!-- .wrap -->

<?php
get_footer();

