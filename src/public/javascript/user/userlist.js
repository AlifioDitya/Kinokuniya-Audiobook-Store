// Change the topnav-page-text to the current page
document.getElementById("topnav-page-text").innerHTML = "User Control";

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

    // Example adding data
    const users = [
        { username: 'JohnDoe', date: '2023-10-01', booksOwned: 5, status: 'Active' },
        { username: 'JaneSmith', date: '2023-10-01', booksOwned: 5, status: 'Active' },
        // Add data here
    ];

    users.forEach(user => {
        const row = document.createElement('tr');

        // Adding data to row
        row.innerHTML = `
            <td>${user.username}</td>
            <td>${user.date}</td>
            <td>${user.booksOwned}</td>
            <td class="status">${user.status}</td>
            <td class="editCell">
                <div class="select-btn">
                    <span class="select-btn-text"></span>
                    <i class="bx bx-chevron-down"></i>
                </div>
                <div class="dropdown-menu">
                    <a href="#" class="active-option">Active</a>
                    <a href="#" class="inactive-option">Inactive</a>
                </div>
            </td>
        `;

        tableBody.appendChild(row);
    });

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
