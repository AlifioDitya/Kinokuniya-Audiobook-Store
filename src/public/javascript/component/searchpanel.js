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

// Remove the property "transform: rotate(-180deg);" if the dropdown icon is of the class "bx-sort-alt-2"
function removeDropdownIconTransform() {
    const dropdownIcon = document.querySelector(".bx-sort-alt-2");

    if (dropdownIcon) {
        dropdownIcon.style.transform = "rotate(0deg)";
    }
}


// Function to filter categories
const categoryQuery = document.querySelector('#category-query');
const categoryList = document.getElementById('category-options').getElementsByTagName('li');
const filterCategories = () => {

    categoryList.forEach((category) => {
        const categoryName = category.querySelector('.option-text').innerText;

        if (categoryName.includes(categoryQuery.value)) {
            category.style.display = 'block';
        } else {
            category.style.display = 'none';
        }
    });
};

categoryQuery.addEventListener('keyup', filterCategories);

// Initialize all dropdowns with the class "select-menu"
initializeDropdown(".select-menu");
removeDropdownIconTransform();