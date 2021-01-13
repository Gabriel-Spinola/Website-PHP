<?php

include '../config.php';

$data = ['success' => false, 'error' => false];

$defaultMessage = "Thanks for sending your email, now you're registered";

$email = $_POST['identifier'] == 'form_home' ? $_POST['email'] : 'sampleemail7000@gmail.com';
$name = isset($_POST['name']) && $_POST['identifier'] == 'form_contact' ? $_POST['name'] : 'Anonymous';
$message = $_POST['identifier'] == 'form_contact' ? $_POST['message'] : '';

if($_POST['identifier'] == 'form_contact') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
}

$subject = 'New Site Message';
$body = '';

$i = 0;

// format info (capitalize first letter)
foreach($_POST as $key => $row) {
    if ($key == 'identifier') continue;
    if ($message != $defaultMessage && $message != $_POST['message']) $body .= ' ' . $defaultMessage . " <br> ";
    
    $body .= ucfirst($key) . ': ' . $row . '<hr>';
}

$mail = new Email(
    host: 'smtp.gmail.com',
    username: 'sampleemail7000@gmail.com',
    password: 'Sample.123',
    name: 'Gabriel'
);

$mail -> AddAddress(email: $email, name: $name);

$mail -> FormatEmail(info: [
    'subject' => $subject,
    'body' => $body
]);

if($mail -> SendEmail()) {
    $data['success'] = true;
    $data['error'] = false;
} else {
    $data['error'] = true;
    $data['success'] = false;
}

die(json_encode($data));