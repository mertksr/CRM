<?php
include 'connect.php'; // Veritabanı bağlantısı

$sql = "SELECT iletisimTuru, iletisimBilgisi FROM iletisim ";
$stmt = $db->query($sql);

$contacts = array(); // İletişim bilgilerinin saklanacağı dizi

if ($stmt->rowCount() > 0) {
  while ($row = $stmt->fetch()) {
    $contact_info = $row['iletisimTuru'];
    $contact_type = $row['iletisimBilgisi'];
    $contact = array("tur" => $contact_info, "bilgi" => $contact_type);
    array_push($contacts, $contact);
  } }
  ?>