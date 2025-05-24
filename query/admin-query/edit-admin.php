<?php
    require '../../config/functions.php';;

    $first_name = validate($_POST['fnim']);
    $middle_name = validate($_POST['mnim']);
    $last_name = validate($_POST['lnim']);

    $email = validate($_POST['email']);
    $password = validate($_POST['pass']);
    $confirm_password = validate($_POST['cpass']);
    $id = validate($_POST['id']);
    $reload = false;
    
    $hashed_password = encrypt_password($password);

    $message="";
    $message_array = [
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Registration Failed:</strong> Log in credentials are already exist.
            </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Registration Failed:</strong> This user already exist.
            </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Registration Failed:</strong> Password did not match!.
            </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Registration Successful:</strong> Admin have been edited successfully!
            </div'
    ];

    $query0 = " SELECT * FROM users WHERE email = ? AND password = ? AND id <> ?";
    $query1 = " SELECT * FROM users WHERE first_name = ? AND middle_name = ? AND last_name = ? AND id <> ?";

    $stmt = $conn->prepare($query0);
    $stmt->bind_param("sss",$email, $hashed_password, $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param("ssss",$first_name, $middle_name, $last_name, $id);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    if(mysqli_num_rows($result) > 0){

        $message = $message_array[0];
    }
    else if(mysqli_num_rows($result1) > 0){

        $message = $message_array[1];
    }
    else if(($password != $confirm_password)){
            
        $message = $message_array[2];
    }
    else{

        if(empty($password) && empty($confirm_password)){
            
            $data = [
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'email' => $email,
            ]; 
            
            update_query('users', $id, $data);
        }
        else{
    
            $data = [
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => $hashed_password,
            ];

            update_query('users', $id, $data);
        }

        $reload = true;

        $message = $message_array[3];

        $stmt->close();
        $stmt1->close();
    }

    echo json_encode([$reload, $message]); 

    $conn->close();
?>