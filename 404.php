<?php
http_response_code(404);
$pageTitle   = 'Seite nicht gefunden – Olivia Husin';
$pageDescription = 'Diese Seite existiert nicht oder wurde verschoben.';
$canonicalPath = '/404.php';
$assetPath   = 'assets/';
$homeUrl     = 'index.php';
$projekteUrl = 'pages/projekte.php';
$impressumUrl = 'pages/impressum.php';
$themeVariant = $_GET['variant'] ?? 'a';
include 'partials/head.php';
include 'partials/nav.php';
?>

<main id="main-content">
<section class="cv-section" data-theme="dark">
	<div class="container" style="text-align:center; padding-block: 4rem;">
		<h1>404 – Diese Seite gibt es nicht</h1>
		<p>Der Link scheint nicht (mehr) zu stimmen. Vielleicht hilft dir einer dieser Wege weiter:</p>
		<p>
			<a href="<?= $homeUrl ?>" class="button">Zur Startseite</a>
		</p>
	</div>
</section>
</main>

<?php include 'partials/footer.php'; ?>
