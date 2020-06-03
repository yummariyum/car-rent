<?php
class ReservationDAL{
	private $objConnection;

	public function __construct($objConnection){
		$this->objConnection=$objConnection;
	}


	public function addReservation(ReservationEntity $objReservation){
		$query="insert into reservation(location,startDay,endDay) values(:location,:startDay,:endDay)";
		$location=$objReservation->getLocation();
		$startDay=$objReservation->getStartDay();
		$endDay=$objReservation->getEndDay();
		$statment=$this->objConnection->prepare($query);
		$statment->bindParam(":location",$location);
		$statment->bindParam(":startDay",$startDay);
		$statment->bindParam(":endDay",$endDay);

		$statment->execute();

	}

	public function getAllReservation(){
		$query="select * from reservation";
		$statment=$this->objConnection->prepare($query);
		$statment->execute();
		$reservationList=array();
		$resultSet=$statment->fetchAll();
		foreach ($resultSet as $key) {
			$objReservation=new ReservationEntity();
			$objReservation->setLocation($key["location"]);
			$objReservation->setStartDay($key["startDay"]);
			$objReservation->setEndDay($key["endDay"]);
			$reservationList[]=$objReservation;

		}
        return $reservationList;
	}

	public function getReservationByID($rID){

		$query="select * from reservation where rID=:rID";
		$statment=$this->objConnection->prepare($query);
		$statment->bindParam(":rID",$rID);
		$statment->execute();
		
		$key=$statment->fetch();
		
			$objReservation=new ReservationEntity();
			$objReservation->setReservationID($key["rID"]);
			$objReservation->setLocation($key["location"]);
			$objReservation->setStartDay($key["startDay"]);
			$objReservation->setEndDay($key["endDay"]);
			

		
        return $objReservation;

	}

	public function getInsertReservationID(){
        $query="select LAST_INSERT_ID() from reservation";
        $statment=$this->objConnection->prepare($query);
        $statment->execute();
        $result=$statment->fetch();

        return $result;

}

    public function deleteReservation(ReservationEntity $objReservation){
    	$query="Delete from reservation where rID=:rID";
    	$statment=$this->objConnection->prepare($query);
    	$rID=$objReservation->getReservationID();

    	
    	$statment->bindParam(":rID",$rID);
    	$statment->execute();
    	if($statment->execute()){
    		echo "done";
    	}
    }




}

?>