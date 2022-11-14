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

<div class="hold_info">
<p class="hold_beskrivelse"></p>

<div class="traening_og_tilmeldning">
<p class="traenings_tider"></p>	
<p class="traenings_dage"></p>	
<p class="traenings_lokation"></p>	
<p class="pris"></p>
<button>Tilmeld</button>
</div>

</div>


<div class="traenere_og_kampklar">
	<div class="traenere">

	<h3>Trænere</h3>
<img class="traener_billede" src="" alt="">
<h3 class="traener_navn"></h3>
<p class="traener_stilling"></p>
<p class="traener_tlf"></p>
<p class="traener_mail"></p>
	</div>
	<div class="kampklar">
		<h2>Her bruger vi kampklar</h2>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, ipsum? Architecto adipisci reprehenderit earum. Dignissimos quas dolore delectus quis, fugit molestias laudantium facere nisi vero atque est maxime consectetur laboriosam ea dicta! Nihil temporibus numquam explicabo unde laboriosam veniam quis!</p>
	</div>


</div>

<div class="hold_galleri">
<h3>Galleri</h3>
<img class="billedegalleri" src="" alt="">

</div>




<h3 class="team_name"></h3>
	<p class="short_description"></p>

</main>

</section>


<script>

	let hold;

	const url="https://madvigux.dk/nbunited/wp-json/wp/v2/hold"+<?php echo get_the_ID() ?>;
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
				document.querySelector(".traener_tlf").textContent = hold.traener_1_telefon;
				document.querySelector(".traener_mail").textContent = hold.traener_1_mail;
				document.querySelector(".billedegalleri").src = hold.billeder[0].guid;

		
				






				
				}


getJson();

</script>
