<?php
/**
 * Template part for displaying posts on archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Karmar
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'news-archive-thumb');?>

	<? if(!empty($featured_img_url)):?>	
	<div class="news-thumb-wrap news-half">
		<?php echo the_post_thumbnail('news-archive-thumb')?>
	</div>
	<?php endif;?>
	
	
	
	<? if(!empty($featured_img_url)):?>	
	<div class="news-half news-archive-content">
	
		<header class="newsentry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title">', '</h2>' );
			endif;
	
			if ( 'post' === get_post_type() ) :
				?>
			<?php endif; ?>
		</header><!-- .entry-header -->
	
		<div class="entry-content">
			<?php
			the_excerpt();
			?>
		</div><!-- .entry-content -->
		
			
		<div class="entry-content">
			<?php
			the_excerpt();
			?>
		</div><!-- .entry-content -->
		
		<a class="yellow-button" href="<?php echo the_permalink();?>">Read More</a>
		
	</div>
	
	<?php else:?>
	
	<div class="news-half news-archive-content news-no-img">
	
		<header class="newsentry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title">', '</h2>' );
			endif;
	
			if ( 'post' === get_post_type() ) :
				?>
			<?php endif; ?>
		</header><!-- .entry-header -->
	
		<div class="entry-content">
			<?php
			the_excerpt();
			?>
		</div><!-- .entry-content -->
		
			
		<div class="entry-content">
			<?php
			the_excerpt();
			?>
		</div><!-- .entry-content -->
		
		<a class="yellow-button" href="<?php echo the_permalink();?>">Read More</a>
		
	</div>	
	
	<?php endif;?>

</article><!-- #post-<?php the_ID(); ?> -->
