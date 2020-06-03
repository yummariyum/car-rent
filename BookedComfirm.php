<?php
 include ("Connection.php");
 include ("BookedDAL.php");
 include ("BookedEntity.php");
 include ("ReservationEntity.php");
 include("ReservationDAL.php");
 include ("CarEntity.php");
 include("CarDAL.php");
 include ("CustomerEntity.php");
 
if(isset($_POST["Comfirm"])){
	    
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		$objConnection=new Connection();
        $objBookedDAL=new BookedDAL($objConnection->getConnection());
        $objReservationEntity=new ReservationEntity();
        $objCustomerEntity=new CustomerEntity();
        $objCarEntity=new CarEntity();

        $objCustomerEntity=unserialize($_SESSION["Customer"]);
        $objReservationEntity=unserialize($_SESSION["Reservation"]);
        $objCarEntity=unserialize($_SESSION["Car"]);
        $objBookedEntity=new BookedEntity($objReservationEntity,$objCustomerEntity,$objCarEntity);


		$objBookedDAL->comfirmData($objBookedEntity);
		include("CustomerPanel.php");
      
	}
}

?>