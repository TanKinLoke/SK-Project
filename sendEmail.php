<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$code = $_REQUEST["code"];
$id = $_REQUEST["id"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Sistem_Aset_Bilik_iCreatorZ";

//Create connection
$conn = new mysqli($servername,$username,$password,$dbname);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Pengguna WHERE User_ID='$id'";
$result = mysqli_query($conn,$sql);
$result = mysqli_fetch_assoc($result);
$email = $result['Email'];
$user = $result['Username'];

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com;smtp-relay.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'icreatorz.pg@gmail.com';                     // SMTP username
    $mail->Password   = 'iczpg@google';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('icreatorz.pg@gmail.com', 'Mailer');
    $mail->addAddress($email, $user);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Sistem Aset i-CreatorZ Reset Password';
    $mail->Body    = 'This is your code: <br><h2><b>'.$code.'</b></h2>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}+".$email;

}
