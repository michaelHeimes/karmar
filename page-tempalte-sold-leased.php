<?php
/**
 * Template Name: Sold & Leased
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
								    separator = (url.indexOf("?s")===-1)?"?":"&",
								    newParam=separator + "s=availability=for-sale,for-sale-or-lease";
								    oldParam=separator + "s=availability=for-lease,for-sale-or-lease";
								    oldParam2=separator + "s=availability=sold-leased";
								    newUrl=url.replace(oldParam,"").replace(oldParam2,"").replace(newParam,"");
								    newUrl+=newParam;
								    window.location.href =newUrl;
								});	
								$('#pre-archive-filter-wrap').on('click', '#lease-filter', function() {
									var url=window.location.href,
								    separator = (url.indexOf("?s")===-1)?"?":"&",
								    newParam=separator + "s=availability=for-lease,for-sale-or-lease";
								    oldParam=separator + "s=availability=for-sale,for-sale-or-lease";
								    oldParam2=separator + "s=availability=sold-leased";
								    newUrl=url.replace(oldParam,"").replace(oldParam2,"").replace(newParam,"");
								    newUrl+=newParam;
								    window.location.href =newUrl;
								});	
								$('#pre-archive-filter-wrap').on('click', '#sold-leased-filter', function() {
									var url=window.location.href,
								    separator = (url.indexOf("?s")===-1)?"?":"&",
								    newParam=separator + "s=availability=sold-leased";
								    oldParam=separator + "s=availability=for-sale,for-sale-or-lease";
								    oldParam2=separator + "s=availability=for-lease,for-sale-or-lease";
								    newUrl=url.replace(oldParam,"").replace(oldParam2,"").replace(newParam,"");
								    newUrl+=newParam;
								    window.location.href =newUrl;
								});	
															
								$('#listing-filter-wrap').on('click', 'li.filter-all', function() {
									$(location).attr('href', "/listings")
								});	
					
								$('#listing-filter-wrap').on('click', 'li.filter-retail', function() {
									var url=window.location.href,
								    separator = (url.indexOf("?s")===-1)?"?":"&",
								    newParam=separator + "s=retail";
								    oldParam=separator + "/listings/";
								    newUrl=url.replace(oldParam,"").replace(newParam,"");
								    newUrl+=newParam;
								    window.location.href =newUrl;
								});
								$('#listing-filter-wrap').on('click', 'li.filter-investment', function() {
									var url=window.location.href,
								    separator = (url.indexOf("?s")===-1)?"?":"&",
								    newParam=separator + "s=investment";
								    newUrl=url.replace(newParam,"");
								    newUrl+=newParam;
								    window.location.href =newUrl;
								});	
								$('#listing-filter-wrap').on('click', 'li.filter-office', function() {
									var url=window.location.href,
								    separator = (url.indexOf("?s")===-1)?"?":"&",
								    newParam=separator + "s=office";
								    newUrl=url.replace(newParam,"");
								    newUrl+=newParam;
								    window.location.href =newUrl;
								});	
								$('#listing-filter-wrap').on('click', 'li.filter-industrial', function() {
									var url=window.location.href,
								    separator = (url.indexOf("?s")===-1)?"?":"&",
								    newParam=separator + "s=industrial";
								    newUrl=url.replace(newParam,"");
								    newUrl+=newParam;
								    window.location.href =newUrl;
								});
								$('#listing-filter-wrap').on('click', 'li.filter-land', function() {
									var url=window.location.href,
								    separator = (url.indexOf("?s")===-1)?"?":"&",
								    newParam=separator + "s=land";
								    newUrl=url.replace(newParam,"");
								    newUrl+=newParam;
								    window.location.href =newUrl;
								});			
								$('#listing-filter-wrap').on('click', 'li.filter-mixed-use', function() {
									var url=window.location.href,
								    separator = (url.indexOf("?s")===-1)?"?":"&",
								    newParam=separator + "s=mixed-use";
								    newUrl=url.replace(newParam,"");
								    newUrl+=newParam;
								    window.location.href =newUrl;
								});
								$('#listing-filter-wrap').on('click', 'li.filter-multi-family', function() {
									var url=window.location.href,
								    separator = (url.indexOf("?s")===-1)?"?":"&",
								    newParam=separator + "s=multi-family";
								    newUrl=url.replace(newParam,"");
								    newUrl+=newParam;
								    window.location.href =newUrl;
								});	
							});
							
							</script>
								
						</div><!-- end pre-archive-filter-wrap -->
							
						<h2 id="archive-filter-title" class="archive-section-title">Listings</h2>
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
								
						</div><!-- end listing-filter-wrap -->
							
					<?php endwhile;?>
				<?php endif; ?>
										
			</div>
				
		</div><!-- end archive-filter-wrap -->
		
			<main id="main" class="site-main lt-blue-bg">
				<div class="wrap-1175 archive">
					<h2 id="archive-loop-title" class="archive-section-title">Properties</h2>
	
					<?php if ( have_posts() ) : ?>
			
<?php
$args = array(
  'post_type'   => 'listings',
  'post_status' => 'publish',
  'posts_per_page'  => '5',
  'paged' 		=> 'true'
 );
 
$sold_leased = new WP_Query( $args );
if( $sold_leased->have_posts() ) :
?>
    <?php
      while( $sold_leased->have_posts() ) :
        $sold_leased->the_post();
        ?>
        
        <?php get_template_part( 'template-parts/listing-archive-content', get_post_type() );
  ?>
  
  
    <?php wordpress_numeric_post_nav(); ?>
  
  
        <?php
      endwhile;
      wp_reset_postdata();
    ?>


    
<?php endif; ?>
			
			
			 <?php wordpress_numeric_post_nav(); 
					else :
			
						get_template_part( 'template-parts/content', 'none' );
			
					endif;
					?>
				</div>
			</main><!-- #main -->
		</div><!-- #primary -->
		
<script>
// Add Classes to Sale and Lease Filter Buttons
jQuery(document).ready(function ($) {
		
	$(function() {
		if(window.location.href.indexOf("for-sale,") > 0) {
			$('button#sale-filter').addClass('sale-lease-clicked');
		}
		
		
// 					document.location.href = String( document.location.href ).replace( /&availability=for-sale-or-lease,for-lease/, "" );
		
		
	});
	
	$(function() {
		if(window.location.href.indexOf("for-lease,") > 0) {
			$('button#lease-filter').addClass('sale-lease-clicked');
		}
	});
	
	$(function() {
		if(window.location.href.indexOf("sold-leased") > 0) {
			$('button#sold-leased-filter').addClass('sale-lease-clicked');
		}
	});
	
});
</script>	
	
	
<?php
// get_sidebar();
get_footer();