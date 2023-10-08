// Change the topnav-page-text to the current page
document.getElementById("topnav-page-text").innerHTML = "Editing book";

// Change the topnav-page-icon to the current page, delete the old icon classes and add the new icon classes
let topnavPageIcon = document.getElementById("topnav-page-icon");
topnavPageIcon.classList.remove("bx-grid-alt", "bx-book", "bx-cog", "bx-library");
topnavPageIcon.classList.add("bx-cog");

const book_id = document.getElementById("book-id-hidden")
const title = document.getElementById("Book Title");
const author = document.getElementById("Author");
const category = document.getElementById("Category");
const price = document.getElementById("Price");
const publication = document.getElementById("Publication");
const summary = document.getElementById("Summary");
const cover = document.getElementById("Cover");
const audio = document.getElementById("Audio");

const save_btn = document.getElementById("Save-btn");
const errorMessageDiv = document.getElementById("error-message");

save_btn.addEventListener("click", (e) => {
    e.preventDefault();
    errorMessageDiv.textContent = "";
    // validasi input
    if (title.value === "") {
        alert("Title must be filled out");
        return false;
    }
    if (author.value === "") {
        alert("Author must be filled out");
        return false;
    }
    if (category.value === "") {
        alert("Category must be filled out");
        return false;
    }
    if (price.value === "") {
        alert("Price must be filled out");
        return false;
    }
    if (publication.value === "") {
        alert("Publication Date must be filled out");
        return false;
    }
    if (summary.value === "") {
        alert("Summary must be filled out");
        return false;
    }
    if (cover.value === "") {
        alert("Cover must be filled out");
        return false;
    }
    if (audio.value === "") {
        alert("Audio must be filled out");
        return false;
    }

    // Extract the filename from the selected file
    const coverFilename = cover.files[0].name;
    const audioFilename = audio.files[0].name;
    
    // AJAX
    const xhr = new XMLHttpRequest();
    xhr.open("PUT", `/public/catalogue/edit/`, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(JSON.stringify({
        book_id: book_id.innerText,
        title: title.value,
        author: author.value,
        category: category.value,
        price: price.value,
        publication_date: publication.value,
        book_desc: summary.value,
        cover_img_url: 'http://localhost:8080/storage/book-img/' + coverFilename,
        audio_url: 'http://localhost:8080/storage/book-audio/' + audioFilename
    }));

    xhr.onreadystatechange = function() {
        if (this.readyState == XMLHttpRequest.DONE) {
            if (this.status == 200) {
                window.location.href = "/public/catalogue/control";
            } else {
                alert("Error");
            }
        }
    }
});

