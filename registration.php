<?php

require_once ("includes/model_collection.php");
require_once ("includes/view.php");
require_once ("includes/view_form.php");


$oCollection = new collection();
$aAllCategories = $oCollection->getAllCategories();

$oView = new view();


$oForm = new Form();

if(isset($_POST["submit"])){
	//HANDLE FORM SUBMIT

	$oForm->data = $_POST;

		$oForm->checkFilled("first_name");
		$oForm->checkFilled("last_name");
		$oForm->checkFilled("address");
		$oForm->checkFilled("telephone");
		$oForm->checkFilled("email");
		$oForm->checkFilled("username");
		$oForm->checkFilled("password");
		$oForm->checkMatch("password", "confirm_password");


	if($oForm->isValid){

		$oCustomer = new Customer();

		$oCustomer->firstname= $_POST["first_Name"];
		$oCustomer->lastname= $_POST["last_Name"];
		$oCustomer->address= $_POST["address"];
		$oCustomer->telephone= $_POST["telephone"];
		$oCustomer->email= $_POST["email"];
		$oCustomer->username= $_POST["username"];
		$oCustomer->password= $_POST["password"];

		$oCustomer->save();

		header ("location:listCategory.php");
		exit;

	}

}

$oForm->makeTextInput("*First Name","first_name");
$oForm->makeTextInput("*Last Name","last_name");
$oForm->makeTextInput("*Address","address");
$oForm->makeTextInput("*Telephone","telephone");
$oForm->makeTextInput("*Email","email");
$oForm->makeTextInput("*Username","username");
$oForm->makeTextInput("*Password","password");
$oForm->makeSubmit("Register","submit");

$sContainerID = "containerregister";
require_once ("includes/header.php");

?>

	<div id="form">
		<div class="registerform">
			
			<h3>Join Cap</h3>
			<?php
				echo $oForm->html;
			?>
		
			<!-- <form action="" method="post">
			
				<span class="errormessage"></span>
				<label for="firstname" class="formlabel">*First Name</label>
				<input type="text" id="first_name" name="first_name" value="" class="forminput">

				<span class="errormessage"></span>
				<label for="lastname" class="formlabel">*Last Name</label>
				<input type="text" id="last_name"name="last_name" value="" class="forminput">

				<span class="errormessage"></span>
				<label for="address" class="formlabel">*Address</label>
				<input type="text" id="address" name="address" value="" class="forminput">

				<span class="errormessage"></span>
				<label for="telephone" class="formlabel">*Telephone</label>
				<input type="text" id="telephone" name="telephone" value="" class="forminput">

				<span class="errormessage"></span>
				<label for="email" class="formlabel">*Email</label>
				<input type="text" id="email" name="email" value="" class="forminput">

				<span class="errormessage"></span>
				<label for="username" class="formlabel">*Username</label>
				<input type="text" id="username" name="username" value="" class="forminput">

				<span class="errormessage"></span>
				<label for="password" class="formlabel">*Password</label>
				<input type="text" id="password" name="password" value="" class="forminput">

				<input type="submit" name="submit" value="Register" class="forminput"/>
			</form> -->

		</div>
	</div>
		
	

	<footer>
		<div id="registerfooter">
			<p>© 2014 Cap Ltd. All Rights Reserved. Powered by Insignia Ltd</p>
		</div>
	</footer>
</div>
	
</body>
</html>