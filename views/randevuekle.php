<?php
require '../netting/connect.php';



    // POST verilerini alın
    $durum = "1";

    $hizmetturu = $_POST['hizmetturu'];
    $teknisyen = $_POST['teknisyen'];
    $randevutarihi = $_POST['randevutarihi'];
    $notlar = $_POST['notlar'];
    $musterino = $_POST['musterino'];

    // Veritabanına randevu eklemek için SQL sorgusunu hazırlayın
    $sql = "INSERT INTO randevular (rDurum,rHizmetTuru, rTeknisyen, rTarih, rNot, rMID) 
            VALUES (:durum,:hizmetturu, :teknisyen, :randevutarihi, :notlar, :musterino)";
    
    $stmt = $db->prepare($sql);

    // Parametreleri bağlayın
    $stmt->bindParam(':durum', $durum, PDO::PARAM_STR);
    $stmt->bindParam(':hizmetturu', $hizmetturu, PDO::PARAM_STR);
    $stmt->bindParam(':teknisyen', $teknisyen, PDO::PARAM_STR);
    $stmt->bindParam(':randevutarihi', $randevutarihi, PDO::PARAM_STR);
    $stmt->bindParam(':notlar', $notlar, PDO::PARAM_STR);
    $stmt->bindParam(':musterino', $musterino, PDO::PARAM_INT);

    // Sorguyu çalıştırın
    $stmt->execute();

    // Başarılı bir şekilde eklenirse sonucu JSON olarak döndürün
    $response = array("status" => "true");
    echo json_encode($response);

?>