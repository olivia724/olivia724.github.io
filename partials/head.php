<?php
// needs: $pageTitle, $assetPath ("assets/" or "../assets/"), $themeVariant (a|b|c)
// optional: $pageDescription, $canonicalPath (e.g. "/" or "/pages/projekte.php")
header('Content-Type: text/html; charset=utf-8');
require_once __DIR__ . '/config.php';
$themeVariant = $themeVariant ?? 'b';
$pageDescription = $pageDescription ?? 'Olivia Husin – Applikationsentwicklerin mit Fullstack-Erfahrung in PHP, JavaScript und Datenbanken.';
$canonicalPath = $canonicalPath ?? '/';
$canonicalUrl = rtrim(SITE_URL, '/') . $canonicalPath;
$ogImageUrl = rtrim(SITE_URL, '/') . '/assets/img/pictureOHPortrait.jpg';
?>
<!DOCTYPE html>
<html lang="de" data-theme-variant="<?= htmlspecialchars($themeVariant) ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= htmlspecialchars($pageTitle ?? 'Olivia Husin') ?></title>
	<meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
	<meta name="robots" content="noindex, nofollow">
	<link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>">

	<link rel="icon" type="image/svg+xml" href="<?= $assetPath ?>img/favicon.svg">
	<link rel="icon" type="image/png" href="<?= $assetPath ?>img/favicon-32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="<?= $assetPath ?>img/apple-touch-icon.png">
	<meta name="theme-color" content="#0b0e12">

	<meta property="og:type" content="profile">
	<meta property="og:locale" content="de_CH">
	<meta property="og:title" content="<?= htmlspecialchars($pageTitle ?? 'Olivia Husin') ?>">
	<meta property="og:description" content="<?= htmlspecialchars($pageDescription) ?>">
	<meta property="og:url" content="<?= htmlspecialchars($canonicalUrl) ?>">
	<meta property="og:image" content="<?= htmlspecialchars($ogImageUrl) ?>">
	<meta name="twitter:card" content="summary_large_image">

	<link rel="stylesheet" href="<?= $assetPath ?>css/main.css">
</head>
<body>
