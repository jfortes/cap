<?php

require_once("connection.php");
require_once("model_product.php"); 

class category{

	private $iTypeID;
	private $sTypeName;
	private $sDescription;
	private $iDisplayOrder;

	private $aProducts;

	public function __construct(){
		$this->iTypeID =0;
		$this->sTypeName ="";
		$this->sDescription ="";
		$this->iDisplayOrder = 0; 

		$this->aProducts = array(); 
	}

	public function load($iID){

		// open
		$oConnection = new Connection();

		// extract
		$sSQL = "SELECT TypeID, TypeName, Description, DisplayOrder
		FROM tbproducttype
		WHERE TypeID=".$iID;

		$oResult = $oConnection->query($sSQL);

		// fetch
		$aCategory = $oConnection->fetch_array($oResult);

		$this->iTypeID = $aCategory["TypeID"];
		$this->sTypeName = $aCategory["TypeName"];
		$this->sDescription = $aCategory["Description"];
		$this->iDisplayOrder = $aCategory["DisplayOrder"];

		// load products under the category
		$sSQL = "SELECT ProductID
		FROM tbproduct
		WHERE TypeID=".$iID;

		$oResult = $oConnection->query($sSQL);

		while($aRow = $oConnection->fetch_array($oResult)){
			$oProduct = new product();
			$oProduct->load($aRow["ProductID"]);
			$this->aProducts[]=$oProduct; 
		}
		// close
		$oConnection->close_connection();
	}

	public function save() {

		}

	public function __get($var){
		switch($var){
			case "TypeID";
				return $this->iTypeID;
				break;
			case "TypeName";
				return $this->sTypeName;
				break;
			case "Description";
				return $this->sDescription;
				break;
			case "DisplayOrder";
				return $this->iDisplayOrder;
				break;
			case "Products";
				return $this->aProducts;
				break;
			default:
				die($var. "this doesn't exist in category"); 
		}
	}

}


//---------------------------

// $oCategory = new category();
// $oCategory->load(1);

// echo "<pre>";
// print_r($oCategory);
// echo "</pre>";

?>
