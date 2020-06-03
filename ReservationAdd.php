<?php
 


include ("ReservationEntity.php");




$objReservationEntity=new ReservationEntity();


if(isset($_POST["Addreservation"])){
if($_SERVER["REQUEST_METHOD"]=="POST"){
     session_start();
         
        
   

    $location=$_POST["location"];
    $startDay=$_POST["startDay"];
    $endDay=$_POST["endDay"];
    $objReservationEntity->setLocation($location);
    $objReservationEntity->setStartDay($startDay);
    $objReservationEntity->setEndDay($endDay);
    $_SESSION["Reservation"]=serialize($objReservationEntity);
    
    include("ShowCarForm.php");
}
else{
    echo "cannot add data";
}}

?>