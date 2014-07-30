<?php

require_once ("includes/view.php");
require_once("includes/view_form.php");
require_once("includes/model_collection.php");
require_once("includes/model_cart.php"); 

session_start();

$oView = new View();
$oCollection = new collection();
$aAllCategories = $oCollection->getAllCategories();

$sContainerID = "container";
require_once ("includes/header.php");


$sFormHTML = "";

		if(isset($_SESSION["CustomerID"])) {

			$oCustomer = new Customer();
			$oCustomer->load($_SESSION["CustomerID"]);

			echo "<p id='hello'>Hi ".$oCustomer->FirstName.", you are already logged in.";
			echo "<p id='showprofile'><a href='profile.php'>View Customer Profile</a>";
			echo "<p id='log'><a href='log_out.php'>Log Out</a></p>";
	

		} else {
			$oForm = new Form();

			if(isset($_POST["submit"])) { 

				$oForm->data = $_POST; 

				$oForm->checkFilled("username"); 
				$oForm->checkFilled("password"); 

				if($oForm->isValid == true) { 

					$oCollection = new Collection();
					$sCustomerUsername = $_POST["username"]; 
					$oCustomer = $oCollection->findCustomerByUsername($sCustomerUsername); 


					if($oCustomer == false) { 

						$oForm->makeErrorMessage("username","Username does not exist");

					} elseif($_POST["password"] !== $oCustomer->Password) { 

							$oForm->makeErrorMessage("username","Password does not match username"); 

					} else {

						$iCustomerID = $oCustomer->CustomerID; 

						$_SESSION["CustomerID"] = $iCustomerID;

						$oCart = new Cart();

						$_SESSION["Cart"] = $oCart;
						// print_r($_SESSION["Cart"]);

						header("Location:listCategory.php"); 
						exit;

					}

				}

			}

			$oForm->makeTextInput("*Username", "username");
			$oForm->makeTextInput("*Password","password");
			$oForm->makeSubmit("Log In", "submit");

			$sFormHTML = $oForm->html;

		}

// print_r($_SESSION);


?>

<div id="mainlogin">
		<div class="registerlogin">
			
		<!-- 	<h3>Log In</h3> -->

			<?php echo $sFormHTML;?>

		</div>

	</div>


<?php		

// require_once("includes/footer.php"); 

?>