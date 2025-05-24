<?php 
    include 'includes/header.php';
?>
    <body class="sb-nav-fixed">    
        <div class="d-flex justify-content-center">
            <div class="loader text-center" style="position:fixed;top: 45%;-ms-transform: translateY(-50%);transform: translateY(-50%);">
            </div>
        </div>
        <?php 
            include 'includes/navbar.php';
        ?>      
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Admins</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Admins</li>
                        </ol>
                        <div class="card mb-4 shadow">
                            <div class=" card-header">
                                <div class="col-sm-12">
                                   <div class="float-start">
                                        <i class="fas fa-users me-1"></i>
                                        <strong>Administrator</strong>
                                    </div>
                                    <a type="button" class="btn btn-primary badge float-end" data-bs-toggle="modal" data-bs-target="#addAdmin">
                                        <span class="fa fa-plus fa-fw"></span>
                                        Add Administrator
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesAdmin">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th></th>
                                            <th></th>
                                            <!-- <th>Start date</th>
                                            <th>Salary</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no='1';
                                            $users = selectAll('users');
                                            if(mysqli_num_rows($users) > 0){
                                                
                                                foreach($users as $user):
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $user['first_name']; ?></td>
                                                    <td>
                                                        <?php 
                                                            if($user['status'] == 1){
                                                                ?>
                                                                <span class="btn btn-primary badge">
                                                                    Active
                                                                </span>
                                                                <?php
                                                            }
                                                            else{
                                                                ?>
                                                                <span class="btn btn-danger badge">
                                                                    Inactive
                                                                </span>
                                                                <?php
                                                            } 
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            if($user['id'] == $_SESSION['user_details']['id']){
                                                        ?>
                                                        <a class="btn btn-success badge" data-bs-target="#editAdmin<?php echo $user['id']; ?>" data-bs-toggle="modal">
                                                            <span class="fa fa-edit fa-fw"></span>
                                                            Edit
                                                        </a>
                                                        <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            if($user['id'] == $_SESSION['user_details']['id']){
                                                        ?>
                                                            <a class="btn btn-danger badge" data-bs-target="#deleteAdmin<?php echo $user['id']; ?>" data-bs-toggle="modal">
                                                                <span class="fa fa-trash fa-fw"></span>
                                                                Delete
                                                            </a>
                                                        <?php
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                $no++;
                                                require 'modals/admin-modals/edit-delete-admin-modal.php';
                                                endforeach;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php 
    include 'includes/footer.php'; 
?>