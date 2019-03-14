<?php
/**
 * Template Name: About
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
		
		<?php if( have_rows('about_us') ):?>
			<section id="home-about" class="about-page">
				<?php while ( have_rows('about_us') ) : the_row();?>		
					<div id="home-about-img-wrap"><img src="<?php the_sub_field('image');?>" /></div>
					<div id="home-about-text-wrap">
						<?php the_sub_field('copy');?>
					</div>
				<?php endwhile;?>
			</section>
		<?php endif; ?>	
		
		
		<?php if( have_rows('team_members') ):?>
			<section id="team">
				<h2 class="underlined-title"><?php the_field('team_title');?></h2>
				<div id="team-cards-wrap">
			<?php while ( have_rows('team_members') ) : the_row();?>
		
				<?php if( have_rows('single_team_member') ):?>
					<?php while ( have_rows('single_team_member') ) : the_row();?>	
					
					<div class="single-team-member">
						<div class="team-card-content">
							<div class="team-card-half team-img-wrap">
							<?php 
								$image = get_sub_field('photo');
								$size = 'team-portrait';
								if( $image ) {
									echo wp_get_attachment_image( $image, $size );
								}
							?>
							</div>
							<div class="team-card-half team-bio-wrap">
								<h3><?php the_sub_field('name');?></h3>
								<h4><?php the_sub_field('title');?></h4>
								<?php the_sub_field('bio');?>
								<a class="team-email" href="mailto:<?php the_sub_field('email_address');?>"><?php the_sub_field('email_address');?></a>
							</div>
						</div>
					</div>					
					
					
					<?php endwhile;?>
				<?php endif; ?>	
			<?php endwhile;?>
				</div>
			</section>
		<?php endif; ?>	
						
		<?php if( have_rows('testimonials') ):?>
			<?php while ( have_rows('testimonials') ) : the_row();?>
				<?php
					$imgID = get_sub_field('background_image');
					$imgSize = "full"; // (thumbnail, medium, large, full or custom size)
					$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
				?>								
				<section id="home-testimonials" style="background-image: url(<?php echo $imgArr[0]; ?> );">
					<div id="home-testimonials-bg-mask"></div>
					<h2 class="underlined-title"><?php the_sub_field('title');?></h2>
					
					
						<?php if( have_rows('cards') ):?>			
							<div id="testimonial-cards-wrap" class="testimonial-cards-wrap">
							<?php while ( have_rows('cards') ) : the_row();?>
								<div class="single-testimonial-card">
								<?php if( have_rows('single_testimonial_card') ):?>
									<?php while ( have_rows('single_testimonial_card') ) : the_row();?>
										<div class="single-testimonial-card-copy-wrap">
											<?php the_sub_field('quote');?>
										</div>
										<div class="single-testimonial-card-img-wrap">
											<?php 
											$image = get_sub_field('image');
											$size = 'home-testimonial-img'; // (thumbnail, medium, large, full or custom size)
											if( $image ) {
												echo wp_get_attachment_image( $image, $size );
											}
											?>
										</div>
									<?php endwhile;?>
								<?php endif; ?>										
								</div>
							<?php endwhile;?>
							</div>
						<?php endif; ?>	

				</section>					
			<?php endwhile;?>
		<?php endif; ?>			


		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php
// get_sidebar();
get_footer();
