<?php

	class Cart{

		private $aContents;

		public function __construct(){

			$this->aContents = array();

		}

		public function addtoCart($iProductID, $iQuantity){

			if(isset($this->aContents[$iProductID])){

				$this->aContents[$iProductID] += $iQuantity;

			}else{

				$this->aContents[$iProductID] = $iQuantity;
			}

		}

		public function removefromCart($iProductID){

			$this->aContents[$iProductID] -= 1;

			if($this->aContents[$iProductID] <= 0) {

				unset($this->aContents[$iProductID]);
			}

		}

		public function __get($var){

			    switch($var) {
                case 'contents':
                    return $this->aContents;
                    break;
                default:
                    die($var . "does not exist in cart");
            }

		}

		public function __set($var, $value){

			switch($var) {
                case 'contents':
                    $this->aContents = $value;
                    break;
                default:
                    die($var . "does not exist in cart");

		}


	}


}

// test

// $oCart = new Cart();
// $oCart->addtoCart(3); 

// echo"<pre>";
// print_r($oCart);
// echo"</pre>";





?>