<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width" />
		<meta name="description" content="<?php echo fgDescription(); ?>" />

		<title><?php echo wp_title(' — ', false, 'right') . get_bloginfo('name'); ?></title>

		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

		<?php wp_head(); ?>
	</head>

	<body lang="fr" itemscope itemtype="http://schema.org/Blog">
		<?php if (!is_user_logged_in()): ?>
			<script type="text/javascript">
				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-11935716-3']);
				_gaq.push(['_trackPageview']);

				(function() {
					var ga = document.createElement('script');
					ga.type = 'text/javascript';
					ga.async = true;
					ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

					var s = document.getElementsByTagName('script')[0];
					s.parentNode.insertBefore(ga, s);
				})();
			</script>
		<?php endif; ?>

		<header class="page-header">
			<p class="page-branding" role="banner" itemprop="name">
				<span itemprop="author" itemscope itemtype="http://schema.org/Person">
					<span class="page-branding-name" itemprop="name">Félix Girault</span><br />
					<span itemprop="jobTitle">développeur pile complète</span>
				</span>
			</p>

			<nav class="page-menu" role="navigation">
				<?php
					wp_nav_menu(
						array(
							'menu' => 'main',
							'container' => false,
							'walker' => new FgMenuWalker()
						)
					);
				?>
			</nav>
		</header>

		<div class="page-body" role="main">
