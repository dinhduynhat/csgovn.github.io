<?php
// Lấy steamid từ tham số truyền vào
$steamid = $_GET['steamid'];

if(isset($steamid) && !empty($steamid)) {
    $appid = 730;
    $contextid = 2;
    $url = "http://steamcommunity.com/inventory/{$steamid}/{$appid}/{$contextid}";

    $result = file_get_contents($url);

    if($result === FALSE) {
        echo 'Không thể lấy nội dung từ URL.';
    } else {
        // Chuyển đổi HTML thành JSON và hiển thị
        $jsonResult = json_encode(['content' => $result]);
        echo "Nội dung từ URL: " . $jsonResult;
    }
} else {
    echo "Vui lòng cung cấp steamid trong tham số URL.";
}
?>
