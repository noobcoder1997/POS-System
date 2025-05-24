<?php 
    include 'includes/header.php';
?>
    <body class="sb-nav-fixed" onload="$('#inp').focus();">    
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
                        <h1 class="mt-4">Orders</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                        <div class="card mb-4 shadow">
                            <div class=" card-header">
                                <div class="col-sm-12">
                                   <div class="float-start">
                                        <i class="fas fa-server me-1"></i>
                                        <strong>Create Order</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </symbol>
                                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                </symbol>
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </symbol>
                            </svg>                          
                                <span id="alert-message"></span>
                                <?php 
                                    if(isset($_SESSION['alert-message']) && $_SESSION['alert-message'] != ''){
                                ?>
                                    <div class="session-warning">
                                        <div class="alert alert-warning d-flex align-items-center session-warning" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            <div>
                                                <?php 
                                                    echo  $_SESSION['alert-message']; 
                                                    unset($_SESSION['alert-message']);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>
                                <div class="row">
                                    <div class="col-sm-12 mb-4">
                                        <div class="row float-end">
                                            <div class="">
                                                <div class="input-group" style>
                                                    <input type="text" class="form-control" placeholder="Search Product" id="search-product" oninput="searchProduct(this.value)"/>
                                                    <!-- <button type="button" class="btn btn-secondary btn-search">
                                                        <span class="fa fa-search"></span>
                                                    </button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <form action="query/order-query/item-add.php" method="post" id="">
                                                <div class="form-floating mb-3 w-80">
                                                    <select name="product-id" id="orderSelectProduct" class="form-select">
                                                        <?php
                                                            $products = selectAll('products');
                                                            if($products){
                                                                if(mysqli_num_rows($products) > 0){
                                                                    foreach($products as $product):
                                                                        ?>
                                                                            <option value="<?php echo $product['id']; ?>"><?php echo $product['product_name']; ?></option>
                                                                        <?php
                                                                    endforeach;
                                                                }
                                                            }
                                                            else{
                                                                echo "<option value=''><small>Something went wrong</small></option>";
                                                            }
                                                        ?>
                                                    </select>
                                                    <label for="orderSelectProduct">&nbsp;Select product</label>
                                                </div>
                                                    
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-floating mb-3">
                                                    <div class="input-group my-2 text-center">
                                                        <button class="btn btn-secondary decrement" type="button"><span class="fa fa-minus"></span></button>
                                                        <input type="number" class="form-control" value='1' step='1' min='1' style="text-align:center;" id="input-qty" name="quantity" oninput="if($(this).val()==''){$(this).val(1)};">
                                                        <button class="btn btn-secondary increment" type="button"><span class="fa fa-plus decrement"></span></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 my-2 text-center">
                                                <button class="btn btn-primary form-control" style="text-align:center" id="btn-add-product" type="submit"><span class="fa fa-plus"></span> Add Product</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <input type="text" id="inp" name="barcode" autofocus onchange="keypress(event)" style="position: absolute; left: -9999px;" tabindex="0"/>

                                    <script>

                                        function keypress(e){
                                            $.ajax({
                                                data: "barcode="+$('#inp').val(),
                                                url: "query/order-query/check-product-barcode.php",
                                                type: 'post',
                                                success: (response) => {
                                                    $('#orderSelectProduct').html(response);
                                                    $('#btn-add-product').click();
                                                    $('#inp').val('');
                                                },
                                                error:(error)=>{
                                                    console.log(error.error());
                                                    $('#inp').val('');
                                                }
                                            })
                                        }
                                    </script>
                            </div>
                        </div>
                        <div class="card mb-4 shadow">
                            <div class="card-body">
                                <table id="" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Image</th>
                                            <th>Barcode</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <?php
                                            if(isset($_SESSION['product'])){

                                                $i=1;

                                                foreach($_SESSION['product'] as $key => $item):
                                        ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $item['product_name'] ?></td>
                                                <td><?php echo $item['price'] ?></td>
                                                <td><?php echo $item['quantity'] ?></td>
                                                <td><?php echo $item['image'] ?></td>
                                                <td><?php echo $item['barcode'] ?></td>
                                                <td>
                                                    <button class="btn btn-danger badge" onclick="delete_item(<?php echo $key; ?>)">
                                                        <span class="fa fa-trash"></span> Remove
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php 
                                                endforeach;
                                            }
                                            else{
                                                ?>
                                                    <tr>
                                                        <td colspan='7'>
                                                            <center>
                                                                <small>No entries found</small>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>

                                <hr>
                                
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-floating">
                                            <select class="form-select" id="payment_mode">
                                                <option value="0">Cash</option>
                                                <option value="1">Checque</option>
                                            </select>
                                            <label for="payment_mode">Payment method</label>
                                        </div> 
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="customer_contact0" placeholder="contact number" oninput="if( $('#inp').val()=='' ){ $(this).val(''); history.go(); };"/>
                                            <label for="customer_contact0">Customer Contact Number</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mt-2">
                                        <button class="btn btn-primary float-end w-100 proceed-order"><span class="fa fa-plus"></span> Place Order </button>
                                    </div>
                                </div>
                                    <!-- <a class="btn btn-primary" href="query/order-query/order-reciept/reciept.php">Click</a> -->
                                    <!-- <a class="btn btn-primary" href="includes/auto-print.php">Click</a>   -->
  
                                    <!-- <a class="btn btn-primary" href="#orderPlacedModal" data-bs-toggle="modal">Click</a>   -->
                            </div>
                        </div>
                    </div>
                </main>
<?php 
    include 'includes/footer.php'; 
?>