<?php
 header('Content-Type: application/json; charset=utf-8');
// // Veritabanı bağlantısı dahil edilir

// // SSP kütüphanesini dahil edin
// require '../public/serverSide/ssp.class.php';

// // SSP için gerekli olan tablo adı, veritabanı bağlantısı ve sorguyu belirtin
// $table = 'neighborhood';
// $primaryKey = 'NeighborhoodID';
// $columns = array(
//     array('db' => 'NeighborhoodName', 'dt' => 1)
// );
// $dbhDetails = array(
//     'host' => 'localhost',
//     'user' => 'root',
//     'pass' => '',
//     'db' => 'pnr',
//     'charset' => 'utf8'
// );
// // SSP sınıfını kullanarak işlem yapın
// $orderBy = "NeighborhoodName ASC";
// echo json_encode(
//     SSP::mahallegetir($_GET, $dbhDetails, $table, $primaryKey, $columns),
//     JSON_UNESCAPED_UNICODE
// );

include 'connect.php';

// Mahalle verilerini veritabanından al
$sql = "SELECT * FROM neighborhood WHERE DistrictID = 335 ORDER BY NeighborhoodName ASC";
$stmt = $db->prepare($sql);
$stmt->execute();

$mahalleler = array();

if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $mahalle = $row["NeighborhoodName"];
        $mahalleler[] = $row["NeighborhoodName"];

        $mustericek = "SELECT * FROM musteriler WHERE mBolge = $mahalle";
        $mustericek = $db->prepare($sql);
        $mustericek->execute();
    }
}




// Verileri JSON formatında geri döndür
echo json_encode($mahalleler);
?>


