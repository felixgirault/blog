<?php
	/**
	 *	Template Name: Archives
	 */

	get_header( );
?>

<article>
	<header>
		<h1><?php the_title( ); ?></h1>
	</header>

	<section class="months entry">
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

	<section class="categories entry">
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

<?php get_footer( ); ?>
