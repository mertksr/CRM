<?php 
 include 'connect.php';

 $stmt = $db->prepare("SELECT ayarIndirim FROM ayarlar WHERE id = 1");
 $stmt->execute();
 $result = $stmt->fetch(PDO::FETCH_ASSOC);
 
 // İndirim tutarı döndürülür
 echo $result['ayarIndirim'];
?>