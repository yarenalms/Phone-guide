  <?php
  require_once 'db.php'; // veritabanı bağlantısını buradan alıyoruz
  ?>
  <!DOCTYPE html>
  <html lang="tr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Telefon Rehberi</title>
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

      .content {
        flex: 1;
        padding: 60px 20px;
        text-align: center;
      }

      .contact-info {
        margin-top: 20px;
        font-size: 1.1rem;
      }

      .contact-info a {
        color: #0047AB;
        font-weight: bold;
        text-decoration: none;
      }

      .faculties,
      .departments,
      .rectorate {
        max-width: 900px;
        margin: 20px auto;
        text-align: left;


      }

      .faculties h2,
      .departments h2,
      .rectorate h2 {
        color: #0047AB;
        font-size: 1.4rem;
        margin-bottom: 15px;

      }

      .faculty,
      .department,
      .rectorate-item {
        background-color: #e6eaf0;
        border-left: 5px solid #0047AB;
        margin-bottom: 15px;
        padding: 12px 20px;
        cursor: pointer;
        border-radius: 8px;
        transition: background-color 0.3s ease, transform 0.3s ease;
        text-decoration: none;
      }

      .faculty:hover,
      .department:hover,
      .rectorate-item:hover {
        background-color: #f0f5ff;
        transform: translateX(10px);
      }

      .faculty a {
        text-decoration: none;
        color: inherit;
        display: block;
      }


      .footer {
        background-color: #001F5B;
        color: #fff;
        text-align: center;
        padding: 10px 0;
        font-size: 12px;
        width: 100%;
        font-family: Arial, sans-serif;
        margin-top: auto;
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
    <div class="navbar">
      <div class="logo-container">
        <img src="#" alt=" Logo">
        <div class="title">
          #<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TELEFON REHBERİ
        </div>
      </div>
      <div class="nav-links">
        <a href="anasayfa.php">Anasayfa</a>
        <a href="">Kampüs</a>
        <a href="iletisim.php">İletişim</a>
        <a href="yetkili.php">Yetkili</a>
        <div class="icons">
          <a href=""><img src="icons8-call-50.png" alt="Telefon"></a>
          <a href=""><img src="icons8-mail-24.png" alt="Mail"></a>
          <a href="https://www.instagram.com/"><img src="icons8-insta-50.png" alt="Instagram"></a>
        </div>
      </div>
    </div>
    </div>
    </div>

    <div class="search-container">
      <input type="text" id="search-input" placeholder="Arama yapın...">
    </div>

    <div class="content">
      <div class="contact-info">
        <p>Telefon numaralarının güncellenmesi için lütfen <a href="mailto:rehber@ornek.edu.tr">rehber@ornek.edu.tr</a> adresine mail atınız.</p>
      </div>

      <div class="faculties">
        <h2>Fakülteler</h2>
        <?php
        $fakulteler = $db->query("SELECT id, ad FROM fakulteler ORDER BY ad ASC");
        while ($fakulte = $fakulteler->fetch_assoc()) {
          $link = 'fakulte.php?id=' . $fakulte['id'];
          echo '<div class="faculty"><a href="' . $link . '">' . htmlspecialchars($fakulte['ad']) . '</a></div>';
        }
        ?>
      </div>

      <div class="faculties">
        <h2>Diğer Birimler</h2>
        <?php
        $birimler = $db->query("SELECT * FROM birimler WHERE ust_birim_id IS NULL AND kategori != 'Fakülte' ORDER BY kategori, ad ASC");
        while ($ust = $birimler->fetch_assoc()) {
          echo '<div class="faculty">';
          echo '<strong>' . htmlspecialchars($ust['ad']) . '</strong>';

          $altq = $db->prepare("SELECT * FROM birimler WHERE ust_birim_id = ?");
          $altq->bind_param("i", $ust['id']);
          $altq->execute();
          $altlar = $altq->get_result();

          if ($altlar->num_rows > 0) {
            echo '<ul>';
            while ($alt = $altlar->fetch_assoc()) {
              echo '<li>' . htmlspecialchars($alt['ad']);
              $kisiler = $db->prepare("SELECT ad_soyad, unvan, telefon, email, resim FROM kisiler WHERE birim_id = ?");


              $kisiler->bind_param("i", $alt['id']);
              $kisiler->execute();
              $kres = $kisiler->get_result();
              if ($kres->num_rows > 0) {
                echo '<ul>';
                while ($kisi = $kres->fetch_assoc()) {
                  echo '<li>' . htmlspecialchars($kisi['unvan'] . ' ' . $kisi['ad_soyad']) . '</li>';
                }
                echo '</ul>';
              }
              echo '</li>';
            }
            echo '</ul>';
          } else {
            $kisiler = $db->prepare("SELECT ad_soyad, unvan, telefon, email, resim FROM kisiler WHERE birim_id = ?");


            $kisiler->bind_param("i", $ust['id']);
            $kisiler->execute();
            $kres = $kisiler->get_result();
            if ($kres->num_rows > 0) {
              echo '<ul>';
              while ($kisi = $kres->fetch_assoc()) {

                $profilResim = !empty($kisi['resim']) ? 'uploads/' . htmlspecialchars($kisi['resim']) : 'uploads/default-profile.png';

                echo '<li style="display: flex; align-items: center; gap: 15px; margin-bottom: 10px;">';
                echo '<img src="' . $profilResim . '" alt="Profil" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">';
                echo '<div>';
                echo '<strong>' . htmlspecialchars($kisi['unvan'] . ' ' . $kisi['ad_soyad']) . '</strong><br>';
                echo '📞 ' . htmlspecialchars($kisi['telefon']) . '<br>';
                echo '✉️ ' . htmlspecialchars($kisi['email']);
                echo '</div>';
                echo '</li>';
              }
              echo '</ul>';
            }
          }

          echo '</div>';
        }
        ?>
      </div>
    </div>
    <div class="footer">
      <div class="footer-content">
        <img src="" alt=" Logo" class="footer-logo">
        <p>Yaren ALMAS  <br> © 2025</p>
      </div>
    </div>
    <script>
      document.getElementById('search-input').addEventListener('input', function() {
        searchItems();
      });

      function searchItems() {
        const input = document.getElementById('search-input').value.toLowerCase();
        const items = document.querySelectorAll('.faculty, .department, .rectorate-item');

        items.forEach(item => {
          const originalText = item.getAttribute('data-original-text') || item.innerHTML;
          item.setAttribute('data-original-text', originalText);

          // Orijinal HTML'i geri yükle
          item.innerHTML = originalText;

          const textContent = item.textContent.toLowerCase();

          if (input === '') {
            item.style.display = 'block';
          } else if (textContent.includes(input)) {
            highlightNodeMatches(item, input);
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        });
      }

      function highlightNodeMatches(element, searchTerm) {
        const regex = new RegExp(`(${searchTerm})`, 'gi');

        element.childNodes.forEach(node => {
          if (node.nodeType === Node.TEXT_NODE) {
            const parts = node.textContent.split(regex);

            if (parts.length > 1) {
              const fragment = document.createDocumentFragment();

              parts.forEach(part => {
                if (part.toLowerCase() === searchTerm) {
                  const mark = document.createElement('mark');
                  mark.textContent = part;
                  fragment.appendChild(mark);
                } else {
                  fragment.appendChild(document.createTextNode(part));
                }
              });

              node.parentNode.replaceChild(fragment, node);
            }
          } else if (node.nodeType === Node.ELEMENT_NODE) {
            highlightNodeMatches(node, searchTerm); // iç içe elementler için recursive
          }
        });
      }
    </script>

  </body>

  </html>
