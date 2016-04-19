<?php
	$commentsByType = separate_comments(
		get_comments(
			array(
				'post_id' => $post->ID
			)
		)
	);

	$sections = array(
		array(
			'type' => 'comment',
			'title' => 'Commentaires',
			'callback' => 'fgCommentCallback'
		),
		array(
			'type' => 'pingback',
			'title' => 'Citations',
			'callback' => 'fgPingbackCallback'
		)
	);
?>

<?php foreach ($sections as $section): ?>
	<?php extract($section); ?>

	<?php if (!empty($commentsByType[$type])): ?>
		<section class="entry-comments">
			<header class="entry-comments-header">
				<h2 class="entry-comments-title">
					<?php echo $title; ?>
				</h2>
			</header>

			<div>
				<ul class="entry-comments-items">
					<?php wp_list_comments(compact('type', 'callback')); ?>
				</ul>
			</div>
		</section>
	<?php endif; ?>
<?php endforeach; ?>

<?php comment_form(); ?>
