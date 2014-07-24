<?php

require_once ("includes/model_collection.php");
require_once ("includes/view.php");


$oCollection = new collection();
$aAllCategories = $oCollection->getAllCategories();

$oView = new view();

$iCategoryID = 1;

if(isset($_GET["categoryID"])){
	$iCategoryID = $_GET["categoryID"];
}


$oCategory = new category();
$oCategory->load($iCategoryID);

$sContainerID = "container";
require_once ("includes/header.php");

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

<?php
//html for products will go here
echo $oView->renderCategory($oCategory);

require_once ("includes/footer.php");
?>