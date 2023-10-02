// Change the topnav-page-text to the current page
document.getElementById("topnav-page-text").innerHTML = "Editing user";

// Change the topnav-page-icon to the current page, delete the old icon classes and add the new icon classes
let topnavPageIcon = document.getElementById("topnav-page-icon");
topnavPageIcon.classList.remove("bx-grid-alt", "bx-book", "bx-cog", "bx-library");
topnavPageIcon.classList.add("bx-cog");

document.addEventListener('DOMContentLoaded', function() {
    // Remove "Dashboard" Text
    let dashboardLink = Array.from(document.querySelectorAll('.nav-list li .links_name')).find(el => el.textContent.trim() === "Dashboard");
    if (dashboardLink) {
        dashboardLink.closest('li').style.display = 'none';
    }

    // Remove "Settings" Text
    let settingsLink = Array.from(document.querySelectorAll('.nav-list li .links_name')).find(el => el.textContent.trim() === "Settings");
    if (settingsLink) {
        settingsLink.closest('li').style.display = 'none';
    }
});

