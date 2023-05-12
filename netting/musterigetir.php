<?php  
 //fetch.php  
include 'connect.php'; 
 if(isset($_POST["mMusteriNo"]))  
 {  
     $musterisor = $db->prepare("SELECT * FROM musteriler WHERE mMusteriNo = '".$_POST["mMusteriNo"]."'");
     $musterisor->execute();
     $mustericek = $musterisor->fetch(PDO::FETCH_ASSOC);

      echo json_encode($mustericek);  
 }  
 ?>
 