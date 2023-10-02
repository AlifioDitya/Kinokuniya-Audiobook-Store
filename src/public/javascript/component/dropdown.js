function initializeDropdown(dropdownSelector) {
    const optionMenu = document.querySelectorAll(dropdownSelector);

    optionMenu.forEach((menu) => {
        const selectBtn = menu.querySelector(".select-btn");
        const options = menu.querySelectorAll(".option");
        const sBtn_text = menu.querySelector(".select-btn-text");

        selectBtn.addEventListener("click", () => menu.classList.toggle("active"));
        options.forEach((option) => {
            option.addEventListener("click", () => {
                const selectedOption = option.querySelector(".option-text").innerText;
                sBtn_text.innerText = selectedOption;
                menu.classList.remove("active");
            });
        });
    });
}

// Initialize all dropdowns with the class "select-menu"
initializeDropdown(".select-menu");
