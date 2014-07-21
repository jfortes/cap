<?php

class view{

	public function renderNavigation($aCategoryList){

		$sHTML='';
		$sHTML.='<nav id="mainNav">';
		$sHTML.='<ul>';

		for($iCount=0;$iCount<count($aCategoryList);$iCount++){

			$oCategory = $aCategoryList[$iCount];

			$sHTML.='<li class="cat"><a href="listCategory.php?categoryID='.$oCategory->TypeID.'">'.$oCategory->TypeName.'</a></li>';
			

		}

		$sHTML.='<li id="login"><a href="login.html">login</a></li>';
		$sHTML.='<li id="register"><a href="register.html">register</a></li>';

		$sHTML.='</ul>';
		$sHTML.='</nav>';

		return $sHTML;

	}


	public function renderCategory($oCategory){

		$aProductList=$oCategory->Products;

		$sHTML='';
		$sHTML.='<ul>';
		for($iCount=0;$iCount<count($aProductList);$iCount++){

			$oProduct=$aProductList[$iCount];
			$sHTML.='<li>';
			$sHTML.='<div class="productone">';
			$sHTML.='<h2>'.$oProduct->ProductName.'</h2>';
			$sHTML.='<img src="assets/images/'.$oProduct->PhotoPath.'" alt="'.$oProduct->ProductName.'">';
			$sHTML.='<p>'.$oProduct->Description.'</p>';
			$sHTML.='<h3>NZD$'.$oProduct->Price.'</h3>';
			$sHTML.='<a href="">Add to Cart</a>';
			$sHTML.='</div>';
			$sHTML.='</li>';
		}

		$sHTML.='</ul>';

		return $sHTML; 
	}

}





?>