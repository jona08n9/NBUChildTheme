<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<?php get_template_part('template-parts/footer/footer-widgets'); ?>

<footer id="colophon" class="site-footer">

	<?php if (has_nav_menu('footer')) : ?>
		<nav aria-label="<?php esc_attr_e('Secondary menu', 'twentytwentyone'); ?>" class="footer-navigation">
			<ul class="footer-navigation-wrapper">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'items_wrap'     => '%3$s',
						'container'      => false,
						'depth'          => 1,
						'link_before'    => '<span>',
						'link_after'     => '</span>',
						'fallback_cb'    => false,
					)
				);
				?>
			</ul><!-- .footer-navigation-wrapper -->
		</nav><!-- .footer-navigation -->
	<?php endif; ?>
	<div class="site-info">
		<div class="site-name">
			<?php if (has_custom_logo()) : ?>
				<div class="site-logo"><?php the_custom_logo(); ?></div>
				<address class="footer__adress">
					<h4>Nørrebro United</h4>
					<p>Husumgade 44, Bahguset</p>
					<p>2200 København N</p>
					<p>+45 60 79 61 40</p>
					<p><a href="mailto:kontor@nbunited.dk">kontor@nbunited.dk</a></p>
					<p>CVR: 31 43 53 27</p>
				</address>
				<div class="footer__socials">
					<h4>Følg os</h4>
					<div class="footer__socials__icons--container">
						<a href="https://www.facebook.com/NBUNITED/"><img class="footer__socials__icons--icon" src="https://api.iconify.design/mdi:facebook.svg" alt="facebook icon"></a>
						<a href="https://www.instagram.com/noerrebrounited"><img class="footer__socials__icons--icon" src="https://api.iconify.design/mdi:instagram.svg" alt="instagram icon"></a>
						<a href="https://www.youtube.com/channel/UCdvwAte7PTyy5_FdjBkwGzg"><img class="footer__socials__icons--icon" src="https://api.iconify.design/mdi:youtube.svg" alt="youtube icon"></a>
					</div>
				</div>
				<div class="toTop">
					<h5 id="toTop"><a href="#masthead">Til Toppen</a></h5>
				</div>
		</div>
	<?php else : ?>
		<?php if (get_bloginfo('name') && get_theme_mod('display_title_and_tagline', true)) : ?>
			<?php if (is_front_page() && !is_paged()) : ?>
				<?php bloginfo('name'); ?>
			<?php else : ?>
				<a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
	</div><!-- .site-name -->

	<?php
	if (function_exists('the_privacy_policy_link')) {
		the_privacy_policy_link('<div class="privacy-policy">', '</div>');
	}
	?>

	<!-- Fjernet "powered by"
			<div class="powered-by">
				<?php
				printf(
					/* translators: %s: WordPress. */
					esc_html__('Proudly powered by %s.', 'twentytwentyone'),
					'<a href="' . esc_url(__('https://wordpress.org/', 'twentytwentyone')) . '">WordPress</a>'
				);
				?> 
			</div> <!-- .powered-by -->
	</div><!-- .site-info -->
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>