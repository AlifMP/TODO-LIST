document.addEventListener("DOMContentLoaded", function () {
    const addListButton = document.getElementById("add-list");
    const inputHiddenContainer = document.querySelector(".inputHidden");

    addListButton.addEventListener("click", function () {
        inputHiddenContainer.style.display =
            inputHiddenContainer.style.display === "none" ? "block" : "none";
    });
});
