<?php


require_once("includes/view_form.php");
require_once("includes/model_customer.php");

$sContainerID = "container";
require_once ("includes/header.php");

session_start();

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
	$oForm->checkFilled("first_name");
	$oForm->checkFilled("first_name");
	$oForm->checkFilled("first_name");
	$oForm->checkFilled("first_name");
}

$oForm->makeTextInput("*First Name","first_name");
$oForm->makeTextInput("*Last Name","last_name");
$oForm->makeTextInput("*Address","address");
$oForm->makeTextInput("*Telephone","telephone");
$oForm->makeTextInput("*Email","email");

echo $oForm->html;

require_once("includes/footer.php");

?>