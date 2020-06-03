<?php
class BookedDAL{
	private $objConnection;

	public function __construct($objConnection){
		$this->objConnection=$objConnection;
	}


	public function comfirmData(BookedEntity $objBookedEntity){
		try{
             $this->objConnection->beginTransaction();

             $objReservationEntity=$objBookedEntity->getBookedReservation();


             $objReservationDAL=new ReservationDAL($this->objConnection);

             $objReservationDAL->addReservation($objReservationEntity);
             $rIDD=$objReservationDAL->getInsertReservationID();
             
             
             $rID=$rIDD[0];
             $objReservationEntity->setReservationID($rID);
             $objBookedEntity->setBookedReservation($objReservationEntity);
           

             $objCarEntity=$objBookedEntity->getBookedCar();
             $objCarDAL=new CarDAL($this->objConnection);
             $objCarDAL->updateCarStatus($objCarEntity);
         

             $this->addBookedData($objBookedEntity);
            
             $this->objConnection->commit();
               

             return true;



		}catch(PDOException $e){
			$this->objConnection->rollBacK();
		}
	}

	public function addBookedData(BookedEntity $objBookedEntity){
		$query="insert into booked(totalCost,bDate,cID,csID,rID)
                values(:totalCost,:bDate,:cID,:csID,:rID)
		";
		$statment=$this->objConnection->prepare($query);
		$totalCost=$objBookedEntity->getTotalCost();
		$bDate=$objBookedEntity->getBookedDate();
		$objCarEntity=$objBookedEntity->getBookedCar();
		$cID=$objCarEntity->getCarID();
		$objCustomerEntity=$objBookedEntity->getBookedCustomer();
		$csID=$objCustomerEntity->getCustomerID();

		$objReservationEntity=$objBookedEntity->getBookedReservation();
		$rID=$objReservationEntity->getReservationId();



		$statment->bindParam(":totalCost",$totalCost);
		$statment->bindParam(":bDate",$bDate);
		$statment->bindParam(":cID",$cID);
		$statment->bindParam(":csID",$csID);
		$statment->bindParam(":rID",$rID);

		$statment->execute();

	}
	public function customerBookedRideInfo(CustomerEntity $objCustomerEntity){
		$query="select c.cName,c.cPlate,c.cRent,b.bDate,b.totalCost,b.bID,r.location,r.startDay,r.endDay from booked as b,car as c,reservation as r,customer as cs where b.cId=c.cId and b.rID=r.rID and b.csID=cs.csID and cs.csID=:csID";
		$statment=$this->objConnection->prepare($query);
		$csID=$objCustomerEntity->getCustomerID();
		$statment->bindParam(":csID",$csID);
		$statment->execute();
		$result=$statment->fetchAll();
      
		return $result;
	}

	public function getSingleBooked($bID){
		$query="select * from booked where bID=:bID";
		$statment=$this->objConnection->prepare($query);
		$statment->bindParam(":bID",$bID);
		$statment->execute();
		$result=$statment->fetch();
		return $result;
	}

	public function deleteBookedTrip($bID){
		$query="delete from booked where bID=:bID";
		$statment=$this->objConnection->prepare($query);
		$statment->bindParam(":bID",$bID);
		$statment->execute();

	}

	public function cancelBookedTrip(BookedEntity $objBookedEntity){

		try{
			$this->objConnection->beginTransaction();

			$bID=$objBookedEntity->getBookedID();
			$this->deleteBookedTrip($bID);

			$objCarEntity=$objBookedEntity->getBookedCar();
			$objCarDAL=new CarDAL($this->objConnection);
			$objCarDAL->changeCarStatus($objCarEntity);
			

			$objReservationEntity=$objBookedEntity->getBookedReservation();
			$objReservationDAL=new ReservationDAL($this->objConnection);
			$objReservationDAL->deleteReservation($objReservationEntity);
			
            
			

			$this->objConnection->commit();
			echo "work done";

			return true;
		}
		catch(PDOException $e){
			$this->objConnection->rollBack();
		}

	}

	public function todayBookedTrip(){
		$query="select cs.csName,cs.csPhone,cs.csCNIC,c.cName,c.cPlate,c.cRent,b.bDate,b.totalCost,b.bID,r.location,r.startDay,r.endDay from booked as b,car as c,reservation as r,customer as cs where b.cId=c.cId and b.rID=r.rID and b.csID=cs.csID and b.bDate=CURRENT_DATE()";
		$statment=$this->objConnection->prepare($query);
		$statment->execute();
		$resultset=$statment->fetchAll();

		return $resultset;
	}

	public function todayStartReservation(){
		$query="select cs.csName,cs.csPhone,cs.csCNIC,c.cName,c.cPlate,c.cRent,b.bDate,b.totalCost,b.bID,r.location,r.startDay,r.endDay from booked as b,car as c,reservation as r,customer as cs where b.cId=c.cId and b.rID=r.rID and b.csID=cs.csID and r.startDay=CURRENT_DATE()";
        $statment=$this->objConnection->prepare($query);
		$statment->execute();
		$resultset=$statment->fetchAll();

		return $resultset;

	}
}
?>