 <?php
require 'contact-form/Exception.php';
require 'contact-form/PHPMailer.php';
require 'contact-form/SMTP.php';
require 'contact-form/OAuth.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$gSmtp = "smtp.gmail.com";
$gMail = "admin-email@gmail.com";
$gPass = "sss6565";
$gSender = "New Inquiry!";
$myEmail = "idrisikaif8427@gmail.com";
$subject = "Enquiry - https://kaif-999.github.io/kaif-portfolio/";
$errorMsg = 'Error. We couldn\'t receive the message. Please contact us on <a href="mailto:'.$myEmail.'">'.$myEmail.'</a>';
$successMsg = '<div class="alert alert-success" style="margin:0;"><strong>Success!</strong> Message sent successfully. Someone from our team will revert back as soon as possible.</div>';
$dateVar = date(DATE_RFC2822);
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];
$validation = "";

$email_content = "<b>Name: </b>".$name."<br/>";
$email_content .= "<b>Phone: </b>".$phone."<br/>";
$email_content .= "<b>Email ID: </b>".$email."<br/>";
$email_content .= "<b>Message: </b>".$message."<br/><br/>";

if(isset($_POST['subject'])) {
    $validation = $_POST['subject'];
}

if ($validation == '6') {
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = $gSmtp;
    $mail->Port = 465;
    $mail->IsHTML(true);
    $mail->Username = $gMail;
    $mail->Password = $gPass;

    $mail->setFrom($gMail, $gSender);
    $mail->Subject = $subject;
    $mail->Body = $email_content;

    $mail->AddAddress($myEmail);
 
?>
