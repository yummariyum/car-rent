<?php

include("ShowCarForm.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$objConnection=new Connection();
	$objCarDAL=new CarDAL($objConnection->getConnection());
	$cPlate=$_POST["cDelete"];

	$objCarDAL->deleteCar($cPlate);
	}

?>