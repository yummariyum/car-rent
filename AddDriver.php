<?php
include ("DriverDAL.php");
include ("DriverEntity.php");
include ("Connection.php");
$objConnection= new Connection();
$objDriverEntity= new DriverEntity();
$objDriverDAL= new DriverDAL($objConnection->getConnection());
if(isset($_POST["submit"])){
	if($_SERVER["REQUEST_METHOD"]=="POST"){
     $dName=$_POST["dName"];
	 $dCNIC=$_POST["dCNIC"];
	 $dType=$_POST["dType"];
	 $dSalary=$_POST["dSalary"];
     $dPhoneNo=$_POST["dPhoneNo"];
	 $dStatus=$_POST["dStatus"];
	 $dEducation=$_POST["dEducation"];
	 $dCity=$_POST["dCity"];
	 $dAddress=$_POST["dAddress"];
	 
	 if(!(empty($dName)) && !(empty($dCNIC)) && !(empty($dType)) && !(empty($dSalary)) && !(empty($dPhoneNo))  && !(empty($dStatus)) && !(empty($dEducation)) && !(empty($dCity)) && !(empty($dAddress))){
           
           $objDriverEntity->setDriverName($dName);
           $objDriverEntity->setDriverCNIC($dCNIC);
           $objDriverEntity->setDriverType($dType);
           $objDriverEntity->setDriverSalary($dSalary);
           $objDriverEntity->setDriverPhoneNo($dPhoneNo);
           $objDriverEntity->setDriverStatus($dStatus);
           $objDriverEntity->setDriverEducation($dEducation);
           $objDriverEntity->setDriverCity($dCity);
           $objDriverEntity->setDriverAddress($dAddress);

           $objDriverDAL->addDriver($objDriverEntity);
           
           include("DriverForm.php");
	 }
	}
}

?>