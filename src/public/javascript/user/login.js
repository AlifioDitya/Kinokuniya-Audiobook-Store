// Select the form element by its ID
const loginForm = document.getElementById("login-form");

// Add a submit event listener to the form
loginForm.addEventListener("submit", function (event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Perform any form data validation or processing here
    // ...

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const usernameError = document.getElementById("username-error");
    const passwordError = document.getElementById("password-error");

    // Clear previous error messages
    usernameError.textContent = "";
    passwordError.textContent = "";

    // Validate username (minimum 5 characters)
    if (username.length < 5) {
        usernameError.textContent = "Username must be at least 5 characters long.";
        return;
    }

    // Validate password (minimum 8 characters)
    if (password.length < 8) {
        passwordError.textContent = "Password must be at least 8 characters long.";
        return;
    }

    // Redirect to the desired page (public/home)
    window.location.href = "/public/home";
});
