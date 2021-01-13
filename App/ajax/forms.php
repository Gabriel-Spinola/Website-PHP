<div class="mail-bug">
<?php

include '../config.php';

$data = [];

$email = $_POST['email'];
$name = isset($_POST['name']) ? $_POST['name'] : 'X';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

$subject = 'New Site Message';
$body = '';

// format info (capitalize first letter)
foreach($_POST as $key => $row) {
    $body .= ucfirst($key) . ': ' . $row . '<hr>';
}

$mail = new Email(
    host: 'smtp.gmail.com',
    username: 'sampleemail7000@gmail.com',
    password: 'Sample.123',
    name: 'Gabriel'
);

$mail -> AddAddress(email: 'sampleemail7000@gmail.com', name: $name);

$mail -> FormatEmail(info: [
    'subject' => $subject,
    'body' => $body
]);

if($mail -> SendEmail()) {
    $data['success'] = true;
} else {
    $data['error'] = true;
}

die(json_encode($data));