<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Karmar
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'karmar' ); ?></h1>
	</header><!-- .page-header -->

	<div>
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'karmar' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>
			
		

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'karmar' ); ?></p>
			<?php
			get_search_form();

		else :
			?>
		<div id="archive-filter-wrap" class="ow-bg">
			<div class="wrap-1175">
				
			<!-- 		Listing Filter -->
					<?php if( have_rows('listing_filter', 'option') ):?>
						<?php while ( have_rows('listing_filter', 'option') ) : the_row();?>
						<div id="pre-archive-filter-wrap">
								<form method="get" id="searchform" class="pre-filter-element" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Locations', 'karmar' ); ?>" />
									<button type="submit" class="submit" name="submit" id="searchsubmit"><i class="fas fa-search"></i></button>
								</form>
							<button id="sale-filter" class="pre-filter-element sl-button">For Sale</button>
							<button id="lease-filter" class="pre-filter-element sl-button">For Lease</button>
							<button id="sold-leased-filter" class="pre-filter-element sl-button">Sold / Leased</button>
							
						<script>
						jQuery( document ).ready(function($) {
							$('#pre-archive-filter-wrap').on('click', '#sale-filter', function() {
								var url=window.location.href,
							    separator = (url.indexOf("?")===-1)?"?":"&",
							    newParam=separator + "availability=for-sale,for-sale-or-lease";
							    newUrl=url.replace(newParam,"");
							    newUrl+=newParam;
							    window.location.href =newUrl;
							});	
							$('#pre-archive-filter-wrap').on('click', '#lease-filter', function() {
								var url=window.location.href,
							    separator = (url.indexOf("?")===-1)?"?":"&",
							    newParam=separator + "availability=for-lease,for-sale-or-lease";
							    newUrl=url.replace(newParam,"");
							    newUrl+=newParam;
							    window.location.href =newUrl;
							});	
							$('#pre-archive-filter-wrap').on('click', '#sold-leased-filter', function() {
								var url=window.location.href,
							    separator = (url.indexOf("?")===-1)?"?":"&",
							    newParam=separator + "availability=sold-leased";
							    newUrl=url.replace(newParam,"");
							    newUrl+=newParam;
							    window.location.href =newUrl;
							});	
							
							$('#listing-filter-wrap').on('click', 'li.filter-retail', function() {
								var url=window.location.href,
							    separator = (url.indexOf("?s")===-1)?"?":"&",
							    newParam=separator + "retail";
							    newUrl=url.replace(newParam,"");
							    newUrl+=newParam;
							    window.location.href =newUrl;
							});
							$('#listing-filter-wrap').on('click', 'li.filter-investment', function() {
								var url=window.location.href,
							    separator = (url.indexOf("?s")===-1)?"?":"&",
							    newParam=separator + "investment";
							    newUrl=url.replace(newParam,"");
							    newUrl+=newParam;
							    window.location.href =newUrl;
							});	
							$('#listing-filter-wrap').on('click', 'li.filter-office', function() {
								var url=window.location.href,
							    separator = (url.indexOf("?s")===-1)?"?":"&",
							    newParam=separator + "office";
							    newUrl=url.replace(newParam,"");
							    newUrl+=newParam;
							    window.location.href =newUrl;
							});	
							$('#listing-filter-wrap').on('click', 'li.filter-industrial', function() {
								var url=window.location.href,
							    separator = (url.indexOf("?s")===-1)?"?":"&",
							    newParam=separator + "industrial";
							    newUrl=url.replace(newParam,"");
							    newUrl+=newParam;
							    window.location.href =newUrl;
							});
							$('#listing-filter-wrap').on('click', 'li.filter-land', function() {
								var url=window.location.href,
							    separator = (url.indexOf("?s")===-1)?"?":"&",
							    newParam=separator + "land";
							    newUrl=url.replace(newParam,"");
							    newUrl+=newParam;
							    window.location.href =newUrl;
							});			
							$('#listing-filter-wrap').on('click', 'li.filter-mixed-use', function() {
								var url=window.location.href,
							    separator = (url.indexOf("?s")===-1)?"?":"&",
							    newParam=separator + "mixed-use";
							    newUrl=url.replace(newParam,"");
							    newUrl+=newParam;
							    window.location.href =newUrl;
							});
							$('#listing-filter-wrap').on('click', 'li.filter-multi-family', function() {
								var url=window.location.href,
							    separator = (url.indexOf("?s")===-1)?"?":"&",
							    newParam=separator + "multi-family";
							    newUrl=url.replace(newParam,"");
							    newUrl+=newParam;
							    window.location.href =newUrl;
							});	
						});
						</script>
						
						<h2 id="archive-filter-title" class="archive-section-title">Listings</h2>
						<div id="listing-filter-wrap">
							<div id="listing-filter-wrap">
								<?php if( have_rows('filter_buttons', 'option') ):?>
									<nav>
										<ul>
										<?php while ( have_rows('filter_buttons', 'option') ) : the_row();?>	
											<?php if( have_rows('single_filter_button', 'option') ):?>
												<?php while ( have_rows('single_filter_button', 'option') ) : the_row();?>
												<?php $link = get_sub_field('link', 'option');?>
												<li class="<?php the_sub_field('css_class');?>">
<!-- 													<a href="<?php echo $link['url']; ?>"> -->
														<?php 
															$icon = get_sub_field('icon', 'option');
														if( !empty($icon) ): ?>
														<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>"/>
														<?php endif;?>
														<span><?php echo $link['title']; ?></span>
<!-- 													</a> -->
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
		</div>


							
				<p id="search-nothing-found" class="wrap-1175">Currently there are no listings that match that criteria</p>
			<?php
		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
