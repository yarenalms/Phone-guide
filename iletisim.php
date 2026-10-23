<?php
require_once 'db.php'; // veritabanı bağlantısını buradan alıyoruz
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim</title>
    <style>
        .contact-section {
            max-width: 900px;
            margin: 20px auto;
            text-align: left;
        }

        .contact-section h2 {
            color: #0047AB;
            font-size: 1.4rem;
            margin-bottom: 15px;
        }

        .contact-box {
            background-color: #e6eaf0;
            border-left: 5px solid #0047AB;
            padding: 12px 20px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .contact-box p {
            margin: 5px 0;
        }

        .contact-box a {
            color: #0047AB;
            font-weight: bold;
            text-decoration: none;
        }

        .contact-box a:hover {
            color: #FFD700;
        }

        .map-container {
            text-align: center;
            margin-top: 20px;
        }

        iframe {
            width: 100%;
            max-width: 900px;
            height: 300px;
            border: 0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .content {
            flex: 1;
            padding: 60px 20px;
            text-align: center;
        }

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

        .content {
            flex: 1;
            /* İçeriğin sayfa boyutuna göre esnemesini sağlar */
            padding-bottom: 50px;
            /* Footer'ın içeriğe yapışmasını önler */
        }

        .content p {
            font-size: 1.1rem;
            color: #555;
            margin-top: 10px;
        }


        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            color: #001aff;
            text-decoration: none;
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



        /* Yeni eklenen stil */
        .contact-info {
            margin-top: 20px;
            font-size: 1.1rem;
            color: #333;
        }

        .contact-info a {
            color: #0047AB;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-info a:hover {
            color: #FFD700;
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
            <img src="" alt=" Logo">
            <div class="title"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TELEFON REHBERİ</div>
        </div>
        <div class="nav-links">
            <a href="anasayfa.php">Anasayfa</a>
            <a href="">Kampüs</a>
            <a href="iletişim.php">İletişim</a>
            <a href="yetkili.php">Yetkili</a>
            <div class="icons">
                <a href="tel:+2123450000"><img src="icons8-call-50.png" alt="Telefon"></a>
                <a href=""><img src="icons8-mail-24.png" alt="Mail"></a>
                <a href=""><img src="icons8-insta-50.png" alt="Instagram"></a>

            </div>
        </div>
    </div>
    </div>

    <div class="content">
        <h2>İletişim Bilgileri</h2>


        <div class="contact-section">
            <h2>📍 #</h2>
            <div class="contact-box">
                <p><strong>Adres:</strong># </p>
                <p><strong>Adres Kodu:</strong> #</p>
                <p><strong>KEP Adresi:</strong> <a href="#">#</a></p>
                <p><strong>Fax:</strong> #</p>
                <p><strong>Santral:</strong> #</p>
            </div>

            <div class="map-container">
                <iframe
                    src="#"
                    allowfullscreen>
                </iframe>
            </div>

            <h2>📍 #</h2>
            <div class="contact-box">
                <p>#</p>
                <p><strong>KEP Adresi:</strong> <a href="#">#</a></p>
                <p><strong>Fax:</strong> #</p>
                <p><strong>Santral:</strong> #</p>
            </div>

            <div class="map-container">
                <iframe
                    src=""
                    allowfullscreen>
                </iframe>
            </div>
        </div>


    </div>
    <div class="footer">
        <div class="footer-content">
            <img src="" alt="Logo" class="footer-logo">
            <p> Yaren ALMAS <br> © 2025</p>
        </div>
    </div>

</body>

</html>
