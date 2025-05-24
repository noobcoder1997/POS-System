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
                        <h1 class="mt-4">Inventory</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Out-going Inventory</li>
                        </ol>

                        <div class="card mb-4 shadow">
                            <div class=" card-header">
                                <div class="col-sm-12">
                                   <div class="float-start">
                                        <i class="fas fa-list me-1"></i>
                                        <strong>Out-going Inventory</strong>
                                    </div>
                                    <!-- <a type="button" class="btn btn-primary badge float-end ms-2" data-bs-toggle="modal" data-bs-target="#add-item-modal">
                                        <span class="fa fa-plus fa-fw"></span>
                                        Add Item
                                    </a> -->
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesOutgoingInventory">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Image</th>
                                            <th></th>
                                            <!-- <th></th>
                                            <th></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            $query = "SELECT i.*, p.product_name,p.image FROM transactions i, products p WHERE p.id = i.product_id AND i.type <> '' ";
                                            $stocks = $conn->prepare($query);
                                            $stocks->execute();
                                            $stocks = $stocks->get_result();    
                                            if(mysqli_num_rows($stocks) > 0){
                                                foreach($stocks as $stock):
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $stock['date']; ?></td>
                                                    <td><?php echo $stock['product_name']; ?></td>
                                                    <td><?php echo $stock['quantity']; ?></td>
                                                    <td>
                                                        <img src="<?php echo $stock['image']; ?>" alt="image" style="width:40px; height:40px; border-radius:50%">
                                                    </td>
                                                    <td>
                                                        <a type="button" class="btn btn-primary badge" data-bs-toggle="modal" data-bs-target="#view-item-modal<?php echo $stock['id']; ?>">
                                                            <span class="fa fa-eye fa-fw"></span>
                                                            View
                                                        </a>
                                                    </td>
                                                    <!-- <td>
                                                        <a type="button" class="btn btn-success badge" data-bs-toggle="modal" data-bs-target="#">
                                                            <span class="fa fa-edit fa-fw"></span>
                                                            Edit
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a type="button" class="btn btn-danger badge" data-bs-toggle="modal" data-bs-target="#">
                                                            <span class="fa fa-trash fa-fw"></span>
                                                            Delete
                                                        </a>
                                                    </td>
                                               -->
                                                <?php
                                                
                                                    require 'modals/inventory-modals/inventory-out-modal.php';
                                                    
                                                endforeach;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <a href="#outPDFModal" data-bs-toggle="modal" type="button" class="btn btn-primary badge float-end ms-2">
                                    <span class="fa fa-download fa-fw"></span>
                                    PDF
                                </a>
                                <a href="#outXLSXModal" data-bs-toggle="modal" type="button" class="btn btn-danger badge float-end ms-2">
                                    <span class="fa fa-download fa-fw"></span>
                                    XLSX
                                </a>
                                <a href="#outEMAILModal" data-bs-toggle="modal" type="button" class="btn btn-success badge float-end ms-2">
                                    <span class="fa fa-download fa-fw"></span>
                                    EMAIL
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
<?php 
    include 'includes/footer.php'; 
?>


<div class="modal fade" id="add-item-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="customer-alert"></span>
                <form action="">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="item_name" placeholder="item name">
                        <label for="item_name">Item</label>
                    </div>
                    <div class="form-floating mb-3">
                        <!-- <input type="text" class="form-control" id="item_status"> -->
                        <select name="" id="" class="form-select">
                            <option value="0">Defective</option>
                            <option value="1">Expired</option>
                            <option value="2">Damaged</option>
                        </select>
                        <label for="item_status">Item Status</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="item_qty"  placeholder="item quantity">
                        <label for="item_qty">Quantity</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add-customer">Add Customer</button>
            </div>
        </div>
    </div>
</div>
