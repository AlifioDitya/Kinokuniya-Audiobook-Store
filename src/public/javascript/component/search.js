
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

searchBar &&
searchBar.addEventListener(
    "keyup",
    debounce(() => {
        const queryValue = searchBar.value.trim();

        xhr = new XMLHttpRequest();
        xhr.open(
            "GET",
            `/public/catalogue/search?q=${queryValue}&page=${page}`
        );

        xhr.send();

        xhr.onreadystatechange = function () {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 200) {
                    const data = JSON.parse(this.responseText);
                    updateData(data);
                } else {
                    alert("An error occured, please try again!");
                }
            }
        };
    }, DEBOUNCE_TIMEOUT)
)

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

// Example data HTML
/* <div class="book-card-brief">
    <a>
        <img class="book-img-brief" src="<?= STORAGE_URL ?>/book-img/klara.svg" alt="Book Image">
    </a>
    <div class="book-card-brief-desc">
        <h4 class="book-card-title">Klara and the Sun</h4>
        <p class="book-card-author">by Kazuo Ishiguro</p>
        <p class="book-card-price">Rp 150.000</p>
    </div>
</div> */

const updateData = (data) => {
    const bookList = document.getElementById("book-list");
    bookList.innerHTML = "";

    data.forEach((book) => {
        const bookCard = document.createElement("div");
        bookCard.classList.add("book-card-brief");

        const bookLink = document.createElement("a");
        bookLink.href = `/public/catalogue/${book.book_id}`;

        const bookImg = document.createElement("img");
        bookImg.classList.add("book-img-brief");
        bookImg.src = book.book_img_url;
        bookImg.alt = "Book Image";

        const bookDesc = document.createElement("div");
        bookDesc.classList.add("book-card-brief-desc");

        const bookTitle = document.createElement("h4");
        bookTitle.classList.add("book-card-title");
        bookTitle.innerText = book.title;

        const bookAuthor = document.createElement("p");
        bookAuthor.classList.add("book-card-author");
        bookAuthor.innerText = `by ${book.author}`;

        const bookPrice = document.createElement("p");
        bookPrice.classList.add("book-card-price");
        bookPrice.innerText = `Rp ${book.price}`;

        bookDesc.appendChild(bookTitle);
        bookDesc.appendChild(bookAuthor);
        bookDesc.appendChild(bookPrice);

        bookLink.appendChild(bookImg);

        bookCard.appendChild(bookLink);
        bookCard.appendChild(bookDesc);

        bookList.appendChild(bookCard);
    });
}