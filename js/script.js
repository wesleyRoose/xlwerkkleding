//Make sure JS gets loaded

console.log("JS Loaded");

// Function for responsive menu

function toggleMenu() {
    var menu = document.getElementById("menu");
    menu.classList.toggle("show");
}

// Function to make content editable

function makeEditable(acc_id) {
  document.getElementById(acc_id).toggleAttribute("contenteditable");
  document.getElementById(acc_id).classList.toggle("background-color");
}

//Make sure JS gets loaded

console.log("JS Loaded - END");


