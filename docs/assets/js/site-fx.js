(function () {
	"use strict";

	var reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

	// cursor glow: sets --lx/--ly on el, used by its ::before gradient
	// shared by the hero and the projects page banner
	function initCursorGlow(el) {
		var glowTarget = { x: 50, y: 50 };
		var glowCurrent = { x: 50, y: 50 };
		var glowRaf = null;
		function animateGlow() {
			glowCurrent.x += (glowTarget.x - glowCurrent.x) * 0.08;
			glowCurrent.y += (glowTarget.y - glowCurrent.y) * 0.08;
			el.style.setProperty("--lx", glowCurrent.x + "%");
			el.style.setProperty("--ly", glowCurrent.y + "%");
			glowRaf = window.requestAnimationFrame(animateGlow);
		}
		el.addEventListener("mousemove", function (event) {
			var rect = el.getBoundingClientRect();
			glowTarget.x = ((event.clientX - rect.left) / rect.width) * 100;
			glowTarget.y = ((event.clientY - rect.top) / rect.height) * 100;
			if (!glowRaf) glowRaf = window.requestAnimationFrame(animateGlow);
		});
	}

	// hero background: cursor glow + magnetic particle swarm
	// plain CSS (drifting orbs, see _sections.scss) + canvas2d, no WebGL library
	var heroEl = document.getElementById("hero");
	if (heroEl) {
		initCursorGlow(heroEl);

		// particle swarm on canvas2d, dots get pulled toward the mouse
		if (!reducedMotion) {
			var swarmCanvas = document.createElement("canvas");
			swarmCanvas.className = "hero-swarm";
			heroEl.appendChild(swarmCanvas);
			var ctx = swarmCanvas.getContext("2d");
			var swarmW, swarmH;

			function resizeSwarm() {
				swarmW = swarmCanvas.width = heroEl.clientWidth;
				swarmH = swarmCanvas.height = heroEl.clientHeight;
			}
			resizeSwarm();
			window.addEventListener("resize", resizeSwarm);

			var swarmMouse = { x: swarmW / 2, y: swarmH / 2 };
			heroEl.addEventListener("mousemove", function (event) {
				var rect = heroEl.getBoundingClientRect();
				swarmMouse.x = event.clientX - rect.left;
				swarmMouse.y = event.clientY - rect.top;
			});

			function lighten(hex, amt) {
				hex = hex.replace("#", "");
				if (hex.length === 3) hex = hex.split("").map(function (c) { return c + c; }).join("");
				var r = parseInt(hex.substr(0, 2), 16);
				var g = parseInt(hex.substr(2, 2), 16);
				var b = parseInt(hex.substr(4, 2), 16);
				r = Math.round(r + (255 - r) * amt);
				g = Math.round(g + (255 - g) * amt);
				b = Math.round(b + (255 - b) * amt);
				return "rgb(" + r + "," + g + "," + b + ")";
			}

			var accentBlue = getComputedStyle(document.documentElement).getPropertyValue("--accent-blue").trim() || "#4f7cff";
			var accentTurquoise = getComputedStyle(document.documentElement).getPropertyValue("--accent-splash-2").trim() || "#2e8f8a";
			var dotColors = [accentBlue, accentTurquoise];

			var dots = [];
			for (var i = 0; i < 80; i++) {
				var baseColor = dotColors[i % dotColors.length];
				var glow = Math.random() < 0.25;
				dots.push({
					x: Math.random() * swarmW,
					y: Math.random() * swarmH,
					vx: 0,
					vy: 0,
					home: { x: Math.random() * swarmW, y: Math.random() * swarmH },
					color: lighten(baseColor, glow ? 0.65 : 0.35),
					glow: glow
				});
			}

			function swarmFrame() {
				ctx.clearRect(0, 0, swarmW, swarmH);
				dots.forEach(function (d) {
					var dx = swarmMouse.x - d.x;
					var dy = swarmMouse.y - d.y;
					var dist = Math.sqrt(dx * dx + dy * dy) || 1;
					var pull = Math.min(3200 / (dist * dist), 1.6);
					d.vx += dx * 0.004 * pull + (d.home.x - d.x) * 0.001;
					d.vy += dy * 0.004 * pull + (d.home.y - d.y) * 0.001;
					d.vx *= 0.9;
					d.vy *= 0.9;
					d.x += d.vx;
					d.y += d.vy;

					ctx.beginPath();
					ctx.arc(d.x, d.y, d.glow ? 2.6 : 2, 0, Math.PI * 2);
					if (d.glow) {
						ctx.shadowColor = d.color;
						ctx.shadowBlur = 8;
					} else {
						ctx.shadowBlur = 0;
					}
					ctx.fillStyle = d.color;
					ctx.globalAlpha = d.glow ? 0.95 : 0.75;
					ctx.fill();
				});
				ctx.shadowBlur = 0;
				window.requestAnimationFrame(swarmFrame);
			}
			swarmFrame();
		}
	}

	// projects page banner: same cursor glow, no particle swarm
	var projectsBannerEl = document.getElementById("projects-banner");
	if (projectsBannerEl) {
		initCursorGlow(projectsBannerEl);
	}

	// Typed.js hero tagline
	// tagline text already sits in the span as a no-JS fallback, Typed.js reads
	// it and types it back out the same way
	var typedTarget = document.getElementById("typed-tagline");
	if (window.Typed && typedTarget && !reducedMotion) {
		var taglineText = typedTarget.textContent.trim();
		typedTarget.textContent = "";
		new window.Typed(typedTarget, {
			strings: [taglineText],
			typeSpeed: 22,
			showCursor: true,
			cursorChar: "|",
			loop: false
		});
	}

	// GSAP ScrollTrigger: dark-to-light theme fade + scroll reveal
	// page starts dark and turns lighter toward the end; hero keeps its own fixed
	// background and is not affected
	if (window.gsap && window.ScrollTrigger) {
		gsap.registerPlugin(ScrollTrigger);

		var werdegangEl = document.getElementById("werdegang");
		if (werdegangEl) {
			gsap.set(document.documentElement, { "--theme-mix": 1 });
			gsap.to(document.documentElement, {
				"--theme-mix": 0,
				ease: "power2.inOut",
				scrollTrigger: {
					trigger: werdegangEl,
					start: "top bottom",
					end: "top top",
					scrub: reducedMotion ? true : 0.3
				}
			});
		}

		// .about__intro has no own transform, so fade + slide-up is safe here
		gsap.utils.toArray(".about__intro").forEach(function (el) {
			if (reducedMotion) {
				gsap.set(el, { opacity: 1, y: 0 });
				return;
			}
			gsap.fromTo(
				el,
				{ opacity: 0, y: 24 },
				{ opacity: 1, y: 0, duration: 0.7, ease: "power2.out", scrollTrigger: { trigger: el, start: "top 88%" } }
			);
		});

		// .card (tilt via inline style) and .timeline__entry (hover scale via class)
		// already use transform for their own effects, so reveal here uses opacity
		// only, to avoid clashing with GSAP's inline transform
		gsap.utils.toArray(".card, .timeline__entry").forEach(function (el, i) {
			if (reducedMotion) {
				gsap.set(el, { opacity: 1 });
				return;
			}
			gsap.fromTo(
				el,
				{ opacity: 0 },
				{
					opacity: 1,
					duration: 0.7,
					ease: "power2.out",
					delay: (i % 6) * 0.08,
					scrollTrigger: { trigger: el, start: "top 88%" }
				}
			);
		});
	}
})();
