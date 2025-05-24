<?php
    include 'config/functions.php';
    if(!isset($_SESSION['user_status'])){
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no,  user-scalable=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Dashboard - <?php echo $_SESSION['store_name']; ?></title>
        
        <link rel="icon" href="assets/img/noobcoder.jpg" type="image/x-icon" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="assets/css/styles.css" rel="stylesheet" />

        <!-- <link href="assets/css/my-styles.css" rel="stylesheet" /> -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>

        <?php include 'style.php'; ?>
    </head>