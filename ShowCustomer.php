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


<table>
	<tr>
		<th>Customer Name</th>
		<th>Customer CNIC</th>
		<th>Customer PhoneNo</th>
		<th>Customer Email</th>
		<th>Customer Password</th>
		<th>Customer City</th>
		<th>Cutomer Address</th>
	</tr>
 
<?php
include("Connection.php");
include("CustomerEntity.php");
include("CustomerDAL.php");
$objConnection=new Connection();
$objCustomerEntity=new CustomerEntity();
$objCarDAL=new CustomerDAL($objConnection->getConnection());

$carList=array();
$carList=$objCarDAL->getAllCustomer();
foreach ($carList as $key) {
	$objCustomerEntity=$key;
	echo "<tr>";
	echo "<td>".$objCustomerEntity->getCustomerName()."</td>";
	echo "<td>".$objCustomerEntity->getCustomerCNIC()."</td>";
	echo "<td>".$objCustomerEntity->getCustomerPhoneNo()."</td>";
	echo "<td>".$objCustomerEntity->getCustomerEmail()."</td>";
	echo "<td>".$objCustomerEntity->getCustomerPassword()."</td>";
	echo "<td>".$objCustomerEntity->getCustomerCity()."</td>";
	echo "<td>".$objCustomerEntity->getCustomerAddress()."</td>";
	echo "<td>";
	echo "<form method='POST' action="."CustomerDetail.php".">";
	echo "<button type='submit' name='csDetail' value=".$objCustomerEntity->getCustomerID().">Detail</button>";
	echo "</form>";
	echo "</td>";
	echo "</tr>";
}
?>




</table>
</body>
</html>
