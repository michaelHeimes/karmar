<?php
/**
 * The template for displaying all pages
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
							
<!-- 		Listing Filter -->
		<?php if( have_rows('listing_filter', 'option') ):?>
			<?php while ( have_rows('listing_filter', 'option') ) : the_row();?>
			<div id="listing-filter-wrap">
				<h3 id="listing-filter-wrap-title" class="underlined-title">Search Listings</h3>
				<?php if( have_rows('filter_buttons', 'option') ):?>
					<nav>
						<ul>
						<?php while ( have_rows('filter_buttons', 'option') ) : the_row();?>	
							<?php if( have_rows('single_filter_button', 'option') ):?>
								<?php while ( have_rows('single_filter_button', 'option') ) : the_row();?>
									<li class="<?php the_sub_field('css_class', 'option');?>">
										<?php 
											$icon = get_sub_field('icon', 'option');
										if( !empty($icon) ): ?>
										<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>"/>
										<?php endif;?>
										<span><?php the_sub_field('label', 'option'); ?></span>
									</li>
								<?php endwhile;?>
							<?php endif; ?>	
						<?php endwhile;?>
						</ul>
					</nav>
				<?php endif; ?>	
				<div class="blue-block"></div>
			</div>	
			<?php endwhile;
		endif; ?>
		
<script>
jQuery( document ).ready(function($) {	
		$('#listing-filter-wrap').on('click', 'li.filter-all', function() {
		    window.location.href ="listings";
		});
		$('#listing-filter-wrap').on('click', 'li.filter-retail', function() {
		var url=window.location.href,
	    separator = (url.indexOf("?s")===-1)?"listings/?":"&",
	    newParam=separator + "s=retail";
	    newUrl=url.replace(newParam,"");
	    newUrl+=newParam;
	    window.location.href =newUrl;
	});
	$('#listing-filter-wrap').on('click', 'li.filter-investment', function() {
		var url=window.location.href,
	    separator = (url.indexOf("?s")===-1)?"listings/?":"&",
	    newParam=separator + "s=investment";
	    newUrl=url.replace(newParam,"");
	    newUrl+=newParam;
	    window.location.href =newUrl;
	});	
	$('#listing-filter-wrap').on('click', 'li.filter-office', function() {
		var url=window.location.href,
	    separator = (url.indexOf("?s")===-1)?"listings/?":"&",
	    newParam=separator + "s=office";
	    newUrl=url.replace(newParam,"");
	    newUrl+=newParam;
	    window.location.href =newUrl;
	});	
	$('#listing-filter-wrap').on('click', 'li.filter-industrial', function() {
		var url=window.location.href,
	    separator = (url.indexOf("?s")===-1)?"listings/?":"&",
	    newParam=separator + "s=industrial";
	    newUrl=url.replace(newParam,"");
	    newUrl+=newParam;
	    window.location.href =newUrl;
	});
	$('#listing-filter-wrap').on('click', 'li.filter-land', function() {
		var url=window.location.href,
	    separator = (url.indexOf("?s")===-1)?"listings/?":"&",
	    newParam=separator + "s=land";
	    newUrl=url.replace(newParam,"");
	    newUrl+=newParam;
	    window.location.href =newUrl;
	});			
	$('#listing-filter-wrap').on('click', 'li.filter-mixed-use', function() {
		var url=window.location.href,
	    separator = (url.indexOf("?s")===-1)?"listings/?":"&",
	    newParam=separator + "s=mixed-use";
	    newUrl=url.replace(newParam,"");
	    newUrl+=newParam;
	    window.location.href =newUrl;
	});
	$('#listing-filter-wrap').on('click', 'li.filter-multi-family', function() {
		var url=window.location.href,
	    separator = (url.indexOf("?s")===-1)?"listings/?":"&",
	    newParam=separator + "s=multi-family";
	    newUrl=url.replace(newParam,"");
	    newUrl+=newParam;
	    window.location.href =newUrl;
	});	
});	
</script>
		
		<section id="featured-properties">
			<h2 class="underlined-title"><?php the_field('featured_properties_title');?></h2>
				<div id="featured-properties-loop-wrap">
					<?php
					  // set up or arguments for our custom query
					  $query_args = array(
					    'post_type' => 'listings',
					    'posts_per_page' => -1,
					      'meta_query' => array(
						    array(
						      'key' => 'featured_on_home_page',
						      'value' => '1',
						      'compare' => '==' // not really needed, this is the default
						    )
						  )
					  );
					  // create a new instance of WP_Query
					  $the_query = new WP_Query( $query_args );
					?>
					
					<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
							<?php $avail = get_field('availability'); ?>
							<div id="listing-<?php the_ID(); ?>" class="home-featured-listing">
								<div class="preview-listing-thumb-wrap">
									<?php
									if ( has_post_thumbnail() ) :
										the_post_thumbnail('featured-property-archive-thumb');
									endif;
									?>
								</div>
								<?php if( have_rows('for_home_page_featured_section') ):?>
									<?php while ( have_rows('for_home_page_featured_section') ) : the_row();?>
										<p class="city_and_state blue-bg"><?php the_sub_field('city_and_state');?></p>
										<p class="property_type"><?php the_sub_field('property_type');?></p>

									
								<?php endwhile;
								endif;?>
								
								<a class="work-permalink yellow-button" href="<?php echo the_permalink();?>">SHOW MORE</a>
							</div>
							<?php
						endwhile;
					endif;?>
					<?php wp_reset_postdata(); ?>
				</div>
		</section>

		<?php if( have_rows('about_us') ):?>
			<section id="home-about">
				<div class="blue-block"></div>
				<?php while ( have_rows('about_us') ) : the_row();?>		
					<div id="home-about-img-wrap"><img src="<?php the_sub_field('image');?>" /></div>
					<div id="home-about-text-wrap">
						<h2 class="underlined-title"><?php the_sub_field('title');?></h2>
						<?php the_sub_field('copy');?>
						<a class="yellow-button" href="<?php the_sub_field('link');?>"><?php the_sub_field('button_label');?></a>
					</div>
				<?php endwhile;?>
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
							<div id="home-testimonial-cards-wrap" class="testimonial-cards-wrap">
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

					<?php 
					$link = get_sub_field('see_more_link');
					if( $link ): ?>
						<a class="yellow-button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
					<?php endif; ?>						
				</section>					
			<?php endwhile;?>
		<?php endif; ?>			
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
