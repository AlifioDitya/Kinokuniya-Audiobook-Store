// Change the topnav-page-text to the current page
document.getElementById("topnav-page-text").innerHTML = "Catalogue Control";

// Change the topnav-page-icon to the current page, delete the old icon classes and add the new icon classes
let topnavPageIcon = document.getElementById("topnav-page-icon");
topnavPageIcon.classList.remove("bx-grid-alt", "bx-book", "bx-cog", "bx-library", "bx-cart");
topnavPageIcon.classList.add("bx-library");

// document.addEventListener('DOMContentLoaded', function() {
//     // Remove "Dashboard" Text
//     let dashboardLink = Array.from(document.querySelectorAll('.nav-list li .links_name')).find(el => el.textContent.trim() === "Dashboard");
//     if (dashboardLink) {
//         dashboardLink.closest('li').style.display = 'none';
//     }

//     //Remove "Log Out" Text
//     // let settingsLink = Array.from(document.querySelectorAll('.nav-list li .links_name')).find(el => el.textContent.trim() === "Log Out");
//     // if (settingsLink) {
//     //     settingsLink.closest('li').style.display = 'none';
//     // }

//     let iconElement = document.querySelector(".bx-book");

//     // Change Icon 
//     if (iconElement) {
//         iconElement.classList.remove("bx-book");
//         iconElement.classList.add("bxs-user-account");
//     }
//     // Find <a> element that contain cart icon
//     const cartLink = document.querySelector(".bx.bx-cart-alt").closest('a');

//     // Create new anchor (a) element
//     const newLink = document.createElement("a");
//     newLink.href = "/public/catalogue/edit"; // Set Url

//     // Create New Button
//     const newButton = document.createElement("button");
//     newButton.className = "topnav-btn";

//     // Create New Icon
//     const newIcon = document.createElement("i");
//     newIcon.className = "bx bx-plus-circle"; 
//     newIcon.style.color = "white";
//     newIcon.style.fontSize = "16px";

//     // Combine all element
//     newButton.appendChild(newIcon);
//     newLink.appendChild(newButton);

//     // Insert new element to DOM before <a> element that contain cart 
//     cartLink.parentNode.insertBefore(newLink, cartLink);

//     // Find <a> element that contain "Catalogue Control" text
//     let catalogueControlLink = Array.from(document.querySelectorAll('.nav-list li .links_name')).find(el => el.textContent.trim() === "Catalogue Control");
    
//     if (catalogueControlLink) {
//         // Change href attribute from <a> element 
//         catalogueControlLink.closest('a').href = "/public/catalogue/control";
//     }

//     // Find <a> element that contain "Catalogue Control" text
//     let userControlLink = Array.from(document.querySelectorAll('.nav-list li .links_name')).find(el => el.textContent.trim() === "User Control");
    
//     if (userControlLink) {
//         // Change href attribute from <a> element 
//         userControlLink.closest('a').href = "/public/user/edit";
//     }

// });


// // Change Text
// let links = document.querySelectorAll(".links_name");
// links.forEach(link => {
//     if (link.innerText === "Catalogue") {
//         link.innerText = "Catalogue Control";
//     }
// });

// let tooltips = document.querySelectorAll(".tooltip");
// tooltips.forEach(tooltip => {
//     if (tooltip.innerText === "Catalogue") {
//         tooltip.innerText = "Catalogue Control";
//     }
// });

// let links2 = document.querySelectorAll(".links_name");
// links.forEach(link => {
//     if (link.innerText === "My Books") {
//         link.innerText = "User Control";
//     }
// });

// let tooltips2 = document.querySelectorAll(".tooltip");
// tooltips.forEach(tooltip => {
//     if (tooltip.innerText === "My Books") {
//         tooltip.innerText = "User Control";
//     }
// });

