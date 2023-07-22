// Get the navbar
var navbar = document.getElementById("cate");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Function to add the sticky class to the navbar when you reach its scroll position
function stickNavbar() {
    if (window.scrollY >= 0) {
        navbar.classList.add("sticky-cat");
    } else {
        navbar.classList.remove("sticky-cat");
    }
}

// Execute the stickNavbar function when the user scrolls the page
window.onscroll = function () {
    stickNavbar();
};
