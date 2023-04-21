<?php
  // Veritabanına bağlantı kurulması
// print_r($_POST);
  include 'connect.php';
$musterino = $_POST["musterino"];
$hizmetturu = $_POST["hizmetturu"];
$teknisyen = $_POST["teknisyen"];
$notlar = $_POST["notlar"];
$durum = "1";
$yarın = strtotime("+1 day");
$tarih= date("Y-m-d", $yarın);
// SQL sorgusunu hazırla ve veritabanına ekle
$sql = "INSERT INTO randevular (rMID, rHizmetTuru, rTeknisyen, rDurum, rNot,rTarih) VALUES ('$musterino', '$hizmetturu', '$teknisyen', '$durum', '$notlar','$tarih')";

if ($db->query($sql) === TRUE) {
  echo "Veriler başarıyla kaydedildi.";
} else {
  echo "Kayıt sırasında bir hata oluştu: " . $db->error;
}
?>