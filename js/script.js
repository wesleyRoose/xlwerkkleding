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

// Functions to open/close dialogbox

var box = document.getElementById("orderBox");
var overlay = document.getElementById("overlay");
var fbody = document.getElementById("f-body");

document.getElementById("f-body");

function openBox() {
  box.style.display = "block";
  overlay.style.display = "block";
  fbody.style.overflowY = "hidden";
}

function closeBox() {
  box.style.display = "none";
  overlay.style.display = "none";
  fbody.style.overflowY = "scroll";
}

function collectData() {
  document.getElementById('acc_item_11').value = document.getElementById('acc_item_1').innerHTML;
  makeEditable('acc_item_1');

  document.getElementById('acc_item_21').value = document.getElementById('acc_item_2').innerHTML;
  makeEditable('acc_item_2');

  document.getElementById('acc_item_31').value = document.getElementById('acc_item_3').innerHTML;
  makeEditable('acc_item_3');

  document.getElementById('acc_item_41').value = document.getElementById('acc_item_4').innerHTML;
  makeEditable('acc_item_4');

  document.getElementById('acc_item_51').value = document.getElementById('acc_item_5').innerHTML;
  makeEditable('acc_item_5');

  document.getElementById('acc_item_61').value = document.getElementById('acc_item_6').innerHTML;
  makeEditable('acc_item_6');

}


//Make sure JS gets loaded

console.log("JS Loaded - END");