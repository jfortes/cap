<?php

require_once ("includes/model_collection.php");
require_once ("includes/view.php");


$oCollection = new collection();
$aAllCategories = $oCollection->getAllCategories();

$oView = new view();

$iCategoryID = 1;

if(isset($_GET["categoryID"])){
	$iCategoryID = $_GET["categoryID"];
}


$oCategory = new category();
$oCategory->load($iCategoryID);

require_once ("includes/header.php");

//html for products will go here
echo $oView->renderCategory($oCategory);

require_once ("includes/footer.php");
?>