(function () {
    const btn = document.querySelector(".toggle-motion");
    if (!btn) return;

    const root = document.documentElement;
    const textEl = btn.querySelector(".toggle-motion__text") || btn.querySelector(".icon-with-text__text");

    // labels show the next action (not the state)
    const LABEL_DISABLE = "Animationen deaktivieren"; // wenn aktuell aktiv
    const LABEL_ENABLE = "Animationen aktivieren"; // wenn aktuell deaktiviert

    function applyReducedMotionState(reduced) {
        // class on <html>
        root.classList.toggle("is-reduce-motion", reduced);

        // aria-pressed
        btn.setAttribute("aria-pressed", String(reduced));

        // button text + aria-label sync (next action)
        const label = reduced ? LABEL_ENABLE : LABEL_DISABLE;
        if (textEl) textEl.textContent = label;
        btn.setAttribute("aria-label", label);

        // persist
        try {
            localStorage.setItem("is-reduce-motion", String(reduced));
        } catch (_) {}
    }

    function getInitialState() {
        try {
            const stored = localStorage.getItem("is-reduce-motion");
            if (stored !== null) return stored === "true";
        } catch (_) {}
        return window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    }

    // apply initial state
    applyReducedMotionState(getInitialState());

    // click handler (toggle)
    btn.addEventListener("click", () => {
        if (btn.disabled || btn.classList.contains("is-disabled")) return;
        const isCurrentlyReduced = root.classList.contains("is-reduce-motion");
        applyReducedMotionState(!isCurrentlyReduced);
    });
})();
