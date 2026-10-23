<?php
require_once 'db.php';

if (isset($_POST["fakulte_id"])) {
    $fakulte_id = intval($_POST["fakulte_id"]);

    $stmt = $db->prepare("SELECT id, ad FROM bolumler WHERE fakulte_id = ? ORDER BY ad ASC");
    $stmt->bind_param("i", $fakulte_id);
    $stmt->execute();
    $sonuc = $stmt->get_result();

    echo '<option value="">Bölüm Seçin</option>';
    while ($row = $sonuc->fetch_assoc()) {
        // htmlspecialchars: veritabanındaki metin HTML/JS olarak çalıştırılmasın (XSS koruması)
        echo '<option value="' . (int)$row['id'] . '">' . htmlspecialchars($row['ad']) . '</option>';
    }
}
