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
    if ($message != $defaultMessage) $body .= ' ' . $defaultMessage . " <br> ";
    
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

// if(isset($_POST['action']) && $_POST['identifier'] == 'form_home') {
//     // required atribute for old browsers
//     if($_POST['email'] != '') {
//         $email = $_POST['email'];

//         // validate e-mail
//         if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
//             // Instantiate Email class
//             $mail = new Email(
//                 host: 'smtp.gmail.com',
//                 username: 'sampleemail7000@gmail.com',
//                 password: 'Sample.123',
//                 name: 'Gabriel'
//             );

//             // Add Address
//             $mail -> AddAddress(email: $email, name: 'X');

//             // Format the email
//             $mail -> FormatEmail(info: [
//                 'subject' => 'Your email has been registered',
//                 'body' => 'Thanks for the preference' . ' <hr> ' . $email
//             ]);

//             // Send
//             if($mail -> SendEmail()) {
//                 echo "<script>alert('Your email has been sent')</script>";
//             } else {
//                 echo "<script>alert('Enter a Valid Email')</script>";
//             }
//         } else {
//             echo "<script>alert('Enter a Valid Email')</script>";
//         }
//     } else {
//         echo "<script>alert('Enter a Valid Email')</script>";
//     }
// } else if(isset($_POST['action']) && $_POST['identifier'] == 'form_contact') {