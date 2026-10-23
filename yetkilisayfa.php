<?php
require_once 'auth.php';   // Giriş yapmamış kullanıcıyı giriş sayfasına yönlendirir
require_once 'db.php';

$message = '';
if (isset($_GET['msg'])) {
  $message = htmlspecialchars($_GET['msg']);
}
?>
<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yetkili Sayfa - </title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
  <style>
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f3f4f6;
      color: #333;
      display: flex;
      flex-direction: column;
    }

    .main-wrapper {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .navbar {
      background: linear-gradient(135deg, #001F5B, #001F5B);
      color: #fff;
      padding: 15px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 120px;
      border-bottom-left-radius: 50% 20px;
      border-bottom-right-radius: 50% 20px;
    }

    .navbar .logo-container {
      display: flex;
      align-items: center;
      gap: 15px;
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

    .main-container {
      display: flex;
      flex: 1;
    }

    .sidebar {
      width: 220px;
      background-color: #ffffff;
      padding: 20px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar button {
      width: 100%;
      margin-bottom: 10px;
      padding: 10px;
      background-color: #0047AB;
      color: white;
      border: none;
      border-radius: 20px;
      cursor: pointer;
      font-size: 0.95rem;
    }

    .sidebar button:hover {
      background-color: #002e73;
    }

    .content {
      flex-grow: 1;
      padding: 40px 20px;
      padding-top: 60px;
    }

    .section {
      display: none;
      background-color: #fff;
      padding: 25px;
      margin-bottom: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .section.active {
      display: block;
    }

    .section h3 {
      margin-top: 0;
      color: #0047AB;
    }

    .section label,
    .section select,
    .section input {
      display: block;
      width: 100%;
      margin-bottom: 15px;
    }

    .section button {
      padding: 10px 20px;
      background-color: #0047AB;
      color: #fff;
      border: none;
      border-radius: 25px;
      font-size: 1rem;
      cursor: pointer;
    }

    .section button:hover {
      background-color: #001F5B;
    }

    .list-item {
      padding: 10px;
      border-bottom: 1px solid #ddd;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 10px;
    }

    .edit-fields {
      display: none;
      margin-top: 10px;
    }

    .footer {
      background-color: #001F5B;
      color: #fff;
      text-align: center;
      padding: 10px 0;
      font-size: 12px;
    }

    .footer-content {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      flex-wrap: wrap;
      max-width: 700px;
      margin: 0 auto;
    }

    .footer-logo {
      width: 50px;
      height: auto;
      margin-bottom: 5px;
    }

    .scroll-area {
      max-height: 400px;
      overflow-y: auto;
      border: 1px solid #ccc;
      padding-right: 10px;
      margin-top: 10px;
    }

    .message {
      color: green;
      font-weight: bold;
      margin-bottom: 20px;
      text-align: center;
    }

    .profile-pic {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
    }
  </style>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
</head>

<body>
  <div class="main-wrapper">
    <div class="navbar">
      <div class="logo-container">
        <img src="" alt=" Logo">
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

    <div class="main-container">
      <div class="sidebar">
        <button onclick="showSection('ekle')">Kişi Ekle</button>
        <button onclick="showSection('guncelle')">Kişi Güncelle</button>
        <button onclick="showSection('sil')">Kişi Sil</button>
        <button onclick="showSection('birim')">Birim Ekle</button>
      </div>

      <div class="content">
        <?php if ($message != ''): ?>
          <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>

        <div id="ekle" class="section active">
          <h3>Kişi Ekle</h3>
          <form action="process.php?islem=ekle" method="post" enctype="multipart/form-data">
            <label>Ad Soyad</label>
            <input type="text" name="ad_soyad" required>

            <label>Telefon</label>
            <input type="text" name="telefon" required>

            <label>E-Posta</label>
            <input type="email" name="email" required>

            <label>Profil Resmi</label>
            <input type="file" name="resim" accept="image/*">

            <label>Fakülte</label>
            <select name="fakulte_id" id="fakulte-dropdown">
              <option value="">Fakülte Seçin</option>
              <?php
              $fakulteler = $db->query("SELECT id, ad FROM fakulteler ORDER BY ad ASC");
              while ($fak = $fakulteler->fetch_assoc()) {
                echo '<option value="' . $fak['id'] . '">' . $fak['ad'] . '</option>';
              }
              ?>
            </select>

            <label>Bölüm</label>
            <select name="bolum_id" id="bolum-dropdown">
              <option value="">Önce fakülte seçin</option>
            </select>

            <hr>
            <p style="color:#0047AB;"><strong>Veya Fakülte dışında birim seçin:</strong></p>
            <select name="birim_id">
              <option value="">Birim Seçin</option>
              <?php
              $birimler = $db->query("SELECT id, ad FROM birimler ORDER BY ad ASC");
              while ($b = $birimler->fetch_assoc()) {
                echo '<option value="' . $b['id'] . '">' . htmlspecialchars($b['ad']) . '</option>';
              }
              ?>
            </select>

            <label>Unvan</label>
            <select name="unvan" required>
              <option>Prof. Dr.</option>
              <option>Doç. Dr.</option>
              <option>Arş. Gör.</option>
            </select>

            <button type="submit">Ekle</button>
          </form>
        </div>

        <!-- Kişi Güncelle Bölümü -->
        <div id="guncelle" class="section">
          <h3>Kişi Güncelle</h3>
          <div class="scroll-area">
            <?php
            $result = $db->query("SELECT id, unvan, ad_soyad, telefon, email, resim FROM kisiler");
            while ($kisi = $result->fetch_assoc()) {
              $profilResim = !empty($kisi['resim']) ? $kisi['resim'] : 'default-profile.png';
              echo '<div class="list-item">';
              echo '<img src="uploads/' . htmlspecialchars($profilResim) . '" class="profile-pic" alt="Profil">';
              echo '<span onclick="toggleEdit(\'edit' . $kisi['id'] . '\')">'
                . htmlspecialchars($kisi['unvan'] . ' ' . $kisi['ad_soyad']) . ' - '
                . htmlspecialchars($kisi['telefon']) . ' - '
                . htmlspecialchars($kisi['email']) .
                '</span>';
              echo '<div id="edit' . $kisi['id'] . '" class="edit-fields">';
              echo '<form action="process.php?islem=guncelle&id=' . $kisi['id'] . '" method="post" enctype="multipart/form-data">';
              echo '<label>Ad Soyad</label>';
              echo '<input type="text" name="ad_soyad" value="' . htmlspecialchars($kisi['ad_soyad']) . '" required>';
              echo '<label>Telefon</label>';
              echo '<input type="text" name="telefon" value="' . htmlspecialchars($kisi['telefon']) . '" required>';
              echo '<label>E-Posta</label>';
              echo '<input type="email" name="email" value="' . htmlspecialchars($kisi['email']) . '" required>';
              echo '<label>Profil Resmi (Değiştirmek için seçin)</label>';
              echo '<input type="file" name="resim" accept="image/*">';
              echo '<button type="submit">Güncelle</button>';
              echo '</form>';
              echo '</div>';
              echo '</div>';
            }
            ?>
          </div>
        </div>

        <div id="sil" class="section">
          <h3>Kişi Sil</h3>
          <div class="scroll-area">
            <?php
            $result = $db->query("SELECT id, unvan, ad_soyad, telefon, email, resim FROM kisiler");
            while ($kisi = $result->fetch_assoc()) {
              $profilResim = !empty($kisi['resim']) ? $kisi['resim'] : 'default-profile.png';
              echo '<div class="list-item">';
              echo '<img src="uploads/' . htmlspecialchars($profilResim) . '" class="profile-pic" alt="Profil">';
              echo '<span>'
                . htmlspecialchars($kisi['unvan'] . ' ' . $kisi['ad_soyad']) . ' - '
                . htmlspecialchars($kisi['telefon']) . ' - '
                . htmlspecialchars($kisi['email']) .
                '</span>';
              echo '<form action="process.php?islem=sil&id=' . $kisi['id'] . '" method="post" style="display:inline;">';
              echo '<button type="submit">Sil</button>';
              echo '</form>';
              echo '</div>';
            }
            ?>
          </div>
        </div>

        <div id="birim" class="section">
          <h3>Birim Ekle</h3>
          <form action="process.php?islem=birim_ekle" method="post">
            <label>Mevcut Fakültelerden Seç (İsteğe Bağlı)</label>
            <select name="mevcut_fakulte_id">
              <option value="">Yeni Fakülte Gireceğim</option>
              <?php
              $faks = $db->query("SELECT id, ad FROM fakulteler ORDER BY ad ASC");
              while ($fak = $faks->fetch_assoc()) {
                echo '<option value="' . $fak['id'] . '">' . $fak['ad'] . '</option>';
              }
              ?>
            </select>

            <label>Yeni Fakülte Adı (sadece yeni fakülte için doldurun)</label>
            <input type="text" name="fakulte_ad" placeholder="Fakülte Adı">

            <label>Yeni Bölüm Adı</label>
            <input type="text" name="bolum_ad" placeholder="Bölüm Adı" required>

            <button type="submit">Ekle</button>
          </form><!-- Yeni birim sistemi (kategori bazlı) -->
          <div style="margin-top:40px;">
            <h3>Yeni Kurumsal Birim Ekle (kategori bazlı)</h3>
            <form action="process.php?islem=yeni_birim_ekle" method="post">
              <label>Kategori Seç</label>
              <select name="kategori" id="kategori" required onchange="loadUstBirim()">
                <option value="">Kategori Seçin</option>
                <option value="Fakülte">Fakülte</option>
                <option value="Rektörlük">Rektörlük</option>
                <option value="Daire Başkanlığı">Daire Başkanlığı</option>
                <option value="Genel">Genel</option>
                <option value="Bölüm">Bölüm</option>
              </select>

              <label>Üst Birim Seç (opsiyonel)</label>
              <select name="ust_birim_id" id="ust_birim_id">
                <option value="">Üst birim yok</option>
              </select>

              <label>Yeni Birim Adı</label>
              <input type="text" name="birim_ad" required placeholder="örneğin: Yazılım Birimi">

              <button type="submit">Ekle</button>
            </form>
          </div>

          <script>
            function loadUstBirim() {
              const kategori = document.getElementById("kategori").value;
              const xhr = new XMLHttpRequest();
              xhr.open("GET", "get_birimler.php?kategori=" + kategori, true);
              xhr.onload = function() {
                if (xhr.status === 200) {
                  document.getElementById("ust_birim_id").innerHTML = xhr.responseText;
                }
              };
              xhr.send();
            }
          </script>

        </div>

      </div>
    </div>
  </div>





  <div class="footer">
    <div class="footer-content">
      <img src="" alt=" Logo" class="footer-logo">
      <p>Yaren ALMAS <br>© 2025</p>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function showSection(id) {
      document.querySelectorAll('.section').forEach(sec => sec.classList.remove('active'));
      document.getElementById(id).classList.add('active');
    }

    function toggleEdit(id) {
      const editDiv = document.getElementById(id);
      editDiv.style.display = editDiv.style.display === 'block' ? 'none' : 'block';
    }
    $(document).ready(function() {
      $('#fakulte-dropdown').on('change', function() {
        var fakulteID = $(this).val();
        if (fakulteID) {
          $.ajax({
            type: 'POST',
            url: 'get_bolumler.php',
            data: {
              fakulte_id: fakulteID
            },
            success: function(html) {
              $('#bolum-dropdown').html(html);
            }
          });
        } else {
          $('#bolum-dropdown').html('<option value="">Önce fakülte seçin</option>');
        }
      });
    });
    document.addEventListener('DOMContentLoaded', function() {
      const message = document.querySelector('.message');
      if (message) {
        setTimeout(function() {
          message.style.transition = "opacity 0.5s ease";
          message.style.opacity = 0;
          setTimeout(function() {
            message.style.display = "none";
          }, 500);
        }, 1500);
      }
    });
  </script>

</body>

</html>
