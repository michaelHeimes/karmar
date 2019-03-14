<?php
/**
 * Template Name: Listings Page
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
			<div id="archive-filter-wrap" class="ow-bg">
				<div class="wrap-1175">
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
					<?php if( have_rows('listing_filter', 9) ):?>
						<?php while ( have_rows('listing_filter', 9) ) : the_row();?>
						<div id="pre-archive-filter-wrap">
							<button id="sale-filter" data-filter=".sale" type="button">Sale</button>
							<button id="lease-filter" data-filter=".lease" type="button">Lease</button>
						</div>
						<h2 id="archive-filter-title" class="archive-section-title">Listings</h2>
						<div id="listing-filter-wrap">
							<?php if( have_rows('filter_buttons') ):?>
								<nav>
									<ul>
									<?php while ( have_rows('filter_buttons', 9) ) : the_row();?>	
										<?php if( have_rows('single_filter_button', 9) ):?>
											<?php while ( have_rows('single_filter_button', 9) ) : the_row();?>
											<li id="page-<?php the_sub_field('label', 9);?>">
												<a href="<?php the_sub_field('link', 9);?>">
													<?php 
														$icon = get_sub_field('icon', 9);
													if( !empty($icon) ): ?>
													<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>"/>
													<?php endif;?>
													<span><?php the_sub_field('label', 9);?></span>
												</a>
											</li>
											<?php endwhile;?>
										<?php endif; ?>	
									<?php endwhile;?>
									</ul>
								</nav>
							<?php endif; ?>	
						</div>	
						<?php endwhile;
					endif; ?>
				</div>
			</div>
		
		<div id="property-archive-wrap" class="lt-blue-bg">
			<div class="wrap-1175">
				<h2 id="archive-loop-title" class="archive-section-title">Properties</h2>
					<div id="archive-loop-wrap">
						<?php
						  // set up or arguments for our custom query
						  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						  $query_args = array(
						    'post_type' => 'property_listings',
						    'posts_per_page' => 4,
						    'paged' => $paged
						  );
						  // create a new instance of WP_Query
						  $the_query = new WP_Query( $query_args );
						?>
						
						<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
								<?php $avail = get_field('availability'); ?>
								<div id="listing-<?php the_ID(); ?>" <?php post_class($avail['value']); ?>>
									<div class="listing-thumb-wrap archive-preview-third">
										<?php
										if ( has_post_thumbnail() ) :
											the_post_thumbnail('property-archive-thumb');
										endif;
										?>
									</div>
									<div class="white-copy-wrap archive-preview-third">
										<div class="white-box-cat archive-white-title"><?php
											foreach((get_the_category()) as $category) {
											echo $category->cat_name . ' ';
											}
											?>
										</div>
										<p class="archive-description"><?php the_field('description');?></p>
										<p class="archive-address-title archive-white-title">Address</p>
										<p class="archive-address"><?php the_field('address');?></p>
										<a class="work-permalink yellow-button" href="<?php echo the_permalink();?>">SHOW MORE</a>
									</div>
									<div class="blue-copy-wrap archive-preview-third">
										<?php if( have_rows('area') ):?>
											<?php while ( have_rows('area') ) : the_row();?>
												<p class="archive-blue-title"><?php the_sub_field('unit_label');?></p>
												<p><?php the_sub_field('unit_number');?></p>
											<?php endwhile;?>
										<?php endif; ?>	
										<p class="archive-blue-title availability-title">Availability</p>
										<p><?php echo $avail['label']; ?></p>
									</div>
								</div>
								<?php
							endwhile;
						endif;?>

					</div>
					<?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
					<nav id="page_numbers">
						<?php $big = 999999999; // need an unlikely integer
					
					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'show_all' => false,
						'end_size' => 3,
						'mid_size' => 3,
						'prev_next' => false,
						'prev_text' => false,
						'current' => max( 1, get_query_var('paged') ),
						'total' => $the_query->max_num_pages
					) );
					?>
					</nav>
					<?php } ?>
					<?php wp_reset_postdata(); ?>
			</div>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php
// get_sidebar();
get_footer();
