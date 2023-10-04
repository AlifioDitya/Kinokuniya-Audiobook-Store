const form = document.getElementById("input-form");
const searchBar = document.getElementById("query");
const currentPage = document.getElementById("page-name-hidden").innerText;
const selectMenus = document.querySelectorAll('.select-menu');
const categoryOptionsList = document.getElementById("category-options");

let page = 1; // Change this later to the current page
let order = "desc";
let categoryFilter = "All Categories";
let priceFilter = "All Prices";
let sort = "Newest First";

// Prevent the form from submitting
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
            `/public/${currentPage}/search/?q=${queryValue}&page=${page}&order=${order}&category=${categoryFilter}&price=${priceFilter}&sort=${sort}`
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
document.body.addEventListener('click', function (event) {
    // Check if the click target is within the select menu or its options
    selectMenus.forEach(selectMenu => {
        if (!selectMenu.contains(event.target)) {
            // If the click is outside, close the dropdown
            selectMenu.classList.remove('active');
        }
    });
});

// Add event listeners for each select menu
selectMenus.forEach(selectMenu => {
    const selectButton = selectMenu.querySelector('.select-btn');
    const optionsList = selectMenu.querySelector('.options');
    const filterTextElement = selectMenu.querySelector('.select-btn-text');

    // Add a click event listener to the select button
    selectButton.addEventListener('click', function () {
        optionsList.classList.toggle('active');
    });

    // Add a click event listener to the options list
    optionsList.addEventListener('click', function (event) {
        if (event.target.classList.contains('option-text')) {
            const selectedFilterValue = event.target.textContent.trim();
            filterTextElement.textContent = selectedFilterValue;
            optionsList.classList.remove('active');
    
            // Update the appropriate variable based on the select menu
            if (selectMenu.id === 'category-menu') {
                categoryFilter = selectedFilterValue;
            } else if (selectMenu.id === 'price-menu') {
                priceFilter = selectedFilterValue;
            } else if (selectMenu.id === 'sort-menu') {
                sort = selectedFilterValue;

                if (sort === 'Newest First') {
                    order = 'desc';
                } else if (sort === 'Oldest First') {
                    order = 'asc';
                } else if (sort === 'Price: Low to High') {
                    order = 'asc';
                } else if (sort === 'Price: High to Low') {
                    order = 'desc';
                }
            }
    
            // Now, the categoryFilter, priceFilter, or sort variables are updated
            // with the selected values based on the select menu.
            console.log('Category Filter:', categoryFilter);
            console.log('Price Filter:', priceFilter);
            console.log('Sort:', sort);
            console.log('Order:', order);
        }
    });
});

// Add a click event listener to the category options list
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