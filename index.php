<?php
	get_header();

	if (have_posts()) {
		while (have_posts()) {
			the_post();
			get_template_part('entry');
		}

		global $wp_query;

		if ($wp_query->max_num_pages > 1) {
			$previous = <<<PREVIOUS
				<span class="page-navigation-previous">
					<span>Articles plus récents</span>
				</span>
PREVIOUS;

			$next = <<<NEXT
				<span class="page-navigation-next">
					<span>Articles plus anciens</span>
				</span>
NEXT;

			echo '<nav class="page-navigation" role="navigation">';
			posts_nav_link(' ', $previous, $next);
			echo '</nav>';
		}
	}

	get_footer();
?>
