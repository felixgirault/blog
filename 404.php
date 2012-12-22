<?php get_header( ); ?>

<article>
	<header>
		<h1>Fatal error 404 of the death !</h1>
	</header>

	<div class="content">
		<p>Désolé, ce que vous cherchez ne se trouve pas ici !</p>

		<p>
			<a href="<?php bloginfo( 'url' ); ?>" title="Accueil du blog">Revenez à l'accueil</a> ou
			<a href="<?php bloginfo( 'url' ); ?>/archives/" title="Articles du blog">faites un tour aux archives</a> ;)
		</p>
	</div>
</article>

<?php get_footer( ); ?>
