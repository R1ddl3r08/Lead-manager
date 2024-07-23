<?php

require_once('./autoload.php');

use Models\Lead;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $lead = new Lead($first_name, $last_name, $email, $mobile);

    if ($lead->create()) {
        echo json_encode(["success" => true]);
    } else {
        http_response_code(500);
        echo json_encode(["success" => false]);
    }
} else {
    http_response_code(405);
    echo json_encode(["message" => "Invalid request method."]);
}

?>
