<?php
    require '../../config/functions.php';

    $first_name = validate($_POST['fnim']);
    $middle_name = validate($_POST['mnim']);
    $last_name = validate($_POST['lnim']);
    $email = validate($_POST['email']);
    $password = validate($_POST['pass']);
    $confirm_password = validate($_POST['cpass']);
    $position = validate('admin');
    $status = validate('1');
    $message = '';
    $reload = false;

    $new_password = encrypt_password($password);

    $data = [
        'first_name' => $first_name,
        'middle_name' => $middle_name,
        'last_name' => $last_name,
        'email' => $email,
        'password' => $new_password,
        'position' => $position,
        'status' => $status
    ];

    $query0 = " SELECT * FROM users WHERE email = ? AND password = ?";
    $query1 = " SELECT * FROM users WHERE first_name = ? AND middle_name = ? AND last_name = ?";

    $stmt = $conn->prepare($query0);
    $stmt->bind_param("ss",$email, $new_password);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param("sss",$first_name, $middle_name,$last_name);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    $message_array = [
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> Log in credentials are already exist!
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> This user already exist!
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> This email is invalid!
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error:</strong> Password did not match!
        </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Registration Successful:</strong> New Admin have been registered successfully!
        </div'
    ];

    if(mysqli_num_rows($result) > 0){

        $message = $message_array[0];
    }
    else if($email == 'false'){

        $message = $message_array[2];
    }
    else if(mysqli_num_rows($result1) > 0){

        $message = $message_array[1];
    }
    else if($password != $confirm_password){
        
        $message = $message_array[3];
    }
    else{

        insert_query('users', $data);

        $message = $message_array[4];
        $reload = true;

        $stmt->close();
        $stmt1->close();
    }

    echo json_encode([$reload, $message]);
    
    $conn->close();
?>