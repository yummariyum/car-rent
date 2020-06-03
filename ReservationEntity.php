<?php
class ReservationEntity{
  private $location;
  private $startDay;
  private $endDay;
  private $rID;

  public function __construct(){

  }
  public function setReservationID($value){
    if($value!=0){
      $this->rID=$value;
    }
    else{
      $this->rID=2;
    }
  }
  public function getReservationID(){
    return $this->rID;
  }
  public function setLocation($location)
  {
  	if($location!=""){
  		$this->location=$location;
  	}
  	else{
  		$this->location="undefined";
  	}
  }
  public function getLocation()
  {
  	return $this->location;
  }

  public function setStartDay($startDay)
  {
  	if($startDay!=""){
      $this->startDay=$startDay;
    }
    else{
      $this->startDay="0000-00-00";
    }
  }
  public function getStartDay()
  {
  	return $this->startDay;
  }
  public function setEndDay($endDay)
  {
  	if($endDay!=""){
      $this->endDay=$endDay;
    }
    else{
      $this->endDay="0000-00-00";
    }
  }

  public function getEndDay()
  {
  	return $this->endDay;
  }

}










?>