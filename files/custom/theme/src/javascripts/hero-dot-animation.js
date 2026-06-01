document.addEventListener("DOMContentLoaded", () => {
    const hero = document.querySelector(".hero");
    if (!hero) return;

    const dotRed = hero.querySelector(".hero-form--triangle");
    const dotBlue = hero.querySelector(".hero-form--square");
    const dotYellow = hero.querySelector(".hero-form--circle");

    if (!dotRed && !dotBlue && !dotYellow) return;

    // global motion check function
    function motionIsReduced() {
        return (
            document.documentElement.classList.contains("is-reduce-motion") ||
            window.matchMedia("(prefers-reduced-motion: reduce)").matches
        );
    }

    let ticking = false;
    // global strength control: everything stronger or weaker
    const strength = 3; // e.g. 1 = subtle, 2 = noticeable, 3 = stronger

    function updateDots() {
        if (motionIsReduced()) {
            // stop animation immediately
            if (dotRed) dotRed.style.transform = "";
            if (dotBlue) dotBlue.style.transform = "";
            if (dotYellow) dotYellow.style.transform = "";
            return;
        }

        const rect = hero.getBoundingClientRect();
        const vh = window.innerHeight || document.documentElement.clientHeight;

        const start = vh;
        const end = -rect.height;
        const rawProgress = (start - rect.top) / (start - end);
        const progress = Math.min(1, Math.max(0, rawProgress));

        // red – medium speed
        if (dotRed) {
            const x = progress * 20 * strength;
            const y = progress * 35 * strength;
            dotRed.style.transform = `translate3d(${x}px, ${y}px, 0)`;
        }

        // blue – fast
        if (dotBlue) {
            const x = progress * 15 * strength;
            const y = progress * -20 * strength;
            dotBlue.style.transform = `translate3d(${x}px, ${y}px, 0)`;
        }

        // yellow – slow
        if (dotYellow) {
            const x = progress * -35 * strength;
            const y = progress * -30 * strength;
            dotYellow.style.transform = `translate3d(${x}px, ${y}px, 0)`;
        }
    }

    function onScroll() {
        if (motionIsReduced()) return;

        if (!ticking) {
            window.requestAnimationFrame(() => {
                updateDots();
                ticking = false;
            });
            ticking = true;
        }
    }

    window.addEventListener("scroll", onScroll, {passive: true});
    window.addEventListener("resize", updateDots);

    // important: when user clicks toggle → stop/restart animation immediately
    const observer = new MutationObserver(updateDots);
    observer.observe(document.documentElement, {attributes: true, attributeFilter: ["class"]});

    updateDots();
});
