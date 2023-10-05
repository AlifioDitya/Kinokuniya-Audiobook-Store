const form = document.getElementById("input-form");
const searchBar = document.getElementById("query");
const currentPage = document.getElementById("page-name-hidden").innerText;
const selectMenus = document.querySelectorAll('.select-menu');

const categoryMenu = document.getElementById("category-menu");
const categoryOptions = categoryMenu.querySelectorAll(".option");
const priceMenu = document.getElementById("price-menu");
const priceOptions = priceMenu.querySelectorAll(".option");
const sortMenu = document.getElementById("sort-menu");
const sortOptions = sortMenu.querySelectorAll(".option");

// Initialize variables to store selected filter values
let queryValue = searchBar.value.trim();
let selectedCategory = "All Categories";
let selectedPrice = "All Prices";
let selectedSort = "Newest First";
let order = "desc";
let page = 1; // Change this later to the current page


/* SEARCH BAR */

// Prevent the form from submitting
form.addEventListener("submit", function (event) {
    event.preventDefault();
});

// Function to update the data based on search values
searchBar &&
searchBar.addEventListener(
    "keyup",
    debounce(() => {
        queryValue = searchBar.value.trim();

        xhr = new XMLHttpRequest();
        xhr.open(
            "GET",
            `/public/${currentPage}/search/?q=${queryValue}&page=${page}&category=${selectedCategory}&price=${selectedPrice}&sort=${selectedSort}`
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
    }, DEBOUNCE_TIMEOUT)
)

/* FILTERS */

// When dropdown is out of focus, close it
document.body.addEventListener('click', function (event) {
    // Check if the click target is within the select menu or its options
    selectMenus.forEach(selectMenu => {
        if (!selectMenu.contains(event.target)) {
            // If the click is outside, close the dropdown
            selectMenu.classList.remove('active');
        }
    });
});

// Function to update the selected category
function updateCategory(option) {
    selectedCategory = option.textContent.trim();

    xhr = new XMLHttpRequest();
    xhr.open(
        "GET",
        `/public/${currentPage}/search/?q=${queryValue}&page=${page}&category=${selectedCategory}&price=${selectedPrice}&sort=${selectedSort}`
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
}

// Function to update the selected price
function updatePrice(option) {
    selectedPrice = option.textContent.trim();

    xhr = new XMLHttpRequest();
    xhr.open(
        "GET",
        `/public/${currentPage}/search/?q=${queryValue}&page=${page}&category=${selectedCategory}&price=${selectedPrice}&sort=${selectedSort}`
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
}

// Function to update the selected sort option
function updateSort(option) {
    selectedSort = option.textContent.trim();

    xhr = new XMLHttpRequest();
    xhr.open(
        "GET",
        `/public/${currentPage}/search/?q=${queryValue}&page=${page}&category=${selectedCategory}&price=${selectedPrice}&sort=${selectedSort}`
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
}

// Add click event listeners to the category options
categoryOptions.forEach(option => {
    option.addEventListener("click", () => {
        updateCategory(option);
    });
});

// Add click event listeners to the price options
priceOptions.forEach(option => {
    option.addEventListener("click", () => {
        updatePrice(option);
    });
});

// Add click event listeners to the sort options
sortOptions.forEach(option => {
    option.addEventListener("click", () => {
        updateSort(option);
    });
});

/* HELPER */

// To update the book page based on passed in data
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
};