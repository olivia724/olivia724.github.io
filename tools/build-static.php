<?php
// Generiert docs/ (statischer GitHub-Pages-Export) aus den PHP-Quellen.
// Aufruf: php tools/build-static.php  (oder: npm run build:docs)

$root = dirname(__DIR__);

// Jede Seite laeuft in einem eigenen PHP-Prozess (statt include() im selben Skript),
// damit Variablen wie $isHome/$loadSiteFx nicht zwischen den Seiten "durchsickern".
// BUILDING_STATIC=1 in der Umgebung signalisiert index.php/impressum.php, dass die
// Web3Forms-Formular- bzw. Datenschutztext-Variante statt der lokalen PHP-Variante
// gerendert werden soll (siehe defined via getenv() dort).
putenv('BUILDING_STATIC=1');

function renderPage(string $file, string $cwd): string
{
	$descriptorSpec = [1 => ['pipe', 'w'], 2 => ['pipe', 'w']];
	$process = proc_open(['php', '-f', $file], $descriptorSpec, $pipes, $cwd, null);
	if (!is_resource($process)) {
		throw new RuntimeException("Konnte PHP-Prozess fuer $file nicht starten.");
	}

	$stdout = stream_get_contents($pipes[1]);
	$stderr = stream_get_contents($pipes[2]);
	fclose($pipes[1]);
	fclose($pipes[2]);
	$exitCode = proc_close($process);

	if ($exitCode !== 0) {
		throw new RuntimeException("Fehler beim Rendern von $file:\n$stderr");
	}
	if (trim($stderr) !== '') {
		fwrite(STDERR, "Warnung beim Rendern von $file:\n$stderr\n");
	}

	return $stdout;
}

$pages = [
	['src' => $root, 'file' => 'index.php', 'dest' => $root . '/docs/index.html'],
	['src' => $root . '/pages', 'file' => 'projekte.php', 'dest' => $root . '/docs/pages/projekte.html'],
	['src' => $root . '/pages', 'file' => 'impressum.php', 'dest' => $root . '/docs/pages/impressum.html'],
];

$extensionMap = [
	'index.php' => 'index.html',
	'projekte.php' => 'projekte.html',
	'impressum.php' => 'impressum.html',
];

foreach ($pages as $page) {
	$html = renderPage($page['file'], $page['src']);
	$html = str_replace(array_keys($extensionMap), array_values($extensionMap), $html);

	file_put_contents($page['dest'], $html);
	echo "✔ {$page['file']} → " . str_replace($root . '/', '', $page['dest']) . "\n";
}

// assets/ -> docs/assets/ spiegeln (ohne php/, scss/ und einzelne interne/ungenutzte Dateien)
function mirrorAssets(string $src, string $dest, array $skipTopLevel = [], array $skipPaths = []): void
{
	if (!is_dir($dest)) {
		mkdir($dest, 0777, true);
	}

	$items = scandir($src);
	$keep = [];

	foreach ($items as $item) {
		if ($item === '.' || $item === '..') {
			continue;
		}
		if (in_array($item, $skipTopLevel, true)) {
			continue;
		}

		$srcPath = $src . '/' . $item;
		$destPath = $dest . '/' . $item;

		if (in_array($srcPath, $skipPaths, true)) {
			continue;
		}

		$keep[] = $item;

		if (is_dir($srcPath)) {
			mirrorAssets($srcPath, $destPath, [], $skipPaths);
		} else {
			copy($srcPath, $destPath);
		}
	}

	// verwaiste Dateien/Ordner im Ziel entfernen, die es in der Quelle nicht mehr gibt
	foreach (scandir($dest) as $item) {
		if ($item === '.' || $item === '..' || in_array($item, $keep, true)) {
			continue;
		}
		$path = $dest . '/' . $item;
		if (is_dir($path)) {
			removeDir($path);
		} else {
			unlink($path);
		}
	}
}

function removeDir(string $dir): void
{
	foreach (scandir($dir) as $item) {
		if ($item === '.' || $item === '..') {
			continue;
		}
		$path = $dir . '/' . $item;
		is_dir($path) ? removeDir($path) : unlink($path);
	}
	rmdir($dir);
}

mirrorAssets($root . '/assets', $root . '/docs/assets', ['php', 'scss'], [
	$root . '/assets/js/vendor/README.txt', // interne Entwickler-Notiz, nicht fuer die oeffentliche Seite
	$root . '/assets/img/pictureOHPortrait.jpeg', // ungenutztes Duplikat, nur .jpg/.webp werden eingebunden
]);
echo "✔ assets/ → docs/assets/ (ohne php/, scss/, interne/ungenutzte Dateien)\n";

echo "Fertig. docs/ ist jetzt aktuell.\n";
