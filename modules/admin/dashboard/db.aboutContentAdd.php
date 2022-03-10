<?php
//load controller
if (file_exists('../../../admin-controller.php')) {
  include('../../../admin-controller.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: admin-controller.php does not exist.";
  echo $errorMessage;
  exit;
}


// Check if submit is pressed
if (isset($_POST["submit"])) {
  // Check if there is user input
  if (isset($_POST["aboutHd1"]) && isset($_POST["aboutTxt1"])) {
    // Catch user input
    $sAboutHd = $_POST["aboutHd1"];
    $sAboutTxt = $_POST["aboutTxt1"];

    // Remove old imgs
    // Delete files using path from database
    unlink(getHtmlContent($conn, "about", "topImg"));
    unlink(getHtmlContent($conn, "about", "lowerImg"));

    // Set img path string
    $sImgPath = "img/" . $_FILES['aboutFl1']['name'];
    //use move uploaded file function to move your files
    move_uploaded_file($_FILES['aboutFl1']['tmp_name'], $sImgPath);

    // Rename uploaded file
    rename("img/" . $_FILES['aboutFl1']['name'], "img/aboutImg1." . pathinfo("img/" . $_FILES['aboutFl1']['name'])['extension']);

    // Create string for img path for in db
    $sDbImgPath = "img/aboutImg1." . pathinfo("img/" . $_FILES['aboutFl1']['name'])['extension'];

    // Update Database content
    updateHtmlContent($conn, "about", "topHeader", $sAboutHd);
    updateHtmlContent($conn, "about", "topText", $sAboutTxt);
    updateHtmlContent($conn, "about", "topImg", $sDbImgPath);

    // Return
    header('Location: ' . ROOT_URL . 'modules' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'dashboard');
  } else { //If there is no user input return to dashboard
    header('Location: ' . ROOT_URL . 'modules' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'dashboard');
  }
} else if (isset($_POST["submitSecond"])) { // Check if submit is pressed
  // Check if there is user input
  if (isset($_POST["aboutHd2"]) && isset($_POST["aboutTxt2"])) {
    // Catch user input
    $sAboutHd = $_POST["aboutHd2"];
    $sAboutTxt = $_POST["aboutTxt2"];

    // Set img path string
    $sImgPath = "img/" . $_FILES['aboutFl2']['name'];
    //use move uploaded file function to move your files
    move_uploaded_file($_FILES['aboutFl2']['tmp_name'], $sImgPath);
    // tmp_name is call temporary directory to store file and permanently its transter to m variable path

    // Rename uploaded file
    rename("img/" . $_FILES['aboutFl2']['name'], "img/aboutImg2." . pathinfo("img/" . $_FILES['aboutFl2']['name'])['extension']);

    // Create string for img path for in db
    $sDbImgPath = "img/aboutImg2." . pathinfo("img/" . $_FILES['aboutFl2']['name'])['extension'];

    // Update Database content
    updateHtmlContent($conn, "about", "lowerHeader", $sAboutHd);
    updateHtmlContent($conn, "about", "lowerText", $sAboutTxt);
    updateHtmlContent($conn, "about", "lowerImg", $sDbImgPath);

    // Return
    header('Location: ' . ROOT_URL . 'modules' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'dashboard');
  } else { //If there is no user input return to dashboard
    header('Location: ' . ROOT_URL . 'modules' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'dashboard');
  }
} else { // If submit is not pressed return to dashboard
  header('Location: ' . ROOT_URL . 'modules' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'dashboard');
}
