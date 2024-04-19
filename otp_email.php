<?php 
    use PHPMailer\PHPMailer\PHPMailer;

    require_once "PHPMailer.php";
    require_once "SMTP.php";
    require_once "Exception.php";

    $mail = new PHPMailer;

    $email = $emails;
    $names = "Account Verification";

    //SMTP Settings
    $mail->SMTPDebug = 0; 

    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "lambatprivate@gmail.com";
    $mail->Password = "ngkx nulo nvah yhsm";
    $mail->Port = 587; //465 for ssl and 587 for tls
    $mail->SMTPSecure = "tls";

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email, $names);
    $mail->addAddress($emails);
    $mail->Subject = "Verify your Account.";
    $mail->Body = 'Good day, Kindly verify your account in this link: <a href="http://localhost/vms/otp.php?id=' . $get_id . '">Click Here to Verify</a> and use this OTP Number to verify your account: <b?>' . $setOTP .'</b> <br> <br> '. 
        ' Thank you and have a nice day.' . '<br> <br>' . '<b> Volunteer Management Strageties of 1-Lambat Ministries Foundation International INC. </b>';

    if ($mail->send())
        echo "Mail Sent";

    else
        // echo('Error sending the email');

?>