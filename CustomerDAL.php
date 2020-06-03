<?php



class CustomerDAL{
	private $objConnection;
	public function  __construct($objConnection){
		$this->objConnection=$objConnection;
	}

        public function insertCustomer(CustomerEntity $objCustomerEntity){
        $query = "insert into customer(csName,csPhone,csAddress,csCity,,csCNIC,csEmail,csPassword) 
                  values (:csName,:csPhone,:csAddress,:csCity,:csCNIC,:csEmail,:csPassword)";
        $csName = $objCustomerEntity->getCustomerName();
        $csCNIC= $objCustomerEntity->getCustomerCNIC();
        $csPhone= $objCustomerEntity->getCustomerPhoneNo();
        $csAddress=$objCustomerEntity->getCustomerAddress();
        $csEmail= $objCustomerEntity->getCustomerEmail();
        $csCity=$objCustomerEntity->getCustomerCity();
        $csPass=$objCustomerEntity->getCustomerPassword();
        $statement = $this->objConnection->prepare($query);
        $statement->bindParam(":csname", $csName);
        $statement->bindParam(":csPhone", $csPhone);
        $statement->bindParam(":csAddress", $csAddress);
        $statement->bindParam(":csCity", $csCity);
        $statement->bindParam(":csCNIC", $csCNIC);
        $statement->bindParam(":csEmail", $csEmail);
        $statement->bindParam(":csPassword", $csPass);
        $statement->execute();
    }

	public function getAllCustomer(){
		$query="select * from customer";
		$statment=$this->objConnection->prepare($query);
		$statment->execute();
		$CustomerList=array();
		$resultSet=$statment->fetchAll();
        foreach ($resultSet as $key) {
        	$objCustomerEntity=new CustomerEntity();
            $objCustomerEntity->setCustomerID($key["csID"]);
        	$objCustomerEntity->setCustomerName($key["csName"]);
        	$objCustomerEntity->setCustomerPhoneNo($key["csPhone"]);
        	$objCustomerEntity->setCustomerAddress($key["csAddress"]);
        	$objCustomerEntity->setCustomerCity($key["csCity"]);
        	$objCustomerEntity->setCustomerCNIC($key["csCNIC"]);
        	$objCustomerEntity->setCustomerEmail($key["csEmail"]);
        	$objCustomerEntity->setCustomerPassword($key["csPassword"]);
        	$CustomerList[]=$objCustomerEntity;
        }
        return $CustomerList;

	}

    public function getCustomerByID($csID){

        $query="select * from customer where csID=:csID";
        $statment=$this->objConnection->prepare($query);
        $statment->bindParam(":csID",$csID);
        $statment->execute();
        
        $key=$statment->fetch();
     
            $objCustomerEntity=new CustomerEntity();
            $objCustomerEntity->setCustomerID($key["csID"]);
            $objCustomerEntity->setCustomerName($key["csName"]);
            $objCustomerEntity->setCustomerPhoneNo($key["csPhone"]);
            $objCustomerEntity->setCustomerAddress($key["csAddress"]);
            $objCustomerEntity->setCustomerCity($key["csCity"]);
            $objCustomerEntity->setCustomerCNIC($key["csCNIC"]);
            $objCustomerEntity->setCustomerEmail($key["csEmail"]);
            $objCustomerEntity->setCustomerPassword($key["csPassword"]);
            $objCustomerEntity;
     
        return $objCustomerEntity;


    }
}

?>