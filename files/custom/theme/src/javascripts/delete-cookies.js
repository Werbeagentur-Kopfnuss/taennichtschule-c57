// find button
const btn = document.getElementById("js-delete-all-cookies");

// if button does NOT exist → end script
if (!btn) {
    console.debug("delete-cookies.js → Kein Button gefunden, Skript übersprungen.");
} else {
    // if button exists → add event
    btn.addEventListener("click", function () {
        deleteAllCookies();
        alert("Alle Cookies dieser Domain wurden gelöscht.");
    });
}

// function to delete all cookies
function deleteAllCookies() {
    const cookies = document.cookie.split(";");

    cookies.forEach((cookie) => {
        let eqPos = cookie.indexOf("=");
        let name = eqPos > -1 ? cookie.substr(0, eqPos).trim() : cookie.trim();

        const paths = ["/", location.pathname.split("/").slice(0, 2).join("/") || "/"];
        const domains = [window.location.hostname, "." + window.location.hostname.replace(/^www\./, "")];

        paths.forEach((path) => {
            domains.forEach((domain) => {
                document.cookie =
                    name +
                    "=; expires=Thu, 01 Jan 1970 00:00:00 GMT;" +
                    " path=" +
                    path +
                    ";" +
                    " domain=" +
                    domain +
                    ";";
            });
        });
    });
}
