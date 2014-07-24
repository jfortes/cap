<?php

require_once("includes/header.php"); 
require_once("includes/view_form.php");
require_once("includes/model_collection.php");
require_once("includes/model_cart.php"); 


session_start();

		if(isset($_SESSION["CustomerID"])) {

			$oCustomer = new Customer();
			$oCustomer->load($_SESSION["CustomerID"]);

		} else {
			$oForm = new Form();

			if(isset($_POST["submit"])) { 

				$oForm->data = $_POST; 

				$oForm->checkRequired("Username"); 
				$oForm->checkRequired("Password"); 

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

						header("Location:success_page.php"); 
						exit;

					}

				}

			}

			$oForm->makeInputText("Username", "username");
			$oForm->makeInputText("Password","password");
			$oForm->makeSubmitButton("Login", "submit");

			echo $oForm->html;

		}

// print_r($_SESSION);


?>