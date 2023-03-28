<?php
 include 'connect.php';
// Seçilen ürünlerin fiyatlarını alın
$selectedProducts = explode(",", $_POST["products"]);
$placeholders = implode(",", array_fill(0, count($selectedProducts), "?"));
$sql = "SELECT urunFiyat FROM urunler WHERE urunid IN ($placeholders)";
$stmt = $db->prepare($sql);
$stmt->execute($selectedProducts);
$prices = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Fiyatları JSON olarak döndürün
echo json_encode($prices);