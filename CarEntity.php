<?php
class CarEntity{
	private $cName;
	private $cType;
	private $cModel;
	private $cCompany;
	private $cPlate;
	private $cRent;
	private $cCondition;
	private $cStatus;
	private $cColor;
    private $cImage;
    private $cID;


	public function __construct(){}

	public function setCarID($value){
		$this->cID=$value;
	}

	public function setCarName($value){
		if($value!=""){
			$this->cName=$value;
		}
		else{
			$thsi->cName="undefined";
		}

	}
	public function setCarType($value){
		if($value!=""){
			$this->cType=$value;
		}
		else{
			$this->cType="undefined";
		}
	}
	public function setCarModel($value){
		if($value!=0){
			$this->cModel=$value;
		}
		else{
			$this->cModel=0;
		}
	}
	public function setCarCompany($value){
		if($value!=""){
			$this->cCompany=$value;
		}
		else{
			$this->cCompany="undefined";
		}
	}
	public function setCarNumberPlate($value){
		if($value!=""){
			$this->cPlate=$value;
		}
		else{
			$this->cPlate="undefined";
		}
	}
	public function setCarRent($value){
		if($value!=0 && $value>999){
			$this->cRent=$value;
		}
		else{
			$this->cRent=1000;
		}

	}
	public function setCarCondition($value){
		if($value!=""){
			$this->cCondition=$value;
		}
		else{
			$this->cCondition="undefined";
		}
	}

	public function setCarStatus($cStatus){
		if($cStatus!=""){
			$this->cStatus=$cStatus;

		}
		else{
			$this->cStatus="undefined";
		}
	}

	public function setCarColor($cColor){
		if($cColor!=""){
			$this->cColor=$cColor;
		}
		else{
			$this->cColor="undefined";
		}
	}
    public function setCarImage($cImage){
    	if($cImage!=""){
    		$this->cImage=$cImage;
    	}
    	else{
    		$this->cImage="undefine";
    	}
    }
    public function getCarID(){
    	return $this->cID;
    }
	public function getCarName(){
		return $this->cName;
	}
	public function getCarType(){
		return $this->cType;
	}
	public function getCarModel(){
		return $this->cModel;
	}
	public function getCarCompany(){
		return $this->cCompany;
	}
	public function getCarNumberPlate(){
		return $this->cPlate;
	}
	public function getCarRent(){
		return $this->cRent;
	}
	public function getCarCondition(){
		return $this->cCondition;
	}
	public function getCarStatus(){
		return $this->cStatus;
	}
	public function getCarColor(){
		return $this->cColor;
	}
	public function getCarImage(){
		return $this->cImage;
	}
}

?>