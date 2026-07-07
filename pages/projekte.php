<?php
$pageTitle   = 'Projekte – Olivia Husin';
$pageDescription = 'Ein kleiner Einblick in eigene Übungsprojekte von Olivia Husin aus HTML/CSS, C++ und Xojo.';
$canonicalPath = '/pages/projekte.php';
$assetPath   = '../assets/';
$homeUrl     = '../index.php';
$projekteUrl = 'projekte.php';
$impressumUrl = 'impressum.php';
$themeVariant = $_GET['variant'] ?? 'a';
include '../partials/head.php';
include '../partials/nav.php';
?>

<main id="main-content">
<section class="cv-section" data-theme="light">
	<div class="container">
		<a href="<?= $homeUrl ?>" class="button" style="margin-bottom: 2rem; display: inline-block;">&larr; Zurück</a>
		<h1>Projekte</h1>
		<p class="projects-intro">
			Hier ein kleiner Einblick in einige eigene Übungen aus meiner Ausbildung. Aus Datenschutzgründen
			darf ich Projekte aus meinen bisherigen Anstellungen hier nicht öffentlich bildlich zeigen –
			die zeige, präsentiere und bespreche ich aber sehr gerne persönlich in einem Gespräch.
		</p>

		<div class="grid grid--autofit-md project-grid">
			<article class="project-card">
				<a href="https://olivia724.github.io/olivia724.mini.github.io/" target="_blank" rel="noopener" class="project-card__image">
					<img src="<?= $assetPath ?>img/projects/mini_ico.jpg" alt="Vorschau Miniklub-Webseite">
					<span class="project-card__overlay">Live-Vorschau ansehen</span>
				</a>
				<div class="project-card__body">
					<h3>HTML & CSS – Miniklub-Webseite</h3>
					<p>Im HTML-Modul durfte ich die Miniklub-Webseite rekonstruieren.</p>
				</div>
			</article>

			<article class="project-card">
				<a href="<?= $assetPath ?>downloads/Schaltjahr.exe" class="project-card__image">
					<img src="<?= $assetPath ?>img/projects/cpp_schaltjahr_ico.jpg" alt="Vorschau Schaltjahr-Rechner">
					<span class="project-card__overlay">Als .exe ausführen</span>
				</a>
				<div class="project-card__body">
					<h3>C++ – Schaltjahr-Rechner</h3>
					<p>Kleiner Algorithmus, der prüft, ob eine eingegebene Zahl ein Schaltjahr ist.</p>
					<a href="<?= $assetPath ?>downloads/Schaltjahr.cpp" class="project-card__source">Quellcode ansehen</a>
				</div>
			</article>

			<article class="project-card">
				<a href="https://github.com/olivia724/olivia724.xojoloops.github.io/blob/main/ErsteSchleifen_fort_1.xojo_binary_project" target="_blank" rel="noopener" class="project-card__image">
					<img src="<?= $assetPath ?>img/projects/xojo_ico.png" alt="Vorschau Xojo-Schleifen-Programm">
					<span class="project-card__overlay">Auf GitHub ansehen</span>
				</a>
				<div class="project-card__body">
					<h3>Xojo – Objektbasiertes Programmieren</h3>
					<p>Desktop-Applikation mit verschiedenen Schleifen; Nutzer können beliebige Zahlen auf- oder abwärts zählen lassen.</p>
				</div>
			</article>

			<article class="project-card">
				<a href="<?= $assetPath ?>downloads/Rabatt_Kundentyp_2.exe" class="project-card__image">
					<img src="<?= $assetPath ?>img/projects/cpp_kundenrabatt_ico.jpg" alt="Vorschau Kundenrabatt-Rechner">
					<span class="project-card__overlay">Als .exe ausführen</span>
				</a>
				<div class="project-card__body">
					<h3>C++ – Kundenrabatt-Rechner</h3>
					<p>Konsolenprogramm zur Berechnung des Bruttopreises inkl. Rabatt, je nach Kundentyp.</p>
					<a href="<?= $assetPath ?>downloads/Rabatt_Kundentyp_2.cpp" class="project-card__source">Quellcode ansehen</a>
				</div>
			</article>
		</div>
	</div>
</section>
</main>

<?php include '../partials/footer.php'; ?>
