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

		$oConnection = new Connection();

			$sSQL = "INSERT INTO  tbproduct (ProductName, Description, Price, TypeID, PhotoPath)
					VALUES ( '".$oConnection->escape_value($this->sProductName)."',  
						'".$oConnection->escape_value($this->sDescription)."',  
						'".$oConnection->escape_value($this->iCost)."', 
						'".$oConnection->escape_value($this->iTypeID)."',   
						'".$oConnection->escape_value($this->sPhotoPath)."')";
	
			$bResult = $oConnection->query($sSQL);

			if($bResult == true) {
				$this->iProductID = $oConnection->get_insert_id();
			} else {
				die($sSQL . "is not a valid query");
			}

			$oConnection->close_connection();

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

	public function __set($var, $value){

		switch($var){
			case "ProductID":
					$this->iProductID = $value;
					break;
			case "ProductName":
					$this->sProductName = $value;
					break;
			case "Description":
					$this->sDescription = $value;
					break;
			case "Price":
					$this->iCost = $value;
					break;
			case "TypeID":
					$this->iTypeID = $value;
					break;
			case "PhotoPath":
					$this->sPhotoPath = $value;
					break;
			default:
					die($var . "cannot be set in Product");
		}
	}


	}

//------------------------------ testing

// $oProduct = new product();

// $oProduct->ProductName = "Name test";
// $oProduct->Description = "Description test";
// $oProduct->Price = 99;
// $oProduct->TypeID = 1;
// $oProduct->PhotoPath = "test.jpg";
// $oProduct->save();

// echo"<pre>";
// print_r($oProduct);
// echo "</pre>";

?>