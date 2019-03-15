<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Karmar
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>

<!--
	<script>
	    FontAwesomeConfig = { searchPseudoElements: true };
	</script>
-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'karmar' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$karmar_description = get_bloginfo( 'description', 'display' );
			if ( $karmar_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $karmar_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
		
		<div id="pre-nav">
			<a href="tel:<?php the_field('phone_number', 'option');?>"><span><i class="fas fa-phone"></i></span><?php the_field('phone_number', 'option');?></a>
		</div>

		<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
		<a href="#" class="hamburger-button">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</a>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
<!-- 		Banner		 -->
		<?php if( have_rows('banner') ):?>
			<?php while ( have_rows('banner') ) : the_row();?>
				<?php
					$imgID = get_sub_field('background_image');
					$imgSize = "banner"; // (thumbnail, medium, large, full or custom size)
					$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
				?>
				<?php 
				if( !empty($imgID) ): ?>								
				<div id="fw-banner" style="background-image: url(<?php echo $imgArr[0]; ?> );">
					<div id="banner-mask"></div>
					<div id="banner-text-wrap">
						<h2><?php the_sub_field('title');?></h2>
						<?php if( get_sub_field('sub-title') ): ?>
						<h3><?php the_sub_field('sub-title');?></h3>
						<?php endif;?>
					</div>
				</div>
				<?php endif;?>
			<?php endwhile;
		endif; ?>
		
		<?php if(is_home()):?>
		<?php if( have_rows('banner', get_option('page_for_posts')) ):?>
			<?php while ( have_rows('banner', get_option('page_for_posts')) ) : the_row();?>
				<?php
					$imgID = get_sub_field('background_image', get_option('page_for_posts'));
					$imgSize = "full"; // (thumbnail, medium, large, full or custom size)
					$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
				?>
				<?php 
				if( !empty($imgID) ): ?>								
				<div id="fw-banner" style="background-image: url(<?php echo $imgArr[0]; ?> );">
				<?php endif;?>
					<div id="banner-mask"></div>
					<div id="banner-text-wrap">
						<h2><?php the_sub_field('title', get_option('page_for_posts'));?></h2>
						<?php if( get_sub_field('sub-title', get_option('page_for_posts')) ): ?>
						<h3><?php the_sub_field('sub-title', get_option('page_for_posts'));?></h3>
						<?php endif;?>
					</div>
				</div>
			<?php endwhile;
		endif; ?>
		<?php endif;?>