<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cap</title>
	<link rel="stylesheet" type="text/css" href="assets/styles.css">
	<link rel="stylesheet" href="assets/themes/4/js-image-slider.css" type="text/css">
	<script src = "assets/themes/4/js-image-slider.js" type="text/javascript" ></script>
	 <link href="assets/generic.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div id="<?php echo $sContainerID; ?>">
	<header>
		<div id="facebook"><a href=""><img src="assets/images/facebook.png" alt=""></a></div>
		<div id="twitter"><a href=""><img src="assets/images/twitter.png" alt=""></a></div>
		<div id="google"><a href=""><img src="assets/images/google.png" alt=""></a></div>
		<div id="logo"><img src="assets/images/cap.png" alt="Cap logo"></div>
	</header>

	<!-- <nav>
		<ul>
			<li id="summer"><a href="">summer 15</a></li>
			<li id="fall"><a href="">fall 15</a></li>

			<li id="login"><a href="login.html">login</a></li>
			<li id="register"><a href="register.html">register</a></li>
		</ul>
	</nav> -->

	<?php
		// $oView = new View();
		echo $oView->renderNavigation($aAllCategories);
	?>

	