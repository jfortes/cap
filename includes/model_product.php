<?php

require_once("connection.php"); 

	class product{

		private $iProductID;
		private $sProductName;
		private $sDescription;
		private $iCost;
		private $iTypeID;
		private $sPhotoPath;

	public function __construct(){
			$this->iProductID =0;
			$this->sProductName ="";
			$this->sDescription =""; 
			$this->iCost = 0;
			$this->iTypeID=0;
			$this->sPhotoPath="";
	}

	public function load($iID){

		// Open
		$oConnection = new Connection();

		// Extract
		$sSQL = "SELECT ProductID, ProductName, Description, Price, TypeID, PhotoPath
		FROM tbproduct
		WHERE ProductID =".$iID;

		$oResult = $oConnection->query($sSQL);

		// fetch
		$aProduct = $oConnection->fetch_array($oResult);

		$this->iProductID =$aProduct["ProductID"];
		$this->sProductName =$aProduct["ProductName"];
		$this->sDescription =$aProduct["Description"];
		$this->iCost =$aProduct["Price"];
		$this->iTypeID =$aProduct["TypeID"];
		$this->sPhotoPath =$aProduct["PhotoPath"];

		// close

		$oConnection->close_connection();

	}

	public function save(){

	}

	public function __get($var){

		switch($var){
			case "ProductID":
					return $this->iProductID;
					break;
			case "ProductName":
					return $this->sProductName;
					break;
			case "Description":
					return $this->sDescription;
					break;
			case "Price":
					return $this->iCost;
					break;
			case "TypeID":
					return $this->iTypeID;
					break;
			case "PhotoPath":
					return $this->sPhotoPath;
					break;
			default:
					die($var . "does not exist in Product");
		}
	}



	}

//------------------------------ testing

// $oProduct = new product();

// $oProduct->load(1);
// echo"<pre>";
// print_r($oProduct);
// echo "</pre>";

?>