document.addEventListener("click", function (e) {
    const a = e.target.closest(".nav-cookie-settings");
    if (!a) return;
    e.preventDefault();
    if (window.cookiebar && typeof cookiebar.show === "function") {
        cookiebar.show(true); // öffnet die Präferenz-Dialogbox
    }
});
