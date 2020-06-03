

<?php

include("Connection.php");
include("CarEntity.php");
include("CarDAL.php");

$objConnection=new Connection();
$objCarEntity=new CarEntity;
$objCarDal=new CarDAl($objConnection->getConnection());

if(isset($_POST["submit"])){
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$cName=$_POST["cName"];
	$cType=$_POST["cType"];
	$cCompany=$_POST["cCompany"];
	$cModel=$_POST["cModel"];
	$cPlate=$_POST["cPlate"];
	$cRent=$_POST["cRent"];
	$cCondition=$_POST["cCondition"];
	$cStatus=$_POST["cStatus"];
	$cColor=$_POST["cColor"];
	$imageFile=file_get_contents($_FILES['cImageFile']['tmp_name']);
	$imageError=$_FILES['cImageFile']['error'];

	if(!(empty($cName)) && !(empty($cType)) && !(empty($cCompany)) && !(empty($cModel)) && !(empty($cPlate)) && !(empty($cRent)) && !(empty($cCondition)) && !(empty($cStatus)) && !(empty($cColor)) && $imageError===0 ){
		$objCarEntity->setCarName($cName);
		$objCarEntity->setCarType($cType);
		$objCarEntity->setCarCompany($cCompany);
		$objCarEntity->setCarModel($cModel);
		$objCarEntity->setCarNumberPlate($cPlate);
		$objCarEntity->setCarRent($cRent);
		$objCarEntity->setCarCondition($cCondition);
		$objCarEntity->setCarStatus($cStatus);
		$objCarEntity->setCarColor($cColor);
		$objCarEntity->setCarImage($imageFile);
		$objCarDal->addCarData($objCarEntity);
		include("CarForm.php");

	}
	else{
		echo "error please check all the flieds";
	}







}}






  ?>