<?php 
include 'connect.php'; 
if (isset($_POST['borcdegistir'])) {
    $borc = $_POST['borc'];

    $query = $db->prepare("UPDATE ayarlar SET ayarSirketBorcu=:borc");
    $query->bindParam(':borc', $borc);
    $update = $query->execute();
    if ($update) {
        header("Location: ../views/muhasebe.php?yt=basarili");
        exit();
    } else {
        header("Location: ../views/muhasebe.php?yt=basarisiz");
        exit();
    }
}  ?>
