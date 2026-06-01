(function () {
    const btn = document.querySelector(".toggle-contrast");
    if (!btn) return;

    const root = document.documentElement; // <html>
    const textEl = btn.querySelector(".toggle-contrast__text") || btn.querySelector(".icon-with-text__text");

    // Labels: zeigen die Aktion, nicht den Zustand
    const LABEL_DISABLE = "Hohen Kontrast deaktivieren"; // Aktion, wenn aktuell aktiv
    const LABEL_ENABLE = "Hohen Kontrast aktivieren"; // Aktion, wenn aktuell deaktiviert

    // Zustand anwenden + UI synchronisieren
    function applyHighContrastState(high) {
        // Klasse auf <html> setzen/entfernen
        root.classList.toggle("is-high-contrast", high);

        // ARIA drücken/los
        btn.setAttribute("aria-pressed", String(high));

        // Button-Text und Label synchronisieren
        const label = high ? LABEL_DISABLE : LABEL_ENABLE;
        if (textEl) textEl.textContent = label;
        btn.setAttribute("aria-label", label);

        // Zustand speichern
        try {
            localStorage.setItem("is-high-contrast", String(high)); // 'true' | 'false'
        } catch (_) {}
    }

    // Initialen Zustand bestimmen: 1) LocalStorage, sonst 2) System-Setting, sonst 3) false
    function getInitialState() {
        try {
            const stored = localStorage.getItem("is-high-contrast");
            if (stored !== null) return stored === "true";
        } catch (_) {}
        const prefersMore = window.matchMedia && window.matchMedia("(prefers-contrast: more)").matches;
        const forcedColors = window.matchMedia && window.matchMedia("(forced-colors: active)").matches;
        return prefersMore || forcedColors;
    }

    // Initial anwenden
    applyHighContrastState(getInitialState());

    // Klick-Handler (toggle)
    btn.addEventListener("click", () => {
        if (btn.disabled || btn.classList.contains("is-disabled")) return;

        const isCurrentlyHigh = root.classList.contains("is-high-contrast");
        applyHighContrastState(!isCurrentlyHigh);
    });
})();
