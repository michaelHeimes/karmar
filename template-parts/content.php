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
	<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'single-news-banner');?>
	
	<? if(!empty($featured_img_url)):?>
	
	<header class="single-news-entry-header" style="background: url(<?php echo $featured_img_url ?>); background-repeat:no-repeat; background-size: cover;background-position: center center;">
		<div id="single-news-banner-title-wrap" class="wrap-1250">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
	
			if ( 'post' === get_post_type() ) :
				?>
			<?php endif; ?>
			<h3>News</h3>
		</div>
	</header><!-- .entry-header -->
	
	<?php else:?>
	
	<header class="single-news-entry-header news-no-img-header" style="background: url(<?php echo $featured_img_url ?>); background-repeat:no-repeat; background-size: cover;background-position: center center;">
		<div id="single-news-banner-title-wrap" class="wrap-1250">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
	
			if ( 'post' === get_post_type() ) :
				?>
			<?php endif; ?>
			<h3>News</h3>
		</div>
	</header><!-- .entry-header -->
	
	<?php endif;?>


	<div class="entry-content wrap-1250">
		<?php the_title( '<h2 class="entry-title">', '</h2>' );?>

		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'karmar' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'karmar' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
