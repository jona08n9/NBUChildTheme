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

<section id="nyheder">
<h2>Nyheder</h2>
<div class="news_content">

</div>

</section>

<section id="arrangementer">
<h2>Arrangementer</h2>
<div class="arrangement_content">

</div>

</section>


<template>
	<article class="news_article">
	<img class="news_pic" src="" alt="">
	<h3 class="news_title"></h3>
	<p class="resume"></p>
	<p class="date"></p>
	</article>
	

</template>

	</div><!-- .entry-content -->




<script>
		
		let nyhed;
		const section_nyhed = document.querySelector(".news_content");
		const section_arrangement = document.querySelector(".arrangement_content");
		const template =  document.querySelector("template");
		const url="https://tobiasroland.dk/kea/09_cms/testersite_for_childtheme/wordpress/wp-json/wp/v2/nyheder?per_page=100";


		let categories;
		const catUrl="https://tobiasroland.dk/kea/09_cms/testersite_for_childtheme/wordpress/wp-json/wp/v2/categories";



		// Henter json med hold og json med categorier
async function getJson(){
			let response = await fetch(url);
			let catdata = await fetch(catUrl);
			nyhed = await response.json();
			categories = await catdata.json();
			console.log(categories);
			console.log(nyhed);
			visNews();
		}


		function visNews(){


			// section_nyhed.innerHTML ="";
			// section_arrangement.innerHTML ="";

			nyhed.forEach(news => {

			if (news.categories.includes(parseInt(13))){

				const clone = template.cloneNode(true).content;
				clone.querySelector(".news_pic").src = news.nyhedsbillede.guid;
				clone.querySelector(".news_title").textContent = news.title.rendered;
				clone.querySelector(".resume").textContent = news.resume;
				clone.querySelector(".date").textContent = news.dato;
				

				clone.querySelector(".news_article").addEventListener("click", () =>{
					location.href = news.link;})
					section_nyhed.appendChild(clone);
				
			}


			else{
				const clone = template.cloneNode(true).content;
				clone.querySelector(".news_pic").src = news.nyhedsbillede.guid;
				clone.querySelector(".news_title").textContent = news.title.rendered;
				clone.querySelector(".resume").textContent = news.resume;
				clone.querySelector(".date").textContent = news.dato;
			

				// clone.querySelector(".arrangement_article").addEventListener("click", () =>{
				// 	location.href = news.link;})
				section_arrangement.appendChild(clone);

		}})
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
