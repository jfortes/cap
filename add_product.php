<?php

define("MAX_SIZE","10000000");
require_once("includes/view.php");
require_once("includes/view_form.php");
require_once("includes/model_collection.php");
require_once("includes/model_product.php");

$oView = new View();
$oCollection = new Collection();
$aAllCategories = $oCollection->getAllCategories();


$sContainerID = "container";
require_once ("includes/header.php");

?>
<h3 id="addproduct">Add New Product</h3>

<?php

$oForm = new form();

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";


if(isset($_POST["submit"])){
	$oForm->data = $_POST;
	$oForm->files = $_FILES;

	$oForm->checkFilled("ProductName");
	$oForm->checkFilled("Description");
	$oForm->checkFilled("Price");
	$oForm->checkFilled("TypeID");
	$oForm->checkUpload("photo", "image/jpeg", MAX_SIZE);

	if($oForm->isValid){

		$sPhotoName = "product_".date("Y-m-d-H-i-s").".jpg";

		$oProduct = new product();
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
$oForm->makeTextInput("TypeID","TypeID");
$oForm->makeHiddenField("MAX_FILE_SIZE", MAX_SIZE);
$oForm->makeUpLoadBox("Photo","photo");
$oForm->makeSubmit("Submit","submit");

echo $oForm->html;



?>