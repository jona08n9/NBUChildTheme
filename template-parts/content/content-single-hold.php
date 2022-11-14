<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<section>
<main> 



<h1 class="hold_navn"></h1>
<p class="hold_beskrivelse"></p>

<p class="traenings_tider"></p>	
<p class="traenings_dage"></p>	
<p class="traenings_lokation"></p>	
<p class="pris"></p>
<button>Tilmeld</button>

<h3>Trænere</h3>
<img class="traener_billede" src="" alt="">
<h3 class="traener_navn"></h3>
<p class="traener_stilling"></p>

<h3>Galleri</h3>
<img class="billedegalleri" src="" alt="">




<h3 class="team_name"></h3>
	<p class="short_description"></p>

</main>

</section>


<script>

	let hold;

	const url="https://tobiasroland.dk/kea/09_cms/testersite_for_childtheme/wordpress/wp-json/wp/v2/hold/"+<?php echo get_the_ID() ?>;
		async function getJson(){
			console.log("id er", <?php echo get_the_ID() ?> )
			let response = await fetch(url);
			hold = await response.json();
			console.log(hold);
			visHold();
		}

		function visHold(){
			
				document.querySelector(".hold_navn").textContent = hold.title.rendered;
				document.querySelector(".hold_beskrivelse").textContent = hold.holdbeskrivelse;
				document.querySelector(".traenings_tider").textContent = hold.traeningstider_1;
				document.querySelector(".traenings_dage").textContent = hold.traeningsdag_1;
				document.querySelector(".traenings_lokation").textContent = hold.traeningslokation_1;
				document.querySelector(".traener_billede").src = hold.traener_1_billede.guid;
				document.querySelector(".traener_navn").textContent = hold.traener_1_navn;
				document.querySelector(".traener_stilling").textContent = hold.traener_1_stilling;
				






				
				}


getJson();

</script>
