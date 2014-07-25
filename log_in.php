<?php

require_once("includes/header.php"); 
require_once("includes/view_form.php");
require_once("includes/model_collection.php");
require_once("includes/model_cart.php"); 


session_start();

$sContainerID = "container";
require_once ("includes/header.php");

		if(isset($_SESSION["CustomerID"])) {

			$oCustomer = new Customer();
			$oCustomer->load($_SESSION["CustomerID"]);

			echo "<p>Hi ".$oCustomer->FirstName.", you are already logged in. You must log out before you can log in another account</p>";

		} else {
			$oForm = new Form();

			if(isset($_POST["submit"])) { 

				$oForm->data = $_POST; 

				$oForm->checkFilled("Username"); 
				$oForm->checkFilled("Password"); 

				if($oForm->isValid == true) { 

					$oCollection = new Collection();
					$sCustomerUsername = $_POST["Username"]; 
					$oCustomer = $oCollection->findCustomerByUsername($sCustomerUsername); 


					if($oCustomer == false) { 

						$oForm->makeErrorMessage("Username","Username does not exist");

					} elseif($_POST["password"] !== $oCustomer->password) { 

							$oForm->makeErrorMessage("Password","Password does not match username"); 

					} else {

						$iCustomerID = $oCustomer->customerid; 

						$_SESSION["CustomerID"] = $iCustomerID;

						$oCart = new Cart();

						$_SESSION["Cart"] = $oCart;
						// print_r($_SESSION["Cart"]);

						header("Location:listCategory.php"); 
						exit;

					}

				}

			}

			$oForm->makeInputText("*Username", "username");
			$oForm->makeInputText("*Password","password");
			$oForm->makeSubmit("Register", "submit");

			echo $oForm->html;

		}

// print_r($_SESSION);

require_once("includes/footer.php"); 

?>