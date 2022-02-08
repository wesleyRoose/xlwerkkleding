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
      // Remove color
      document.getElementById("sizesWrapper").style.backgroundColor = "";
      // Remove html
      document.getElementById("sizesWrapper").innerHTML = "";
  } else if (button == 'add') {
      // Get number value
      var numberValue = document.getElementById("numberOfSizes").value;
      var sHtml = '';
      // Generate Html
      for (i = 0; i < numberValue; i++) {
          sHtml += '<label>Maat</label><br><input type="text" name="aSizes[]" class="p-input"><br>';
      }
      // Add color
      document.getElementById("sizesWrapper").style.backgroundColor = "DarkSlateGray";
      // Add html
      document.getElementById("sizesWrapper").innerHTML = sHtml;
  }
}

  // Add select boxes, add product page
function numberOfColorsConfirm(button) {
  if (button == 'reset') {
      // Remove color
      document.getElementById("colorWrapper").style.backgroundColor = "";
      // Remove html
      document.getElementById("colorWrapper").innerHTML = "";
  } else if (button == 'add') {
      // Get number value
      var numberValue = document.getElementById("numberOfColors").value;
      var sHtml = '';
      // Generate Html
      for (i = 0; i < numberValue; i++) {
          sHtml += '<label>Kleur</label><br><input type="text" name="aColors[]" class="p-input"><br>';
      }
      // Add color
      document.getElementById("colorWrapper").style.backgroundColor = "DarkSlateGray";
      // Add html
      document.getElementById("colorWrapper").innerHTML = sHtml;
  }
}

//Make sure JS gets loaded

console.log("JS Loaded - END");


