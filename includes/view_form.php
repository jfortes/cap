<?php

	class Form{

		private $sHTML;
		private $aData;
		private $aError;

		public function __construct(){

			$this->sHTML = '<form action="" method="post">';
			$this->aData = array();
			$this->aError = array(); 
		}



	public function makeTextInput($sLabel,$sControlName){

		$sData = "";

		if(isset($this->aData[$sControlName])){
		$sData = $this->aData[$sControlName];
		}

		$sError ="";

		if(isset($this->aError[$sControlName])){
			$sError = $this->aError[$sControlName];
		}

		$this->sHTML .= '<span class="errormessage">'.$sError.'</span>';
		$this->sHTML .= '<label for="'.$sControlName.'" class="formlabel">'.$sLabel.'</label>';
		$this->sHTML .= '<input type="text" id="'.$sControlName.'" name="'.$sControlName.'" value="'.$sData.'" class="forminput"/>';

	}

	public function makeSubmit($sValue,$sControlName){

		$this->sHTML .= '<input type="'.$sControlName.'" name="'.$sControlName.'" value="'.$sValue.'" class="forminput"/>';
	
	}

	public function checkFilled($sControlName){

		$sData = "";

		if(isset($this->aData[$sControlName])){
			$sData = $this->aData[$sControlName];
		}

		if(trim($sData)==""){
			$this->aError[$sControlName] = "Please fill blank";
		}
	}

	public function checkMatch($sControlName1,$sControlName2){

			$sData1 ="";

			if(isset($this->aData[$sControlName1])){
				$sData1 = $this->aData[$sControlName1];
			}

			$sData2 ="";

			if(isset($this->aData[$sControlName2])){
				$sData2 = $this->aData[$sControlName2];
			}

			if($sData1!=$sData2){
				$this->aError[$sControlName2] = "Must match";
			}

		}

	public function makeErrorMessage($sControlName, $sMessage){

			$this->aErrors[$sControlName] = $sMessage;

		}

	public function __get($var){

		switch($var) {
				case "html":
					return $this->sHTML . '</form>';
					break;
				case "isValid":
					if((count($this->aError))==0){
						return true; 
					}else{
						return false; 
					}
					break;
				default:
			 		die("fails");

					}

	}

	public function checkUpload($sControlName, $sMimeType, $iSize){

	$sErrorMessage = "";

			if(empty($this->aFiles[$sControlName]["name"])) {

				$sErrorMessage = "No files are specified";

			}  elseif($this->aFiles[$sControlName]['error'] != UPLOAD_ERR_OK) {

				$sErrorMessage = "File cannot be uploaded";

			} elseif($this->aFiles[$sControlName]["type"] != $sMimeType) {

				$sErrorMessage = "Only " . $sMimeType . " format can be uploaded";

			} elseif($this->aFiles[$sControlName]["size"] > $iSize) {

				$sErrorMessage = "Files canot exceed " . $iSize . " bytes in size";

			} 

			if($sErrorMessage != "") {

				$this->aErrors[$sControlName] = $sErrorMessage;

			}

	}

	public function __set($var, $value) {

		switch($var) {
				case "data":
					$this->aData=$value;
					break;
				default:
			 		die("fails");


		}
			}


}





?>