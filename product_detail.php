<?php

require_once ("includes/view.php");
require_once("includes/model_collection.php");
// require_once("includes/model_cart.php"); 

session_start();

$oView = new View();
$oCollection = new collection();
$aAllCategories = $oCollection->getAllCategories();


$iProductID = 1;
if(isset($_GET["productID"])){
	$iProductID = $_GET["productID"];
}

$oProduct = new Product();
$oProduct->load($iProductID);


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
			<li id="fall"><a href="">fall collection</a></li>
		<div id="summer"><a href="">summer collection</a></div>
		<div id="fall"><a href="">fall collection</a></div> -->
	</section> 
	<section id="productcart">
		<ul>
			<li>
				<div class="cartlist">
				<h2><?php echo $oProduct->ProductName;?></h2>
				<img src="assets/images/<?php echo $oProduct->PhotoPath;?>" alt="Cap Signature Baseball Cap">
				<p><?php echo $oProduct->Description;?></p>

				<form action="addToCart.php" method="post" id="post" enctype="multipart/form-data">
					<label class="quantityTitle" for="quantity">Quantity: </label>
					<input type="number" min= "1" type="number" id="quantity"name="quantity_cart" value="1"/ >
					<input type="hidden" name="product_id" value="<?php echo $iProductID;?>"/ >
					<input type="submit" name="submit" value="Add to Cart" class="addcart"/>
				</form>
					
				<p id="totalcost">Total Cost: NZD$<?php echo $oProduct->Price;?></h3>
				
				<!-- <a href="log_in.php">Add to Cart</a> -->
				</div>
			</li>
			<!-- <li>
				<div class="producttwo">
				<h2>Black Leather Baseball Hat</h2>
				<img src="assets/images/2-summer.jpg" alt="Black Leather Baseball Hat">
				<p>Black perforated leather and leather, cotton lining, adjustable back closure with snap buttons</p>
				<h3>NZD$129</h3>
				<a href="">Add to Cart</a>
				</div>
			</li>
			<li>
				<div class="productthree">
				<h2>Cap with Horsebit Buckle</h2>
				<img src="assets/images/3-summer.jpg" alt="Cap with grommets, adjustable back, and horsebit buckle">
				<p>Beige/ebony original GG fabric with brown leather trim, silver hardware, made in NZ, luxury</p>
				<h3>NZD$109</h3>
				<a href="">Add to Cart</a>
				</div>
			</li>
			<li>
				<div class="productfour">
				<h2>Natural straw hat with leather</h2>
				<img src="assets/images/4-summer.jpg" alt="Natural straw hat with cuir leather detail">
				<p>Natural straw with cuir leather detail, palladium hardware, made in NZ, spur detail</p>
				<h3>NZD$159</h3>
				<a href="">Add to Cart</a>
				</div>
			</li>
			<li>
				<div class="productfive">
				<h2>Visor with web hook-loop back</h2>
				<img src="assets/images/5-summer.jpg" alt="Visor with web and adjustable hook-and-loop back">
				<p>Beige/ebony original GG fabric with green/red/green web and brown leather trim</p>
				<h3>NZD$99</h3>
				<a href="">Add to Cart</a>
				</div>
			</li>
			<li>
				<div class="productsix">
				<h2>Maple Brown Straw Fedora Hat</h2>
				<img src="assets/images/6-summer.jpg" alt="Maple Brown Straw Fedora Hat">
				<p>Maple brown straw, brown leather detail, maple brown leather detail, made in NZ</p>
				<h3>NZD$149</h3>
				<a href="">Add to Cart</a>
				</div>
			</li>
			<li>
				<div class="productseven">
				<h2>Beige Felt Fedora</h2>
				<img src="assets/images/7-summer.jpg" alt="Beige Felt Fedora">
				<p>Beige felt, light fine gold hardware, made in NZ, metal detail with Cap script, 100% felt</p>
				<h3>NZD$209</h3>
				<a href="">Add to Cart</a>
				</div>
			</li>
			<li>
				<div class="producteight">
				<h2>Original Canvas Baseball Hat</h2>
				<img src="assets/images/8-summer.jpg" alt="Original Canvas Baseball Hat">
				<p>Beige/ebony original canvas and red/dark grey/red web detail, made in NZ, adjustable hook-and-loop closure on back</p>
				<h3>NZD$109</h3>
				<a href="">Add to Cart</a>
				</div>
			</li>
		</ul> -->
	</section>
	<footer>
		<div id="footercontentdetail">
			<p>© 2014 Cap Ltd. All Rights Reserved. Powered by Insignia Ltd</p>
		</div>
	</footer>
</div>
	
 <script type="text/javascript">
        //The following script is for the group 2 navigation buttons.
        function switchAutoAdvance() {
            imageSlider.switchAuto();
            switchPlayPauseClass();
        }
        function switchPlayPauseClass() {
            var auto = document.getElementById('auto');
            var isAutoPlay = imageSlider.getAuto();
            auto.className = isAutoPlay ? "group2-Pause" : "group2-Play";
            auto.title = isAutoPlay ? "Pause" : "Play";
        }
        switchPlayPauseClass();
    </script>

</body>
</html>