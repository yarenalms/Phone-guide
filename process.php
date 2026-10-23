<?php
require_once 'auth.php';   // Sadece giriş yapmış yetkililer işlem yapabilir
require_once 'db.php';

if (!isset($_GET['islem'])) {
    header("Location: yetkilisayfa.php?msg=İşlem belirtilmedi");
    exit;
}

// Yüklenen profil resmini doğrular ve kaydeder; başarılıysa dosya adını, değilse null döndürür.
function resimYukle(): ?string
{
    if (!isset($_FILES['resim']) || $_FILES['resim']['error'] !== UPLOAD_ERR_OK) {
        return null;
    }
    $izinli = ['jpg', 'jpeg', 'png', 'webp'];
    $uzanti = strtolower(pathinfo($_FILES['resim']['name'], PATHINFO_EXTENSION));
    if (!in_array($uzanti, $izinli, true) || @getimagesize($_FILES['resim']['tmp_name']) === false) {
        return null; // Resim olmayan dosyalar (ör. .php) reddedilir
    }
    $dosyaAdi = time() . '_' . bin2hex(random_bytes(4)) . '.' . $uzanti;
    if (!move_uploaded_file($_FILES['resim']['tmp_name'], 'uploads/' . $dosyaAdi)) {
        return null;
    }
    return $dosyaAdi;
}

// Boş değeri NULL'a, doluyu tam sayıya çevirir.
function idVeyaNull($deger): ?int
{
    return !empty($deger) ? intval($deger) : null;
}

$islem = $_GET['islem'];

switch ($islem) {
    case 'ekle':
        if (
            isset($_POST['ad_soyad'], $_POST['telefon'], $_POST['unvan'], $_POST['email']) &&
            (!empty($_POST['bolum_id']) || !empty($_POST['birim_id']))
        ) {
            $dosyaAdi = resimYukle() ?? 'default-profile.png';
            $bolum_id = idVeyaNull($_POST['bolum_id'] ?? null);
            $birim_id = idVeyaNull($_POST['birim_id'] ?? null);

            // Prepared statement: kullanıcı verisi SQL'e yazılmaz, ayrı parametre olarak gönderilir.
            $stmt = $db->prepare(
                "INSERT INTO kisiler (ad_soyad, telefon, unvan, email, resim, bolum_id, birim_id)
                 VALUES (?, ?, ?, ?, ?, ?, ?)"
            );
            $stmt->bind_param(
                "sssssii",
                $_POST['ad_soyad'], $_POST['telefon'], $_POST['unvan'], $_POST['email'],
                $dosyaAdi, $bolum_id, $birim_id
            );
            $stmt->execute();

            header("Location: yetkilisayfa.php?msg=Kişi eklendi");
        } else {
            header("Location: yetkilisayfa.php?msg=Eksik veya geçersiz bilgi");
        }
        exit;

    case 'guncelle':
        if (isset($_GET['id'], $_POST['ad_soyad'], $_POST['telefon'], $_POST['email'])) {
            $id = intval($_GET['id']);
            $dosyaAdi = resimYukle();

            if ($dosyaAdi !== null) {
                $stmt = $db->prepare("UPDATE kisiler SET ad_soyad = ?, telefon = ?, email = ?, resim = ? WHERE id = ?");
                $stmt->bind_param("ssssi", $_POST['ad_soyad'], $_POST['telefon'], $_POST['email'], $dosyaAdi, $id);
            } else {
                $stmt = $db->prepare("UPDATE kisiler SET ad_soyad = ?, telefon = ?, email = ? WHERE id = ?");
                $stmt->bind_param("sssi", $_POST['ad_soyad'], $_POST['telefon'], $_POST['email'], $id);
            }
            $stmt->execute();

            header("Location: yetkilisayfa.php?msg=Kişi güncellendi");
            exit;
        }
        break;

    case 'sil':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $stmt = $db->prepare("DELETE FROM kisiler WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            header("Location: yetkilisayfa.php?msg=Kişi silindi");
            exit;
        }
        break;

    case 'birim_ekle':
        if (isset($_POST['bolum_ad'])) {
            if (!empty($_POST['mevcut_fakulte_id'])) {
                $fakulte_id = intval($_POST['mevcut_fakulte_id']);
            } elseif (!empty($_POST['fakulte_ad'])) {
                $stmt = $db->prepare("INSERT INTO fakulteler (ad) VALUES (?)");
                $stmt->bind_param("s", $_POST['fakulte_ad']);
                $stmt->execute();
                $fakulte_id = $db->insert_id;
            } else {
                header("Location: yetkilisayfa.php?msg=Fakülte seçin veya girin");
                exit;
            }

            $stmt = $db->prepare("INSERT INTO bolumler (fakulte_id, ad) VALUES (?, ?)");
            $stmt->bind_param("is", $fakulte_id, $_POST['bolum_ad']);
            $stmt->execute();

            header("Location: yetkilisayfa.php?msg=Bölüm eklendi");
            exit;
        }
        break;

    case 'yeni_birim_ekle':
        if (isset($_POST['birim_ad'], $_POST['kategori'])) {
            $ust_id = idVeyaNull($_POST['ust_birim_id'] ?? null);

            $stmt = $db->prepare("INSERT INTO birimler (ad, kategori, ust_birim_id) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $_POST['birim_ad'], $_POST['kategori'], $ust_id);
            $stmt->execute();

            header("Location: yetkilisayfa.php?msg=Yeni birim eklendi");
        } else {
            header("Location: yetkilisayfa.php?msg=Eksik bilgi");
        }
        exit;

    default:
        header("Location: yetkilisayfa.php?msg=Bilinmeyen işlem");
        exit;
}

header("Location: yetkilisayfa.php?msg=Eksik veya geçersiz bilgi");
exit;
