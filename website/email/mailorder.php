        
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
    $mail->setFrom('info.arista.co@gmail.com', 'Arista');
    $mail->addAddress($_SESSION['user_email'], $_SESSION['user_name'] );     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Great news! We have recieved your order';
    $mail->Body    = '<h3><b> AoA   </b>'.$_SESSION['user_name'].',</h3><br>
    We’re happy to let you know that we’ve got your order.Here’s the confirmation of your order.
    Your total bill is: '.$_SESSION['bill'].' Pkr which will be charged at the time of delivery.
    Your order will be delivered within the next [7] days.<br>
    If you have any questions, contact us on website or call us on 03178568846!<br>
    <b>Until then, enjoy your shopping</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    echo "<script>window.location.href='../cart.php';</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}