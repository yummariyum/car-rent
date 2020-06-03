<?php
//include("ReservationEntity.php");
//include("CustomerEntity.php");
//include ("CarEntity.php");
//include("DriverEntity.php");

 class BookedEntity{
	private $objReservationEntity;
	private $objCustomerEntity;
	private $objCarEntity;
	
	private $bDate;
	private $totalCost;
    private $totalDays;
    private $bID;

	
	public function __construct(ReservationEntity $objReservationEntity,CustomerEntity $objCustomerEntity,CarEntity $objCarEntity){

		$this->objReservationEntity=$objReservationEntity;
		$this->objCustomerEntity=$objCustomerEntity;
		$this->objCarEntity=$objCarEntity;
		
		$this->bDate=date("y-m-d");
		$this->setTotalCost();



	}


    public function setBookedReservation(ReservationEntity $objReservationEntity){
        $this->objReservationEntity=$objReservationEntity;
    }

    public function setBookedCustomer(CustomerEntity $objCustomerEntity){
        $this->objCustomerEntity=$objCustomerEntity;
    }

    public function setBookedCar(CarEntity $objCarEntity){
        $this->objCarEntity=$objCarEntity;
    }

    public function setBookedID($bID){
        $this->bID=$bID;
    }

    public function getBookedCustomer(){
    	return $this->objCustomerEntity;
    }
    public function getBookedCar(){
    	return $this->objCarEntity;
    }

    public function getBookedReservation(){
    	return $this->objReservationEntity;
    }

    
    private function setTotalDays($value){
        $this->totalDays=$value;
    }
    public function setTotalCost(){
    	$objReservationEntity=$this->objReservationEntity;
    	$objCarEntity=$this->objCarEntity;

    	$date1=date_create($objReservationEntity->getStartDay());
    	$date2=date_create($objReservationEntity->getEndDay());
    	$interval=date_diff($date1,$date2);
    	$td=$interval->format('%R%a days');
        $tday=intval($td);
        $this->setTotalDays($tday);
        $rent=$objCarEntity->getCarRent();
        $this->totalCost=$tday*$rent;
    }

    public  function getTotalCost(){
    	return $this->totalCost;
    }

    public function getBookedDate(){
    	return $this->bDate;
    }

    public function getTotalDays(){
        return $this->totalDays;
    }
    public function getBookedID(){
        return $this->bID;
    }



}


?>