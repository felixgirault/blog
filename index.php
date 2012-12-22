<?php
	get_header( );

	if ( have_posts( )) {
		while ( have_posts( )) {
			the_post( );
			get_template_part( 'entry' );
		}

		global $wp_query;

		if ( $wp_query->max_num_pages > 1 ) {
			echo '<nav role="navigation">';

			posts_nav_link(
				' ',
				'<div class="previous">Articles plus récents</div>',
				'<div class="next">Articles plus anciens</div>'
			);

			echo '</nav>';
		}
	}

	get_footer( );
?>
