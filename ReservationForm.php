
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
    <script src="jquery-3.4.1.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <script >
        $(document).ready(function(){
            $('#startDay').datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth:  true,
                changeYear:   true
            });
        })
        $(document).ready(function(){
            $('#endDay').datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth:  true,
                changeYear:   true
            });
        })
    </script>
<div class="container">
    <h1>Add reservation</h1>
    
    <form method="post" action="ReservationAdd.php">
        <?php
        //include("CustomerEntity.php");
        //$objCustomerEntityy=new CustomerEntity;
       
    ?>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="location" class="form-control inputstl" id="location" placeholder="Enter Location" name="location" required>
        </div>
        <div class="form-group">
            <label for="startDay">StartDay</label>
            <input type="text" class="form-control inputstl" id="startDay" placeholder="Enter StartDate" name="startDay" value="2018-07-22" required>
        </div>
        <div class="form-group">
            <label for="endDay">EndDay</label>
            <input type="text" class="form-control inputstl" id="endDay" placeholder="Enter StartDate" name="endDay" value="2018-07-22" required>
        </div>

        <button type="submit" class="btn btn-info" value="Add Reservation" name="Addreservation">Add Reservation</button>
    </form>
</div>
<?php
/*
echo date("y-m-d");
echo "<br>";
$date=date_create('2017-06-28'); 
$date2=date_create('2018-06-28'); 
$interval= date_diff($date,$date2);
echo $interval->format('%R%a days');
$num=$interval->format('%R%a days');
echo "<br>";
echo intval($num);*/
?>
</body>
</html>