// Change the topnav-page-text to the current page
document.getElementById("topnav-page-text").innerHTML = "User List";

// Change the topnav-page-icon to the current page, delete the old icon classes and add the new icon classes
let topnavPageIcon = document.getElementById("topnav-page-icon");
topnavPageIcon.classList.remove("bx-grid-alt", "bx-book", "bx-cog", "bx-library");
topnavPageIcon.classList.add("bx-user");

const users = [
    { username: "JohnDoe", date: "2023-10-01", booksOwned: 5, status: "Active" },
    { username: "JaneSmith", date: "2023-09-20", booksOwned: 3, status: "Inactive" },
    // ... add user data
];

document.addEventListener('DOMContentLoaded', function() {
    const tableBody = document.querySelector('#userTable tbody');

    // // Example adding data
    // const users = [
    //     { username: 'JohnDoe', date: '2023-10-01', booksOwned: 5, status: 'Active' },
    //     { username: 'JaneSmith', date: '2023-10-01', booksOwned: 5, status: 'Active' },
    //     // Add data here
    // ];

    let iconElement = document.querySelector(".bx-book");

    // Change Icon 
    if (iconElement) {
        iconElement.classList.remove("bx-book");
        iconElement.classList.add("bxs-user-account");
    }

    // Remove "Dashboard" Text
    let dashboardLink = Array.from(document.querySelectorAll('.nav-list li .links_name')).find(el => el.textContent.trim() === "Dashboard");
    if (dashboardLink) {
        dashboardLink.closest('li').style.display = 'none';
    }
    // Find <a> element that contain "Catalogue Control" text
    let catalogueControlLink = Array.from(document.querySelectorAll('.nav-list li .links_name')).find(el => el.textContent.trim() === "Catalogue Control");
    
    if (catalogueControlLink) {
        // Change href attribute from <a> element 
        catalogueControlLink.closest('a').href = "/public/catalogue/control";
    }

    // Find <a> element that contain "Catalogue Control" text
    let userControlLink = Array.from(document.querySelectorAll('.nav-list li .links_name')).find(el => el.textContent.trim() === "User Control");
    
    if (userControlLink) {
        // Change href attribute from <a> element 
        userControlLink.closest('a').href = "/public/user/edit";
    }


    // users.forEach(user => {
    //     const row = document.createElement('tr');

    //     // Adding data to row
    //     row.innerHTML = `
    //         <td>${user.username}</td>
    //         <td>${user.date}</td>
    //         <td>${user.booksOwned}</td>
    //         <td class="status">${user.status}</td>
    //         <td class="editCell">
    //             <div class="select-btn">
    //                 <span class="select-btn-text"></span>
    //                 <i class="bx bx-chevron-down"></i>
    //             </div>
    //             <div class="dropdown-menu">
    //                 <a href="#" class="active-option">Active</a>
    //                 <a href="#" class="inactive-option">Inactive</a>
    //                 <a href="edituser">Edit</a>
    //             </div>
    //         </td>
    //     `;

    //     tableBody.appendChild(row);
    // });

    // Add event listener to each .select-btn
    const selectBtns = document.querySelectorAll('.select-btn');
    selectBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const dropdown = this.nextElementSibling;
            if (dropdown.style.display === 'none' || dropdown.style.display === '') {
                dropdown.style.display = 'block';
            } else {
                dropdown.style.display = 'none';
            }
        });
    });

    // Change status when drop down option clicked 
    const activeOptions = document.querySelectorAll('.active-option');
    activeOptions.forEach(option => {
        option.addEventListener('click', function(event) {
            event.preventDefault();
            const statusCell = this.closest('tr').querySelector('.status');
            statusCell.textContent = 'Active';
            this.closest('.dropdown-menu').style.display = 'none';
        });
    });

    const inactiveOptions = document.querySelectorAll('.inactive-option');
    inactiveOptions.forEach(option => {
        option.addEventListener('click', function(event) {
            event.preventDefault();
            const statusCell = this.closest('tr').querySelector('.status');
            statusCell.textContent = 'Inactive';
            this.closest('.dropdown-menu').style.display = 'none';
        });
    });
    
});

// Change Text
let links = document.querySelectorAll(".links_name");
links.forEach(link => {
    if (link.innerText === "Catalogue") {
        link.innerText = "Catalogue Control";
    }
});

let tooltips = document.querySelectorAll(".tooltip");
tooltips.forEach(tooltip => {
    if (tooltip.innerText === "Catalogue") {
        tooltip.innerText = "Catalogue Control";
    }
});

let links2 = document.querySelectorAll(".links_name");
links.forEach(link => {
    if (link.innerText === "My Books") {
        link.innerText = "User Control";
    }
});

let tooltips2 = document.querySelectorAll(".tooltip");
tooltips.forEach(tooltip => {
    if (tooltip.innerText === "My Books") {
        tooltip.innerText = "User Control";
    }
});
