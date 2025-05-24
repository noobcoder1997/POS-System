<?php
    require '../../config/functions.php';
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require '../../vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    $message="";
    $message_array = [
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Email Sent:</strong> Please check email in your account<a href="index.php"> Login</a>.
            </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Email Invalid:</strong> Message could not be sent.
            </div'
    ];
    try {
        
        $email = validate($_POST['email']);

        $stmt=$conn->prepare("SELECT * FROM users WHERE email = ? ");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result=$stmt->get_result();
        if(mysqli_num_rows($result) > 0){
            $token = bin2hex(random_bytes(32));
            $expires_at = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token expires in 1 hour

            // Store token in database
            $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_expires = ? WHERE email = ?");
            $stmt->bind_param('sss', $token, $expires_at, $email);
            $stmt->execute();

            // Create reset link
            $reset_link = "http://localhost/POS.System/new-password.php?token=$token";

            // Send email (Simplified)
            // $subject = "Password Reset Request";
            // $message = "Click the link to reset your password: $reset_link\n\nThis link will expire in 1 hour.";
            // mail($email, $subject, $message);

            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();
            $mail->isHTML(false);                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'noobcoder1997@gmail.com';                     //SMTP username
            $mail->Password   = 'cuqedjkfxqwhljfd';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($email, '');
            $mail->addAddress($email, '');     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            
            //Content
            $mail->Subject = 'Reset Your Password';
            $mail->Body    = "Hi $email,
                                <br>
                                <br>
                                We received a request to reset your password. Click the link below to create a new one:
                                <a href='$reset_link'>$reset_link</a>.
                                If you didn’t request this change, you can ignore this email. Your current password will remain the same.
                                <br>
                                <br>
                                For security reasons, this link will expire in one (1) hour.
                                <br>
                                <br>
                                Best,
                                <br>
                                My-POS
                                <br>
                                noobcoder1997@gmail.com";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            $message = $message_array[0];
        }       
    } catch (Exception $e) {
        $message = $message_array[1]; //Message could not be sent. Mailer Error: '.$mail->ErrorInfo.
    }
    echo $message;
    //  echo json_encode($message); this technique is use for passing php array to jqajax, make sure to have sa dataType: 'json' in your ajax structure
?>
<?php
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;

    // require 'vendor/autoload.php'; // Adjust based on your installation method

    // $mail = new PHPMailer(true); // Enable exceptions

    // // SMTP Configuration
    // $mail->isSMTP();
    // $mail->Host = 'live.smtp.mailtrap.io'; // Your SMTP server
    // $mail->SMTPAuth = true;
    // $mail->Username = 'noobcoder1997@gmail.com'; // Your Mailtrap username
    // $mail->Password = 'cuqedjkfxqwhljfd'; // Your Mailtrap password
    // $mail->SMTPSecure = 'tls';
    // $mail->Port = 587;
    
    // $email = validate($_POST['email']);
    // // Sender and recipient settings
    // $mail->setFrom($email, 'From Name');
    // $mail->addAddress($email, 'Recipient Name');

    // // Sending plain text email
    // $mail->isHTML(false); // Set email format to plain text
    // $mail->Subject = 'Your Subject Here';
    // $mail->Body    = 'This is the plain text message body';

    // // Send the email
    // if(!$mail->send()){
    //     echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    // } else {
    //     echo 'Message has been sent';
    // }
?>