<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Karmar
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div id="listing-header">
		<div class="listing-slider-wrap">
			<div id="listing-slider">
				<?php 
				$images = get_field('image_slider');
				$size = 'property-slide'; // (thumbnail, medium, large, full or custom size)
				
				if( $images ): ?>
				        <?php foreach( $images as $image ): ?>
				            <div class="slide">
				            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
				            </div>
				        <?php endforeach; ?>
				<?php endif; ?>
			</div>
			<div id="listing-slider-thumb">
				<?php 
				
				$images = get_field('image_slider');
				$size = 'property-slider-thumb'; // (thumbnail, medium, large, full or custom size)
				
				if( $images ): ?>
				        <?php foreach( $images as $image ): ?>
				            <div>
				            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
				            </div>
				        <?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		
		<div id="listing-contact-wrap" class="blue-bg">
			<div id="listing-contact">
				<p class="listing-contact-label">Request More Information</p>
				<?php echo do_shortcode('[contact-form-7 id="224" title="Single Listing Form"]');?>
			</div>
		</div>
	</div>
	
	<div class="clear"></div>
	
	<div id="price-map-row" class="gray-bb">
		<div id="price-map-text-wrap">
			<p id="listing-price"><?php the_field('price');?></p>
			<p><strong><?php the_field('title');?></strong></p>
			<?php the_field('address-single-listing');?>
			<?php if( have_rows('area') ):?>
				<?php while ( have_rows('area') ) : the_row();?>
					<p><strong><?php the_sub_field('unit_number');?></strong> <?php the_sub_field('unit_label');?></p>
				<?php endwhile;?>
			<?php endif; ?>	
		</div>
		
		<div id="price-map-map-wrap">	
			<?php 
			$location = get_field('google_map');
			?>
			<div class="acf-map">
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
			</div>
		</div>
		
	</div>

	<div id="single-listing-info-wrap" class="wrap-1250">
		<?php $descriptionsinglelisting = get_field('description-single-listing');
			if (!empty($descriptionsinglelisting)):?>	
			<div id="description-row" class="copy-row gray-bb">
				<h2>Description</h2>
				<?php the_field('description-single-listing');?>
			</div>
		<?php endif;?>
	
		<?php $features = get_field('features');
			if (!empty($features)):?>	
			<div class="copy-row gray-bb">
				<h2>Features</h2>
				<?php the_field('features');?>
			</div>
		<?php endif;?>
		
		<?php $terms = get_field('terms');
			if (!empty($terms)):?>
			<div class="copy-row">
				<h2>Terms</h2>
				<?php the_field('terms');?>
			</div>
		<?php endif;?>
	</div>
		
</article><!-- #post-<?php the_ID(); ?> -->

<div id="listing-footer" class="wra-1250">
	<?php if( have_rows('similar_properties') ):?>
		<div id="similar-properties-wrap">
			<h2 id="similar-properties-label">Similar Properties</h2>
			<div id="similar-properties-slider">
				<?php while ( have_rows('similar_properties') ) : the_row();?>
					<div class="single-related-listing">
						<?php
						$post_object = get_sub_field('single_similar_property', false, false );
						if( $post_object ): 
							// override $post
							$post = $post_object;
							setup_postdata( $post ); 
							?>
						    <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($post_object, 'similar-thumb');?></a>
						    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
						<?php endif; ?>
					</div>
				<?php endwhile;?>
			</div>
		</div>
	<?php endif;?>
</div>