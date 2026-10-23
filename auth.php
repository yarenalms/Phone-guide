<?php
// Yetkili oturum kontrolü: yetkili sayfalarının en başında require edilir.
// Giriş yapılmamışsa kullanıcı giriş sayfasına yönlendirilir.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['yetkili_id'])) {
    header("Location: yetkili.php");
    exit;
}
