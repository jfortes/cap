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

		$sHTML.='<li id="login"><a href="log_in.php">login</a></li>';
		$sHTML.='<li id="register"><a href="registration.php">register</a></li>';

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
			$sHTML.='<a href="product_detail.php?productID='.$oProduct->ProductID.'">Add to Cart</a>';
			$sHTML.='</div>';
			$sHTML.='</li>';
		}

		$sHTML.='</ul>';

		return $sHTML; 
	}


	public function renderProduct($oProduct){

		$sHTML = '<div class="productone">';
		$sHTML .='<h2>'.$oProduct->ProductName.'</h2>';
		$sHTML .='<img src="assets/images/'.$oProduct->PhotoPath.'" alt="'.$oProduct->ProductName.'">';
		$sHTML .='<p>'.$oProduct->Description.'</p>';
		$sHTML .='<h3>NZD$'.$oProduct->Cost.'109</h3>';
		$sHTML .='<a href="">Add to Cart</a>';
		$sHTML .='</div>';

		return $sHTML; 
	}

	public function renderCustomerDetails($oCustomer){

		$sHTML = '';
		$sHTML .='<ul id="profilelist">';
		$sHTML .='<h3>User Profile</h3>';

		$sHTML .='<li>First Name:'.$oCustomer->FirstName.'</li>';
		$sHTML .='<li>Last Name:'.$oCustomer->LastName.'</li>';
		$sHTML .='<li>Address:'.$oCustomer->Address.'</li>';
		$sHTML .='<li>Telephone:'.$oCustomer->Telephone.'</li>';
		$sHTML .='<li>Email:'.$oCustomer->Email.'</li>';
		$sHTML .='</ul>';
		$sHTML .='<ul id="editprofile">';
		$sHTML .='<li><a href="edit.php">Edit</a></li>';
		$sHTML .='</ul>';

		return $sHTML; 

	}

	public function renderShoppingCart(){
		
	}





}





?>