<?php
/**
 * Template Name: Contact
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
		<div id="contact-white-bg"></div>

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
		<section id="contact-right" class="contact-half">
			<h3><?php the_field('contact_title');?></h3>
			<p><a href="<?php the_field('address_link');?>" target="_blank"><?php the_field('address_text');?></a></p>
			<p>Call: <a href="tel:<?php the_field('phone_number');?>"><?php the_field('phone_number');?></a></p>
			<p><?php the_field('hours_text');?></p>
		</section>

		</main><!-- #main -->
		<section id="contact-page-map">
			<?php 
			$location = get_field('map');
			?>
			<div class="contact-map">
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
			</div>
		</section>
	</div><!-- #primary -->
	
<?php
// get_sidebar();
get_footer();
