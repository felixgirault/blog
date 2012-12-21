<?php
	$pageId = 'article';
	include 'header.php';
?>

<article role="article" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
	<header>
		<h1 itemprop="name">Titre de l'article sur plusieurs lignes</h1>
	</header>

	<div itemprop="articleBody">
		<p>Pellentesque tortor morbi tristique senectus et netus et tincidunt fames ac turpis egestas.</p>
		<p>Pellentesque habitant <a href="#">consectetuer tristique</a> senectus et netus et malesuada fames ac turpis amet. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
		<ul>
			<li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
			<li>Aliquam tincidunt mauris eu risus.</li>
			<li>Vestibulum auctor dapibus neque.</li>
		</ul>

		<h2>Section</h2>
		<p>Pellentesque habitant morbi tristique senectus et netus et ipsum fames ac turpis egestas.</p>
		<code>
<pre><span class="k">class</span> <span class="c">SuperHero</span> {

	<span class="k">protected</span> <span class="v">$_isFlying</span> = <span class="k">false</span>;

	<span class="k">public function</span> <span class="m">fly</span>( ) {
		<span class="v">$this</span>-><span class="v">_isFlying</span> = <span class="k">true</span>;
	}

	<span class="k">public function</span> <span class="m">aPerfectlyUselessMethod</span>( ) {
		<span class="k">return</span> <span class="s">'A fucking lorem ipsum dolor sit amet dummy string.'</span>;
	}
}</pre>
		</code>

		<h3>Sous-section</h3>
		<p>Pellentesque amet morbi tincidunt senectus et netus <a href="#">et malesuada fames</a> ac tortor ipsum.</p>
	</div>

	<footer>
		<p>
			Par <span itemprop="author">Félix Girault</span>,
			le <time datetime="2012-12-12T12:12+00:00" pubdate itemprop="datePublished">12 décembre 2012</time>.
		</p>
	</footer>
</article>

<nav class="siblings" role="navigation">
	<a href="#">Article précédent</a>
	<a href="#">Article suivant</a>
</nav>

<?php include 'footer.php'; ?>
