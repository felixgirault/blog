<?php

/**
 *	Removes useless scripts.
 */
function fgSetupScripts() {
	wp_deregister_script('jquery');
	wp_deregister_script('l10n');

	if (is_single()) {
		wp_register_script('prism', get_template_directory_uri() . '/prism.js');
		wp_enqueue_script('prism');
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'fgSetupScripts');



/**
 *	Removes useless head elements.
 */
function fgSetupActions() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
}

add_action('init', 'fgSetupActions');



/**
 *	Adds automatic feed links output.
 */
add_theme_support('automatic-feed-links');



/**
 *	Registers the main menu.
 */
register_nav_menu('main', 'Menu principal');



/**
 *	Filters content to ensure a good title hierarchy.
 */
function fgContentFilter($content) {
	preg_match_all('#<h([0-6])[^>]*>#', $content, $matches);

	if (empty($matches[ 1 ])) {
		$topLevel = 1;
	} else {
		$topLevel = 6;

		foreach ($matches[ 1 ] as $match) {
			if ($match < $topLevel) {
				$topLevel = $match;
			}
		}
	}

	$level = 1;
	$level -= $topLevel - 1;

	return preg_replace(
		'#<h([0-6])>([^<]+)</h[0-6]>#e',
		"'<h'.(\\1+$level).'>\\2</h'.(\\1+$level).'>'",
		$content
	);
}

add_filter('the_content', 'fgContentFilter');



/**
 *	Removes annoying WordPress things...
 */
add_filter('show_admin_bar', '__return_false');
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');



/**
 *	Generates a description for the current page depending on the context.
 */
function fgDescription() {
	$description = get_bloginfo('description');

	if (!is_front_page()) {
		if (is_home()) {
			$description = 'Articles et astuces pour le développement et le design web.';
		} else if (is_category()) {
			global $category_name;

			$category = array_shift(
				get_terms(
					'category',
					array(
						'orderby' => 'count',
						'order' => 'DESC',
						'name__like' => $category_name
					)
				)
			);

			$description = $category->description;
		} else if (is_singular()) {
			global $posts;

			$currentPost =& $posts[ 0 ];
			$summary = fgSummary($currentPost);

			if ($summary) {
				$description = strip_tags($summary);
			}
		}
	}

	return $description;
}



/**
 *	Calculates and returns the summary of the given post.
 */
function fgSummary(&$post) {
	$more = false;
	$stops = array('<!--more-->', '</p>');

	foreach ($stops as $stop) {
		if ($more === false) {
			$more = strpos($post->post_content, $stop);
		}
	}

	if ($more !== false) {
		$summary = substr($post->post_content, 0, $more);
		$summary = preg_replace('/[\r\n]/', ' ', $summary);

		return trim(preg_replace('/\s\s+/', ' ', $summary));
	}

	return '';
}



/**
 *	Returns the title for an article.
 */
function fgTitle() {
	return is_single()
		? get_the_title()
		: sprintf(
			'<a href="%1$s" title="%2$s" rel="bookmark">%2$s</a>',
			get_permalink(),
			get_the_title()
		);
}



/**
 *	Prints a comment.
 */
function fgCommentCallback($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
?>
	<li>
		<article
			id="comment-<?php comment_ID(); ?>"
			<?php comment_class('entry-comment'); ?>
			itemtype="http://schema.org/Comment"
			itemscope
		>
			<div class="entry-comment-body" itemprop="text">
				<?php comment_text(); ?>
			</div>

			<footer class="entry-comment-footer">
				<p>
					Par
					<span itemprop="author"><?php
						echo comment_author_link();
					?></span>,
					le
					<time
						datetime="<?php comment_time(DATE_W3C); ?>"
						pubdate="pubdate"
						itemprop="datePublished"
					><?php
						comment_time(get_option('date_format'));
					?></time>.

					<?php
						comment_reply_link(
							array(
								'depth' => $depth,
								'max_depth' => $args['max_depth']
							)
						);
					?>
				</p>
			</footer>
		</article>
<?php
}



/**
 *	Prints a pingback.
 */
function fgPingbackCallback($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
?>
	<li>
		<article
			id="pingback-<?php comment_ID(); ?>"
			<?php comment_class('entry-comment'); ?>
		>
			<div class="entry-comment-body" itemprop="text">
				<?php comment_text(); ?>
			</div>

			<footer class="entry-comment-footer">
				<p>
					Par
					<span itemprop="author"><?php
						echo comment_author_link();
					?></span>,
					le
					<time
						datetime="<?php comment_time(DATE_W3C); ?>"
						pubdate="pubdate"
						itemprop="datePublished"
					><?php
						comment_time(get_option('date_format'));
					?></time>.
				</p>
			</footer>
		</article>
<?php
}



/**
 *	A custom menu walker that generates lighter markup.
 */
class FgMenuWalker extends Walker_Nav_Menu {

	/**
	 *
	 */
	function start_el(&$output, $item, $depth, $args) {
		$title = empty($item->attr_title)
			? $item->title
			: $item->attr_title;

		$class = in_array('current-menu-item', $item->classes)
			? 'class="page-menu-link active"'
			: 'class="page-menu-link"';

		$output .= sprintf(
			'<li class="page-menu-item"><a %s href="%s" title="%s">%s</a>',
			$class,
			$item->url,
			esc_attr($title),
			apply_filters('the_title', $item->title, $item->ID)
		);
	}
}



/**
 *	Legacy shortcodes to use Prism.js instead of the old highlighter.
 */
function fgCodeShortcode($language, $content) {
	return
		'<pre>' .
			'<code class="language-' . $language . '">' .
				trim($content) .
			'</code>' .
		'</pre>';
}

function fgCssShortcode($attributes, $content) {
	return fgCodeShortcode('css', $content);
}

function fgHtmlShortcode($attributes, $content) {
	return fgCodeShortcode('markup', $content);
}

function fgJavascriptShortcode($attributes, $content) {
	return fgCodeShortcode('javascript', $content);
}

function fgPhpShortcode($attributes, $content) {
	return fgCodeShortcode('php', $content);
}

add_shortcode('css', 'fgCssShortcode');
add_shortcode('html', 'fgHtmlShortcode');
add_shortcode('javascript', 'fgJavascriptShortcode');
add_shortcode('php', 'fgPhpShortcode');
