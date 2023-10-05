// Change the topnav-page-text to the current page
document.getElementById("topnav-page-text").innerHTML = "Catalogue";

// Change the topnav-page-icon to the current page, delete the old icon classes and add the new icon classes
let topnavPageIcon = document.getElementById("topnav-page-icon");
topnavPageIcon.classList.remove("bx-grid-alt", "bx-book", "bx-cog", "bx-library", "bx-cart");
topnavPageIcon.classList.add("bx-library");

// Function to get the query parameter from the URL
function getQueryParam(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

// Get the query parameter 'q' from the URL
const queryVal = getQueryParam("q");

if (queryVal !== null) {
    // Set the queryValue as the value of the input field
    document.getElementById("query").value = queryVal;
    
    // Invoke "keyup" event on the input field to trigger the search
    document.getElementById("query").dispatchEvent(new Event("keyup"));
}