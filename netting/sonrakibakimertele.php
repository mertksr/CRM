<?php
require '../netting/connect.php';

// Gelen POST verilerini alın
$erteleay = $_POST['erteleay'];
$musterino = $_POST['musterino'];
$sonrakibakim = $_POST['sonrakibakimtarihi'];

// Ertelenmiş tarihi hesaplayın
if (!empty($erteleay) && is_numeric($erteleay)) {
    $yeni_tarih = date('Y-m-d', strtotime($sonrakibakim . ' +' . $erteleay . ' months'));
}

// Veritabanına güncelleme sorgusunu hazırlayın
$sql = "UPDATE musteriler SET mSonrakiBakim = :tarih WHERE mMusteriNo = :mno";

$stmt = $db->prepare($sql);
$stmt->bindParam(':tarih', $yeni_tarih, PDO::PARAM_STR);
$stmt->bindParam(':mno', $musterino, PDO::PARAM_INT);

// Sorguyu çalıştırın
if ($stmt->execute()) {
    // Başarılı bir şekilde güncellendiğinde sonucu JSON olarak döndürün
    $response = array("status" => "true");
    echo json_encode($response);
} else {
    // Hata oluştuysa JSON olarak hata mesajını döndürün
    $response = array("status" => "false", "error" => "Veritabanı hatası");
    echo json_encode($response);
}
?>
