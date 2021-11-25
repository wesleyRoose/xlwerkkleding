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
