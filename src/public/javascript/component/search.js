
const searchBar = document.getElementById("query");
const categoryFilter = document.querySelector("#category-filter");
const priceFilter = document.querySelector("#price-filter");
const sort = document.querySelector("#sort");
const form = document.getElementById("input-form");

const page = 1; // Change this later to the current page
let order = "asc";

// Add a submit event listener to the form
form.addEventListener("submit", function (event) {
    event.preventDefault();
});

const currentPage = document.getElementById("page-name-hidden").innerText;

console.log(currentPage);

searchBar &&
searchBar.addEventListener(
    "keyup",
    debounce(() => {
        const queryValue = searchBar.value.trim();

        xhr = new XMLHttpRequest();
        xhr.open(
            "GET",
            `/public/${currentPage}/search/?q=${queryValue}&page=${page}` // Change this later for the current page
        );

        xhr.send();

        xhr.onreadystatechange = function () {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 200) {
                    const data = JSON.parse(this.responseText);
                    updateData(data['books']);
                } else {
                    alert("An error occured, please try again!");
                }
            }
        };
    }, 100)
)

// When dropdown is out of focus, close it
const selectMenus = document.querySelectorAll('.select-menu');

// Add a click event listener to the document body
document.body.addEventListener('click', function (event) {
    // Check if the click target is within the select menu or its options
    selectMenus.forEach(selectMenu => {
        if (!selectMenu.contains(event.target)) {
            // If the click is outside, close the dropdown
            selectMenu.classList.remove('active');
        }
    });
});

// Get a reference to the category options list
const categoryOptionsList = document.getElementById("category-options");

// Add a click event listener to the list
categoryOptionsList.addEventListener("click", function (event) {
    // Check if the clicked element is an <li> element
    if (event.target && event.target.nodeName === "LI") {
        // Get the selected option text from the clicked <li> element
        const selectedOptionText = event.target.querySelector(".option-text").textContent;

        
    }
});

const updateData = (data) => {
    const bookList = document.getElementById("book-list");
    bookList.innerHTML = "";

    data.forEach((book) => {
        const bookCard = document.createElement("div");
        bookCard.classList.add("book-card-brief");

        const bookLink = document.createElement("a");
        bookLink.href = `/public/catalogue/preview/?book_id=${book.book_id}`;

        const bookImg = document.createElement("img");
        bookImg.classList.add("book-img-brief");
        bookImg.src = book.cover_img_url;
        bookImg.alt = "Book Image";

        const bookDesc = document.createElement("div");
        bookDesc.classList.add("book-card-brief-desc");

        const bookTitle = document.createElement("h4");
        bookTitle.classList.add("book-card-title");
        bookTitle.innerText = book.title;

        const bookAuthor = document.createElement("p");
        bookAuthor.classList.add("book-card-author");
        bookAuthor.innerText = `by ${book.author}`;

        let bookPrice = null;
        if (currentPage === 'catalogue') {
            bookPrice = document.createElement("p");
            bookPrice.classList.add("book-card-price");
            bookPrice.innerText = `Rp ${book.price}`;
        } else {
            bookPrice = null;
        }

        bookDesc.appendChild(bookTitle);
        bookDesc.appendChild(bookAuthor);

        if (bookPrice !== null) {
            bookDesc.appendChild(bookPrice);
        }

        bookLink.appendChild(bookImg);

        bookCard.appendChild(bookLink);
        bookCard.appendChild(bookDesc);

        bookList.appendChild(bookCard);
    });
}