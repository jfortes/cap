<?php
	
	require_once("includes/view_form.php");

	session_start();

	$oForm = new Form();
	$oForm->makeSubmit("Logout","submit");

	if(isset($_POST["submit"])) {
		session_destroy();
		header("Location:listCategory.php");
		exit;
	}

?>
	





