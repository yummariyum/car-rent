<?php

class CustomerEntity{
	private $name;
	private $city;
	private $phoneNo;
	private $address;
	private $email;
	private $cnic;
	private $password;
	private $csID;

	public function __construct(){}

	public function setCustomerID($value){
		if($value!=0){
			$this->csID=$value;
		}
		else{
			$this->csID=2;
		}
	}

	public function setCustomerName($name)
	{
		if($name!=""){
			$this->name=$name;
		}
		else{
			$this->name="undefined";
		}
	}
	public function setCustomerCity($value)
	{
		if($value!=""){
			$this->city=$value;
		}
		else{
			$this->city="undefined";
		}
	}
	public function setCustomerPhoneNo($value)
	{
		if($value!=""){
			$this->phoneNo=$value;
		}
		else{
			$this->phoneNo="undefined";
		}
	}
	public function setCustomerAddress($value)
	{
		if($value!=""){
			$this->address=$value;
		}
		else{
			$this->address="undefined";

	}
		}
	public function setCustomerEmail($value)
		{
			if($value!=""){
				$this->email=$value;
			}
			else{
				$this->email="undefined";
			}
		}
	public function setCustomerCNIC($value)
			{
				if($value!=""){
					$this->cnic=$value;
				}
				else{
					$this->cnic="undefine";
				}
			}
	public function setCustomerPassword($value)
			        {
						if($value!=""){
							$this->password=$value;
						}
						else{
							$this->password="undefined";
						}
					}




    public function getCustomerID(){
    	return $this->csID;
    }
	public function getCustomerName(){
		return $this->name;
	}
	public function getCustomerCity(){
		return $this->city;
	}

	public function getCustomerPhoneNo(){
		return $this->phoneNo;
	}
	public function getCustomerAddress(){
		return $this->address;
	}
	public function getCustomerEmail(){
		return $this->email;
	}
	public function getCustomerCNIC(){
		return $this->cnic;
	}
	public function getCustomerPassword(){
		return $this->password;
	}				
}



  ?>