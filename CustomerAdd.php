<?php

include("CustomerDAL.php");
include ("Connectivity.php");
include ("CustomerEntity.php");
$objConnection=new Connectivity();
$objCustomerEntity=new CustomerEntity();
$objCustomerDal=new CustomerDAL($objConnection->getConnection());
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     session_start();
    mysqli_select_db($objConnection, 'crental');
     $name = $_POST["name"];
     $email = $_POST["email"];
     $pass = $_POST["pass"];
     $address = $_POST["Address"];
     $cnic = $_POST["CNIC"];
     $city = $_POST["City"];
     $phone = $_POST["Phone"];
     $qurey = "select csEmail as num from reservation where csEmail='$email'";
    $result = mysqli_query($objConnection, $qurey);

     $num = mysqli_num_rows($result);
     if ($num > 0) {
         echo "Customer Exits";
     }  else {
         $objCustomerEntity->setCustomerName($name);
         $objCustomerEntity->setCustomerEmail($email);
         $objCustomerEntity->setCustomerPassword($pass);
         $objCustomerEntity->setCustomerAddress($address);
         $objCustomerEntity->setCustomerCNIC($cnic);
         $objCustomerEntity->setCustomerCity($city);
         $objCustomerEntity->setCustomerPhoneNo($phone);
         $objCustomerDal->insertCustomer($objCustomerEntity);
         include("CustomerPanel.php");
     }
 }
 ?>
