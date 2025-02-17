document.addEventListener("DOMContentLoaded", function () {
    const currentURL = window.location.href;
    const menuLinks = document.querySelectorAll("#collapseMenu a");

    menuLinks.forEach(link => {
        if (currentURL.includes(link.getAttribute("href"))) {
            link.classList.add("active");

            // Tampilkan submenu jika salah satu item aktif
            document.getElementById("collapseMenu").classList.remove("hidden");
        }
    });

    // Event untuk toggle collapse
    const collapseToggle = document.getElementById("collapseToggle");
    const collapseMenu = document.getElementById("collapseMenu");
    const chevronIcon = collapseToggle.querySelector("ion-icon[name='chevron-down']");

    collapseToggle.addEventListener("click", function () {
        collapseMenu.classList.toggle("hidden");
        chevronIcon.classList.toggle("rotate-180");
    });
});
