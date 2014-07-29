<?php

require_once ("connection.php");
require_once ("model_category.php");
require_once ("model_customer.php");

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

	public function findCustomerByUsername($sUserName){

		$oConnection = new Connection();

		$sSQL = "SELECT CustomerID
		FROM tbcustomer
		WHERE Username = '".$oConnection->escape_value($sUserName)."'";

		$oResult = $oConnection->query($sSQL);
		$aCustomer = $oConnection->fetch_array($oResult);
		$oConnection->close_connection();

		if($aCustomer != false){

			$oCustomer = new Customer();
			$oCustomer->load($aCustomer["CustomerID"]);
			return $oCustomer;

		}else{

			return false;
		}

	}

}

//----------------------------- test
// $oCollection = new collection();

// $aAllCategories = $oCollection->getAllCategories();

// echo "<pre>";
// print_r($aAllCategories);
// echo "</pre>";


?>