<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="<?php echo fgDescription( ); ?>" />

		<title><?php echo wp_title( ' — ', false, 'right' ) . get_bloginfo( 'name' ); ?></title>

		<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

		<?php wp_head( ); ?>
	</head>

	<body lang="fr" itemscope itemtype="http://schema.org/Blog">
		<?php if ( !is_user_logged_in( )): ?>
			<script type="text/javascript">
				var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-11935716-3']); _gaq.push(['_trackPageview']);
				(function() {
					var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				})();
			</script>
		<?php endif; ?>

		<header class="page-header">
			<p class="brand" role="banner" itemprop="name">
				<span itemprop="author" itemscope itemtype="http://schema.org/Person">
					<span itemprop="name">Félix Girault</span>,
					<span itemprop="jobTitle">développeur web</span>.
				</span>
			</p>

			<nav role="navigation">
				<?php
					wp_nav_menu(
						array(
							'menu' => 'main',
							'container' => false,
							'walker' => new FgMenuWalker( )
						)
					);
				?>
			</nav>
		</header>

		<div class="page" role="main">
