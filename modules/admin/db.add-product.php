<?php

//Start Session
session_start();


//Include Files
if (file_exists('../../config.php')) {
  include('../../config.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: ../../config.php does not exist.";
  echo $errorMessage;
  exit;
}

if (file_exists('../../functions.php')) {
  include('../../functions.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: ../../functions.php does not exist.";
  echo $errorMessage;
  exit;
}

if ($_SESSION["sessionStatus"] != 2 || empty($_SESSION["sessionStatus"])) {
  header('Location: ' . ROOT_URL . 'index.php');
} else {




//database voor product
$servername = "localhost";
$username = "";
$password = "";
$dbname = "xlwerkkleding";

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE 'product' (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
p_name VARCHAR(100) NOT NULL,
p_price int(5) NOT NULL,
p_category VARCHAR(75)NOT NULL, 
p_sector VARCHAR(100) NOT NULL,
p_brand VARCHAR(100) NOT NULL,
p_size int(4) NOT NULL,
p_color VARCHAR(50) NOT NULL,
p_description text() NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$sql = "INSERT INTO product (p_name, p_price, p_category, p_sector, p_brand, p_size, p_color, p_description )
VALUES (?,?,?,?,?,?,?,?)";

// if ($conn->query($sql) === TRUE) {
//   echo "Table product created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }




  // Check if button is pressed
  if (isset($_POST["addProductButton"])) {
    // Check if nothing is empty
    if (!empty($_POST["p_name"]) && !empty($_POST["p_price"]) && !empty($_POST["p_category"]) && !empty($_POST["p_sector"]) && !empty($_POST["p_brand"]) && !empty($_POST["p_size"]) && !empty($_POST["p_color"]) && !empty($_POST["p_description"])/* && !empty($_POST["foto"])*/) {



      // // PLACEHOLDER MUST REPLACE
      // var_dump($_POST["p_file"]);
      // $p_foto = $_POST["p_file"];

      // Clean inputs for not wanted characters
      $p_name = cleaninput($_POST['p_name'], 100);
      $p_price = cleaninput($_POST['p_price'], 5);
      $p_category = cleaninput($_POST['p_category'], 75);
      $p_sector = cleaninput($_POST['p_sector'], 100);
      $p_brand = cleaninput($_POST['p_brand'], 100);
      $p_size = cleaninput($_POST['p_size'], 4);
      $p_color = cleaninput($_POST['p_color'], 50);
      $p_description = cleaninput($_POST['p_description'], 150);

      // Create header location url for a succesfull insert
      $sLocationSucces = "";
      $sLocationSucces .= 'Location: ' . ROOT_URL . 'modules/other/succes.php';


      // Create header location url for a not succesfull insert
      $sLocationFailure = "";
      $sLocationFailure = 'Location: ' . ROOT_URL . 'modules/other/failure.php';

      $p_foto = "Test";
      // Create Arrays for function parameters
      $aRowNames = array("p_name", "p_price", "p_category", "p_sector", "p_brand", "p_size", "p_color", "p_description", "p_foto");

      $aValues = array($p_name, $p_price, $p_category, $p_sector, $p_brand, $p_size, $p_color, $p_description, $p_foto);
      if (preparedInsertIntoQuery($conn, 9, "product", $aRowNames, "sissssss", $aValues)) {
        header($sLocationSucces);
      } else {
        // header($sLocationFailure);
        echo preparedInsertIntoQuery($conn, 9, "product", $aRowNames, "sisssssss", $aValues);
      }
    }
  }



  // //file upload directory
  // $targetDir = "./img/product_images/";

  // if (isset($_POST["addProductButton"])) {
  //   if (!empty($_FILES["file"]["product_images"])) {
  //     $fileName = basename($_FILES["file"]["product_images"]);
  //     $targetFilePath = $targetDir . $fileName;
  //     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

  //     //Allow certain file format

  //     $allowTypes = array('jpg', 'png', 'gif', 'pdf');
  //     if (in_array($fileType, $allowTypes)) {

  //       //upload file to server
  //       if (move_uploaded_file($_FILES["img"]["product_images"], $targetFilePath)) {

  //         //insert image file name into database
  //         $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('" . $fileName . "', NOW())");
  //         if ($insert) {
  //           $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
  //         } else {
  //           $statusMsg = "File upload failed, please try again.";
  //         }
  //       } else {
  //         $statusMsg = "Sorry, there was an error uploading your file.";
  //       }
  //     } else {
  //       $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
  //     }
  //   } else {
  //     $statusMsg = 'Please select a file to upload.';
  //   }
  // } else {
  //   echo "Hello World";
  // }

  // // Display status message
  // if (isset($statusMsg)) {
  //   echo $statusMsg;
  // }
}

