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
	
		<nav id="filter_buttons" class="filter_buttons_vores-hold">
	<button data-sport="alle" onclick="window.location.href = '#teamview';"  >Alle</button>
	<button data-sport="3" onclick="window.location.href = '#teamview';">Fodbold</button>
	<button data-sport="4" onclick="window.location.href = '#teamview';">Håndbold</button>
	</nav>


		
		<div id="teamview">

		</div>
<template>
	<div class="team">
	<img class="team_pic"src="" alt="">
	<h3 class="team_name"></h3>
	<p class="short_description"></p>
	<p class="kategori"></p>
	<button class="read_more">Læs mere</button>
	</div>
</template>
	</div><!-- .entry-content -->

	<script>

		// opretter variabler
		// variabler til filtrering
		let categories;
		let filter_sport= "alle";
		const catUrl="https://madvigux.dk/nbunited/wp-json/wp/v2/categories";
		  // variabler til at hente og insætte hold
		let hold;
		const team_view = document.querySelector("#teamview");
		const template =  document.querySelector("template");
		const url="https://madvigux.dk/nbunited/wp-json/wp/v2/hold/?per_page=100";


		// Henter json med hold og json med categorier
		async function getJson(){
			let response = await fetch(url);
			let catdata = await fetch(catUrl);
			hold = await response.json();
			categories = await catdata.json();
			addEventListenerToButtons();
			visHold();
		}

		//  tilføjer eventListener til knapper, og kalder filter funktionen ved klik
		function addEventListenerToButtons(){
		document.querySelectorAll("#filter_buttons button").forEach(elm => {
		elm.addEventListener("click", filter);
			})
		}

	// tager værdien for dataset.sport på den knap der er 
	// blevet klikket på og tildeler denne værdi til variablen 
	// filter_sport. Herefter kaldes funktionen visHold.
	function filter(){
		filter_sport = this.dataset.sport;
		visHold();
	}


		// funktionen startermed at rydde indhold i div med id teamview. herefter kører den et forEach loop på alle hold i vores array.
		// inden at holdet kan blive vist bliver der tjekket om variablen filtersport endten har værdien "alle" eller om holdet indeholder den samme værdi som filter_sport variablen.
		function visHold(){

			team_view.innerHTML ="";

			hold.forEach(team => {

			if (filter_sport == "alle" || team.categories.includes(parseInt(filter_sport))){

				const clone = template.cloneNode(true).content;
				clone.querySelector("img").src = team.billeder[0].guid;
				clone.querySelector("h3").textContent = team.title.rendered;

				clone.querySelector(".team").addEventListener("click", () =>{
					location.href = team.link;})
				team_view.appendChild(clone);
				
			}
				})
		}

		// funktionen getJson bliver kaldt
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
