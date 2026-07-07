(function () {
	"use strict";

	// theme fade + scroll reveal: see site-fx.js (GSAP)

	// card tilt + glow follows mouse
	var tiltCards = document.querySelectorAll(".card");
	var reducedMotionForTilt = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
	if (!reducedMotionForTilt) {
		tiltCards.forEach(function (card) {
			var glowTarget = { x: 50, y: 50 };
			var glowCurrent = { x: 50, y: 50 };
			var glowRafId = null;

			var animateGlow = function () {
				glowCurrent.x += (glowTarget.x - glowCurrent.x) * 0.12;
				glowCurrent.y += (glowTarget.y - glowCurrent.y) * 0.12;
				card.style.setProperty("--mx", glowCurrent.x + "%");
				card.style.setProperty("--my", glowCurrent.y + "%");

				if (Math.abs(glowTarget.x - glowCurrent.x) > 0.1 || Math.abs(glowTarget.y - glowCurrent.y) > 0.1) {
					glowRafId = window.requestAnimationFrame(animateGlow);
				} else {
					glowRafId = null;
				}
			};

			card.addEventListener("mousemove", function (event) {
				var rect = card.getBoundingClientRect();
				var x = (event.clientX - rect.left) / rect.width - 0.5;
				var y = (event.clientY - rect.top) / rect.height - 0.5;
				var maxTilt = 6;
				card.style.transform =
					"perspective(700px) rotateX(" + (-y * maxTilt).toFixed(2) + "deg) rotateY(" + (x * maxTilt).toFixed(2) + "deg)";

				glowTarget.x = (x + 0.5) * 100;
				glowTarget.y = (y + 0.5) * 100;
				if (!glowRafId) {
					glowRafId = window.requestAnimationFrame(animateGlow);
				}
			});
			card.addEventListener("mouseleave", function () {
				card.style.transform = "";
			});
		});
	}

	// skill tag hover highlights matching timeline entries
	// activate/deactivate saved on the tag so the marquee click below can reuse them
	var skillTags = document.querySelectorAll(".tag[data-roles]");
	skillTags.forEach(function (tagEl) {
		var ids = tagEl.getAttribute("data-roles").split(/\s+/);
		var entries = ids
			.map(function (id) {
				return document.querySelector('.timeline__entry[data-id="' + id + '"]');
			})
			.filter(Boolean);

		tagEl._activateSkill = function () {
			entries.forEach(function (entry) {
				entry.classList.add("timeline__entry--active");
			});
		};
		tagEl._deactivateSkill = function () {
			entries.forEach(function (entry) {
				entry.classList.remove("timeline__entry--active");
			});
		};

		tagEl.addEventListener("mouseenter", tagEl._activateSkill);
		tagEl.addEventListener("mouseleave", tagEl._deactivateSkill);
	});

	// marquee click: scroll to skills section, flash tag + matching timeline entries
	var marqueeLinks = document.querySelectorAll(".marquee__item--link[data-skill]");
	if (marqueeLinks.length) {
		var findTagBySkill = function (skillName) {
			var tags = document.querySelectorAll(".tag[data-roles]");
			for (var i = 0; i < tags.length; i++) {
				if (tags[i].textContent.trim().toLowerCase() === skillName.trim().toLowerCase()) {
					return tags[i];
				}
			}
			return null;
		};

		marqueeLinks.forEach(function (link) {
			link.addEventListener("click", function (event) {
				event.preventDefault();
				var tag = findTagBySkill(link.getAttribute("data-skill"));
				if (!tag) return;

				var target = document.getElementById("werdegang");
				if (target) target.scrollIntoView({ behavior: "smooth", block: "start" });

				var flash = function () {
					tag.classList.add("tag--flash");
					if (tag._activateSkill) tag._activateSkill();
					window.setTimeout(function () {
						tag.classList.remove("tag--flash");
						if (tag._deactivateSkill) tag._deactivateSkill();
					}, 1800);
				};

				if ("onscrollend" in window) {
					var done = function () {
						window.removeEventListener("scrollend", done);
						flash();
					};
					window.addEventListener("scrollend", done);
					window.setTimeout(done, 1200); // fallback if scrollend never fires
				} else {
					window.setTimeout(flash, 700);
				}
			});
		});
	}

	// contact form: send via fetch() to Web3Forms (no backend on GitHub Pages)
	var form = document.getElementById("contact-form");
	var status = document.getElementById("form-status");
	if (form) {
		form.addEventListener("submit", function (event) {
			event.preventDefault();

			// honeypot field: bots that fill every field get a silent fake success
			var honeypot = form.elements.website;
			if (honeypot && honeypot.value) {
				status.hidden = false;
				status.textContent = "Danke für Ihre Nachricht! Ich melde mich bald.";
				status.className = "form-status form-status--success";
				form.reset();
				return;
			}

			var formData = new FormData(form);

			fetch(form.getAttribute("action"), {
				method: "POST",
				body: formData,
				headers: { Accept: "application/json" }
			})
				.then(function (response) {
					return response.json().then(function (data) {
						return { ok: response.ok, data: data };
					});
				})
				.then(function (result) {
					status.hidden = false;
					if (result.ok) {
						status.textContent = "Danke für Ihre Nachricht! Ich melde mich bald.";
						status.className = "form-status form-status--success";
						form.reset();
					} else {
						status.textContent = (result.data && result.data.message) || "Bitte Eingaben prüfen.";
						status.className = "form-status form-status--error";
					}
				})
				.catch(function () {
					status.hidden = false;
					status.textContent = "Senden fehlgeschlagen. Bitte später erneut versuchen.";
					status.className = "form-status form-status--error";
				});
		});
	}
})();
