<?php
// needs: $impressumUrl, $assetPath
// optional: $isHome, $loadSiteFx (steuern, welche Vendor-Skripte geladen werden)
$footerHtml = file_get_contents(__DIR__ . '/footer.html');
echo str_replace(
	['{{YEAR}}', '{{IMPRESSUM_URL}}'],
	[date('Y'), htmlspecialchars($impressumUrl ?? '')],
	$footerHtml
);
?>
<?php if (!empty($isHome)): ?>
	<script src="<?= $assetPath ?>js/vendor/gsap.min.js"></script>
	<script src="<?= $assetPath ?>js/vendor/ScrollTrigger.min.js"></script>
	<script src="<?= $assetPath ?>js/vendor/typed.umd.js"></script>
<?php endif; ?>
<?php if (!empty($isHome) || !empty($loadSiteFx)): ?>
	<script src="<?= $assetPath ?>js/site-fx.js"></script>
<?php endif; ?>
<script src="<?= $assetPath ?>js/main.js"></script>
</body>
</html>
