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
                        <h1 class="mt-4">Categories</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                        <div class="card mb-4 shadow">
                            <div class=" card-header">
                                <div class="col-sm-12">
                                   <div class="float-start">
                                        <i class="fas fa-server me-1"></i>
                                        <strong>Categories</strong>
                                    </div>
                                    <a type="button" class="btn btn-primary badge float-end" data-bs-toggle="modal" data-bs-target="#addCategory">
                                        <span class="fa fa-plus fa-fw"></span>
                                        Add Category
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesCategories">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
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
                                            $category = selectAll('categories');
                                            if(mysqli_num_rows($category) > 0){
                                                
                                                foreach($category as $cat):
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $cat['category_name']; ?></td>
                                                    <td>
                                                        <?php
                                                            if($cat['status'] == 1){
                                                                ?>
                                                                    <span class="badge btn-primary">Visible</span>
                                                                <?php
                                                            }
                                                            else{
                                                                ?>
                                                                    <span class="badge btn-primary">Invisible</span>
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-success badge" data-bs-target="#editCategory<?php echo $cat['id']; ?>" data-bs-toggle="modal">
                                                            <span class="fa fa-edit fa-fw"></span>
                                                            Edit
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-danger badge" data-bs-target="#deleteCategory<?php echo $cat['id']; ?>" data-bs-toggle="modal">
                                                            <span class="fa fa-trash fa-fw"></span>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $no++;
                                                require 'modals/category-modals/edit-delete-category-modal.php';
                                                require 'query/category-query/edit-delete-cbox-script.php'; //consist of designs
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