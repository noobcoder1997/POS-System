<?php
    require '../../config/functions.php';;

    $name = validate($_POST['name']);
    $contact = validate($_POST['contact']);
    $email = validate($_POST['email']);

    $id = validate($_POST['id']);

    $message="";
    $message_array = [
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Registration Failed:</strong> This user already exist.
            </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Registration Failed:</strong> Fields should not leave empty.
            </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Registration Successful:</strong> Customer have been edited successfully!
            </div'
    ];

    $query0 = " SELECT * FROM customers WHERE email = ? AND contact = ?";

    $stmt = $conn->prepare($query0);
    $stmt->bind_param("sss",$email, $hashed_password, $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) > 0){

        $message = $message_array[0];
    }
    else if(($name == null || empty($name))||($contact == null || empty($contact))){

        $message = $message_array[1];
    }
    else{

        if(empty($email) && empty($email)){
            
            $data = [
                'name' => $name,
                'contact' => $contact
            ]; 
            
            update_query('customers', $id, $data);
        }
        else{
    
            $data = [
                'name' => $name,
                'contact' => $contact,
                'email' => $email
            ]; 

            update_query('users', $id, $data);
        }

        $message = $message_array[3];
    }

    echo $message; 

    mysqli_close($conn);
?>