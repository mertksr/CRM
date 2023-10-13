<?php
include 'connect.php'; // Veritabanı bağlantısı için gerekli olan dosyanın adını ve yolunu ayarlayın

$id = $_POST['id'];


    
    $sql = "SELECT * FROM musteriler WHERE mMusteriNo = :id LIMIT 1";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($row);

?>
