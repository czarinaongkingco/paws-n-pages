<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Semaphore\SemaphoreClient;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

// require_once('/xampp/php/vendor/autoload.php'); // Change according to your file path of autoload.php

// To notify customer when booking is confirmed
function sendEmail($name, $email, $subject, $date, $time, $clinic, $refno, $services)
{

    $mail = new PHPMailer(true);
    try {

        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'pawsnpages.site@gmail.com';                     //SMTP username
        $mail->Password   = 'zbytxxyfahbtjojr';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('pawsnpages.site@gmail.com', 'Paws N Pages');
        $mail->addAddress($email, $name);     //Add a recipient

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = '<p>Greetings, <b>' . $name . '</b>! 
                        </br>Thank you for patiently waiting. This is an automated email to inform you that your appointment on ' . $date . ' (' . $time . ') at <b>' . $clinic . '</b> is now <b>CONFIRMED</b>. Please be reminded that cancellations of bookings should be made <b>three (3)</b> days at most, prior to the appointment date itself. If you have any inquiries/concerns, please feel free to send us a message through our email (pawsnpages.site@gmail.com). <br/>              

                        <br/>Scheduled Appointment Date: <b>' . $date . '</b>' .
            '<br/> Scheduled Appointment Time: <b>' . $time . '</b>' .
            '<br/> Service(s) Availed: <b>' . $services . '</b>' .
            '<br/> Reference Number: <b>' . $refno . '</b>' .

            '<br/> <br/> Best Regards, <br/>
                        <b>Paws N Pages</b></p>';
        $mail->send();

        // Set success message
        $message = "Your message has been sent. We'll get back to you as soon as possible.";
    } catch (Exception $e) {
        // Set error message
        $message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// To send SMS notification
function sendSMS($name, $contactno, $date, $time, $clinic, $refno, $services)
{
    $ch = curl_init();
    $parameters = array(
        'apikey' => '44890ca1c247ca42a6874c73fc5bcdf1', //Your API KEY
        'number' => $contactno,
        'message' => 'Greetings, ' . $name . '! Thank you for patiently waiting. This is an automated message to inform you that your appointment on ' . $date . ' (' . $time . ') at ' . $clinic . ' with Reference Number: ' . $refno . ' is now CONFIRMED. You have availed ' . $services . '. Please be reminded that cancellations of bookings should be made three (3) days at most, prior to the appointment date itself. If you have any inquiries/concerns, please feel free to send us a message through our email (pawsnpages.site@gmail.com).',
        'sendername' => 'SEMAPHORE'
    );
    curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
    curl_setopt($ch, CURLOPT_POST, 1);

    //Send the parameters set above with the request
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));

    // Receive response from server
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);

    //Show the server response
    // echo $output;
}


function sendNotification_PB($name, $num_pb, $amount)
{

    $mail = new PHPMailer(true);
    try {

        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'lmb.ownerr@gmail.com';                     //SMTP username
        $mail->Password   = 'oqirivqhyojsejxe';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('lmb.ownerr@gmail.com', 'Paws N Pages Notification Team');
        $mail->addAddress('pawsnpages.site@gmail.com', 'Paws N Pages');     //Add a recipient

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Pet Booklet Confirmation Notification';
        $mail->Body = '<p>Greetings, Paws N Pages! <br/>
                        <br/>This is an automated email to inform you that a pet owner has purchased a pet booklet that is yet to be confirmed by our team.           

                        <br/><br/>Name of Pet Owner: <b>' . $name . '</b>' .
            '<br/> No. of Pet Booklet(s) Purchased: <b>' . $num_pb . '</b>' .
            '<br/> Amount: <b>' . $amount . '</b>' .

            '<br/> <br/> Best Regards, <br/>
                        Paws N Pages Notification Team</p>';
        $mail->send();

        // Set success message
        $message = "Your message has been sent. We'll get back to you as soon as possible.";
    } catch (Exception $e) {
        // Set error message
        $message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


function sendNotification_BusinessReq($email, $name)
{
    $mail = new PHPMailer(true);
    try {

        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'pawsnpages.site@gmail.com';                     //SMTP username
        $mail->Password   = 'zbytxxyfahbtjojr';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('pawsnpages.site@gmail.com', 'Paws N Pages');
        $mail->addAddress($email, $name);     //Add a recipient

        //Content
        $mail->isHTML(true);
        $mail->Subject = "Evaluated Business Requirements";
        $mail->Body = '<p>Greetings, <b>' . $name . '</b>! 
                            </br>This is an automated email to inform you that your business requirements have been evaluated. Please log in to your account once again as you are now eligible to proceed to the payment. If you have any inquiries/concerns, please feel free to send us a message through our email (pawsnpages.site@gmail.com). <br/>' .

            '<br/> <br/> Best Regards, <br/>
                            <b>Paws N Pages</b></p>';
        $mail->send();

        // Set success message
        $message = "Your message has been sent. We'll get back to you as soon as possible.";
    } catch (Exception $e) {
        // Set error message
        $message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


function sendNotification_Active($email, $name)
{
    $mail = new PHPMailer(true);
    try {

        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'pawsnpages.site@gmail.com';                     //SMTP username
        $mail->Password   = 'zbytxxyfahbtjojr';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('pawsnpages.site@gmail.com', 'Paws N Pages');
        $mail->addAddress($email, $name);     //Add a recipient

        //Content
        $mail->isHTML(true);
        $mail->Subject = "Subscription is Active";
        $mail->Body = '<p>Greetings, <b>' . $name . '</b>! 
                                </br>This is an automated email to inform you that your subscription to Paws N Pages is now <b>Active</b>. Please log in to your account once again as you are <b>required</b> to setup your account for pet owners to properly <b>purchase products</b> and <b>book services</b> from you. If you have any inquiries/concerns, please feel free to send us a message through our email (pawsnpages.site@gmail.com). <br/>' .

            '<br/> <br/> Best Regards, <br/>
                                <b>Paws N Pages</b></p>';
        $mail->send();

        // Set success message
        $message = "Your message has been sent. We'll get back to you as soon as possible.";
    } catch (Exception $e) {
        // Set error message
        $message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
