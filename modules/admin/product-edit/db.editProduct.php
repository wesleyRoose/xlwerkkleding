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

// Check if button is pressed 
if (isset($_POST["editProductButton"])) {

  // Catch data from form
  $aData = [
    "p_name" => $_POST["p_name"],
    "p_price" => $_POST["p_price"],
    "p_category" => $_POST["p_category"],
    "p_sector" => $_POST["p_sector"],
    "p_brand" => $_POST["p_brand"],
    "p_size" => implode(", ", $_POST["aSizes"]),
    "p_color" => implode(", ", $_POST["aColors"]),
    "p_description" => $_POST["p_description"]
  ];


  // Create Query string
  $sQuery = '';
  $sQuery = 'SELECT * FROM `product` WHERE p_id = "' . $_GET["product"] . '"';

  // Execute query and catch results in array
  if ($oResult = $conn->query($sQuery)) {
    $aRow = $oResult->fetch_assoc();
  }

  // If img is uploaded, add it to array
  if ($_FILES['p_file']['size'] != 0) {
    // Check if file exists, if so delete it
    if (file_exists('../add/' . $aRow["p_foto"])) {
      // Delete file using path from database
      unlink('../add/' . $aRow["p_foto"]);
    }
    // create one variable
    $sImgPath = "../add/img_product/" . $_FILES['p_file']['name'];
    //use move uploaded file function to move your files
    move_uploaded_file($_FILES['p_file']['tmp_name'], $sImgPath);
    // tmp_name is call temporary directory to store file and permanently its transter to m variable path

    $microtime =  $_SERVER['REQUEST_TIME'];

    // Rename uploaded file
    rename("../add/img_product/" . $_FILES['p_file']['name'], "../add/img_product/" . $_POST["p_sector"] . "-" . $microtime .  "." . pathinfo("../add/img_product/" . $_FILES['p_file']['name'])['extension']);

    // Create string for img path for in db
    $sDbImgPath = "img_product/" . $_POST["p_sector"] . "-" . $microtime . "." . pathinfo("../add/img_product/" . $_FILES['p_file']['name'])['extension'];

    // Add file path to db
    $aData += ["p_foto" => $sDbImgPath];
  }

  // Create sql String
  $sSql = "";
  $sSql .= "UPDATE `product` SET ";
  // If count == 8, dont include p_foto
  if (count($aData) == 8) {
    $sSql .= "p_name='" . $aData["p_name"] . "',p_price='" . $aData["p_price"] . "',p_category='" . $aData["p_category"] . "',p_sector='" . $aData["p_sector"] . "',p_brand='" . $aData["p_brand"] . "',p_size='" . $aData["p_size"] . "',p_color='" . $aData["p_color"] . "',p_description='" . $aData["p_description"] . "' WHERE p_id=" . $_GET["product"];
  } else if (count($aData) == 9) { // If count == 9, do include p_foto
    $sSql .= "p_name='" . $aData["p_name"] . "',p_price='" . $aData["p_price"] . "',p_category='" . $aData["p_category"] . "',p_sector='" . $aData["p_sector"] . "',p_brand='" . $aData["p_brand"] . "',p_size='" . $aData["p_size"] . "',p_color='" . $aData["p_color"] . "',p_description='" . $aData["p_description"] . "' ,p_foto='" . $sDbImgPath . "' WHERE p_id=" . $_GET["product"];
  }

  //Execute query and return to overview with a url parameter
  if ($db->query($sSql)) {
    header('Location: ' . ROOT_URL . 'modules/admin/product-overview/index.php?msg=edit');
    exit;
  }
} else { // If button was not pressed
  header('Location: ' . ROOT_URL . 'index.php');
}
