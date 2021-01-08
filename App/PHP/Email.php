<div class="mail-bug">

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email
{
    private $mail;

    public function __construct(
        $host, $username, $password, $name,
    ) {
        // Load Composer's autoloader
        require 'phpMailer/vendor/autoload.php';

        // Instantiation and passing `true` enables exceptions
        $this -> mail = new PHPMailer(true);

        //Server settings
        $this -> mail -> SMTPDebug  = SMTP ::DEBUG_SERVER;                      // Enable verbose debug output
        $this -> mail -> isSMTP();                                              // Send using SMTP
        $this -> mail -> Host       = $host;                //'smtp.gmail.com'  // Set the SMTP server to send through
        $this -> mail -> SMTPAuth   = true;                                     // Enable SMTP authentication
        $this -> mail -> Username   = $username; // 'sampleemail7000@gmail.com' // SMTP username
        $this -> mail -> Password   = $password;          //'Sample.123'     // SMTP password
        $this -> mail -> SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this -> mail -> Port       = 465;                                     // TCP port to connect to, use 465 or 7000 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $this -> mail -> setFrom($username, $name);

        // Content
        $this -> mail -> isHTML(true);                                  // Set email format to HTML

        // CharSet
        $this -> mail -> CharSet = 'UTF-8';

        // $mail -> addReplyTo('info@example.com', 'Information');
        // $mail -> addCC('cc@example.com');
        // $mail -> addBCC('bcc@example.com');

        // Attachments
        // $mail -> addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail -> addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    }

    public function AddAddress(string $email, string $name): void {
        $this -> mail -> addAddress($email, $name); //'zerogravitystd@gmail.com', 'Gabriel')  // Add a recipient
    }

    public function FormatEmail($info): void {
        $this -> mail -> Subject = $info['subject']; // 'Here is the subject'
        $this -> mail -> Body    = $info['body']; // 'This is the HTML message body <b>in bold!</b>'
        $this -> mail -> AltBody = strip_tags($info['body']); // 'This is the body in plain text for non-HTML mail clients'
    }

    public function SendEmail(): bool {
        return $this -> mail -> send();
    }
}

?>

</div>