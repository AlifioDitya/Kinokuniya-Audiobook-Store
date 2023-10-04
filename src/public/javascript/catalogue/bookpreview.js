// Top nav label
const topnavLabel = document.querySelector(".topnav-label");

// Change the topnav-page-text to the current page
document.getElementById("topnav-page-text").innerHTML = "Book Preview";

// Change the topnav-page-icon to the current page, delete the old icon classes and add the new icon classes
let topnavPageIcon = document.getElementById("topnav-page-icon");
topnavPageIcon.classList.remove("bx-grid-alt", "bx-book", "bx-cog", "bx-library", "bx-cart");

// Add back icon
let backIcon = document.createElement("i");
backIcon.classList.add("bx", "bx-chevron-left", "topnav-page-icon");

// Style the back icon
backIcon.style.fontSize = "1.5rem";
backIcon.style.cursor = "pointer";

// Append as first child of topnav label
topnavLabel.insertBefore(backIcon, topnavLabel.childNodes[0]);

// Handle back button click
backIcon.addEventListener("click", () => {
    window.history.back();
});