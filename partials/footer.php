<footer class="container" style="padding-block: 2rem; text-align: center;">
	<ul class="icons">
		<li>
			<a href="https://www.instagram.com/oli44344/" target="_blank" rel="noopener" aria-label="Instagram">
				<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
					<rect x="3" y="3" width="18" height="18" rx="5"></rect>
					<circle cx="12" cy="12" r="4"></circle>
					<circle cx="17.5" cy="6.5" r="0.9" fill="currentColor" stroke="none"></circle>
				</svg>
			</a>
		</li>
		<li>
			<a href="https://github.com/olivia724" target="_blank" rel="noopener" aria-label="GitHub">
				<svg viewBox="0 0 24 24" fill="currentColor">
					<path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"></path>
				</svg>
			</a>
		</li>
		<li>
			<a href="https://ch.linkedin.com/in/o-husin" target="_blank" rel="noopener" aria-label="LinkedIn">
				<svg viewBox="0 0 24 24" fill="currentColor">
					<rect x="2" y="2" width="20" height="20" rx="4" fill="none" stroke="currentColor" stroke-width="1.6"></rect>
					<circle cx="7.5" cy="8.2" r="1.3"></circle>
					<rect x="6.3" y="10.5" width="2.4" height="8"></rect>
					<path d="M11.5 10.5h2.3v1.2c.4-.7 1.3-1.4 2.7-1.4 2.3 0 3.3 1.5 3.3 4v4.7h-2.4v-4.2c0-1.1-.4-1.9-1.5-1.9-1 0-1.6.7-1.6 1.9v4.2h-2.3v-8.5z"></path>
				</svg>
			</a>
		</li>
	</ul>
	<p>&copy; <?= date('Y') ?> Olivia Husin</p>
	<?php if (!empty($impressumUrl)): ?>
		<p style="margin-top: 0.5rem;"><a href="<?= $impressumUrl ?>" class="nav__link" style="font-size: 0.85rem;">Impressum &amp; Datenschutz</a></p>
	<?php endif; ?>
</footer>
<?php if (!empty($isHome)): ?>
	<script src="<?= $assetPath ?>js/vendor/gsap.min.js"></script>
	<script src="<?= $assetPath ?>js/vendor/ScrollTrigger.min.js"></script>
	<script src="<?= $assetPath ?>js/vendor/typed.umd.js"></script>
	<script src="<?= $assetPath ?>js/site-fx.js"></script>
<?php endif; ?>
<script src="<?= $assetPath ?>js/main.js"></script>
</body>
</html>
