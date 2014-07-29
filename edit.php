<?php

// require_once("includes/view.php");
require_once("includes/view_form.php");
require_once("includes/model_customer.php");

session_start();

$sContainerID = "container";
require_once ("includes/header.php");

$oForm = new Form();

$iCustomerID = $_SESSION["CustomerID"];

$oCustomer = new Customer();
$oCustomer->load($iCustomerID);

$aExistingDetails = array();
$aExistingDetails["first_name"] = $oCustomer->FirstName;
$aExistingDetails["last_name"] = $oCustomer->LastName;
$aExistingDetails["address"] = $oCustomer->Address;
$aExistingDetails["telephone"] = $oCustomer->Telephone;
$aExistingDetails["email"] = $oCustomer->Email;

$oForm->data = $aExistingDetails;

if(isset($_POST["submit"])){

	$oForm->data = $_POST;

	$oForm->checkFilled("first_name");
	$oForm->checkFilled("last_name");
	$oForm->checkFilled("address");
	$oForm->checkFilled("telephone");
	$oForm->checkFilled("email");

	if($oForm->isValid){

		$oCustomer->FirstName = $_POST["first_name"];
		$oCustomer->LastName = $_POST["last_name"];
		$oCustomer->Address = $_POST["address"];
		$oCustomer->Telephone = $_POST["telephone"];
		$oCustomer->Email = $_POST["email"];

		$oCustomer->save();

		header("Location:listCategory.php");
		exit;
	}
}

$oForm->makeTextInput("*First Name","first_name");
$oForm->makeTextInput("*Last Name","last_name");
$oForm->makeTextInput("*Address","address");
$oForm->makeTextInput("*Telephone","telephone");
$oForm->makeTextInput("*Email","email");
$oForm->makeSubmit("Edit","submit"); 

echo $oForm->html;

require_once("includes/footer.php");

?>