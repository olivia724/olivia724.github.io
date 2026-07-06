<?php
$pageTitle   = 'Impressum & Datenschutz – Olivia Husin';
$pageDescription = 'Impressum und Datenschutzhinweise zur Portfolio-Seite von Olivia Husin.';
$canonicalPath = '/pages/impressum.php';
$assetPath   = '../assets/';
$homeUrl     = '../index.php';
$projekteUrl = 'projekte.php';
$impressumUrl = 'impressum.php';
$themeVariant = $_GET['variant'] ?? 'a';
include '../partials/head.php';
include '../partials/nav.php';
?>

<main id="main-content">
<section class="cv-section" data-theme="dark">
	<div class="container legal-text">
		<a href="<?= $homeUrl ?>" class="button" style="margin-bottom: 2rem; display: inline-block;">&larr; Zurück</a>

		<h1>Impressum</h1>
		<p>
			Olivia Husin<br>
			Wohlen AG, Schweiz<br>
			E-Mail: <a href="mailto:<?= htmlspecialchars(SITE_EMAIL) ?>"><?= htmlspecialchars(SITE_EMAIL) ?></a>
		</p>
		<p>Verantwortlich für den Inhalt dieser Seite ist die oben genannte Person.</p>

		<h2>Datenschutz</h2>
		<p>
			Diese Seite dient als private Bewerbungs-Teaserseite und erhebt keine Daten über Analyse- oder
			Tracking-Tools und setzt keine Cookies.
		</p>
		<p>
			Nutzt du das Kontaktformular, werden Name, E-Mail-Adresse und deine Nachricht ausschliesslich zur
			Beantwortung deiner Anfrage per E-Mail an mich weitergeleitet. Eine Speicherung in einer Datenbank
			findet nicht statt, eine Weitergabe an Dritte ebenfalls nicht.
		</p>
		<p>
			Bei Fragen zu deinen Daten kannst du dich jederzeit per E-Mail an
			<a href="mailto:<?= htmlspecialchars(SITE_EMAIL) ?>"><?= htmlspecialchars(SITE_EMAIL) ?></a> wenden.
		</p>
	</div>
</section>
</main>

<?php include '../partials/footer.php'; ?>
