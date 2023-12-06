<?php
include 'connect.php';
header('Content-Type: application/json');


    $tarih = $_POST['tarih'];

    // Prepared statement kullanımı
    if(!empty($tarih)){
    $sql = "SELECT mBolge FROM musteriler WHERE LEFT(mSonrakiBakim, 7) = :tarih ORDER BY mBolge ASC";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':tarih', $tarih);
    $stmt->execute();
    } else {
        $sql = "SELECT NeighborhoodName FROM neighborhood WHERE DistrictID = 335 ORDER BY NeighborhoodName ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }
    
    $bakimSayisi = $stmt->rowCount();
    $mahallecek = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    // Ay ve yıl kombinasyonlarını takip etmek için bir dizi oluştur
    $mahalleSayisi = array();
    foreach ($mahallecek as $mahalle) {
        if (!isset($mahalleSayisi[$mahalle])) {
            $mahalleSayisi[$mahalle] = 0;
        }
        $mahalleSayisi[$mahalle]++;
    }
    

// Elde edilen ay dizisi ve bakım sayısı JSON olarak döndürülür
echo json_encode($mahalleSayisi);
?>