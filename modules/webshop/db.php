<?php

    require_once(__DIR__ .  DIRECTORY_SEPARATOR . 'db.class.php');

    $oDb = new db('localhost','xlwerkkleding', 'root','');

    // we can now use the object

    $sql = "
            CREATE TABLE IF NOT EXISTS `product-toevoegen` (
            `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `naam` VARCHAR(255) NOT NULL,
            `gategorie` VARCHAR(255) NOT NULL,
            `merk` VARCHAR(100) NOT NULL,
            `beschrijving` VARCHAR(500),
            `prijs` int(5)
            )";

                $oDb->execute($sql);

                $sql1 = "INSERT INTO `test` (`firstname`, `lastname`, `email`,`date`)
                VALUES ('Persoon', 'Naam' , 'email@email.com', '" . time() . "');";

                $oDb->execute($sql1);

                // $sql = "SELECT * FROM `test`";
                // $aRecord = $oDb->select($sql);

                // print_r($aRecord);
?>