<?php
include ("Connection.php");
 include ("BookedDAL.php");
 include ("BookedEntity.php");
 include ("ReservationEntity.php");
 include("ReservationDAL.php");
 include ("CarEntity.php");
 include("CarDAL.php");
 include ("CustomerEntity.php");

 if(isset($_POST["bCancel"])){
 	if($_SERVER["REQUEST_METHOD"]=="POST"){
 		session_start();
 		$bID=$_POST["bCancel"];
 		$objConnection=new Connection();
 		$objBookedDAL=new BookedDAL($objConnection->getConnection());
 		$result=$objBookedDAL->getSingleBooked($bID);

 		$cId=$result["cID"];
 		$objCarDAL=new CarDAL($objConnection->getConnection());
 		$objCarEntity=$objCarDAL->getCarByID($cId);

 		$rID=$result["rID"];
 		$objReservationDAL=new ReservationDAL($objConnection->getConnection());
 		echo $rID;
 		$objReservationEntity=$objReservationDAL->getReservationByID($rID);

 		$objCustomerEntity=new CustomerEntity();
 		$objCustomerEntity=unserialize($_SESSION["Customer"]);

 		$objBookedEntity=new BookedEntity($objReservationEntity,$objCustomerEntity,$objCarEntity);
 		$objBookedDAL->cancelBookedTrip($objBookedEntity);

 		include("CustomerPanel.php");




 	}
 }

?>