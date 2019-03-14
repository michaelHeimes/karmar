<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Karmar
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		
		<div id="footer-sidebar" class="secondary">
			<div id="footer-sidebar1" class="footer-widget">
				<?php
			the_custom_logo();
				echo ("<div><span>&copy;&nbsp;");
				echo date('Y');
				echo ("&nbsp;</span>");
					if(is_active_sidebar('footer-sidebar-1')){
					dynamic_sidebar('footer-sidebar-1');
					}
				echo ("</div>");
				?>
			</div>
			<div id="footer-sidebar2" class="footer-widget">
				<?php
					if(is_active_sidebar('footer-sidebar-2')){
					dynamic_sidebar('footer-sidebar-2');
					}
				?>
			</div>
			<div id="footer-sidebar3" class="footer-widget">
				<?php
					if(is_active_sidebar('footer-sidebar-3')){
					dynamic_sidebar('footer-sidebar-3');
					}
				?>
			</div>
		</div>
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<nav id="mobile-site-navigation" class="mobile-main-navigation">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'menu-1',
		'menu_id'        => 'footer-primary-menu',
	) );
	?>
</nav><!-- #site-navigation -->

<?php wp_footer(); ?>

</body>
</html>
