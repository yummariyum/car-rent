<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Show Car Form</title>
	<style>
		table{
			border: solid 1px black;
			background-color: white;
		}
		td{
			width: 150px; border: 1px solid black;
			background-color: gray;
		}

		button[type=submit]{
              background-color: #4CAF50;
              color: white;
              padding: 12px 20px;
              border: none;
              border-radius: 4px;
              cursor: pointer;
  
        }

        button[type=submit]:hover {
              background-color: #45a049;
        }


	</style>
</head>
<body>

<?php
include("Connection.php");
include("CarEntity.php");
include("CarDAL.php");
$objConnection=new Connection();
$objCarEntity=new CarEntity;
$objCarDAL=new CarDAL($objConnection->getConnection());

$carList=array();
$carList=$objCarDAL->getAllCarByStatus();


//$_SESSION["objCarDAL"]=$objCarDAL;

foreach ($carList as $key) {
	$objCarEntity=$key;
	echo "<section>";
	//header("content-type:image/jpg");
	/*echo "<div> <img src=data:image\JPG;base64".base64_encode($objCarEntity->getCarImage())." alt='car pic'width=50 height=50 ></div>";*/
	echo "<div>";
	echo "<table>";
	echo "<tr>";
	echo "<th>Car Name</th>";
	echo "<th>Car Plate</th>";
	echo "<th>Car Model</th>";
	echo "<th>Car Company</th>";
	echo "<th>Car Rent</th>";
	echo "<th>Car Status</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>".$objCarEntity->getCarName()."</td>";
	echo "<td>".$objCarEntity->getCarNumberPlate()."</td>";
	echo "<td>".$objCarEntity->getCarModel()."</td>";
	echo "<td>".$objCarEntity->getCarCompany()."</td>";
	echo "<td>".$objCarEntity->getCarRent()."</td>";
	echo "<td>".$objCarEntity->getCarStatus()."</td>";
	echo "<td>";
	echo "<form method='POST' action="."BookedForm.php".">";
	echo "<button type='submit' name='cBook' value=".$objCarEntity->getCarNumberPlate().">Book Now</button>";
	echo "</form>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "</div>";
	echo "</section>";

	}
?>

</body>
</html>