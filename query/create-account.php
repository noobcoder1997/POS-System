<?php
    include '../config/functions.php';

    $first_name = validate($_POST['first-name']);
    $middle_name = validate($_POST['middle-name']);
    $last_name = validate($_POST['last-name']);

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $confirm_password = validate($_POST['confirm-password']);
    $position = validate('admin');
    
    $message='';

    $message_array= [
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Registration Failed:</strong> Log in credentials already exist.
            </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Registration Failed:</strong> This user already exist.
            </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Registration Failed:</strong> Password did not match!.
            </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Registration Successful:</strong> You are registered!
            </div'
    ];
    
    $hashed_password = encrypt_password($password);
    
    $data = [
        'first_name' => $first_name,
        'middle_name' => $middle_name,
        'last_name' => $last_name,
        'email' => $email,
        'password' => $hashed_password,
        'position' => $position
    ];

    $query0 = " SELECT * FROM users WHERE email = ? AND password = ?";
    $query1 = " SELECT * FROM users WHERE first_name = ? AND middle_name = ? AND last_name = ? ";

    $stmt = $conn->prepare($query0);
    $stmt->bind_param("ss",$email, $hashed_password);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param("sss",$first_name, $middle_name,$last_name);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    if(mysqli_num_rows($result) > 0){

        $message = $message_array[0];
    }
    else if(mysqli_num_rows($result1) > 0){

        $message = $message_array[1];
    }
    else if($password != $confirm_password){
        $message = $message_array[2];
    }
    else{

        insert_query('users', $data);

        $message = $message_array[3];
    }

    echo $message;

    mysqli_close($conn);
?>