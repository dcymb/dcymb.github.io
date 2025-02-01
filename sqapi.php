<?php
// 设置响应头为 JSON 格式
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("content-type:text/html;charset=utf-8");
// 获取客户端传递的参数 
$domain = $_GET['domain'] ?? ''; // 域名
// 检查参数是否为空
if ( empty($domain)) {
    echo json_encode(['error' => 'QQ20233652']); // 返回错误信息
    exit;
}
// 连接数据库
$mysqli = new mysqli('localhost', 'auth_ackpet_com', 'auth_ackpet_com', 'auth_ackpet_com');
if ($mysqli->connect_error) {
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

// 查询域名是否在授权列表中
$query = $mysqli->prepare('SELECT domain FROM oreo_authorize WHERE ? LIKE CONCAT("%.", domain) OR ? = domain');
$query->bind_param('ss', $domain, $domain);
$query->execute();
$query->store_result();


if ($query->num_rows > 0) {
    // 域名在授权列表中
    echo json_encode(1);
} else {
    // 域名不在授权列表中
    echo json_encode(0);
}

$query->close();
$mysqli->close();
?>