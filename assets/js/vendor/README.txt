Lokal gehostete Vendor-Libraries (kein CDN, keine npm-Bundle-Pipeline vorhanden).
Nur auf der Startseite geladen (siehe partials/footer.php, $isHome).

- gsap.min.js           3.12.5 https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js
- ScrollTrigger.min.js  3.12.5 https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js
- typed.umd.js          2.1.0  https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.1.0/typed.umd.js

Der Hero-Hintergrund (Cursor-Glow + driftende Farb-Orbs + magnetischer Partikel-Schwarm)
ist bewusst reines CSS/Canvas2D (siehe _sections.scss ".hero" + assets/js/site-fx.js) -
keine 3D-Library. Wir haben zuvor mehrere Vanta.js-Effekte (HALO, TOPOLOGY, NET) und
weitere three.js/OGL-Mockups durchgetestet, letztlich aber die leichte Eigenbau-Lösung
gewählt. Falls das Thema doch nochmal aufkommt: Vanta-Effekte sind NICHT alle three.js-
basiert (TOPOLOGY/CELLS/TRUNK brauchen p5.js) und nicht alle unterstützen Maus-Interaktion
(TOPOLOGY z.B. gar nicht) - vor jedem Effekt-Wechsel im Quellcode prüfen
(github.com/tengbao/vanta/tree/master/src).
