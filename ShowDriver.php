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


	</style>
</head>
<body>
	<table>
	<tr>
		<th>Name</th>
		<th>CNIC</th>
		<th>PhoneNo</th>
		<th>Education</th>
		<th>City</th>
		<th>Type</th>
		<th>Status</th>
		<th>Address</th>
	</tr>
 
<?php
 include("Connection.php");
 include("DriverEntity.php");
 include("DriverDAL.php");

 $objConnection=new Connection();
 $objDriverEntity=new DriverEntity();
 $objDriverDAL=new DriverDAL($objConnection->getConnection());
 $driverList=array();
 $driverList=$objDriverDAL->getAllDrivers();

 foreach($driverList as $key){
     $objDriverEntity=$key;
     echo "<tr>";
     echo "<td>".$objDriverEntity->getDriverName()."</td>";
	 echo "<td>".$objDriverEntity->getDriverCNIC()."</td>";
	 echo "<td>".$objDriverEntity->getDriverPhoneNo()."</td>";
	 echo "<td>".$objDriverEntity->getDriverEducation()."</td>";
	 echo "<td>".$objDriverEntity->getDriverCity()."</td>";
	 echo "<td>".$objDriverEntity->getDriverType()."</td>";
	 echo "<td>".$objDriverEntity->getDriverStatus()."</td>";
	 echo "<td>".$objDriverEntity->getDriverAddress()."</td>";
	 echo "</tr>";
}
 

?>

</table>
</body>
</html>