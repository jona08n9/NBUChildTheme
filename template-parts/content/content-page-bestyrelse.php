<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! is_front_page() ) : ?>
		<header class="entry-header alignwide">
			<?php get_template_part( 'template-parts/header/entry-header' ); ?>
			<?php twenty_twenty_one_post_thumbnail(); ?>
		</header><!-- .entry-header -->
	<?php elseif ( has_post_thumbnail() ) : ?>
		<header class="entry-header alignwide">
			<?php twenty_twenty_one_post_thumbnail(); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
			)
		);
		?>

<section id="medlemmer">
<h3>Medlemmer</h3>
<div class="medlem_content">

</div>

</section>


<template>
<article class="medlem_article">
<div class="medlem_billede">
	<img class="bestyrelsesmedlem_billede" src="" alt="">
</div>
<div class="medlem_info">
	<h3 class="medlem_navn"></h3>
	<p class="medlem_stilling"></p>
	<p class="medlem_mail"></p>
	<div class="mail"></div>

</div>

</article>

</template>
	</div><!-- .entry-content -->

	<script>

let medlem;
		const section_medlem = document.querySelector(".medlem_content");
		const template =  document.querySelector("template");
		const url="https://madvigux.dk/nbunited/wp-json/wp/v2/bestyrrelse_medlem?per_page=100";


		async function getJson(){

			let response = await fetch(url);
			medlem = await response.json();
			console.log(medlem);
			visMedlemmer();

		}

		function visMedlemmer(){

			medlem.forEach(medlem => {

				const clone = template.cloneNode(true).content;
				clone.querySelector(".bestyrelsesmedlem_billede").src = medlem.visitkort.guid;
				clone.querySelector(".medlem_navn").textContent = medlem.title.rendered;
				clone.querySelector(".medlem_stilling").textContent = medlem.funktion;
				clone.querySelector(".medlem_mail").innerHTML = `<a href="mailto:${medlem.mail}">${medlem.mail}</a>`;

				section_medlem.appendChild(clone);

			})

			
		}


		getJson();
	</script>
	

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer default-max-width">
			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Post title. Only visible to screen readers. */
					esc_html__( 'Edit %s', 'twentytwentyone' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
