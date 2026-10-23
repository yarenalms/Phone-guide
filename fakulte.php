<?php
require_once 'db.php';

// Fakülte ID al
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die('Geçersiz fakülte ID');
}

$fakulte_id = intval($_GET['id']);

// Fakülte adı
$stmt = $db->prepare("SELECT ad FROM fakulteler WHERE id = ?");
$stmt->bind_param("i", $fakulte_id);
$stmt->execute();
$fakulte_query = $stmt->get_result();
if ($fakulte_query->num_rows === 0) {
  die('Fakülte bulunamadı');
}
$fakulte = $fakulte_query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($fakulte['ad']); ?> | </title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f3f4f6;
      color: #333;
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
      z-index: 10;
      margin-left: 190px;
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
      max-width: 1200px;
      margin: 0 auto;
    }

    .department {
      background-color: #e6eaf0;
      border-left: 5px solid #0047AB;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 20px;
    }

    .faculty-details {
      margin-top: 20px;
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }

    .faculty-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
      transition: transform 0.3s;
      width: 250px;
    }

    .faculty-card:hover {
      transform: translateY(-5px);
    }

    .faculty-card img {
      width: 80px;
      height: 80px;
      border-radius: 0;
      object-fit: cover;
      margin-bottom: 10px;
    }

    .faculty-card h4 {
      margin: 10px 0 5px 0;
      color: #0047AB;
      font-size: 1rem;
    }

    .faculty-card p {
      margin: 0;
      font-size: 0.9rem;
      color: #555;
    }

    .footer {
      background-color: #001F5B;
      color: #fff;
      text-align: center;
      padding: 10px 0;
      font-size: 12px;
      margin-top: auto;
    }

    .footer-logo {
      width: 50px;
    }

    .footer-content {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: row;
      gap: 10px;
      flex-wrap: wrap;
      text-align: left;
      max-width: 700px;
      margin: 0 auto;
    }

    .footer-content p {
      margin: 0;
    }

    .search-container {
      display: flex;
      justify-content: center;
      padding: 20px;
    }

    .search-container input {
      max-width: 400px;
      padding: 12px 20px;
      font-size: 1rem;
      border: 2px solid #0047AB;
      border-radius: 30px;
      width: 100%;
    }
  </style>
</head>

<body>

  <div class="navbar">
    <div class="logo-container">
      <img src="" alt=" Logo">
      <div class="title">
        MALATYA TURGUT ÖZAL ÜNİVERSİTESİ<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TELEFON REHBERİ
      </div>
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
    <div class="search-container">
      <input type="text" id="search-input" placeholder="Arama yapın...">
    </div>

    <h1><?php echo htmlspecialchars($fakulte['ad']); ?></h1>

    <?php
    $bolumStmt = $db->prepare("SELECT id, ad FROM bolumler WHERE fakulte_id = ? ORDER BY ad ASC");
    $bolumStmt->bind_param("i", $fakulte_id);
    $bolumStmt->execute();
    $bolumler = $bolumStmt->get_result();
    $kisiStmt = $db->prepare("SELECT unvan, ad_soyad, telefon, email, resim FROM kisiler WHERE bolum_id = ? ORDER BY unvan ASC, ad_soyad ASC");
    while ($bolum = $bolumler->fetch_assoc()) {
      echo '<div class="department">';
      echo '<h3>' . htmlspecialchars($bolum['ad']) . '</h3>';
      echo '<div class="faculty-details">';

      $bolum_id = (int)$bolum['id'];
      $kisiStmt->bind_param("i", $bolum_id);
      $kisiStmt->execute();
      $kisiler = $kisiStmt->get_result();
      if ($kisiler->num_rows > 0) {
        while ($kisi = $kisiler->fetch_assoc()) {
          $resimYolu = !empty($kisi['resim']) ? 'uploads/' . htmlspecialchars($kisi['resim']) : 'default-profile.png';
          echo '<div class="faculty-card">';
          echo '<img src="' . $resimYolu . '" alt="Profil Resmi">';
          echo '<h4>' . htmlspecialchars($kisi['unvan'] . ' ' . $kisi['ad_soyad']) . '</h4>';
          echo '<p>📞 ' . htmlspecialchars($kisi['telefon']) . '</p>';
          echo '<p>📧: ' . htmlspecialchars($kisi['email']) . '</p>';
          echo '</div>';
        }
      } else {
        echo '<p>Kayıtlı kişi bulunamadı.</p>';
      }

      echo '</div>';
      echo '</div>';
    }
    ?>
  </div>

  <div class="footer">
    <div class="footer-content">
      <img src="" alt=" Logo" class="footer-logo">
      <p>Yaren ALMAS <br>© 2025 </p>
    </div>
  </div>

  <script>
    const input = document.getElementById('search-input');
    const cards = document.querySelectorAll('.faculty-card');

    input.addEventListener('input', function() {
      const searchTerm = input.value.toLowerCase();
      const numericSearch = input.value.replace(/[^\d]/g, '');

      cards.forEach(card => {
        const name = card.querySelector('h4')?.innerText.toLowerCase() || '';

        // Tüm <p> etiketlerini tara, içinde 4 veya daha fazla rakam geçen satırı telefon olarak kabul et
        const phoneElement = Array.from(card.querySelectorAll('p')).find(p => /\d{4,}/.test(p.innerText));
        const phoneText = phoneElement?.innerText || '';
        const phoneDigits = phoneText.replace(/[^\d]/g, '');

        const matchesName = name.includes(searchTerm);
        const matchesPhone = phoneDigits.includes(numericSearch);

        if (matchesName || (numericSearch && matchesPhone)) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    });
  </script>



</body>

</html>
