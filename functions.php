<?php

function cleaninput($tekst, $lengte)
{
  $tekst = substr($tekst, 0, $lengte);
  global $conn;
  $tekst = mysqli_real_escape_string($conn, $tekst);
  return $tekst;
}
function omdraaiendatum($datum)
{
  $temp = explode("-", $datum);
  $new = $temp[2] . "-" . $temp[1] . "-" . $temp[0];
  return $new;
}

function cleanoutput($tekst)
{
  return htmlentities($tekst);
}

function gettoken()
{
  $sToken = bin2hex(random_bytes(8)); //generates a crypto-secure 32 characters long 
  $_SESSION["tk"] = $sToken;
  return $sToken;
}

function sha256($string)
{
  $hashstring = hash("md5", $string);
  return $hashstring;
}

// checks if the file exists and includes it, if not returns error message
function fileExistsInclude($filePath)
{
  if (file_exists($filePath)) {
    include($filePath);
    exit;
  } else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: " . $filePath . " does not exist.";
    echo $errorMessage;
    exit;
  }
}

// Connection Object, Number of Rows int, Name of the Table string, Names of the Rows in a Array, Variable types for the values in string format, Values of the Rows in a array format
function preparedInsertIntoQuery($oConnect, $iNumberOfRows, $sTableName, $aRowNames, $sSql_types, $aValues)
{
  //Starting Prepared SQL
  $sPreparedSql = "";
  $sPreparedSql .= "INSERT INTO `" .  $sTableName . "` ";

  //Starting Rown Names part of the Prepared Statement
  $sPreparedSqlRowNames = "(";

  //Remove 1 for array handling
  $iNumberOfRows--;
  // Creating Int counter for the while loop
  $i = 0;

  // Adding Rownames to the sPreparedSqlRowNames string from the RowNames Array
  while ($i <= $iNumberOfRows) {
    // Checking where we are in the array, if we are not at the end we add a ", "
    if ($i < $iNumberOfRows) {
      $sPreparedSqlRowNames .= $aRowNames[$i];
      $sPreparedSqlRowNames .= ", ";
    }

    // Checking where we are in the array, if we are at the end we add a ")"
    if ($i == $iNumberOfRows) {
      $sPreparedSqlRowNames .= $aRowNames[$i] . ")";
    }
    // Add 1 to the counter
    $i++;
  }

  // Adding RowNames and " VALUES " to the Prepared Statement
  $sPreparedSql .= $sPreparedSqlRowNames . " VALUES ";

  // Starting Values string
  $sPreparedSqlValues = "(";

  // Creating Int counter for the while loop
  $j = 0;

  // Adding Values to the sPreparedSqlValues string from the Values Array
  while ($j <= $iNumberOfRows) {
    // Checking where we are in the array, if we are not at the end we add a "?, "
    if ($j < $iNumberOfRows) {
      $sPreparedSqlValues .= "?, ";
    }

    // Checking where we are in the array, if we are at the end we add a "?)"
    if ($j == $iNumberOfRows) {
      $sPreparedSqlValues .= "?)";
    }
    // Add 1 to the counter
    $j++;
  }

  // Finishing Prepared SQL statement
  $sPreparedSql .= $sPreparedSqlValues . ";";

  //Catch error
  if ($oConnect->prepare($sPreparedSql) == true) {
    //Bind and excecute Statement
    $stmt = $oConnect->prepare($sPreparedSql);
    // Merge arrays together to use in the bind_params
    $params = array_merge(array($sSql_types), $aValues);
    foreach ($params as $key => $value) {
      $params[$key] = &$params[$key];
    }

    // Binding parameters trough array
    call_user_func_array(array($stmt, "bind_param"), $params);

    // Execute Statement
    if ($stmt->execute()) {
      return true;
    } else {
      // Create error message and return false
      $errorMsg = "";
      $errorMsg .= "Execute failed.";
      echo $errorMsg;
      return false;
    }
  } else {
    // Create error message and exit
    $errorMsg = "";
    $errorMsg .= "Prepared Statement aint right.";
    echo $errorMsg;
    exit;
  }
}
