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

// Create query string
$sQuery = "SELECT * FROM `users` WHERE `id` = " . $_SESSION["sessionAccountId"];

// Execute query and catch results in array
if ($oResult = $conn->query($sQuery)) {
    $aRow = $oResult->fetch_assoc();
}

?>


<main class="admin-home">
    <section class="admin-home">
        <h1>Hallo <?php echo $aRow["firstName"]; ?></h1>
        <div class="admin-home-wrapper">
            <?php
            // Create Query String
            $sQuery = "SELECT * FROM `filterterms` WHERE `term` = 'category'";
            // Execute query and catch result in array
            if ($oResult = $conn->query($sQuery)) {
                $sHtml = "<div class='categories'>";
                $sHtml .= "<h3>Bestaande Categoriën</h3>";
                while ($aRow = $oResult->fetch_assoc()) {
                    $sHtml .= "<div class='cs-item'>" . $aRow["value"] .
                        '<button class="product-data button small small-icon">
                            <i class="fas fa-trash no-margin"></i>
                        </button>
                    </div>';
                }
            }

            $sCatagoryHtml = $sHtml . '</div>';

            echo $sCatagoryHtml;

            // Create Query String
            $sQuery = "SELECT * FROM `filterterms` WHERE `term` = 'sector'";
            // Execute query and catch result in array
            if ($oResult = $conn->query($sQuery)) {
                $sHtml = "<div class='sectors'>";
                $sHtml .= "<h3>Bestaande Sectoren</h3>";
                while ($aRow = $oResult->fetch_assoc()) {
                    $sHtml .= "<div class='cs-item'>" . $aRow["value"] .
                        '<button class="product-data button small small-icon">
                            <i class="fas fa-trash no-margin"></i>
                        </button>
                    </div>';
                }
            }

            $sSectorHtml =  $sHtml . '</div>';
            echo $sSectorHtml;

            // Create Query String
            $sQuery = "SELECT * FROM `filterterms` WHERE `term` = 'sector'";
            // Execute query and catch result in array
            if ($oResult = $conn->query($sQuery)) {
                $sHtml = "<div class='small-users-overview'>";
                $sHtml .= "<h3>PLACEHOLDER</h3>";
                while ($aRow = $oResult->fetch_assoc()) {
                    $sHtml .= "<div class='cs-item'>" . "PLACEHOLDER"/*$aRow["value"]*/ .
                        '<button class="product-data button small small-icon">
                            <i class="fas fa-trash no-margin"></i>
                        </button>
                    </div>';
                }
            }

            $sSectorHtml =  $sHtml . '</div>';
            echo $sSectorHtml;

            // Create Query String
            $sQuery = "SELECT * FROM `products` WHERE `term` = 'sector'";
            // Execute query and catch result in array
            if ($oResult = $conn->query($sQuery)) {
                $sHtml = "<div class='small-products-overview'>";
                $sHtml .= "<h3>Products Overview</h3>";
                while ($aRow = $oResult->fetch_assoc()) {
                    $sHtml .= "<div class='cs-item'>" . $aRow["value"] .
                        '<button class="product-data button small small-icon">
                            <i class="fas fa-trash no-margin"></i>
                        </button>
                    </div>';
                }
            }

            $sSectorHtml =  $sHtml . '</div>';
            echo $sSectorHtml;
            ?>
        </div>
    </section>
</main>

<?php if ($_SESSION["sessionStatus"] == 1) {
    include "../../../templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
    include "../../../templates/footer-admin.php";
} else {
    include "../../../templates/footer.php";
}
?>