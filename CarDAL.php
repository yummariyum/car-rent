<?php
class CarDAL{
	private $objConnection;

	public function __construct($objConnection){
       $this->objConnection=$objConnection;
	}


	public function addCarData(CarEntity $objCarEntity){
		$query="insert into car(cName,cCompany,cType,cModel,cPlate,cRent,cColor,cCondition,cStatus,cImage) values(:cName,:cCompany,:cType,:cModel,:cPlate,:cRent,:cColor,:cCondition,:cStatus,:cImage)";
		$cName=$objCarEntity->getCarName();
		$cType=$objCarEntity->getCarType();
		$cModel=$objCarEntity->getCarModel();
		$cCompany=$objCarEntity->getCarCompany();
		$cPlate=$objCarEntity->getCarNumberPlate();
		$cRent=$objCarEntity->getCarRent();
		$cColor=$objCarEntity->getCarColor();
		$cCondition=$objCarEntity->getCarCondition();
		$cStatus=$objCarEntity->getCarStatus();
		$cImage=$objCarEntity->getCarImage();
		$statment=$this->objConnection->prepare($query);
		$statment->bindParam(":cName",$cName);
		$statment->bindParam(":cType",$cType);
		$statment->bindParam(":cModel",$cModel);
		$statment->bindParam(":cCompany",$cCompany);
		$statment->bindParam(":cPlate",$cPlate);
		$statment->bindParam(":cRent",$cRent);
		$statment->bindParam(":cColor",$cColor);
		$statment->bindParam(":cCondition",$cCondition);
		$statment->bindParam(":cStatus",$cStatus);
		$statment->bindParam(":cImage",$cImage);
		$statment->execute();

	}

	public function updateCarCondition(CarEntity $objCarEntity){
		$query="update car set cCondition=:cCondition where cPlate=:cPlate";

		$cPlate=$objCarEntity->getCarNumberPlate();
		$cCondition=$objCarEntity->getCarCondition();
		$statment=$this->objConnection->prepare($query);
		$statment->bindParam(":cPlate",$cPlate);
		$statment->bindParam(":cCondition",$cCondition);
		$statment->execute();

	}


	public function getAllCar(){
		$query="select * from car order by cName";
		$statment=$this->objConnection->prepare($query);
		$statment->execute();
		$resultset=$statment->fetchAll();
		$carList=array();

		foreach ($resultset as $key ) {
			$objCarEntity=new CarEntity();

			$objCarEntity->setCarName($key["cName"]);
			$objCarEntity->setCarType($key["cType"]);
			$objCarEntity->setCarModel($key["cModel"]);
			$objCarEntity->setCarCompany($key["cCompany"]);
			$objCarEntity->setCarNumberPlate($key["cPlate"]);
			$objCarEntity->setCarRent($key["cRent"]);
			$objCarEntity->setCarColor($key["cColor"]);
			$objCarEntity->setCarCondition($key["cCondition"]);
			$objCarEntity->setCarStatus($key["cStatus"]);
			$objCarEntity->setCarImage($key["cImage"]);
			$carList[]=$objCarEntity;

			# code...
		}
		return $carList;
	}

	public function getAllCarByStatus(){
		$query="select * from car where cStatus='NonActive' order by cName";
		$statment=$this->objConnection->prepare($query);
		$statment->execute();
		$resultset=$statment->fetchAll();
		$carList=array();

		foreach ($resultset as $key ) {
			$objCarEntity=new CarEntity();

			$objCarEntity->setCarName($key["cName"]);
			$objCarEntity->setCarType($key["cType"]);
			$objCarEntity->setCarModel($key["cModel"]);
			$objCarEntity->setCarCompany($key["cCompany"]);
			$objCarEntity->setCarNumberPlate($key["cPlate"]);
			$objCarEntity->setCarRent($key["cRent"]);
			$objCarEntity->setCarColor($key["cColor"]);
			$objCarEntity->setCarCondition($key["cCondition"]);
			$objCarEntity->setCarStatus($key["cStatus"]);
			$objCarEntity->setCarImage($key["cImage"]);
			$carList[]=$objCarEntity;

			# code...
		}
		return $carList;

	}

	public function getActiveCars(){
		$query="select cName,cCompany,cType,cPlate,cModel,cStatus,cRent from car where cStatus='Active'";
		$statment=$this->objConnection->prepare($query);
		$statment->execute();
		$carList=array();
		$resultset=$statment->fetchAll();
		foreach ($resultset as $key) {
			$objCarEntity=new CarEntity();
			$objCarEntity->setCarName($key["cName"]);
			$objCarEntity->setCarCompany($key["cCompany"]);
			$objCarEntity->setCarNumberPlate($key["cPlate"]);
			$objCarEntity->setCarModel($key["cModel"]);
            $objCarEntity->setCarType($key["cType"]);
            $objCarEntity->setCarRent($key["cRent"]);
            $objCarEntity->setCarStatus($key["cStatus"]);

            $carList[]=$objCarEntity;

		}
        
        return $carList;
	}

	public function getCarByPlate($cPlate){
		$query="select * from car where cPlate=:cPlate";
		$statment=$this->objConnection->prepare($query);
		$statment->bindParam(":cPlate",$cPlate);
		$statment->execute();
		$key=$statment->fetch();
		$objCarEntity=new CarEntity();
		$objCarEntity->setCarID($key["cId"]);
		$objCarEntity->setCarName($key["cName"]);
		$objCarEntity->setCarCompany($key["cCompany"]);
	    $objCarEntity->setCarType($key["cType"]);
		$objCarEntity->setCarModel($key["cModel"]);
		$objCarEntity->setCarNumberPlate($key["cPlate"]);
		$objCarEntity->setCarRent($key["cRent"]);
		$objCarEntity->setCarColor($key["cColor"]);
		$objCarEntity->setCarCondition($key["cCondition"]);

		return $objCarEntity;
	}

	public function getCarByID($cId){

		$query="select * from car where cId=:cId";
		$statment=$this->objConnection->prepare($query);
		$statment->bindParam(":cId",$cId);
		$statment->execute();
		$key=$statment->fetch();
		$objCarEntity=new CarEntity();
		$objCarEntity->setCarID($key["cId"]);
		$objCarEntity->setCarName($key["cName"]);
		$objCarEntity->setCarCompany($key["cCompany"]);
	    $objCarEntity->setCarType($key["cType"]);
		$objCarEntity->setCarModel($key["cModel"]);
		$objCarEntity->setCarNumberPlate($key["cPlate"]);
		$objCarEntity->setCarRent($key["cRent"]);
		$objCarEntity->setCarColor($key["cColor"]);
		$objCarEntity->setCarCondition($key["cCondition"]);

		return $objCarEntity;

	}


	public function updateCarStatus(CarEntity $objCarEntity){
		$query="update car set cStatus='Active' where cPlate=:cPlate";
		$statment=$this->objConnection->prepare($query);
		$cPlate=$objCarEntity->getCarNumberPlate();
		$statment->bindParam(":cPlate",$cPlate);

        $statment->execute();
        if($statment->execute()){
        	echo "string";
        }
	}

	public function changeCarStatus(CarEntity $objCarEntity){
		$query="update car set cStatus='NonActive' where cPlate=:cPlate";
		$statment=$this->objConnection->prepare($query);
		$cPlate=$objCarEntity->getCarNumberPlate();
		$statment->bindParam(":cPlate",$cPlate);

        $statment->execute();
	}

	public function deleteCar($value){
		$query="Delete from car where cPlate=:cPlate";
		$statment=$this->objConnection->prepare($query);
		$cPlate=$value;
		$statment->bindParam(":cPlate",$cPlate);
		$statment->execute();

	}
}
?>