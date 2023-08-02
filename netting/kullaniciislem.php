<?php 
include 'connect.php';
function guvenlik($girdi){
    $cikti = htmlspecialchars($girdi);
    $cikti = strip_tags($cikti);
    return $cikti;
}
if (isset($_POST['giris'])) {

    $linput1 = guvenlik($_POST["kadi"]);
    $linput2 = $_POST["sifre"];

    $sor = $db->prepare("SELECT * from kullanicilar where kAd = ? AND kSifre = ?");
    $sor->execute(array(
        guvenlik($_POST["kadi"]),
        guvenlik($_POST["sifre"])
    ));
    $cek = $sor->fetch(PDO::FETCH_ASSOC);

    $KontrolSorgusu = $db->prepare("SELECT * FROM kullanicilar WHERE kAd = ? AND kSifre = ?");
    $KontrolSorgusu->execute([$linput1, $linput2]);
    $KontrolSayisi = $KontrolSorgusu->rowCount();
    if ($KontrolSayisi >= 1) {
        $_SESSION['kullanici'] = $linput1;
        $_SESSION['kid'] = $cek['kId'];
        $_SESSION['kyetki'] = $cek['kYetki'];
        $_SESSION['kyetki'] = $cek['kYetki'];
        $_SESSION['personel'] = $cek['kPersonel'];
        if($_SESSION['kyetki']==1){
        header("Location:../views/index.php?f=y"); }
        if($_SESSION['kyetki']==2){
            header("Location:../views/personel/index.php?f=y"); }
        exit();
    } else {
        header("Location:../../index.php?user=notFound");
        exit();
    }
}

if($_GET['s']=="out"){
    session_destroy();
    header("Location:../index.php?cikis=ok");
}

?>