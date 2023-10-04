// Change the topnav-page-text to the current page
document.getElementById("topnav-page-text").innerHTML = "Cart";

// Change the topnav-page-icon to the current page, delete the old icon classes and add the new icon classes
let topnavPageIcon = document.getElementById("topnav-page-icon");
topnavPageIcon.classList.remove("bx-grid-alt", "bx-book", "bx-cog", "bx-library", "bx-cart");
topnavPageIcon.classList.add("bx-cart");

// Get the checkout button
const checkoutButton = document.getElementById("checkout-btn");

// Add a click event listener to the checkout button
checkoutButton.addEventListener("click", () => {

    // Get all the book-id-hidden elements
    const bookIdHiddenElements = document.querySelectorAll(".book-id-hidden");
    let bookIds = [];

    // Loop through the book-id-hidden elements and add the book ids to the bookIds array
    bookIdHiddenElements.forEach(bookIdHiddenElement => {
        bookIds.push(bookIdHiddenElement.textContent);
    });

    console.log(bookIds);

    // Buy the books in the cart
    xhrPost = new XMLHttpRequest();
    xhrPost.open("POST", "/public/cart/buy");
    xhrPost.setRequestHeader("Content-Type", "application/json");
    xhrPost.send(JSON.stringify({ book_ids: bookIds }));

    xhrPost.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status == 200) {
                // Parse the response
                let data = JSON.parse(this.responseText);

                console.log(data);

                // If the books were bought successfully, alert the user
                alert("You have successfully bought the books in your cart.");

                // Redirect to the my books page
                location.replace(data.redirect_url);
            } else {
                // If the books were not bought successfully, alert the user

                console.log(xhrPost.status);
                alert("There was an error buying the books in your cart.");
            }
        }
    }
});
    