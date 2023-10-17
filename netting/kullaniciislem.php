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

    // Kullanıcının bilgileriyle oturum açma işlemi
    $sor = $db->prepare("SELECT * FROM kullanicilar WHERE kAd = ? AND kSifre = ?");
    $sor->execute(array($linput1, $linput2));
    $cek = $sor->fetch(PDO::FETCH_ASSOC);

    if ($cek) {
        $_SESSION['kullanici'] = $cek['kAd'];
        $_SESSION['kid'] = $cek['kId'];
        $_SESSION['kyetki'] = $cek['kYetki'];
        $_SESSION['personel'] = $cek['kPersonel'];

        // "Beni Hatırla" seçeneği işaretlendiyse, çereze oturum bilgilerini sakla
        if (isset($_POST['benihatirla'])) {
            $randomBytes = random_bytes(16); // 16 byte'lık rastgele veri oluştur
            $auth_token = bin2hex($randomBytes); // Hexadecimal forma dönüştür
            
            // Auth token'i veritabanına kaydet
            $kullanici_id = $cek['kId'];
            $kaydet = $db->prepare("UPDATE kullanicilar SET auth_token = ? WHERE kId = ?");
            $kaydet->execute(array($auth_token, $kullanici_id));

            setcookie("auth_token", $auth_token, time() + 30 * 24 * 3600, "/");
        }

        // Kullanıcı yetkisine göre yönlendirme
        if ($_SESSION['kyetki'] == 1) {
            header("Location:../views/index.php?f=y");
        } elseif ($_SESSION['kyetki'] == 2) {
            header("Location:../views/personel/index.php?f=y");
        }
        exit();
    } else {
        header("Location:../../index.php?user=notFound");
        exit();
    }
}

if (isset($_GET['s']) && $_GET['s'] == "out") {
    // Oturumu sonlandır, çerezleri temizle ve veritabanındaki auth_token'u sıfırla
    session_destroy();
    setcookie("auth_token", "", time() - 3600); // Geçersiz kıl

    // Kullanıcıya ait auth_token'u veritabanından sıfırla
    if (isset($_COOKIE['auth_token'])) {
        $auth_token = $_COOKIE['auth_token'];
        $kaydet = $db->prepare("UPDATE kullanicilar SET auth_token = NULL WHERE auth_token = ?");
        $kaydet->execute(array($auth_token));
    }

    header("Location:../index.php?cikis=ok");
    exit();
}

?>