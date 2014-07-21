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

<div id="container">
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

		echo $oView->renderNavigation($aAllCategories);
	?>

	<section>
	<div class="slide">
 		<div id="sliderFrame">
        	<div id="slider">
            	<img src="assets/images/slider-1.jpg" />
            	<img src="assets/images/slider-2.jpg" />
            	<img src="assets/images/slider-3.jpg" />
            	<img src="assets/images/slider-4.jpg" />
            	<img src="assets/images/slider-5.jpg" />
            	<img src="assets/images/slider-6.jpg" />
        	</div>
        <!--Custom navigation buttons on both sides-->
        	<div class="group1-Wrapper">
            	<a onclick="imageSlider.previous()" class="group1-Prev"></a>
            	<a onclick="imageSlider.next()" class="group1-Next"></a>
        	</div>
        <!--nav bar-->
        	<div style="text-align:center;padding:20px;z-index:20;">
            	<a onclick="imageSlider.previous()" class="group2-Prev"></a>
            	<a id='auto' onclick="switchAutoAdvance()"></a>
            	<a onclick="imageSlider.next()" class="group2-Next"></a>
        	</div>
    	</div>
	</div>

	</section>
	<!-- <section>
			<li id="summer"><a href="">summer collection</a></li>
			<li id="fall"><a href="">fall collection</a></li> -->
		<!-- <div id="summer"><a href="">summer collection</a></div>
		<div id="fall"><a href="">fall collection</a></div> -->
	</section>
	<section id="product">