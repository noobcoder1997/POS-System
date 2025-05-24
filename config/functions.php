<?php
    session_start();
    require 'db_connection.php';

    // Store name
    $_SESSION['store_name'] = 'My POS';
    // Store address
    $_SESSION['street'] = '123 Main Street, San Juan';
    // Company name
    $_SESSION['company'] = 'noobcoder.online';
    //contact number
    $_SESSION['contact'] = '+63 912-3456-789';

    function redirect_to($url, $message){
        $_SESSION['alert-message'] = $message;
        header('location: '.$url);
        exit(0);
    }

    function encrypt_password($password){
        try{
            $key = 'noobcoder.noobcoder';
            $salt = 'noobcoder';
            $pepper = 'M';
            $new_password = $password.$salt.$pepper;
            $hashed_password = hash_hmac('sha256', $new_password, $key, false);
            return $hashed_password;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    function validate($data){
        try{
            global $conn;
            $data = mysqli_real_escape_string($conn, $data);
            return stripslashes(trim($data));
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    function insert_query($tableName, $data){
        try{
            global $conn;

            $table = validate($tableName);
    
            $columns = array_keys($data);
    
            $values = array_values($data);
            
            $column = implode(",", $columns);
    
            $value = "'".implode("','",$values)."'";
    
            $query = "INSERT INTO $table ($column) VALUES ($value)";
            $result = mysqli_query($conn, $query);
            return $result;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    function selectAll($tableName, $id = NULL){
        try{
            global $conn;

            $table = validate($tableName);

            $id = validate($id);

            if($id != NULL && !is_numeric($id)){
                $query = "SELECT * FROM $table WHERE id = '$id'";
            }
            else{
                $query = "SELECT * FROM $table";
            }

            return mysqli_query($conn, $query);
            
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    function update_query($tableName, $id, $data){
        try{
            global $conn;

            $table = validate($tableName);

            $id = validate($id);

            $datas="";

            foreach($data as $column => $value):

                $datas .= $column . '=' ."'$value', ";

            endforeach;

            $new_data = substr(trim($datas),0,-1);

            $query = "UPDATE $table SET $new_data WHERE id = '$id' ";

            mysqli_query($conn, $query);

        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    function delete_query($tableName, $id){
        try{
            global $conn;

            $id = validate($id);

            $table = validate($tableName);

            $query = "DELETE FROM $table WHERE id = $id ";

            mysqli_query($conn, $query);

        }catch(Exception $e){
            return $e->getMessage();
        }
    }
?>