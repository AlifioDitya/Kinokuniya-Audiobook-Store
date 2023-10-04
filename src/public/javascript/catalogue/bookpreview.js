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

// Add event listener to the add to cart button
const addToCartButton = document.getElementById("add-to-cart");
const book_id = document.getElementById("book-id-hidden").textContent;

addToCartButton &&
    addToCartButton.addEventListener("click", () => {

        // Add the book to the cart
        xhrPost = new XMLHttpRequest();
        xhrPost.open("POST", "/public/catalogue/preview");
        
        const formData = new FormData();
        formData.append("book_id", book_id);

        xhrPost.send(formData);
        xhrPost.onreadystatechange = function () {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (xhrPost.status == 200) {
                    // Parse the response
                    let data = JSON.parse(this.responseText);

                    // If the book was added to the cart successfully, alert the user
                    location.replace('/public/cart');
                    alert("You have successfully added the book to your cart.");

                    // Redirect to redirect_url
                    location.replace(data.redirect_url);

                } else if (xhrPost.status == 302) {
                    // Already in cart, alert the user
                    alert("This book is already in your cart.");
                } else {
                    // If the book was not added to the cart successfully, alert the user
                    alert(`There was an error adding the book to your cart. (${xhrPost.status})`);
                }
            }
        }
    });