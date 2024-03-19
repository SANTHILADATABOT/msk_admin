<?php
include("/inc/dbConnect.php");

 $number = count($_POST["mobile_number"]); 

//  $otp = array();
//  $number = $_POST["mobile_number"];  
//  echo var_dump($number); 

if($number > 0)  
{  
     for($i=0; $i<$number; $i++)  
     {
          $otp = mt_rand(111111, 999999);  
          if(trim($_POST["mobile_number"][$i] != ''))  
          {  
               $sql = "INSERT INTO otp (mobile_number, otp) VALUES (:mobile_number, :otp)";  
               $stmt = $pdo_conn->prepare($sql);
               $pdo_array = array(':mobile_number'=>$_POST["mobile_number"][$i], ':otp'=>$otp);
               $result =$stmt->execute($pdo_array);       
               echo var_dump($otp); 
          }  
     }  
     echo "Data Inserted";  
}

else  
{  
     echo "Please Enter Mobile Number";  
}  
?>

   
  
