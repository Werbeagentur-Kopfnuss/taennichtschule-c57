document.addEventListener("DOMContentLoaded", () => {
    const btn = document.querySelector(".back-to-top");

    // 1) Sentinel oben erzeugen (falls nicht vorhanden)
    let sentinel = document.getElementById("scroll-sentinel");
    if (!sentinel) {
        sentinel = document.createElement("div");
        sentinel.id = "scroll-sentinel";
        // im Fluss lassen, damit es wirklich aus dem Viewport scrollt
        sentinel.style.position = "relative";
        sentinel.style.width = "1px";
        sentinel.style.height = "1px";
        // direkt als erstes Kind in <body> einfügen
        document.body.prepend(sentinel);
    }

    const show = () => {
        btn.removeAttribute("hidden");
        btn.setAttribute("data-visible", "true");
    };
    const hide = () => {
        btn.setAttribute("hidden", "");
        btn.setAttribute("data-visible", "false");
    };

    // 2) Fallback ohne IO: einfache Scroll-Schwelle
    if (!btn || !("IntersectionObserver" in window)) {
        const onScroll = () => (window.scrollY > 200 ? show() : hide());
        window.addEventListener("scroll", onScroll, { passive: true });
        onScroll();
        return;
    }

    // 3) IO beobachtet den Sentinel
    const io = new IntersectionObserver(
        ([entry]) => {
            entry.isIntersecting ? hide() : show();
        },
        {
            root: null,
            threshold: 0,
            // blendet den Button schon ein, wenn das obere Stück raus ist
            rootMargin: "0px 0px -80% 0px",
        }
    );

    io.observe(sentinel);
});
