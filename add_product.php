<?php


define("MAX_SIZE","10000000");
require_once("includes/view.php");
require_once("includes/view_form.php");
require_once("includes/model_collection.php");
require_once("includes/model_product.php");

$oView = new View();
$oCollection = new Collection();
$aProducttypes = $oCollection->getAllCategories();


$sContainerID = "container";
require_once ("includes/header.php");

?>
<h3>Add new product</h3>
<?php

$oForm = new form();

if(isset($_POST["submit"])){
	$oForm->data = $_POST;
	$oForm->files = $_FILES;

	$oForm->checkFilled("ProductName");
	$oForm->checkFilled("Description");
	$oForm->checkFilled("Price");
	$oForm->checkFilled("TypeID");
	// $oForm->checkFilled("PhotoPath");
	$oForm->checkUpload("PhotoPath", "image/jpeg", MAX_SIZE);

	if($oForm->isValid){

		$sPhotoName = "assets/images/product".date("Y-m-d-H-i-s").".jpg";

		$oProduct = new Product();
		$oProduct->ProductName = $_POST["ProductName"];
		$oProduct->Description = $_POST["Description"];
		$oProduct->Price = $_POST["Price"];
		$oProduct->TypeID = $_POST["TypeID"];
		$oProduct->PhotoPath = $sPhotoName;

		$oForm->moveFile("photo", $sPhotoName);

		$oProduct->save();

		header("Location:listCategory.php");
		exit;

	}

}

$oForm->makeTextInput("Product Name","ProductName");
$oForm->makeTextInput("Description","Description");
$oForm->makeTextInput("Price","Price");
$oForm->makeTextInput("Collection","TypeID");
$oForm->makeHiddenField("MAX_FILE_SIZE", MAX_SIZE);
$oForm->makeUpLoadBox("Photo","photo");
$oForm->makeSubmit("Submit","submit");

echo $oForm->html;




?>