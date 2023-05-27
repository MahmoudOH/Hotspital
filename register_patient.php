<?php 
require_once("views/db_helper.php");
$db_helper = new DbHelper();
$db_helper->createDbConnection();

if (!empty($_GET['patient']) && !empty($_GET['doctor'])){
   $patient = $_GET['patient'];
   $doctor = $_GET['doctor'];

   $result = $db_helper->insertPatient($patient, $doctor);

   if($result == "Success"){
    header("location:reception.php");
   }else {
    echo "Error";
   }
   
}

?>