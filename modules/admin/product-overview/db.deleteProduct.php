<?php

$sQuery = "DELETE FROM `products` WHERE `p_id` = " . $_GET["product"];

//Execute query and catch results in array
if ($db->query($sQuery)) {
header('Location: ' . ROOT_URL . 'modules/admin/product-overview/index.php?msg=del');
exit;
}


?>