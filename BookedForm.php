<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="jquery-ui.min.css">

    <style>
        .inputstl {
            padding: 9px;
            border: solid 1px #4B718B;
            outline: 0;
            background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #CDDBE4), to(#FFFFFF));
            background: -moz-linear-gradient(top, #FFFFFF, #CDDBE4 1px, #FFFFFF 25px);
            box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
            -moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
            -webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;

        }
        
    </style>

</head>

<body>
   
<div class="container">
    <h1>Booked</h1>
   
        <?php
        include("Connection.php");
        include("CarDAL.php");
        include ("CarEntity.php");
        include("ReservationEntity.php");
        include("ReservationDAL.php");
        include("CustomerEntity.php");
        include ("BookedEntity.php");
        include ("BookedDAL.php");
        if(isset($_POST["cBook"])){
            session_start();
            $cPlate=$_POST["cBook"];
            $objConnection=new Connection();
            $objCarDAL=new CarDAL($objConnection->getConnection());
      
            $objCustomerEntity=new CustomerEntity();
            $objReservationEntity=new ReservationEntity();
            $objCustomerEntity=unserialize($_SESSION["Customer"]);
            $objReservationEntity=unserialize($_SESSION["Reservation"]);
            
            
            
            $objCarEntity=$objCarDAL->getCarByPlate($cPlate);
            
        $objBookedEntity=new BookedEntity($objReservationEntity,$objCustomerEntity,$objCarEntity);
          
        echo "Booking Date:";
        echo "<label>".    $objBookedEntity->getBookedDate()."</label>";
        echo "<br>";
        echo "<br>";
        
        echo "Customer Name:";
        echo "<label>".$objCustomerEntity->getCustomerName()."</label>";
        echo "<br>";
        echo "<br>";
        
        echo "Customer PhoneNo:";
        echo "<label>".$objCustomerEntity->getCustomerPhoneNo()."</label>";
        echo "<br>";
        echo "<br>";
        
        echo "Customer CNIC No:";
        echo "<label>".$objCustomerEntity->getCustomerCNIC()."</label>";
        echo "<br>";
        echo "<br>";
        
        echo "Car Name:";
        echo "<label>".$objCarEntity->getCarName()."</label>";
        echo "<br>";
        echo "<br>";

        echo "Car Number Plate:";
        echo "<label>".$objCarEntity->getCarNumberPlate()."</label>";
        echo "<br>";
        echo "<br>";

        echo "Car Rent(per Day):";
        echo "<label>".$objCarEntity->getCarRent()."</label>";
        echo "<br>";
        echo "<br>";

        echo "Location:";
        echo "<label>".$objReservationEntity->getLocation()."</label>";
        echo "<br>";
        echo "<br>";

        echo "Start Date:";
        echo "<label>".$objReservationEntity->getStartDay()."</label>";
        echo "<br>";
        echo "<br>";

        echo "Return Date:";
        echo "<label>".$objReservationEntity->getEndDay()."</label>";
        echo "<br>";
        echo "<br>";

        echo "Total Days:";
        echo "<label>".$objBookedEntity->getTotalDays()."</label>";
        echo "<br>";
        echo "<br>";

        echo "Total Cost:";
        echo "<label>".$objBookedEntity->getTotalCost()."</label>";
     

    }
        ?>
        <br>
        <br>
        <form method="POST" action="BookedComfirm.php">
            <?php
            $_SESSION["Car"]=serialize($objCarEntity); 
            ?>
        <button type="submit" class="btn btn-info" value="cComfirmed" name="Comfirm">Comfirm</button>
        </form>
</div>
</body>
</html>