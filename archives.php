<?php
	/**
	 *	Template Name: Archives
	 */

	get_header();
?>

<article class="entry">
	<header class="entry-header">
		<h1 class="entry-title">
			<?php the_title(); ?>
		</h1>
	</header>

	<section>
		<header>
			<h2>Articles</h2>
		</header>

		<div class="content">
			<ul>
				<?php
					wp_get_archives(
						array(
							'type' => 'postbypost'
						)
					);
				?>
			</ul>
		</div>
	</section>

	<section>
		<header>
			<h2>Categories</h2>
		</header>

		<div class="content">
			<ul>
				<?php
					wp_list_categories(
						array(
							'title_li' => '',
							'show_count' => true
						)
					);
				?>
			</ul>
		</div>
	</section>
</article>

<?php get_footer(); ?>
