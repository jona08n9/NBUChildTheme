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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header alignwide">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php twenty_twenty_one_post_thumbnail(); ?>
	</header><!-- .entry-header -->

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
	</div><!-- .entry-content -->

	<!-- <h1>test</h1> -->
	<section class="single_view_news">
		<article class="single_news_content">

		<h1 class="single_news_title"></h1>
		<p class="single_date"></p>
		<p class="single_author"></p>

		<p class="article_text"></p>
		<img class="single_news_pic" src="" alt="">
	

	

		</article>
	</section>

	<script>
		let news;


const url="https://tobiasroland.dk/kea/09_cms/testersite_for_childtheme/wordpress/wp-json/wp/v2/nyheder/"+<?php echo get_the_ID() ?>;
	

async function getJson(){
		console.log("id er", <?php echo get_the_ID() ?> )
		let response = await fetch(url);
		news = await response.json();
		console.log(news);
		visSingleNews();
	}

	function visSingleNews(){
			
			document.querySelector(".single_news_title").textContent = news.title.rendered;
			document.querySelector(".single_date").textContent = news.dato;
			document.querySelector(".single_author").textContent = news.forfatter;
			document.querySelector(".article_text").innerHTML = news.paragraf;
			document.querySelector(".single_news_pic").src = news.nyhedsbillede.guid;


			}

	getJson();
	</script>

	<footer class="entry-footer default-max-width">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author-bio' ); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
