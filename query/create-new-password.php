<?php
    require '../config/functions.php';

    $token = validate($_POST['token']);
    $new_password = validate($_POST['password']);
    $confirm_password = validate($_POST['confirm-password']);
    $message='';
    $message_array = [
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Password Error:</strong> Passwords is not matched!.
            </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Password Reset:</strong> Password has been updated!.
            </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Token Error:</strong> Token has expired!.
            </div'
    ];

    if($new_password <> $confirm_password){
        //Mismatched passwords
        $message = $message_array[0];
    }
    else {
        // Check if token is valid
        $new_password = encrypt_password($new_password);

        $stmt = $conn->prepare("SELECT * FROM users WHERE reset_token = ? AND reset_expires > NOW()");
        $stmt->bind_param('s',$token);
        $stmt->execute();
        $result = $stmt->get_result();

        if (mysqli_num_rows($result) > 0) {
            // Update password and remove token
            $reset_token = NULL;
            $reset_expires = NULL;
            $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = ?, reset_expires = ? WHERE reset_token = ?");
            $stmt->bind_param('ssss', $new_password, $reset_token, $reset_expires, $token);
            $stmt->execute();
            
            $message = $message_array[1];
        } else {
            $message = $message_array[2];
        }
    }
    echo $message;

?>
