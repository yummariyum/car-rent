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
        div{
        margin-top: 50px;
            margin-bottom: 50px;
            margin-right: 100px;
            margin-left: 40px;
            background-color: white; 
            color: black; 
            text-align: center; 
            padding: 40px;
            border: 5px solid black;
    }
        
    </style>

</head>

<body>
   
<div class="container">
    <h1>Customer Trips Information</h1>
   
        <?php
        include("Connection.php");
        
        
        include("CustomerEntity.php");
        
        include ("BookedDAL.php");
        
            session_start();
            
            $objConnection=new Connection();
            $objBookedDAL=new BookedDAL($objConnection->getConnection());
            
            $objCustomerEntity=new CustomerEntity();
            
            $objCustomerEntity=unserialize($_SESSION["Customer"]);

            $resultSet=$objBookedDAL->customerBookedRideInfo($objCustomerEntity);
            
            
          echo "Customer Name:";
        echo "<label>".$objCustomerEntity->getCustomerName()."</label>";
        echo "<br>";
        
        
        echo "Customer PhoneNo:";
        echo "<label>".$objCustomerEntity->getCustomerPhoneNo()."</label>";
        echo "<br>";
        
        
        echo "Customer CNIC No:";
        echo "<label>".$objCustomerEntity->getCustomerCNIC()."</label>";
        echo "<br>";
        
            
        foreach ($resultSet as $key) {
              # code...
        echo "<div>" ;   
        echo "Booking Date:";
        echo "<label>".$key["bDate"]."</label>";
        echo "<br>";
        echo "<br>";
        
        
        
        echo "Car Name:";
        echo "<label>".$key["cName"]."</label>";
        echo "<br>";
        echo "<br>";

        echo "Car Number Plate:";
        echo "<label>".$key["cPlate"]."</label>";
        echo "<br>";
        echo "<br>";

        echo "Car Rent(per Day):";
        echo "<label>".$key["cRent"]."</label>";
        echo "<br>";
        echo "<br>";

        echo "Location:";
        echo "<label>".$key["location"]."</label>";
        echo "<br>";
        echo "<br>";

        echo "Start Date:";
        echo "<label>".$key["startDay"]."</label>";
        echo "<br>";
        echo "<br>";

        echo "Return Date:";
        echo "<label>".$key["endDay"]."</label>";
        echo "<br>";
        echo "<br>";

        

        echo "Total Cost:";
        echo "<label>".$key["totalCost"]."</label>";
        echo "<br>";
        echo "<br>";
        echo "</div>";
     
}
    
        ?>
        
      
</div>
</body>
</html>