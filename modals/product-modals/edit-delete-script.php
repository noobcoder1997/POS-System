<script>
    $('#editProduct<?php echo $product['id']; ?>').on('shown.bs.modal', function() {
    
        $('#barcode<?php echo $product['id']; ?>').focus().val('');

        $('#scan<?php echo $product['id']; ?>').html('Pending').addClass('btn-warning');

        $('#scan-status1<?php echo $product['id']; ?>').css({"margin-left":"13px","margin-top":"0"})
    
        $('#scan-status<?php echo $product['id']; ?>').css({"margin-left":"13px","margin-top":"14px","margin-bottom":"3px"})
    });

    function onkeyDown<?php echo $product['id']; ?>(e){ 
        if (e.key === 'Enter') {

            console.log($('#barcode<?php echo $product['id']; ?>').val());

            $('#inputbBarcodeData<?php echo $product['id']; ?>').val($('#barcode<?php echo $product['id']; ?>').val())
            
            $('#scan<?php echo $product['id']; ?>').html('Success').removeClass('btn-warning').addClass('btn-primary');
            
            $('#barcode<?php echo $product['id']; ?>').val("");

            $('#scan-status<?php echo $product['id']; ?>').css({'font-size':'14px',"color":"grey","margin-top":"5px"});

        }
    }
</script>