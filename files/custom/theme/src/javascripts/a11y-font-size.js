/**
 * Werbeagentur KOPFNUSS
 * Projekt: enlarge und shrink text (vanilla)
 * Copyright (c) Marco Schaedlich
 *
 * @link    https://werbeagentur-kopfnuss.de
 */

document.addEventListener("DOMContentLoaded", () => {
    const STEP = 20; // Schrittweite in Prozent
    const MIN = 100; // Minimale Schriftgröße (%)
    const MAX = 160; // Maximale Schriftgröße (%)
    const html = document.documentElement;

    const enlargeBtns = document.querySelectorAll(".enlarge-text");
    const shrinkBtns = document.querySelectorAll(".shrink-text");

    /**
     * Holt die aktuelle Schriftgröße in Prozent.
     */
    function getFontSizeInPercent() {
        const inlineValue = html.style.fontSize;
        if (inlineValue && inlineValue.endsWith("%")) {
            return parseFloat(inlineValue);
        }
        const computedPx = parseFloat(getComputedStyle(html).fontSize);
        return (computedPx / 16) * 100;
    }

    /**
     * Setzt die Schriftgröße und aktualisiert Button-Status.
     */
    function setFontSize(newSize) {
        const clamped = Math.max(MIN, Math.min(MAX, newSize));
        html.style.fontSize = clamped + "%";
        updateButtonStates(clamped);
    }

    /**
     * Aktiviert/deaktiviert Buttons visuell und technisch.
     */
    function setButtonState(buttons, disabled) {
        buttons.forEach((btn) => {
            btn.classList.toggle("is-disabled", disabled);
            btn.disabled = disabled; // technisch deaktivieren (nicht klickbar)
            btn.setAttribute("aria-disabled", String(disabled)); // Barrierefreiheit
        });
    }

    /**
     * Prüft, ob Buttons deaktiviert werden müssen.
     */
    function updateButtonStates(currentSize) {
        const atMax = currentSize >= MAX;
        const atMin = currentSize <= MIN;

        setButtonState(enlargeBtns, atMax);
        setButtonState(shrinkBtns, atMin);
    }

    /**
     * Klick-Events für Buttons
     */
    enlargeBtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            const current = getFontSizeInPercent();
            if (current < MAX) setFontSize(current + STEP);
        });
    });

    shrinkBtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            const current = getFontSizeInPercent();
            if (current > MIN) setFontSize(current - STEP);
        });
    });

    // Initialzustand prüfen
    updateButtonStates(getFontSizeInPercent());
});
