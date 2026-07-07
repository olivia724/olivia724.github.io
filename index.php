<?php
$pageTitle   = 'Olivia Husin – Applikationsentwicklerin';
$pageDescription = 'Fullstack-Applikationsentwicklerin mit Gespür für saubere Lösungen – Einblick in Werdegang, Skills und Projekte von Olivia Husin.';
$canonicalPath = '/';
$assetPath   = 'assets/';
$homeUrl     = 'index.php';
$projekteUrl = 'pages/projekte.php';
$impressumUrl = 'pages/impressum.php';
$themeVariant = $_GET['variant'] ?? 'a'; // ?variant=a|b|c zum Vergleichen der Mockups
$isHome = true; // steuert, ob GSAP/Typed-Vendor-Skripte im Footer geladen werden
include 'partials/head.php';
include 'partials/nav.php';
?>

<main id="main-content">
<section id="hero" class="hero" data-theme="dark">
	<div class="hero__orb" style="width:340px;height:340px;left:8%;top:12%;background:var(--accent-blue);animation-duration:14s;" aria-hidden="true"></div>
	<div class="hero__orb" style="width:300px;height:300px;left:58%;top:8%;background:var(--accent-splash-2);animation-duration:18s;animation-direction:reverse;" aria-hidden="true"></div>
	<div class="hero__orb" style="width:260px;height:260px;left:38%;top:52%;background:var(--glow-blue-strong);animation-duration:12s;" aria-hidden="true"></div>
	<div class="container grid grid--cols-2 hero__grid">
		<div>
			<h1 class="hero__name">Olivia Husin</h1>
			<p class="hero__tagline"><span id="typed-tagline">Fullstack-Applikationsentwicklerin mit Gespür für saubere Lösungen – und Freude daran, sich in neue Herausforderungen reinzufüchsen.</span></p>
			<a href="#kontakt" class="button">Kontakt aufnehmen</a>
		</div>
		<div class="hero__photo">
			<picture>
				<source srcset="<?= $assetPath ?>img/pictureOHPortrait.webp" type="image/webp">
				<img src="<?= $assetPath ?>img/pictureOHPortrait.jpg" alt="Portrait von Olivia Husin" width="1000" height="1250">
			</picture>
		</div>
	</div>
	<div class="marquee">
		<div class="marquee__track">
			<span class="marquee__item">Applikationsentwicklerin</span>
			<a href="#werdegang" class="marquee__item marquee__item--link" data-skill="PHP">PHP</a>
			<a href="#werdegang" class="marquee__item marquee__item--link" data-skill="JavaScript">JavaScript</a>
			<a href="#werdegang" class="marquee__item marquee__item--link" data-skill="REST">REST</a>
			<a href="#werdegang" class="marquee__item marquee__item--link" data-skill="SQL">SQL</a>
			<a href="#werdegang" class="marquee__item marquee__item--link" data-skill="Git">Git</a>
			<span class="marquee__item" aria-hidden="true">Applikationsentwicklerin</span>
			<a href="#werdegang" class="marquee__item marquee__item--link" data-skill="PHP" aria-hidden="true" tabindex="-1">PHP</a>
			<a href="#werdegang" class="marquee__item marquee__item--link" data-skill="JavaScript" aria-hidden="true" tabindex="-1">JavaScript</a>
			<a href="#werdegang" class="marquee__item marquee__item--link" data-skill="REST" aria-hidden="true" tabindex="-1">REST</a>
			<a href="#werdegang" class="marquee__item marquee__item--link" data-skill="SQL" aria-hidden="true" tabindex="-1">SQL</a>
			<a href="#werdegang" class="marquee__item marquee__item--link" data-skill="Git" aria-hidden="true" tabindex="-1">Git</a>
		</div>
	</div>
</section>

<section id="about" class="about" data-theme="dark">
	<div class="container">
		<p class="about__intro">Hinter einer eher ruhigen Erscheinung steckt bei mir einiges:<br>
			Mehrjährige Erfahrung in Fullstack-Entwicklung, Datenbanken und REST-Schnittstellen – kombiniert mit einem Blick fürs Ganze, den ich mir vor der IT in einem ganz anderen Berufsfeld angeeignet habe. Was genau dabei alles zusammenkommt, erzähle ich lieber persönlich als hier auf einer Liste.</p>
		<div class="grid grid--cols-3">
			<div class="card">
				<span class="card__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"></circle><line x1="16.5" y1="16.5" x2="21" y2="21"></line><path d="M8 11l2 2 4-4"></path></svg>
				</span>
				<h3 class="card__title">Analytisch & lösungsorientiert</h3>
				<p>Ich gehe Probleme strukturiert an: Von der Datenbank bis zur Oberfläche und bleibe dran, bis die Lösung wirklich sauber ist.</p>
			</div>
			<div class="card">
				<span class="card__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3h9l3 3v15H6z"></path><line x1="9" y1="9" x2="15" y2="9"></line><line x1="9" y1="13" x2="15" y2="13"></line><line x1="9" y1="17" x2="13" y2="17"></line></svg>
				</span>
				<h3 class="card__title">Dokumentationsstark & zuverlässig</h3>
				<p>Nachvollziehbarer Code und verständliche Doku sind für mich kein Nice-to-have, sondern Grundhaltung.</p>
			</div>
			<div class="card">
				<span class="card__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20.8 4.6a5 5 0 0 0-7.1 0L12 6.3l-1.7-1.7a5 5 0 1 0-7.1 7.1L12 20.3l8.8-8.6a5 5 0 0 0 0-7.1z"></path></svg>
				</span>
				<h3 class="card__title">Menschlich & vielseitig</h3>
				<p>Fast zehn Jahre Erfahrung im Sozial- und Gesundheitswesen geben mir ein Gespür für echte Bedürfnisse – eine Kombination, die man nicht oft findet.</p>
			</div>
		</div>
	</div>
</section>

<section id="quote" class="quote" data-theme="dark">
	<div class="container">
		<h2 class="quote__heading">«Wer sein Ziel kennt, kann entscheiden.<br>
			Wer entscheidet, findet Ruhe.<br>
			Wer Ruhe findet, kann überlegen.<br>
			Wer überlegt, kann verbessern.»</h2>
		<p class="quote__source">Konfuzius (551–479 v. Chr.)</p>
	</div>
</section>

<section id="werdegang" class="timeline-section" data-theme="dark">
	<div class="container grid timeline-layout">
		<div>
			<h2>Werdegang</h2>
			<div class="timeline">
				<div class="timeline__entry" data-id="sileo">
					<div class="timeline__role">Software Engineer</div>
					<div class="timeline__meta">
						<span>Jul 2025 – Jul 2026</span>
						<span class="timeline__company">Sileo AG</span>
					</div>
				</div>
				<div class="timeline__entry" data-id="smartfactory">
					<div class="timeline__role">Trainee Software Developer</div>
					<div class="timeline__meta">
						<span>Nov 2024 – Jan 2025</span>
						<span class="timeline__company">smartfactory AG</span>
					</div>
				</div>
				<div class="timeline__entry" data-id="mediamarkt">
					<div class="timeline__role">Junior Applikationsentwicklerin</div>
					<div class="timeline__meta">
						<span>Jun 2024 – Sep 2024</span>
						<span class="timeline__company">MediaMarkt Schweiz AG</span>
					</div>
				</div>
				<div class="timeline__entry" data-id="approom">
					<div class="timeline__role">Software-Entwicklerin</div>
					<div class="timeline__meta">
						<span>Aug 2022 – Jul 2023</span>
						<span class="timeline__company">app-room GmbH</span>
					</div>
				</div>
				<div class="timeline__entry timeline__entry--prior">
					<div class="timeline__role">Weitere Berufserfahrung – Sozialbereich</div>
					<div class="timeline__meta">
						<span>2011 – 2020</span>
					</div>
					<p class="timeline__prior-text">Bevor es mich in die IT zog, war ich fast ein Jahrzehnt im Sozialbereich unterwegs – vom Praktikum bis zur Gruppenleitung mit Ausbildungsverantwortung für Lernende. Diese Zeit hat mein Gespür für Organisation, Verantwortung und den Umgang mit Menschen geprägt, das ich heute in die Applikationsentwicklung mitnehme.</p>
				</div>
			</div>
		</div>
		<div class="timeline-skills">
			<h3>Skills</h3>
			<div class="grid grid--autofit-sm">
				<span class="tag" data-roles="sileo approom">PHP</span>
				<span class="tag" data-roles="sileo smartfactory mediamarkt approom">JavaScript</span>
				<span class="tag" data-roles="mediamarkt">C#</span>
				<span class="tag" data-roles="smartfactory">Python</span>
				<span class="tag" data-roles="sileo smartfactory mediamarkt approom">SQL</span>
				<span class="tag" data-roles="approom">Trigger & Stored Procedures</span>
				<span class="tag" data-roles="sileo smartfactory mediamarkt approom">REST</span>
				<span class="tag" data-roles="sileo smartfactory mediamarkt approom">Git</span>
				<span class="tag" data-roles="sileo smartfactory mediamarkt approom">HTML & SCSS</span>
				<span class="tag" data-roles="smartfactory approom">Vue.js</span>
				<span class="tag" data-roles="approom">MongoDB</span>
				<span class="tag" data-roles="smartfactory">PostgreSQL</span>
				<span class="tag" data-roles="sileo smartfactory mediamarkt approom">OOP</span>
				<span class="tag" data-roles="sileo smartfactory mediamarkt approom">Scrum</span>
				<span class="tag" data-roles="sileo smartfactory mediamarkt approom">CI/CD Tools</span>
				<span class="tag" data-roles="smartfactory">Django</span>
				<span class="tag tag--more" tabindex="0" data-tooltip="Weitere Skills lernst du gerne persönlich kennen.">...</span>
			</div>
		</div>
	</div>
</section>

<section id="kontakt" class="contact" data-theme="light">
	<div class="container grid grid--cols-2 contact__grid">
		<div>
			<h2>Kontakt</h2>
			<p>Neugierig geworden? <br>
			Ich freue mich auf den Austausch - schreiben Sie mir einfach kurz, worum es geht.</p>
		</div>
		<div>
			<form id="contact-form" action="<?= $assetPath ?>php/send-mail.php" method="post">
				<input type="text" name="website" class="visually-hidden" tabindex="-1" autocomplete="off">
				<input class="form-field" type="text" name="name" placeholder="Name" required>
				<input class="form-field" type="email" name="email" placeholder="E-Mail" required>
				<textarea class="form-field" name="message" rows="5" placeholder="Nachricht" required></textarea>
				<button type="submit" class="button">Nachricht senden</button>
				<p id="form-status" class="form-status" hidden></p>
			</form>
		</div>
	</div>
</section>
</main>

<?php include 'partials/footer.php'; ?>
