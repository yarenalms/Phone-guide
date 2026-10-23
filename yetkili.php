<?php
session_start();
require_once 'db.php';

$hata = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username']);
  $tc = trim($_POST['tc']);
  $sifre = trim($_POST['password']);

  // Boş alan kontrolü
  if (empty($username) || empty($tc) || empty($sifre)) {
    $hata = "Lütfen tüm alanları doldurun.";
  } else {
    // Kullanıcıyı bul; şifreyi SQL'de değil, hash ile PHP tarafında doğrula
    $stmt = $db->prepare("SELECT id, sifre FROM kullanicilar WHERE kullanici_adi = ? AND tc_no = ?");
    $stmt->bind_param("ss", $username, $tc);
    $stmt->execute();
    $kullanici = $stmt->get_result()->fetch_assoc();

    if ($kullanici && password_verify($sifre, $kullanici['sifre'])) {
      // Giriş başarılı: oturumu yenile (session fixation'a karşı) ve yetkiliyi kaydet
      session_regenerate_id(true);
      $_SESSION['yetkili_id'] = $kullanici['id'];
      header("Location: yetkilisayfa.php");
      exit;
    } else {
      $hata = "Giriş başarısız. Kullanıcı adı, TC veya şifre yanlış.";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <title>Yetkili Girişi -</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #f3f4f6;
      color: #333;
    }

    .main-wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .navbar {
      background: linear-gradient(135deg, #001F5B, #001F5B);
      color: #fff;
      padding: 15px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
      position: relative;
      height: 120px;
      border-bottom-left-radius: 50% 20px;
      border-bottom-right-radius: 50% 20px;
      overflow: hidden;
    }

    .navbar .logo-container {
      display: flex;
      align-items: center;
      gap: 15px;
      position: relative;
      margin-left: 50px;
      transform: translateX(50px);
      /* yeni eklenecek */
    }

    .navbar img {
      height: 90px;
      transition: transform 0.3s ease;
    }

    .navbar img:hover {
      transform: scale(1.2);
    }

    .navbar .title {
      font-size: 1.5rem;
      font-weight: bold;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      letter-spacing: 1px;
      position: relative;
      left: 50px;
      /* bu zaten var */
      z-index: 10;
      margin-left: 190px;
      /* BURAYI EKLE */
    }

    .navbar .nav-links {
      display: flex;
      gap: 20px;
      align-items: center;
    }

    .navbar .nav-links a {
      color: #fff;
      text-decoration: none;
      font-weight: normal;
      font-size: 0.9rem;
      transition: color 0.3s ease;
    }

    .navbar .nav-links a:hover {
      color: #FFD700;
    }

    .navbar .nav-links .icons {
      display: flex;
      gap: 10px;
    }

    .navbar .nav-links .icons img {
      height: 20px;
    }

    .content {
      flex: 1;
      padding: 60px 20px;
      text-align: center;
    }

    .login-form {
      max-width: 400px;
      margin: 0 auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: left;
    }

    .login-form label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
    }

    .login-form input {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
    }

    .login-form button {
      width: 100%;
      padding: 12px;
      background-color: #0047AB;
      color: white;
      border: none;
      border-radius: 30px;
      font-size: 1rem;
      cursor: pointer;
    }

    .login-form button:hover {
      background-color: #000000;
    }

    .forgot-password {
      text-align: center;
      margin-top: 15px;
    }

    .forgot-password a {
      color: #0047AB;
      text-decoration: none;
    }

    .forgot-password a:hover {
      color: #FFD700;
    }

    .error {
      color: red;
      font-weight: bold;
      margin-bottom: 15px;
      text-align: center;
    }

    .footer {
      background-color: #001F5B;
      color: #fff;
      text-align: center;
      padding: 10px 0;
      font-size: 12px;
      width: 100%;
      font-family: Arial, sans-serif;
      position: relative;
      /* Footer'ın içeriğin altına itilmesini sağlar */
      margin-top: 50px;
      /* İçerikten ayrılması için boşluk bırak */
    }

    .footer-logo {
      width: 50px;
      height: auto;
      margin-bottom: 5px;
    }

    .footer-content {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: row;
      /* yatay yerleşim */
      gap: 10px;
      /* logo ile yazı arası boşluk */
      flex-wrap: wrap;
      text-align: left;
      max-width: 700px;
      margin: 0 auto;
    }

    .footer-content p {
      margin: 0;
    }
  </style>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
</head>

<body>
  <div class="main-wrapper">
    <div class="navbar">
      <div class="logo-container">
        <img src="" alt="">
        <div class="title"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TELEFON REHBERİ</div>
      </div>
      <div class="nav-links">
        <a href="anasayfa.php">Anasayfa</a>
        <a href="">Kampüs</a>
        <a href="iletisim.php">İletişim</a>
        <a href="yetkili.php">Yetkili</a>
        <div class="icons">
          <a href="tel:+2123450000"><img src="icons8-call-50.png" alt="Telefon"></a>
          <a href=""><img src="icons8-mail-24.png" alt="Mail"></a>
          <a href=""><img src="icons8-insta-50.png" alt="Instagram"></a>

        </div>
      </div>
    </div>

    <div class="content">
      <h2>Yetkili Girişi</h2>
      <?php if ($hata): ?>
        <div class="error"><?php echo $hata; ?></div>
      <?php endif; ?>
      <form class="login-form" method="post" action="">
        <label for="username">Kullanıcı Adı:</label>
        <input type="text" id="username" name="username" required>

        <label for="tc">TC Kimlik Numarası:</label>
        <input type="text" id="tc" name="tc" pattern="[0-9]{11}" maxlength="11" required>

        <label for="password">Şifre:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Giriş Yap</button>

        <div class="forgot-password">
          <a href="#">Şifremi Unuttum</a>
        </div>
      </form>
    </div>

  </div>
  <div class="footer">
    <div class="footer-content">
      <img src="" alt="Logo" class="footer-logo">
      <p>Yaren ALMAS <br> © 2025</p>
    </div>
  </div>
</body>

</html>
