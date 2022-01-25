<?php

//load controller
if (file_exists('../../controller.php')) {
    include('../../controller.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: controller.php does not exist.";
    echo $errorMessage;
    exit;
}

?>


<main class="admin-home">
    <section class="admin-home">
        <div class="admin-home-wrapper">
            <?php
                // Create query string
                $sQuery = "SELECT * FROM `filterterms` WHERE `id` = " . $_SESSION["sessionAccountId"];

                // Execute query and catch results in array
                if ($oResult = $conn->query($sQuery)) {
                    $aRow = $oResult->fetch_assoc();
                }

                // Create Query String
                $sQuery = "SELECT * FROM `filterterms` WHERE `term` = 'category'";
                // Execute query and catch result in array
                if ($oResult = $conn->query($sQuery)) {
                $sHtml = "<div>";
                while ($aRow = $oResult->fetch_assoc()) {
                    $sHtml .= "<div>" . $aRow["value"] . "</div>";
                }
                }

                $sCatagoryHtml = $sHtml;

                echo $sCatagoryHtml;

                // Create Query String
                $sQuery = "SELECT * FROM `filterterms` WHERE `term` = 'sector'";
                // Execute query and catch result in array
                if ($oResult = $conn->query($sQuery)) {
                $sHtml = "<div>";
                while ($aRow = $oResult->fetch_assoc()) {
                    $sHtml .= "<div>" . $aRow["value"] . "</div>";
                }
                }

                $sSectorHtml =  $sHtml . '</div>';

                // Create Query String
                $sQuery = "SELECT * FROM `filterterms` WHERE `term` = 'merk'";
                // Execute query and catch result in array
                if ($oResult = $conn->query($sQuery)) {
                $sHtml = "";
                while ($aRow = $oResult->fetch_assoc()) {
                    $sHtml .= "<option value='" . $aRow["value"] . "'>" . $aRow["value"] . "</option>";
                }
                }

                $sMerkHtml = $sHtml;

            ?>
        </div>
    </section>
</main>

<?php if ($_SESSION["sessionStatus"] == 1) {
    include "../../templates/footer-user.php";
  } else if ($_SESSION["sessionStatus"] == 2) {
    include "../../templates/footer-admin.php";
  } else {
    include "../../templates/footer.php";
  }
?>