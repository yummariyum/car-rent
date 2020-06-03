

<?php
class DriverEntity{
	private $dID;
	private $dName;
	private $dCNIC;
	private $dType;
	private $dSalary;
	private $dPhoneNo;
	private $dStatus;
	private $dEducation;
	private $dCity;
	private $dAddress;


	public function __construct(){}

	public function setDriverID($value){
		if($value!=0){
			$this->value=$value;
		}
		else{
			$this->value=0;
		}
	}


	public function setDriverName($value){
		if($value!=""){
			$this->dName=$value;
		}
		else{
			$this->dName=$value;
		}
	}
	public function setDriverCNIC($value){
		if($value!=""){
			$this->dCNIC=$value;
		}
		else{
			$this->dCNIC=$value;
		}
	}
	public function setDriverType($value){
		if($value!=""){
			$this->dType=$value;
		}
		else{
			$this->dType=$value;
		}
	}
	public function setDriverSalary($value){
		if($value!=0){
			$this->dSalary=$value;
		}
		else{
			$this->dSalary=20000;
		}
	}
	public function setDriverPhoneNo($value){
		if($value!=""){
			$this->dPhoneNo=$value;
		}
		else{
			$this->dPhoneNo="undefined";
		}
	}
	public function setDriverStatus($value){
		if($value!=""){
			$this->dStatus=$value;
		}
		else{
			$this->dStatus="NonActive";
		}
	}
	public function setDriverEducation($value){
		if($value!=""){
			$this->dEducation=$value;
		}
		else{
			$this->dEducation="not now";
		}
	}

    public function setDriverCity($value){
    	if($value!=""){
    		$this->dCity=$value;
    	}
    	else{
    		$this->dCity="undefined";
    	}
    }
    public function setDriverAddress($value){
    	if($value!=""){
    		$this->dAddress=$value;
    	}
    	else{
    		$this->dAddress="undefined";
    	}
    }

	public function getDriverName(){
		return $this->dName;
	}
	public function getDriverCNIC(){
		return $this->dCNIC;
	}
	public function getDriverType(){
		return $this->dType;
	}
	public function getDriverSalary(){
		return $this->dSalary;
	}
	public function getDriverPhoneNo(){
		return $this->dPhoneNo;
	}
	public function getDriverID(){
		return $this->dID;
	}
	public function getDriverStatus(){
		return $this->dStatus;
	}
	public function getDriverCity(){
		return $this->dCity;
	}
	public function getDriverAddress(){
		return $this->dAddress;
	}
	public function getDriverEducation(){
		return $this->dEducation;
	}
}


?>