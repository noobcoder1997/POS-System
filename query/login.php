<?php
    include '../config/functions.php';

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $encrypted_password = encrypt_password($password);
    $message;
    $message_array = [
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Login Successful:</strong> You have logged in.
            </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Login Failed:</strong> Invalid login credentials.
            </div'
    ];

    $query0 = "SELECT * FROM users WHERE email = ? AND password = ? ";
    $stmt = $conn->prepare($query0);
    $stmt->bind_param('ss',$email, $encrypted_password);
    $stmt->execute();
    $result = $stmt->get_result();
    if(mysqli_num_rows($result) == 1){
        while($row = $result->fetch_assoc()){

            $message = $message_array[0];
            
            $_SESSION['user_details']=[
                'id' => $row['id'],
                'position' => $row['position'],
                'email' => $row['email'],
                'first_name' => $row['first_name'],
                'middle_name' => $row['middle_name'],
                'last_name' => $row['last_name']
            ];            
            
            $_SESSION['user_status'] = 1;
        }
    }
    else{
        $message = $message_array[1];
    }

    echo $message;
    
    mysqli_close($conn);
?>