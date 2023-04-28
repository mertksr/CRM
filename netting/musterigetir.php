<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "");  
 if(isset($_POST["mMusteriNo"]))  
 {  
      $query = "SELECT * FROM musteriler WHERE mMusteriNo = '".$_POST["mMusteriNo"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 