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
  if (isset($_POST["caption1"]) && isset($_POST["caption2"]) && isset($_POST["caption3"])) {

    // Update content in database
    updateHtmlContent($conn, "main", "caption1", $_POST["caption1"]);
    updateHtmlContent($conn, "main", "caption2", $_POST["caption2"]);
    updateHtmlContent($conn, "main", "caption3", $_POST["caption3"]);

    // Remove old imgs
    // Delete files using path from database
    unlink(getHtmlContent($conn, "main", "sliderImg1"));
    unlink(getHtmlContent($conn, "main", "sliderImg2"));
    unlink(getHtmlContent($conn, "main", "sliderImg3"));


    // Set img path string
    $sImgPath = "img/" . $_FILES['sliderImg1']['name'];

    //use move uploaded file function to move your files
    move_uploaded_file($_FILES['sliderImg1']['tmp_name'], $sImgPath);
    // tmp_name is call temporary directory to store file and permanently its transter to m variable path

    // Rename uploaded file
    rename("img/" . $_FILES['sliderImg1']['name'], "img/sliderImg1." . pathinfo("img/" . $_FILES['sliderImg1']['name'])['extension']);

    // Create string for img path for in db
    $sDbImgPath = "img/sliderImg1." . pathinfo("img/" . $_FILES['sliderImg1']['name'])['extension'];

    // Update Database content
    updateHtmlContent($conn, "main", "sliderImg1", $sDbImgPath);


    // Set img path string
    $sImgPath = "img/" . $_FILES['sliderImg2']['name'];

    //use move uploaded file function to move your files
    move_uploaded_file($_FILES['sliderImg2']['tmp_name'], $sImgPath);
    // tmp_name is call temporary directory to store file and permanently its transter to m variable path

    // Rename uploaded file
    rename("img/" . $_FILES['sliderImg2']['name'], "img/sliderImg2." . pathinfo("img/" . $_FILES['sliderImg2']['name'])['extension']);

    // Create string for img path for in db
    $sDbImgPath = "img/sliderImg2." . pathinfo("img/" . $_FILES['sliderImg2']['name'])['extension'];

    // Update Database content
    updateHtmlContent($conn, "main", "sliderImg2", $sDbImgPath);


    // Set img path string
    $sImgPath = "img/" . $_FILES['sliderImg3']['name'];
    //use move uploaded file function to move your files
    move_uploaded_file($_FILES['sliderImg3']['tmp_name'], $sImgPath);
    // tmp_name is call temporary directory to store file and permanently its transter to m variable path

    // Rename uploaded file
    rename("img/" . $_FILES['sliderImg3']['name'], "img/sliderImg3." . pathinfo("img/" . $_FILES['sliderImg3']['name'])['extension']);

    // Create string for img path for in db
    $sDbImgPath = "img/sliderImg3." . pathinfo("img/" . $_FILES['sliderImg3']['name'])['extension'];

    // Update Database content
    updateHtmlContent($conn, "main", "sliderImg3", $sDbImgPath);

    // Return
    header('Location: ' . ROOT_URL . 'modules' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'dashboard');
  } else { // If not everything was filled in return to dashboard
    header('Location: ' . ROOT_URL . 'modules' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'dashboard');
  }
} else { // If submit is not pressed return to dashboard
  header('Location: ' . ROOT_URL . 'modules' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'dashboard');
}
