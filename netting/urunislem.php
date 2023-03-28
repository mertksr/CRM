<?php
 include 'connect.php';

        
 if (isset($_POST['urunekle'])) {
    $query = $db->prepare("INSERT INTO urunler SET
      	urunCinsi = :uruncins,
        urunModeli = :urunmodel,
        urunMarka = :urunmarka,
        urunAd = :urunad,
        urunFiyat = :urunfiyat,
        urunGaranti = :urungaranti,
        urunNotlari = :urunnotlari
                ");

    $insert = $query->execute(array(
        "uruncins" =>$_POST['uruncinsi'],
        "urunmodel" =>$_POST['urunmodeli'],
        "urunmarka" => $_POST['urunmarka'],
        "urunad" => $_POST['urunad'],
        "urunfiyat" => $_POST['urunfiyat'],
        "urungaranti" => $_POST['garantisuresi'],
        "urunnotlari" => $_POST['ozelnotlar']
    ));
 
    if ($insert) {
        $last_id = $db->lastInsertId();
          header("Location:../views/urunekle.php?yt=basarili");
          exit();

    } else {

         header("Location:../views/urunekle.php?yt=basarisiz");
         exit();
    }
}
?>