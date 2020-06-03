

<?php
class DriverDAL{

	private $objConnection;
	public function __construct($objConnection){
		$this->objConnection=$objConnection;
	}

	public function addDriver(DriverEntity $objDriverEntity){
		$query="insert into driver(dName,dCNIC,dPhoneNo,dStatus,dType,dSalary,dEducation,dCity,dAddress)
                 values(:dName,:dCNIC,:dPhoneNo,:dStatus,:dType,:dSalary,:dEducation,:dCity,:dAddress)
		         ";
		
		$dName=$objDriverEntity->getDriverName();
		$dCNIC=$objDriverEntity->getDriverCNIC();
		$dPhoneNo=$objDriverEntity->getDriverPhoneNo();
		$dStatus=$objDriverEntity->getDriverStatus();
		$dType=$objDriverEntity->getDriverType();
		$dSalary=$objDriverEntity->getDriverSalary();
		$dEducation=$objDriverEntity->getDriverEducation();
		$dCity=$objDriverEntity->getDriverCity();
		$dAddress=$objDriverEntity->getDriverAddress();
		
        $statment=$this->objConnection->prepare($query);

		$statment->bindParam(":dName",$dName);
		$statment->bindParam(":dCNIC",$dCNIC);
		$statment->bindParam(":dPhoneNo",$dPhoneNo);
		$statment->bindParam(":dStatus",$dStatus);
		$statment->bindParam(":dType",$dType);
		$statment->bindParam(":dSalary",$dSalary);
		$statment->bindParam(":dEducation",$dEducation);
		$statment->bindParam(":dCity",$dCity);
		$statment->bindParam(":dAddress",$dAddress);

		$statment->execute();

	}


	public function getAllDrivers(){
		$query="select * from Driver order by dName,dSalary";
		$statment=$this->objConnection->prepare($query);
		$statment->execute();
		$driverList=array();
		$reasultSet=$statment->fetchAll();
		foreach ($reasultSet as $key) {
			$objDriverEntity=new DriverEntity();
			$objDriverEntity->setDriverID($key["dID"]);
			$objDriverEntity->setDriverName($key["dName"]);
			$objDriverEntity->setDriverCNIC($key["dCNIC"]);
			$objDriverEntity->setDriverPhoneNo($key["dPhoneNo"]);
			$objDriverEntity->setDriverStatus($key["dStatus"]);
			$objDriverEntity->setDriverType($key["dType"]);
			$objDriverEntity->setDriverSalary($key["dSalary"]);
			$objDriverEntity->setDriverEducation($key["dEducation"]);
			$objDriverEntity->setDriverCity($key["dCity"]);
			$objDriverEntity->setDriverAddress($key["dAddress"]);

			$driverList[]=$objDriverEntity;
		}

		return $driverList;
	}
}
?>