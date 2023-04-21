<?php 
include 'connect.php';
// if (isset($_GET['no'])) {
//     $musterino = intval($_GET['no']);
// } else {
//     header('HTTP/1.1 400 Bad Request');
//     exit;
// }

// // Verileri sorgula
// $query = "SELECT * FROM musteriler WHERE mMusteriNo = :customer_id LIMIT 1";
// $stmt = $db->prepare($query);
// $stmt->bindParam(':customer_id', $musterino, PDO::PARAM_INT);
// $stmt->execute();

// // Verileri JSON olarak dön
// $data = $stmt->fetch(PDO::FETCH_ASSOC);
// if ($data) {
//     header('Content-Type: application/json; charset=utf-8');
//     echo json_encode($data, JSON_UNESCAPED_UNICODE);
// } else {
//     header('HTTP/1.1 404 Not Found');
//     exit;}


$query = "SELECT * FROM musteriler LIMIT 1";
$stmt = $db->query($query);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($row);
 ?>