<article class="entry" role="article" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
	<header>
		<h1 itemprop="name"><?php echo fgTitle( ); ?></h1>
	</header>

	<div itemprop="articleBody">
		<?php the_content( 'Lire la suite' ); ?>
	</div>

	<footer>
		<p>
			Par <span itemprop="author">Félix Girault</span>,
			le <time datetime="<?php the_time( DATE_W3C ); ?>" pubdate="pubdate" itemprop="datePublished"><?php the_time( get_option( 'date_format' )); ?></time>.
		</p>

		<meta itemprop="interactionCount" content="UserComments:<?php echo get_comments_number( ); ?>"/>
	</footer>
</article>

<?php if ( is_single( )): ?>
	<nav class="siblings" role="navigation">
		<?php previous_post_link( '%link', 'Article précédent <span>%title</span>' ); ?>
		<?php next_post_link( '%link', 'Article suivant <span>%title</span>' ); ?>
	</nav>

	<?php comments_template( ); ?>
<?php endif; ?>
