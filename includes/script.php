<script>
    // /////////////////////////////////////////////////////////////

    // //////////////////////////LOG OUT MODAL///////////////////////
        // Log out
            function logout(){
                $('.loader').fadeIn('slow');
                setTimeout(
                    ()=>{
                        window.location.href="logout.php";
                        $('.loader').fadeOut()
                    }, 500
                )
            }
    // /////////////////////////////////////////////////////////////

    //-------------------------DataTables-------------------------// 
    //-------------------------DataTables-------------------------// 
    //-------------------------DataTables-------------------------// 
        window.addEventListener('DOMContentLoaded', event => {
            const datatablesAdmin = document.getElementById('datatablesAdmin');
            const datatablesCategories = document.getElementById('datatablesCategories');
            const datatablesProducts = document.getElementById('datatablesProducts');
            // const datatablesOrders = document.getElementById('datatablesOrders');
            const datatablesIncomingInventory = document.getElementById('datatablesIncomingInventory');
            const datatablesOutgoingInventory = document.getElementById('datatablesOutgoingInventory');
            
            if (datatablesAdmin) {
                new simpleDatatables.DataTable(datatablesAdmin);
            }
            if (datatablesCategories) {
                new simpleDatatables.DataTable(datatablesCategories);
            }
            if (datatablesProducts) {
                new simpleDatatables.DataTable(datatablesProducts);
            }
            // else if (datatablesOrders) {
            //     new simpleDatatables.DataTable(datatablesOrders,{searchable: false, paging: false, info: false});
            // }
            if (datatablesIncomingInventory) {
                new simpleDatatables.DataTable(datatablesIncomingInventory);
            }
            if (datatablesOutgoingInventory) {
                new simpleDatatables.DataTable(datatablesOutgoingInventory);
            }
        });
    //-------------------------End DataTables-------------------------// 
    //-------------------------End DataTables-------------------------// 
    //-------------------------End DataTables-------------------------//  

    //-------------------------- ADMIN -------------------------------//
    //---------------------------- ADMIN ------------------------------//

    // Add Administrator
        $('#-add-admin-form').on('submit', ()=>{
            form = new FormData()
            form.append('fnim',$('#inputFirstName').val())
            form.append('mnim',$('#inputMiddleName').val())
            form.append('lnim',$('#inputLastName').val())
            form.append('email',$('#inputEmail').val())
            form.append('pass',$('#inputPassword').val())
            form.append('cpass',$('#inputConfirmPassword').val())
            
            if(validateGmail($('#inputEmail').val()) == true){
                form.append('email',$('#inputEmail').val())
            }
            else{
                form.append('email',false)
            }
            $.ajax({
                data: form,
                method: "POST",
                url: 'query/admin-query/add-admin.php',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend: ()=>{},
                success: (data)=>{
                    $('#add-admin-message').html(data[1]);

                    if(data[0]==true){
                        
                        preloader();
                    }
                },
                error: (error)=>{
                    console.log(error.responseText)
                }
            })
            return false;
        })

    // Edit Administrator
        function edit_admin_form(id){
            form = new FormData()
            form.append('fnim',$('#inputFirstName'+id).val())
            form.append('mnim',$('#inputMiddleName'+id).val())
            form.append('lnim',$('#inputLastName'+id).val())
            form.append('email',$('#inputEmail'+id).val())
            form.append('pass',$('#inputPassword'+id).val())
            form.append('cpass',$('#inputConfirmPassword'+id).val())
            form.append('id', id);

            $.ajax({
                data: form,
                method: "POST",
                url: 'query/admin-query/edit-admin.php',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend: ()=>{},
                success: (data)=>{
                    $('#edit-admin-message'+id).html(data[1]);

                    if(data[0]){

                        preloader();
                    }
                },
                error: (data)=>{
                    console.log(data)
                }
            })
            return false;
        }
    // Delete Administrator
        function delete_admin_btn(id){
            form = new FormData();
            form.append('id', id);
            $.ajax({
                data: form,
                method: "POST",
                url: 'query/admin-query/delete-admin.php',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: ()=>{},
                success: (data)=>{
                    $('#delete-admin-message').html(data);
                    preloader();
                },
                error: (data)=>{
                    console.log(data)
                }
            })
        }

    //-------------------------- END ADMIN -------------------------------//
    //-------------------------- END ADMIN -------------------------------//
    //-------------------------- CUSTOMER -------------------------------//
    //---------------------------- CUSTOMER ------------------------------//
    
    // Add Customer 
        $('.add-customer').on('click', ()=>{
            form = new FormData();
            form.append('name', $('#customer_name').val());
            form.append('contact', $('#customer_contact').val());
            form.append('email', $('#customer_email').val());

            if($('#customer_email').val() != ""){

                if(validateGmail($('#customer_email').val()) == true){ 

                    form.append('email', $('#customer_email').val());
                }
                else{

                    form.append('email', false);
                }
            }
            $.ajax({
                data: form,
                url: 'query/customer-query/add-customer.php',
                type: 'post',
                contentType: false,
                processData: false,
                cache: false,
                dataType: 'json',
                success: (data)=>{

                    $('#customer-alert').html(data[1]);

                    if(data[0] == true){
                        preloader();
                    }
                },
                error:(error)=>{
                    console.log(error.responseText);
                }
            });
        });

        $('#-add-customer-form').on('submit', ()=>{
            form = new FormData();
            form.append('name', $('#customer_name').val());
            form.append('contact', $('#customer_contact').val());
            form.append('email', $('#customer_email').val());
        
            if($('#customer_email').val() != ''){
                if(validateGmail($('#customer_email').val()) == true){
                    
                    form.append('email', $('#customer_email').val());
                }
                else{

                    form.append('email', false);
                }
            }

            $.ajax({
                data: form,
                url: 'query/customer-query/add-customer.php',
                type: 'post',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: (data)=>{

                    $('#customer-alert').html(data[1]);

                    if(data[0]== true){
                        preloader();
                    }
                },
                error:(error)=>{
                    console.log(error.responseText);
                }
            });
            
            return false;
        });

    // Edit Customer
        function edit_customer_form(id){
            console.log(id)
            form = new FormData()
            form.append('name',$('#name'+id).val())
            form.append('contact',$('#contact'+id).val())
            form.append('email',$('#email'+id).val())
            form.append('id', id);

            $.ajax({
                data: form,
                method: "POST",
                url: 'query/customer-query/edit-customer.php',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: ()=>{},
                success: (data)=>{
                    $('#edit-customer-message'+id).html(data)
                    preloader();
                },
                error: (data)=>{
                    console.log(data)
                }
            })
            return false;
        }

    // Delete Customer
        function delete_customer_btn(id){
            form = new FormData();
            form.append('id', id);
            $.ajax({
                data: form,
                method: "POST",
                url: 'query/customer-query/delete-customer.php',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: ()=>{},
                success: (data)=>{
                    $('#delete-customer-message').html(data)
                    preloader();
                },
                error: (data)=>{
                    console.log(data)
                }
            })
        }

    //-------------------------- END CUSTOMER -------------------------------//
    //-------------------------- END CUSTOMER -------------------------------//

    //-------------------------- CATEGORY -------------------------------//
    //---------------------------- CATEGORY ------------------------------//

    // Add CATEGORY
        $('#-add-category-form').on('submit', ()=>{
            form = new FormData()
            form.append('category-name',$('#inputCategoryName').val())
            form.append('category-description',$('#inputDescription').val())
            form.append('category-status',$('#inputStatus').is(':checked'))
            $.ajax({
                data: form,
                method: "POST",
                url: 'query/category-query/add-category.php',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend: ()=>{},
                success: (data)=>{

                    $('#add-category-message').html(data[1]);

                    if(data[0]==true){
                        preloader();  
                    }
                },
                error: (error)=>{
                    console.log(error.responseText)
                }
            })
            return false;
        })
    // Edit Category
        function edit_category_form(id){
            form = new FormData()
            form.append('category-name',$('#inputCategoryName'+id).val())
            form.append('category-description',$('#inputDescription'+id).val())
            form.append('category-status',$('#inputStatus'+id).is(':checked'))
            form.append('id', id);

            $.ajax({
                data: form,
                method: "POST",
                url: 'query/category-query/edit-category.php',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend: ()=>{},
                success: (data)=>{

                    $('#edit-category-message'+id).html(data[1]);

                    if(data[0]==true){
                        preloader();
                    }
                },
                error: (error)=>{
                    console.log(error.responseText)
                }
            })
            return false;
        }
    // Delete Category
        function delete_category_btn(id){
            form = new FormData();
            form.append('id', id);
            $.ajax({
                data: form,
                method: "POST",
                url: 'query/category-query/delete-category.php',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: ()=>{},
                success: (data)=>{
                    $('#delete-category-message').html(data);
                    preloader();
                },
                error: (data)=>{
                    console.log(data.responseText)
                }
            })
        }
    //-------------------------- END CATEGORY -------------------------------//
    //-------------------------- END CATEGORY -------------------------------//

    //-------------------------- SUPPLIER -------------------------------//
    //---------------------------- SUPPLIER ------------------------------//

    // Add Supplier
        $('#-add-supplier-form').on('submit', ()=>{
            form = new FormData()
            form.append('supplier-name',$('#inputSupplierName').val())
            form.append('supplier-contact-person',$('#inputContactPerson').val())
            form.append('supplier-phone',$('#inputSupplierContactNumber').val())
            form.append('supplier-email',$('#inputSupplierEmail').val())

            if($('#inputSupplierEmail').val() != ""){
                if(validateGmail($('#inputSupplierEmail').val()) == true){
                    form.append('supplier-email',$('#inputSupplierEmail').val())
                }
                else{
                    form.append('supplier-email',false)
                }
            }
            
            $.ajax({
                data: form,
                method: "POST",
                url: 'query/supplier-query/add-supplier.php',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend: ()=>{},
                success: (data)=>{
                    $('#add-supplier-message').html(data[1])
                    if(data[0] == true){
                        preloader();
                    }
                },
                error: (error)=>{
                    console.log(error.responseText);
                }
            })
            return false;
        });
    // Edit Supplier
        function edit_supplier_form(id){
            form = new FormData();
            form.append('id',id);
            form.append('supplier-name',$('#inputSupplierName'+id).val());
            form.append('supplier-contact-person',$('#inputContactPerson'+id).val());
            form.append('supplier-phone',$('#inputSupplierPhone'+id).val());
            form.append('supplier-email',$('#inputsupplierEmail'+id).val());

            if($('#inputsupplierEmail'+id).val() != ""){

                if(validateGmail($('#inputsupplierEmail'+id).val()) == true){
                    form.append('supplier-email',$('#inputsupplierEmail'+id).val());
                }
                else{
                    form.append('supplier-email',false);
                }
            }
            $.ajax({
                data: form,
                method: "POST",
                url: 'query/supplier-query/edit-supplier.php',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend: ()=>{},
                success: (data)=>{
                    
                    $('#edit-supplier-message'+id).html(data[1])

                    if(data[0] == true){
                        preloader();
                    }
                },
                error: (error)=>{
                    console.log(error.responseText);
                }
            })
            return false;
        }
    // Delete Supplier
        function delete_Supplier_btn(id){
            form = new FormData();
            form.append('id', id);
            $.ajax({
                data: form,
                method: "POST",
                url: 'query/supplier-query/delete-supplier.php',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: ()=>{},
                success: (data)=>{
                    $('#delete-supplier-message').html(data)
                    preloader();
                },
                error: (data)=>{
                    console.log(data)
                }
            })
        }
    //-------------------------- END SUPPLIER -------------------------------//
    //-------------------------- END SUPPLIER -------------------------------//

    //-------------------------- PRODUCT -------------------------------//
    //---------------------------- PRODUCT ------------------------------//

    // Add PRODUCT
        $('#-add-product-form').on('submit', ()=>{
            const fileInput = document.getElementById('inputProductImg');
            const file = fileInput.files[0];
            form = new FormData()
            form.append('category-id',$('#inputProductCategoryName').val())
            form.append('supplier-id',$('#inputProductSupplierName').val())
            form.append('product-name',$('#inputProductName').val())
            form.append('product-description',$('#inputProductDescription').val())
            form.append('product-price',$('#inputProductPrice').val())
            form.append('product-quantity',$('#inputProductQty').val())
            form.append('product-barcode',$('#inputBarcodeData').val())
            form.append('product-image',file)
            form.append('product-status',$('#inputProductStatus').is(':checked'))
            $.ajax({
                data: form,
                method: "POST",
                url: 'query/product-query/add-product.php',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend: ()=>{},
                success: (data)=>{
                    $('#add-product-message').html(data[1]);
                    if(data[0]==true){
                        preloader();
                    }
                },
                error: (error)=>{
                    console.log(error.responseText())
                }
            })
            return false;
        });

    // Edit Product
        function edit_product_form(id){
            const fileInput = document.getElementById('inputProductImg'+id);
            const file = fileInput.files[0];
            form = new FormData()
            form.append('category-id',$('#inputProductCategoryName'+id).val());
            form.append('product-id',$('#inputProductId'+id).val());
            form.append('supplier-id',$('#inputProductSupplier'+id).val());
            form.append('product-name',$('#inputProductName'+id).val());
            form.append('product-description',$('#inputProductDescription'+id).val());
            form.append('product-price',$('#inputProductPrice'+id).val());
            form.append('product-quantity',$('#inputProductQty'+id).val());
            form.append('product-barcode',$('#inputbBarcodeData'+id).val());
            form.append('product-image',file);
            form.append('product-status',$('#inputProductStatus'+id).is(':checked'));
            form.append('id', id);

            $.ajax({
                data: form,
                method: "POST",
                url: 'query/product-query/edit-product.php',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend: ()=>{},
                success: (data)=>{
                    $('#edit-product-message'+id).html(data[1]);
                    
                    if(data[0]==true){
                        preloader();
                    }
                },
                error: (error)=>{
                    console.log(error.responseText)
                }
            })
            return false;
        }
    // Delete Product
        function delete_Product_btn(id, product_id){
            form = new FormData();
            form.append('id', id);
            form.append('product_id', product_id);
            $.ajax({
                data: form,
                method: "POST",
                url: 'query/product-query/delete-product.php',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: ()=>{},
                success: (data)=>{
                    $('#delete-product-message').html(data)
                    preloader();
                },
                error: (data)=>{
                    console.log(data)
                }
            })
        }

    // Restock Product
        function reStockProduct(id){
            form = new FormData();
            form.append('id',id);
            form.append('qty',$('#inputProductRestockQty'+id).val());
            $.ajax({
                data: form,
                type: "post",
                url: "query/product-query/restock-product.php",
                contentType: false,
                processData: false,
                dataType: 'json',
                cache: false,
                success:(response)=>{
                    $('#restock-product-message'+id).html(response[1]);
                    if(response[0]==true){
                        preloader();
                    }
                },
                error:(error)=>{
                    console.log(error.responseText);
                }
            });
            return false;
        }
    //-------------------------- END PRODUCT -------------------------------//
    //-------------------------- END PRODUCT -------------------------------//

    //--------------------------ALERT MESSAGE -------------------------------//
    //----------------------------ALERT MESSAGE ------------------------------//
    // Alert Message
        function alertMessage(id, message, speed){
            $('#'+id).fadeTo(speed, 500).html(message).fadeOut(speed, ()=>{});
        }
        function alert(selector, speed){
            setTimeout(()=>{
                $(selector).fadeOut(speed);
            }, 2000);
        }

        function delete_item(id){
            window.location.href='query/order-query/delete-item.php?id='+id;
        }

        // HIDES ALERT MESSAGE
        if($('.session-warning').is(':visible')){
            alert('.session-warning', 'slow');
        } 
    // Alert Message
    //-------------------------- END ALERT MESSAGE -------------------------------//
    //---------------------------- END ALERT MESSAGE ------------------------------//

    //--------------------------PLACE ORDER BUTTON -------------------------------//
    //----------------------------PLACE ORDER BUTTON ------------------------------//
    // Proceed to order button
        $('.proceed-order').on('click', ()=>{
            
            invoice = '';
            mode = $('#payment_mode').val();

            if( $('#payment_mode').val() == null || $('#payment_mode').val() == '' ){
                
                message='<div class="alert alert-warning d-flex align-items-center session-warning" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg> Please add payment mode!<div></div></div>';
                
                alertMessage('alert-message', message, 2000);
            }
            else if( $('#customer_contact0').val() != "" ){
                
                if(!$.isNumeric($('#customer_contact0').val()) || $('#customer_contact0').val().length != 11){
                    
                    message='<div class="alert alert-warning d-flex align-items-center session-warning" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg> Please enter valid contact number!<div></div></div>';
                    
                    alertMessage('alert-message', message, 2000);
                    
                    $('#customer_contact0').val('');                                
                }
                else{
                    $.ajax({
                        data: 'contact='+$('#customer_contact0').val(),
                        type: 'post',
                        url: 'query/customer-query/check-customer.php',
                    }).done((data)=>{
                        if(data == 0){
                            $('#modal-warning').modal('show');
                        }
                        else{ 
                            invoice =  encodeURIComponent(window.btoa(<?php echo $_SESSION['invoice'] = rand(1000000000,9000000000); ?>));
                            id = encodeURIComponent(window.btoa(data));
                            m = encodeURIComponent(window.btoa(mode));
                            window.location.href='view-invoice.php?id='+id+'&inv_no='+invoice+"&mode="+m;
                        }
                    });
                }
            }
            else{
                invoice =  encodeURIComponent(window.btoa(<?php echo $_SESSION['invoice'] = rand(1000000000,9000000000); ?>));
                id = encodeURIComponent(window.btoa(''));
                m = encodeURIComponent(window.btoa(mode));
                window.location.href='view-invoice.php?id='+id+'&inv_no='+invoice+"&mode="+m;
            }
        });
    //--------------------------END PLACE ORDER BUTTON -------------------------------//
    //----------------------------END PLACE ORDER BUTTON ------------------------------//

    //--------------------------SAVE BILLING BUTTON -------------------------------//
    //----------------------------SAVE BILLING BUTTON ------------------------------//
    // save billing button
        $('.save-billing').on('click', ()=>{
            data = new FormData()
            data.append('save-billing',true);
            data.append('contact',"<?php echo (isset($contact_no))? $contact_no: ""; ?>");
            data.append('inv_no',"<?php echo (isset($contact_no)) ? $invoice : ""; ?>");
            data.append('mode',"<?php echo (isset($contact_no))?$mode:""; ?>");
            $.ajax({
                data: data,
                type: 'post',
                url: 'query/order-query/save-billing.php',
                processData: false,
                contentType: false,
                cache: false
            }).done((response)=>{
                console.log(response)
                $('#orderPlacedModal').modal('show');
            })
        });
    //--------------------------END  SAVE BILLING BUTTON -------------------------------//
    //----------------------------END  SAVE BILLING BUTTON ------------------------------//

    //----------------------------INC/DEC QTY VALUE BUTTON-------------------------------//
    //----------------------------INC/DEC QTY VALUE BUTTON-------------------------------//
        val=1;
        // Increment the qunatity of the product
        $('.increment').on('click', ()=>{
            (val == 0) ? $("#input-qty").val(1):$('#input-qty').val(val+=1);                                                            
        });

        // decrement the quantity of the product
        $('.decrement').on('click', ()=>{
            (val == 1) ? $("#input-qty").val(1):$('#input-qty').val(val-=1);
        });

        //search product in order
        function searchProduct(query) {
            const options = document.querySelectorAll('#orderSelectProduct option');
            let found = false;
            options.forEach(option => {
                const text = option.textContent.toLowerCase();
                const match = text.includes(query.toLowerCase());
                option.style.display = match ? '' : 'none';
                if (match && !found) {
                    option.selected = true;
                    found = true;
                } else {
                    option.selected = false;
                }
            });
        }
        // $('.btn-search').on('click', function(){
        //     $.ajax({
        //         data: 'search='+$('#search-product').val(),
        //         type: 'post',
        //         url: 'query/order-query/search-product.php',
        //         dataType: 'json',
        //         success: (data)=>{
        //             value=$('#search-product').val();
        //             s = $.inArray(value, data[2])
        //             if(s !== -1){ // has same value
        //                 $('#orderSelectProduct').html(data[0]);
        //             }
        //             else if(data[1] != ''){
        //                 $('#search-product').val("");
        //                 alertMessage('alert-message', '<div class="alert alert-warning d-flex align-items-center" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#exclamation-triangle-fill"/></svg>'+data[1]+'</div></div>', 1000);
        //             }
        //             else{
        //                 $('#search-product').val("");
        //                 alertMessage('alert-message', '<div class="alert alert-warning d-flex align-items-center" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#exclamation-triangle-fill"/></svg>No data found!</div></div>', 1000);
        //             }
        //         },
        //         error:(error)=>{
        //             console.log(error);
        //         }
        //     });
        // }); 
    //----------------------------END INC/DEC QTY VALUE BUTTON-------------------------------//
    //----------------------------END INC/DEC QTY VALUE BUTTON-------------------------------//
</script>

<script>
    //add damage product on modal shown
    $('#addProduct').on('shown.bs.modal', function() {
        //AUTO FOCUS BARCODE INPUT
        $('#barcode').focus().val('');

        $('#scan').html('Pending').addClass('btn-warning');

    });

    //add damage product on modal shown
    $('#damageProduct').on('shown.bs.modal', function() {
        //AUTO FOCUS BARCODE INPUT
        $('#_barcode').focus().val('');

        $('#_scan').html('Pending').addClass('btn-warning');
    });

    // add product modal
    function onkeyDown(e){ 
        if (e.key === 'Enter') {

            console.log($('#barcode').val());

            $('#inputBarcodeData').val($('#barcode').val())
            
            $('#scan').html('Success').removeClass('btn-warning').addClass('btn-primary');
            
            $('#barcode').val("");

            $('#scan-status').css({'font-size':'14px',"color":"grey","margin-top":"5px"});
        }
    }

    // add damage product modal
    function onkeyDown(e){ 
        if (e.key === 'Enter') {

            console.log($('#_barcode').val());

            $('#_inputBarcodeData').val($('#_barcode').val())
            
            $('#_scan').html('Success').removeClass('btn-warning').addClass('btn-primary');
            
            $('#_barcode').val("");

            $('#_scan-status').css({'font-size':'14px',"color":"grey","margin-top":"5px"});
        }
    }
</script>

<script>
    //  order-modals/billing-modal process
    $('#cash').on('input', ()=>{

        change = $('#cash').val() - parseFloat(<?php echo number_format($price,2); ?>);

        if (change < 0) {

            $('#change').val('');
        } else {

            $('#change').val(change.toFixed(2));
        }
    });

    $('.pay-order').on('click', function(){
 
        if($('#cash').val() != ""){

            var change = encodeURIComponent(window.btoa($('#change').val()));
            var cash = encodeURIComponent(window.btoa($('#cash').val()));

            $('#billingModal').modal('hide'); // Hide the modal

            window.location.href = "query/order-query/order-reciept/reciept.php?c0="+cash+"&c1="+change;
        }
        else{

            $message = '<div class="alert alert-warning" role="alert"><strong>Error: </strong>Please enter the payment amount!</div>';

            alertMessage('payment-alert',$message, 1500);
        }
    });

    $('#billingModal').on('hidden.bs.modal', ()=>{

        setTimeout( ()=>{

            history.go();

        }, 1000);
    });

    $('#billingModal').on('shown.bs.modal', ()=>{
        
        setInterval(()=>{

            $('#cash').trigger('focus');

        },1);
    });
</script>

<script>
    
    //-------------------------- BARCODE SCANNER -------------------------------//
    //---------------------------- BARCODE SCANNER ------------------------------//
    // Scan barcode
    // $('#addProduct').on('hide.bs.modal', () =>  {
    //         Quagga.stop(); // Stops the camera stream
    //     });

    //     $('#addProduct').on('shown.bs.modal', () =>  {
    //         if(screen.width <= 480){
    //             useCamera();
    //         }
    //         else{
    //             $('#camera').remove();
    //         }
    //     });  

    //     function useCamera(){
    //         const quaggaConf = {
    //             inputStream: {
    //                 target: document.querySelector("#camera"),
    //                 type: "LiveStream",
    //                 constraints: {
    //                     width: { min: 640 },
    //                     height: { min: 480 },
    //                     facingMode: "environment",
    //                     aspectRatio: { min: 1, max: 2 }
    //                 }
    //             },
    //             decoder: {
    //                 readers: ["code_128_reader", "ean_reader", "upc_reader"]
    //                 // readers: ["code_128_reader"]
    //             },
    //         }

    //         Quagga.init(quaggaConf, function (err) {
    //             if (err) {
    //                 return console.log(err);
    //             }
    //             Quagga.start();
    //         });

    //         Quagga.onDetected(function (result) {
    //             alert("Detected barcode: " + result.codeResult.code);
    //             if(result.codeResult.code != ''){
    //                 $('#inputBarcode').val(result.codeResult.code);
    //                 // $('#barcodeResult').html(' Successful...').removeClass('btn-warning').addClass('btn-primary');
                
    //                 $('#camera').remove();
    //                 Quagga.stop();
    //             }
    //         });
    //     }
    // End scan barcode
    //-------------------------- END BARCODE SCANNER -------------------------------//
    //---------------------------- END BARCODE SCANNER ------------------------------//

</script>