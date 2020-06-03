<?php

include ("CustomerEntity.php");
session_start();
$objCustomerEntity=new CustomerEntity;



$objConnection=mysqli_connect("localhost", "root", "",
    "crental");
if(isset($_POST['login'])){
    $csEmail = $_POST['email'];
    $csPassword = $_POST['pass'];
    $errors=array();
    if(empty($csEmail)){
        array_push($errors,"User Name Is required");
    }
    if(empty($password)){
        array_push($errors,"Password is required");
    }



    if(count($errors)==0) {



     $qurey = "SELECT csID,csEmail, csPassword,csName,csPhone,csCNIC FROM customer WHERE csEmail = '$csEmail' && csPassword='$csPassword' ";
     $result = mysqli_query($objConnection,$qurey);
     $check=mysqli_fetch_assoc($result);
     
     while($check){
            if($password==$check['password']){
                $objCustomerEntity->setCustomerID($check["csID"]);
                $objCustomerEntity->setCustomerName($check["csname"]);
                $objCustomerEntity->setCustomerCNIC($check["csCNIC"]);
                $objCustomerEntity->setCustomerPhone($check["csPhone"]);
                $_SESSION["Customer"]=serialize($objCustomerEntity);
               include ("AddReservation.php");
                exit();
            }


     }



     echo "Wrong Password";
//     if(mysqli_num_rows($result)==1){
//         session_start();
//     $_SESSION['mypass']=$_POST['pass'];
//     $_SESSION['myemail']=$_POST['email'];
//
//     header('Location:BookReservation.php');
//     }
//     else{
//         echo "Wrong Password/Email";
//     }
    }
    }

?>
