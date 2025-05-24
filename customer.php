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
                        <h1 class="mt-4">Customers</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Customers</li>
                        </ol>
                        <div class="card mb-4 shadow">
                            <div class=" card-header">
                                <div class="col-sm-12">
                                   <div class="float-start">
                                        <i class="fas fa-users me-1"></i>
                                        <strong>Customers</strong>
                                    </div>
                                    <a type="button" class="btn btn-primary badge float-end" data-bs-toggle="modal" data-bs-target="#add-customer-modal">
                                        <span class="fa fa-plus fa-fw"></span>
                                        Add Customer
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesAdmin">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Contact #</th>
                                            <th>Email</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no='1';
                                            $customers = selectAll('customers');
                                            if(mysqli_num_rows($customers) > 0){
                                                
                                                foreach($customers as $customer):
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $customer['name']; ?></td>
                                                    <td><?php echo $customer['contact']; ?></td>
                                                    <td><?php echo $customer['email']; ?></td>
                                                    <td>
                                                        <a class="btn btn-success badge" data-bs-target="#editCustomer<?php echo $customer['id']; ?>" data-bs-toggle="modal">
                                                            <span class="fa fa-edit fa-fw"></span>
                                                            Edit
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-danger badge" data-bs-target="#deleteCustomer<?php echo $customer['id']; ?>" data-bs-toggle="modal">
                                                            <span class="fa fa-trash fa-fw"></span>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $no++;
                                                require 'modals/customers-modals/edit-delete-customer-modal.php';
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