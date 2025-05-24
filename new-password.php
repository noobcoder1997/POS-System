<?php 
    include 'config/functions.php';
    // session_start();
    
    $token = validate($_GET['token'] ?? '');
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE reset_token = ? AND (reset_expires < NOW() || reset_expires = NULL )");
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while($rows = mysqli_fetch_assoc($result)){
        if ($rows) {
            die("This link has expired. <a href='index.php'>login page</a>");
        } 
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - <?php echo $_SESSION['store_name']; ?></title>
        <link rel="icon" href="assets/img/noobcoder.jpg" type="image/x-icon" />
        <link href="assets/css/styles.css" rel="stylesheet" />
        <!-- <link href="assets/css/my-styles.css" rel="stylesheet" /> -->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <style>
            <?php include 'includes/style.php'; ?>
        </style>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <img id="img-password" src="assets/img/pos.jpg"/>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="loader" id="preloader" style="margin: auto; position: absolute; top: 40%;"></div>  
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 card-password">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">POS System | Password Recovery</h3></div>
                                    <div class="card-body">
                                        <form id="form-new-password">
                                            <input type="hidden" name="token" id="token" value="<?php echo htmlspecialchars($token) ?>">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputNewPassword" type="password" placeholder="Enter new password" />
                                                <label for="inputNewPassword">New Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputConfirmNewPassword" type="password" placeholder="Enter new password" />
                                                <label for="inputConfirmNewPassword">Confirm Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="index.php">Return to login</a>
                                                <button type="submit" class="btn btn-primary" id="">Reset Password</button>
                                            </div>
                                        </form>
                                        <br>
                                        <span id="new-password-response"></span>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; <img src="assets/img/noobcoder.jpg" style="width: 30px; height:20px;">noobcoder.online</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/script.js"></script>
        <script src="assets/js/custom_functions.js"></script>
    </body>
</html>