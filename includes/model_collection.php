<?php

require_once ("connection.php");
require_once ("model_category.php");

class collection{

	public function getAllCategories(){

		$aCategories = array();

		$oConnection = new connection();

		$sSQL = "SELECT TypeID
		FROM tbproducttype";

		$oResult = $oConnection->query($sSQL);

		while($aRow = $oConnection->fetch_array($oResult)){
			$oCategory = new category();
			$oCategory->load($aRow["TypeID"]);
			$aCategories[]=$oCategory;

		}

		$oConnection->close_connection(); 

		return $aCategories;

	}

}

//----------------------------- test
// $oCollection = new collection();

// $aAllCategories = $oCollection->getAllCategories();

// echo "<pre>";
// print_r($aAllCategories);
// echo "</pre>";


?>