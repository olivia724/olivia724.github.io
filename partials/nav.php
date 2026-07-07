<?php
// needs: $homeUrl, $projekteUrl (relative paths, differ per page depth)
?>
<a href="#main-content" class="skip-link">Zum Hauptinhalt springen</a>
<header class="container">
	<nav class="nav">
		<a href="<?= $homeUrl ?>" class="nav__link">Olivia Husin</a>
		<ul class="nav__list">
			<li><a href="<?= $homeUrl ?>#kontakt" class="nav__link">Kontakt</a></li>
			<li><a href="<?= $projekteUrl ?>" class="nav__link">Projekte</a></li>
		</ul>
	</nav>
</header>
