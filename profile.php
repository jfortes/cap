<?php
require_once ("includes/view.php");
require_once("includes/model_collection.php");
// require_once("includes/model_cart.php"); 

session_start();

$oView = new View();
$oCollection = new collection();
$aAllCategories = $oCollection->getAllCategories();

$sContainerID = "container";

require_once("includes/header.php");


	if(isset($_SESSION["CustomerID"])) {

		$iCustomerID = $_SESSION["CustomerID"];
		$oCustomer = new Customer();
		$oCustomer->load($iCustomerID);

		$sHTML = '';
		$sHTML .='<ul id="profilelist">';
		$sHTML .='<h3>User Profile</h3>';

		$sHTML .='<li>First Name:'.$oCustomer->FirstName.'</li>';
		$sHTML .='<li>Last Name:'.$oCustomer->LastName.'</li>';
		$sHTML .='<li>Address:'.$oCustomer->Address.'</li>';
		$sHTML .='<li>Telephone:'.$oCustomer->Telephone.'</li>';
		$sHTML .='<li>Email:'.$oCustomer->Email.'</li>';
		$sHTML .='</ul>';
		$sHTML .='<ul id="editprofile">';
		$sHTML .='<li><a href="edit.php">Edit</a></li>';
		$sHTML .='</ul>';

		echo $sHTML;

	}else{

		echo "<p id='editError'>You must login before you can view your profile</p>";
	}

require_once("includes/footer.php");	

?>