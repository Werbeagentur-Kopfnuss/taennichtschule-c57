(function () {
    const containers = Array.from(document.querySelectorAll(".parallax-container"));

    function waitForImageReady(img) {
        if (img.complete && img.naturalWidth > 0) {
            return img.decode ? img.decode().catch(() => {}) : Promise.resolve();
        }
        return new Promise((resolve) => {
            img.addEventListener(
                "load",
                async () => {
                    if (img.decode) {
                        try {
                            await img.decode();
                        } catch {}
                    }
                    resolve();
                },
                { once: true }
            );
            img.addEventListener("error", resolve, { once: true });
        });
    }

    function parsePx(val) {
        if (val == null) return 0;
        const s = String(val).trim().replace(/[−–—]/g, "-").replace(",", ".");
        if (/^[+-]?\d*\.?\d+$/.test(s)) return parseFloat(s);
        const m = s.match(/^([+-]?\d*\.?\d+)\s*(px|rem|vh)$/i);
        if (!m) return 0;
        const n = parseFloat(m[1]);
        const unit = m[2].toLowerCase();
        if (unit === "px") return n;
        if (unit === "rem") return n * parseFloat(getComputedStyle(document.documentElement).fontSize || "16");
        if (unit === "vh") return n * (window.innerHeight / 100);
        return 0;
    }

    function parseAmount(val) {
        if (val == null) return 1;
        const x = parseFloat(String(val).trim().replace(",", "."));
        return Number.isFinite(x) ? Math.min(1, Math.max(0, x)) : 1;
    }

    function computeShift(container, img) {
        const rect = container.getBoundingClientRect();
        const vh = window.innerHeight;

        // Fortschritt 0..1
        const p = Math.min(1, Math.max(0, (vh - rect.top) / (vh + rect.height)));

        // Richtung
        const dir = (container.dataset.direction || "down").toLowerCase() === "up" ? -1 : 1;

        // Offset-Basis (Startposition)
        const offset = parsePx(container.dataset.offset ?? 0);

        // Parallax-Bewegungsanteil (0–1)
        const amount = parseAmount(container.dataset.amount);

        // Reale Geometrie
        const containerH = container.offsetHeight;
        const imgH = img.offsetHeight;
        const overhang = Math.max(0, imgH - containerH);
        const maxShift = overhang / 2;

        // maximale Bewegungsreichweite: Anteil des Overhangs
        const travel = overhang * amount;

        // gewünschte Bewegung: Anteil des verfügbaren Weges
        const desired = offset + dir * (p - 0.5) * travel;

        // finale Sicherheit: nie über den Container hinausrutschen
        return Math.min(Math.max(desired, -maxShift), +maxShift);
    }

    async function init() {
        if (!containers.length) return;

        // Warte bis alle Bilder fertig sind
        const imgs = containers.map((c) => c.querySelector(".parallax-image > img")).filter(Boolean);
        await Promise.all(imgs.map(waitForImageReady));

        let ticking = false;
        const updateAll = () => {
            for (const container of containers) {
                const img = container.querySelector(".parallax-image > img");
                if (!img) continue;
                const shift = computeShift(container, img);
                img.style.setProperty("--parallax-shift", `${shift}px`);
            }
            ticking = false;
        };

        const onScroll = () => {
            if (!ticking) {
                requestAnimationFrame(updateAll);
                ticking = true;
            }
        };

        addEventListener("scroll", onScroll, { passive: true });
        addEventListener("resize", updateAll);
        addEventListener("orientationchange", updateAll);

        updateAll();
    }

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", init);
    } else {
        init();
    }
})();
