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

// 模拟授权检查逻辑
// 这里可以根据实际需求检查数据库或其他授权系统
$authorized_domains = [
    'example.com', // 授权的域名
    'cloud.ackpet.com', // 授权的域名  
];

if (in_array($domain, $authorized_domains)) {
    // 如果域名在授权列表中，返回 1 表示授权成功
    echo json_encode(1);
} else {
    // 如果域名不在授权列表中，返回 0 表示授权失败
    echo json_encode(0);
}
?>
