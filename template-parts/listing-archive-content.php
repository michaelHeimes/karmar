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
		
<!-- 		<?php $avail = get_field('availability'); ?> -->
		
		<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'propertyarchivethumb' ); ?>

			<div class="listing-thumb-wrap archive-preview-third" style="background-image: url('<?php echo $backgroundImg[0]?>');">
			<a href="<?php echo the_permalink();?>"></a>
			</div>
			
			<div class="white-copy-wrap archive-preview-third">
				<?php
				echo get_the_tag_list('<p class="hidden-tags">Tags: ',', ','</p>');
				?>
				<p class="archive-description"><?php the_field('description');?></p>
				<p class="archive-address-title archive-white-title">Address</p>
				<p class="archive-address"><?php the_field('address');?></p>
				<a class="work-permalink yellow-button" href="<?php echo the_permalink();?>">VIEW MORE</a>
			</div>
			<div class="blue-copy-wrap archive-preview-third">
				<p class="archive-blue-title">Type</p>				
					<?php
					$terms = wp_get_post_terms( $post->ID , array( 'property_type' ) );
					$i = 1;
					if(is_array($posts) && !empty($terms)) 	{

					foreach ( $terms as $term ) {
					    $term_link = get_term_link( $term, array( 'property_type') );
					        if( is_wp_error( $term_link ) )
					        continue;
					        echo $term->name;
					        echo ($i < count($terms))? "/ " : "";
					        $i++;
					}
					}
					?>
				<?php if( have_rows('area') ):?>
					<?php while ( have_rows('area') ) : the_row();?>
						<p class="archive-blue-title unit-title">Square Feet</p><p><?php the_sub_field('square_feet_number');?></p>
						<p class="archive-blue-title unit-title">Acreage</p><p><?php the_sub_field('acreage_number');?></p>
					<?php endwhile;?>
				<?php endif; ?>	
				<p class="archive-blue-title availability-title">Availability</p>
				<p><!-- <?php echo $avail['label']; ?> -->
		
					<?php
					$terms = wp_get_post_terms( $post->ID , array( 'availability' ) );
					$i = 1;
					if(is_array($posts) && !empty($terms)) 	{

					foreach ( $terms as $term ) {
					    $term_link = get_term_link( $term, array( 'availability') );
					        if( is_wp_error( $term_link ) )
					        continue;
					        echo $term->name;
					        echo ($i < count($terms))? "<br>": "";
					        $i++;
					}
					}
					?>
				
				</p>
			</div>
		
</article><!-- #post-<?php the_ID(); ?> -->
