<?php

require_once("includes/view.php");
require_once("includes/view_form.php");
require_once("includes/model_collection.php");
require_once("includes/model_category.php");
require_once("includes/model_cart.php");

// to render navigation: 
$oView = new View();
$oCollection = new Collection();
$oCollection->getAllCategories();

require_once("includes/product_detail_header.php"); 

session_start();

$iProductID = 1;
if(isset($_GET["ProductID"])){
	$iProductID = $_GET["ProductID"];
}

$oProduct = new Product();
$oProduct->load($iProductID);
$oForm = new Form();

if(isset($_POST["submit"])){
	if(isset($_SESSION["Cart"])){

		$oCart = $_SESSION["Cart"];
		$oCart->addtoCart($_GET["ProductID"], $_POST["quantity"]);

		header("Location:");
		// no location as of yet
		exit;

	} else {
		header("Location:log_in.php");
		exit;
	}
}

$oForm->makeSelectForm("Quantity: ", "quantity", $oProduct->stock);
$oForm->makeSubmit("Add to Cart", "submit");

echo $oView->renderProduct($oProduct);
echo $oForm->html;
echo 

?>







