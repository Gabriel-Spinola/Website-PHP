<div class="mail-bug">
<?php

include '../config.php';

$data = [];

$email = $_POST['identifier'] == 'form_home' ? $_POST['email'] : 'sampleemail7000@gmail.com';
$name = isset($_POST['name']) && $_POST['identifier'] == 'form_contact' ? $_POST['name'] : 'Anonymous';

if($_POST['identifier'] == 'form_contact') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
}

$subject = 'New Site Message';
$body = '';

// format info (capitalize first letter)
foreach($_POST as $key => $row) {
    if ($key == 'identifier')
        continue;

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
} else {
    $data['error'] = true;
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