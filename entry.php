<article
	class="entry"
	role="article"
	itemprop="blogPost"
	itemtype="http://schema.org/BlogPosting"
	itemscope
>
	<header class="entry-header">
		<h1 class="entry-title" itemprop="name">
			<?php echo fgTitle(); ?>
		</h1>

		<p class="entry-meta">
			<time
				datetime="<?php the_time(DATE_W3C); ?>"
				pubdate="pubdate"
				itemprop="datePublished"
			><?php
				the_time(get_option('date_format'));
			?></time>

			<meta itemprop="author" content="Félix Girault" />
			<meta
				itemprop="interactionCount"
				content="UserComments:<?php echo get_comments_number(); ?>"
			/>
		</p>
	</header>

	<div class="entry-body" itemprop="articleBody">
		<?php the_content('Lire la suite'); ?>
	</div>
</article>

<?php if (is_single()): ?>
	<nav class="entry-siblings" role="navigation">
		<?php previous_post_link('%link', 'Article précédent <span>%title</span>'); ?>
		<?php next_post_link('%link', 'Article suivant <span>%title</span>'); ?>
	</nav>

	<?php comments_template(); ?>
<?php endif; ?>
