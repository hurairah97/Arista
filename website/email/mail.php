        
        <?php
 session_start(); 
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require ('PHPMailer/Exception.php');
require ('PHPMailer/SMTP.php');
require ('PHPMailer/PHPMailer.php');

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info.arista.co@gmail.com';                     //SMTP username
    $mail->Password   = 'arista121';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('info.arista.co@gmail.com', 'Arista & co');
    $mail->addAddress($_SESSION['user_email'], $_SESSION['user_name'] );     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Welcome to Arista';
    $mail->Body    = '<h3><b> AoA   </b>'.$_SESSION['user_name'].',</h3><br>
    We’re super excited to see you join the Arista community. 
    We hope you will be happy with products and that you will shop with us again and again.<br>
    Our goal is to offer the widest range of products  at the highest quality. If you think we should add any items to our store, don’t hesitate to contact us and share your feedback.<br>
    <b>Until then, enjoy your shopping</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    echo "<script>window.location.href='../login.php?lastPage=pop';</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}