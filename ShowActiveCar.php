<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Active Cars</title>
</head>
<style>
		table{
			border: solid 1px black;
			background-color: white;
		}
		td{
			width: 150px; border: 1px solid black;
			background-color: gray;
		}


	</style>
<body>
	<table>
	<tr>
		<th>Name</th>
		<th>Company Name</th>
		<th>Number Plate</th>
		<th>Model</th>
		<th>Rent</th>
		<th>Type</th>
		<th>Status</th>
		
	</tr>
<?php
include("Connection.php");
include("CarEntity.php");
include("CarDAL.php");
$objConnection=new Connection();
$objCarEntity=new CarEntity();
$objCarDAL=new CarDAL($objConnection->getConnection());
$carList=array();
$carList=$objCarDAL->getActiveCars();
foreach ($carList as $key) {
	$objCarEntity=$key;
	echo "<tr>";
	echo "<td>".$objCarEntity->getCarName()."</td>";
	echo "<td>".$objCarEntity->getCarCompany()."</td>";
	echo "<td>".$objCarEntity->getCarNumberPlate()."</td>";
	echo "<td>".$objCarEntity->getCarModel()."</td>";
	echo "<td>".$objCarEntity->getCarRent()."</td>";
	echo "<td>".$objCarEntity->getCarType()."</td>";
	echo "<td>".$objCarEntity->getCarStatus()."</td>";
	echo "</tr>";
}
?>
</table>
</body>
</html>

