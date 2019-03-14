<?php
/**
 * Template Name: Services
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Karmar
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		
		
		
		
		<div id="home-about" class="wrap-1250 about-page">
		
				<div id="home-about-img-wrap"><img src="<?php the_field('image');?>" /></div>	
		
				<div id="service-buttons-wrap">
					<?php if( have_rows('buttons') ):?>
						<ul id="service-buttons">
						<?php while ( have_rows('buttons') ) : the_row();?>	
							<?php if( have_rows('single_button') ):?>
								<?php while ( have_rows('single_button') ) : the_row();?>
								<li class="single-service-button">
									<div class="service-icon-wrap">
										<?php 
										$image = get_sub_field('icon');
										$size = 'full'; // (thumbnail, medium, large, full or custom size)
										if( $image ) {
											echo wp_get_attachment_image( $image, $size );
										}
										?>
									</div>
									<span><?php the_sub_field('label'); ?></span>
								</li>
								<?php endwhile;?>
							<?php endif; ?>	
						<?php endwhile;?>
						</ul>
					<?php endif; ?>
				</div>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php
// get_sidebar();
get_footer();
