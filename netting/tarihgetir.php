<?php
include 'connect.php';
header('Content-Type: application/json');


    // Tüm bakım tarihlerini getir
    $sql = "SELECT mSonrakiBakim FROM musteriler WHERE mSonrakiBakim IS NOT NULL AND mSonrakiBakim != '0000-00-00' ORDER BY mSonrakiBakim ASC";
    $stmt = $db->prepare($sql);
    $stmt->execute();

// Bakım sayısını al
$bakimSayisi = $stmt->rowCount();

$dates = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Ay ve yıl kombinasyonlarını takip etmek için bir dizi oluştur
$monthCounts = array();
foreach ($dates as $date) {
    $dateTime = new DateTime($date);
    $monthYear = $dateTime->format('Y-m');
    if (!isset($monthCounts[$monthYear])) {
        $monthCounts[$monthYear] = 0;
    }
    $monthCounts[$monthYear]++;
}


// Elde edilen ay dizisi ve bakım sayısı JSON olarak döndürülür
echo json_encode($monthCounts);
?>