<?php

class db
{

  private $dbServername = "localhost";
  private $dbUsername = "";
  private $dbPassword = "";
  private $dbName = "";
  private $oConnection = null;

  function __construct()
  {
    $this->dbServername = "localhost";
    $this->dbUsername = "root";
    $this->dbPassword = "";
    $this->dbName = "xlwerkkleding";
    $this->oConnection = mysqli_connect($this->dbServername, $this->dbUsername, $this->dbPassword, $this->dbName);
  }

  // Execute Prepared Statement
  // Connection Object,Type in the form of a string, prepared sql statement in form of a string, variable types in form of a string, values in form of a Array
  private function executePreparedStatement($sType, $sPreparedSql, $sSql_types, $aValue)
  {
    //Catch error
    if ($this->oConnection->prepare($sPreparedSql) == true) {
      //Bind and excecute Statement
      $stmt = $this->oConnection->prepare($sPreparedSql);
      // Merge arrays together to use in the bind_params
      $params = array_merge(array($sSql_types), $aValue);
      foreach ($params as $key => $value) {
        $params[$key] = &$params[$key];
      }

      // Binding parameters trough array
      call_user_func_array(array($stmt, "bind_param"), $params);

      // Execute Statement
      if ($stmt->execute()) {
        // Check what kind of statement is used
        if ($sType == "SELECT") {
          // If $sType is SELECT get results and return a array
          $result = $stmt->get_result();
          //Catch result in a array
          $data = mysqli_fetch_array($result);
          return $data;
        } else if ($sType == "INSERT") {
          // If $sType is INSERT return true
          return true;
        }
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
      $errorMsg .= "Prepared Statement: " . $sPreparedSql . " aint right.";
      echo $errorMsg;
      exit;
    }
  }



  private function addPreparedValues($iNumberOfColumns)
  {
    // Starting Values string
    $sPreparedSqlValues = "(";

    // Creating Int counter for the while loop
    $j = 0;

    // Adding Values to the sPreparedSqlValues string from the Values Array
    while ($j <= $iNumberOfColumns) {
      // Checking where we are in the array, if we are not at the end we add a "?, "
      if ($j < $iNumberOfColumns) {
        $sPreparedSqlValues .= "?, ";
      }

      // Checking where we are in the array, if we are at the end we add a "?)"
      if ($j == $iNumberOfColumns) {
        $sPreparedSqlValues .= "?)";
      }
      // Add 1 to the counter
      $j++;
    }
    return $sPreparedSqlValues;
  }


  // Connection Object, Name of the Table string, Names of the Columns in a Array, Variable types for the values in string format, Values of the Columns in a array format
  function insert($sTableName, $aColumnName, $sSql_types, $aValues)
  {
    if (sizeof($aColumnName) == sizeof($aValues) && sizeof($aColumnName) == strlen($sSql_types)) {


      $iNumberOfColumns = sizeof($aColumnName);

      //Starting Prepared SQL
      $sPreparedSql = "";
      $sPreparedSql .= "INSERT INTO `" .  $sTableName . "` ";

      //Starting Columnn Names part of the Prepared Statement
      $sPreparedSqlColumnName = "(";

      //Remove 1 for array handling
      $iNumberOfColumns--;
      // Creating Int counter for the while loop
      $i = 0;
      // Adding ColumnName to the sPreparedSqlColumnName string from the ColumnName Array
      while ($i <= $iNumberOfColumns) {
        // Checking where we are in the array, if we are not at the end we add a ", "
        if ($i < $iNumberOfColumns) {
          $sPreparedSqlColumnName .= $aColumnName[$i];
          $sPreparedSqlColumnName .= ", ";
        }
        // Checking where we are in the array, if we are at the end we add a ")"
        if ($i == $iNumberOfColumns) {
          $sPreparedSqlColumnName .= $aColumnName[$i] . ")";
        }
        // Add 1 to the counter
        $i++;
      }
      // Adding ColumnName and " VALUES " to the Prepared Statement
      $sPreparedSql .= $sPreparedSqlColumnName . " VALUES ";

      $sPreparedSqlValues = $this->addPreparedValues($iNumberOfColumns);

      // Finishing Prepared SQL statement
      $sPreparedSql .= $sPreparedSqlValues . ";";

      // Call function to execute statement
      $this->executePreparedStatement("INSERT", $sPreparedSql, $sSql_types, $aValues);
    } else {
      echo "Lengths don't matchup";
    }
  }


  // Select query
  // Connection object, table name in form of a string, where selector in form of a array, variable types in form of a string, values in form of a Array
  public function select($sTableName, $aWhereValue, $sSql_types, $aColumnValue)
  {
    //Set Vars
    $iNumberOfColumns = sizeof($aColumnValue);
    $iNumberOfColumns--;

    // Starting Prepared SQL String
    $sPreparedSql = '';
    $sPreparedSql .= 'SELECT * FROM ' . $sTableName . ' WHERE ' . $aWhereValue[0] . '=?';
    //Creating counter for while loop
    $i = 1;
    if (sizeof($aWhereValue) > 0) {
      //Starting Extension for the 
      $sPreparedSqlExtension = '';
      while ($i <= $iNumberOfColumns) {
        $sPreparedSqlExtension .= ' AND ' . $aWhereValue[$i];
        $sPreparedSqlExtension .= '=?';
        // Add 1 to the counter
        $i++;
      }
      $sPreparedSql .= $sPreparedSqlExtension;
    }
    // Call function to execute statement
    return $this->executePreparedStatement("SELECT", $sPreparedSql, $sSql_types, $aColumnValue);
  }

  // $SQL = $db_found->prepare("UPDATE members SET username=?, password=? WHERE email=?");

  public function doUpdateQuery($sTableName, $sWhereValue, $sSql_types, $aColumnName, $aNewValue)
  {
    //Set Vars
    $iNumberOfColumns = sizeof($aColumnName);
    $iNumberOfColumns--;

    // Starting Prepared SQL String
    $sPreparedSql = '';
    $sPreparedSql .= 'UPDATE ' . $sTableName . 'SET ';
    //Creating counter for while loop
    $i = 0;
    //Starting Extension for the 
    $sPreparedSqlExtension = '';
    while ($i <= $iNumberOfColumns) {
      if ($i < $iNumberOfColumns) {
        $sPreparedSqlExtension .= $aColumnName[$i];
        $sPreparedSqlExtension .= "=?, ";
      }
      if ($i == $iNumberOfColumns) {
        $sPreparedSqlExtension .= $aColumnName[$i];
      }
      // Add 1 to the counter
      $i++;
    }

    $sPreparedSql .= $sPreparedSqlExtension . ' WHERE ' . $sWhereValue . '=?';
    // Call function to execute statement
    $this->executePreparedStatement("SELECT", $sPreparedSql, $sSql_types, $aNewValue);
  }
}
