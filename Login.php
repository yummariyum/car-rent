<?php

include ("CustomerEntity.php");
session_start();
$objCustomerEntity=new CustomerEntity();



$objConnection=mysqli_connect("localhost", "root", "",
    "carrent");
if(isset($_POST['login'])){
    $csEmail = $_POST['email'];
    $password = $_POST['pass'];
    $errors=array();
    if(empty($csEmail)){
        array_push($errors,"User Name Is required");
    }
    if(empty($password)){
        array_push($errors,"Password is required");
    }



    if(count($errors)==0) {



     $qurey = "SELECT csID,csEmail, csPassword,csName,csPhone,csCNIC FROM customer WHERE csEmail = '$csEmail' && csPassword='$password' ";
     $result = mysqli_query($objConnection,$qurey);
     $check=mysqli_fetch_assoc($result);
     
     while($check){
            if($password==$check['csPassword']){
                $objCustomerEntity->setCustomerID($check["csID"]);
                $objCustomerEntity->setCustomerName($check["csName"]);
                $objCustomerEntity->setCustomerCNIC($check["csCNIC"]);
                $objCustomerEntity->setCustomerPhoneNo($check["csPhone"]);
                $_SESSION["Customer"]=serialize($objCustomerEntity);
               include ("CustomerPanel.php");
                exit();
            }


     }



     echo "Wrong Password";

    }
    }

?>
