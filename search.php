<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Karmar
 */

get_header();
?>

<?php if( is_post_type('listings')):?>

	<section id="primary" class="content-area">
		<div id="archive-filter-wrap" class="ow-bg">
			<div class="wrap-1175">
				
			<script>
				var autofillterms = [<?php echo the_field('terms', 'option');?>]
			</script>		
				
	<!-- 		Listing Filter -->
			<?php if( have_rows('listing_filter', 'option') ):?>
				<?php while ( have_rows('listing_filter', 'option') ) : the_row();?>
				<div id="pre-archive-filter-wrap">
						<form method="get" id="searchform" class="pre-filter-element" autocomplete="off" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<div class="autocomplete">
								<input id="searchforminput" type="text" class="field" data-swplive="true" name="s" id="s" autocomplete="off" placeholder="<?php esc_attr_e( 'Locations', 'karmar' ); ?>" />
							</div>
							<button type="submit" class="submit" id="searchsubmit"><i class="fas fa-search"></i></button>
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
					    oldParam=separator + "availability=for-lease,for-sale-or-lease";
					    oldParam2=separator + "availability=sold-leased";
					    newUrl=url.replace(oldParam,"").replace(oldParam2,"").replace(newParam,"");
					    newUrl+=newParam;
					    window.location.href =newUrl;
					});	
					$('#pre-archive-filter-wrap').on('click', '#lease-filter', function() {
						var url=window.location.href,
					    separator = (url.indexOf("?")===-1)?"?":"&",
					    newParam=separator + "availability=for-lease,for-sale-or-lease";
					    oldParam=separator + "availability=for-sale,for-sale-or-lease";
					    oldParam2=separator + "availability=sold-leased";
					    newUrl=url.replace(oldParam,"").replace(oldParam2,"").replace(newParam,"");
					    newUrl+=newParam;
					    window.location.href =newUrl;
					});	
					$('#pre-archive-filter-wrap').on('click', '#sold-leased-filter', function() {
						var url=window.location.href,
					    separator = (url.indexOf("?")===-1)?"?":"&",
					    newParam=separator + "availability=sold-leased";
					    oldParam=separator + "availability=for-sale,for-sale-or-lease";
					    oldParam2=separator + "availability=for-lease,for-sale-or-lease";
					    newUrl=url.replace(oldParam,"").replace(oldParam2,"").replace(newParam,"");
					    newUrl+=newParam;
					    window.location.href =newUrl;
					});	
					
					
					
					
/*
					$('#listing-filter-wrap').on('click', 'li.filter-all', function() {
						var url=window.location.href,
						newParam=window.location.host + "/listings"
						oldParam=url;
						newUrl=url.replace(newParam,"");

						

					    window.location.href =newUrl;
					});	
*/
					$('#listing-filter-wrap').on('click', 'li.filter-retail', function() {
						var url=window.location.href,
					    separator = (url.indexOf("?s")===-1)?"?":"&",
					    newParam=separator + "property_type=retail";
					    newUrl=url.replace(newParam,"");
					    newUrl+=newParam;
					    window.location.href =newUrl;
					});
					$('#listing-filter-wrap').on('click', 'li.filter-investment', function() {
						var url=window.location.href,
					    separator = (url.indexOf("?s")===-1)?"?":"&",
					    newParam=separator + "property_type=investment";
					    newUrl=url.replace(newParam,"");
					    newUrl+=newParam;
					    window.location.href =newUrl;
					});	
					$('#listing-filter-wrap').on('click', 'li.filter-office', function() {
						var url=window.location.href,
					    separator = (url.indexOf("?s")===-1)?"?":"&",
					    newParam=separator + "property_type=office";
					    newUrl=url.replace(newParam,"");
					    newUrl+=newParam;
					    window.location.href =newUrl;
					});	
					$('#listing-filter-wrap').on('click', 'li.filter-industrial', function() {
						var url=window.location.href,
					    separator = (url.indexOf("?s")===-1)?"?":"&",
					    newParam=separator + "property_type=industrial";
					    newUrl=url.replace(newParam,"");
					    newUrl+=newParam;
					    window.location.href =newUrl;
					});
					$('#listing-filter-wrap').on('click', 'li.filter-land', function() {
						var url=window.location.href,
					    separator = (url.indexOf("?s")===-1)?"?":"&",
					    newParam=separator + "property_type=land";
					    newUrl=url.replace(newParam,"");
					    newUrl+=newParam;
					    window.location.href =newUrl;
					});			
					$('#listing-filter-wrap').on('click', 'li.filter-mixed-use', function() {
						var url=window.location.href,
					    separator = (url.indexOf("?s")===-1)?"?":"&",
					    newParam=separator + "property_type=mixed-use";
					    newUrl=url.replace(newParam,"");
					    newUrl+=newParam;
					    window.location.href =newUrl;
					});
					$('#listing-filter-wrap').on('click', 'li.filter-multi-family', function() {
						var url=window.location.href,
					    separator = (url.indexOf("?s")===-1)?"?":"&",
					    newParam=separator + "property_type=multi-family";
					    newUrl=url.replace(newParam,"");
					    newUrl+=newParam;
					    window.location.href =newUrl;
					});														
				});
				</script>
				
				</div>
				

				
				
<!--
				<script>
					jQuery( document ).ready(function($) {
						
						$('#pre-archive-filter-wrap').on('click','#sale-filter', function (){
							window.location = window.location.href.replace('&submit=', '+for+sale');
						});
						
						
						$('#pre-archive-filter-wrap').on('click','#lease-filter', function (){
							window.location = window.location.href.replace('&submit=', '+for+lease');
						});						
						
					});
				</script>
-->
				
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
					</div>	
				<?php endwhile;
			endif; ?>
				</div>
			</div>
		</div>
			<main id="main" class="site-main lt-blue-bg">
				<div class="wrap-1175 ">
					<h2 id="archive-loop-title" class="archive-section-title">Properties</h2>
	
					<?php if ( have_posts() ) : ?>
			
						<header class="page-header">
							<?php
			// 				the_archive_title( '<h1 class="page-title">', '</h1>' );
							echo post_type_archive_title('<h1 class="page-title">', '</h1>');
							the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						</header><!-- .page-header -->
			
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
			
							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/listing-archive-content', get_post_type() );
			
						endwhile;
			
			/*Show page numbers*/
			
			 wordpress_numeric_post_nav(); 
					else :
			
						get_template_part( 'template-parts/content', 'none' );
			
					endif;
					?>
				</div>
			</main><!-- #main -->
		</section><!-- #primary -->
		
		<?php else:?>

	<section id="primary" class="content-area">
		<div id="archive-filter-wrap" class="ow-bg">
			<div class="wrap-1175">
				
			<script>
				var autofillterms = [<?php echo the_field('terms', 'option');?>]
			</script>		
				
	<!-- 		Listing Filter -->
			<?php if( have_rows('listing_filter', 'option') ):?>
				<?php while ( have_rows('listing_filter', 'option') ) : the_row();?>
				<div id="pre-archive-filter-wrap">
						<form method="get" id="searchform" class="pre-filter-element" autocomplete="off" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<div class="autocomplete">
								<input id="searchforminput" type="text" class="field" data-swplive="true" name="s" id="s" autocomplete="off" placeholder="<?php esc_attr_e( 'Locations', 'karmar' ); ?>" />
							</div>
							<button type="submit" class="submit" id="searchsubmit"><i class="fas fa-search"></i></button>
						</form>
							<button id="sale-filter" class="pre-filter-element sl-button">For Sale</button>
							<button id="lease-filter" class="pre-filter-element sl-button">For Lease</button>
							<button id="sold-leased-filter" class="pre-filter-element sl-button">Sold / Leased</button>
						
						</div>
						
						<h2 id="archive-filter-title" class="archive-section-title">Listings</h2>
						<div id="listing-filter-wrap">
							<div id="listing-filter-wrap">
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
							</div>	
						<?php endwhile;
					endif; ?>
						</div>
			</div>
		</div>
			<main id="main" class="site-main">
				<div class="wrap-1175 ">		
				<p id="search-nothing-found" class="wrap-1175">Currently there are no listings that match that criteria</p>

					</div>
				</main><!-- #main -->
			</section><!-- #primary -->
<?php endif;?>
	
<?php
get_footer();
