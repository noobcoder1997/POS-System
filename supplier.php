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
                        <h1 class="mt-4">Suppliers</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Suppliers</li>
                        </ol>
                        <div class="card mb-4 shadow">
                            <div class=" card-header">
                                <div class="col-sm-12">
                                   <div class="float-start">
                                        <i class="fas fa-truck me-1"></i>
                                        <strong>Suppliers</strong>
                                    </div>
                                    <a type="button" class="btn btn-primary badge float-end" data-bs-toggle="modal" data-bs-target="#addSupplier">
                                        <span class="fa fa-plus fa-fw"></span>
                                        Add Supplier
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesProducts">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Supplier Name</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <!-- <th></th> -->
                                            <!-- <th></th>
                                            <th></th> -->
                                            <!-- <th>Salary</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            $no='1';
                                            $sql = "SELECT * FROM suppliers";
                                            $suppliers = $conn->prepare($sql);
                                            $suppliers->execute();
                                            $suppliers = $suppliers->get_result();
                                            if(mysqli_num_rows($suppliers) > 0){
                                                
                                                foreach($suppliers as $supplier):
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $supplier['supplier_name']; ?></td>
                                                    <td>
                                                        <a class="btn btn-primary badge" data-bs-target="#viewSupplier<?php echo $supplier['id']; ?>" data-bs-toggle="modal">
                                                            <span class="fa fa-eye fa-fw"></span>
                                                            View
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-success badge" data-bs-target="#editSupplier<?php echo $supplier['id']; ?>" data-bs-toggle="modal">
                                                            <span class="fa fa-edit fa-fw"></span>
                                                            Edit
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-danger badge" data-bs-target="#deleteSupplier<?php echo $supplier['id']; ?>" data-bs-toggle="modal">
                                                            <span class="fa fa-trash fa-fw"></span>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                require 'modals/supplier-modals/edit-delete-supplier-modal.php';
                                                // include  'query/supplier-query/edit-delete-cbox-script.php';
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