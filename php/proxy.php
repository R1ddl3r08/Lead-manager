<?php
$url = 'https://regression.pabau.me/OAuth2/leads/lead-curl.php';
$data = $_POST;
$options = [
    'http' => [
        'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ],
];
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
echo $result;
?>
