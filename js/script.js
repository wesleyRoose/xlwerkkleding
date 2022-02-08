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

  // Add select boxes, add product page
function numberOfSizesConfirm(button) {
  if (button == 'reset') {
      // Remove html
      document.getElementById("sizesWrapper").innerHTML = "";
  } else if (button == 'add') {
      // Get number value
      var numberValue = document.getElementById("numberOfSizes").value;
      var sHtml = '<label>Extra Maten</label><br>';
      // Generate Html
      for (i = 0; i < numberValue; i++) {
          sHtml += '<input placeholder="Maat..." type="text" name="aSizes[]" class="p-input"><br>';
      }
      // Add html
      document.getElementById("sizesWrapper").innerHTML = sHtml;
  }
}

  // Add select boxes, add product page
function numberOfColorsConfirm(button) {
  if (button == 'reset') {
      // Remove html
      document.getElementById("colorWrapper").innerHTML = "";
  } else if (button == 'add') {
      // Get number value
      var numberValue = document.getElementById("numberOfColors").value;
      var sHtml = '<label>Extra Kleuren</label><br>';
      // Generate Html
      for (i = 0; i < numberValue; i++) {
          sHtml += '<input placeholder="Kleur..." type="text" name="aColors[]" class="p-input"><br>';
      }
      // Add html
      document.getElementById("colorWrapper").innerHTML = sHtml;
  }
}

//Make sure JS gets loaded

console.log("JS Loaded - END");


