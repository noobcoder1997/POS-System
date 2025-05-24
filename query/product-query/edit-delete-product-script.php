<script>
    // setInterval( function (){
    //     if(screen.width <= 480){
    //         $('#button-addon2<?php echo $product['id']; ?>').css('display','block');
    //     }
    //     else{
    //         $('#button-addon2<?php echo $product['id']; ?>').css('display','none');
    //     }
    // }, 10);

    // $('#editProduct<?php echo $product['id']; ?>').on('hide.bs.modal', () =>  {
    //    Quagga.stop(); // Stops the camera stream
    // });

    // $('#editProduct<?php echo $product['id']; ?>').on('show.bs.modal', () =>  {
    //     if(screen.width > 480){
    //         $('#camera<?php echo $product['id']; ?>').remove();
    //     }
    // }); 

    // function changeBarcode(id){
    //     if(screen.width <= 480){
    //         $('#div-cam'+id).css('display','block');
            
    //         $('#camera'+id).css({'height':'200px'},{'width':'100%'});
    //         $('#reader'+id).css({'height':'200px'},{'width':'100%'});
            
    //         if($('#div-cam'+id).is(':visible')){
    //             const quaggaConf = {
    //                 inputStream: {
    //                     target: document.querySelector("#camera"+id),
    //                     type: "LiveStream",
    //                     constraints: {
    //                         width: { min: 640 },
    //                         height: { min: 480 },
    //                         facingMode: "environment",
    //                         aspectRatio: { min: 1, max: 2 }
    //                     }
    //                 },
    //                 decoder: {
    //                     // readers: ["code_128_reader", "ean_reader", "upc_reader"]
    //                     readers: ["code_128_reader"]
    //                 },
    //             }

    //             Quagga.init(quaggaConf, function (err) {
    //                 if (err) {
    //                     return console.log(err);
    //                 }
    //                 Quagga.start();
    //             });

    //             Quagga.onDetected(function (result) {
    //                 alert("Detected barcode: " + result.codeResult.code);
    //                 if(result.codeResult.code != ''){
    //                     $('#inputProductBarcode'+id).val(result.codeResult.code);
    //                     $('#barcodeResult').html(' Successful...').removeClass('btn-warning').addClass('btn-primary');
    //                 }
    //                 $('#camera'+id).remove();
    //                 Quagga.stop();
    //             });
    //         }
    //     }
    // }

//loads image to edit product function
    window.addEventListener('load', function () {
        document.querySelector('#inputProductImg<?php echo $product['id']; ?>').addEventListener('change', function () {
            if (this.files && this.files[0]) {
            var img = document.getElementById('img-content<?php echo $product['id']; ?>');
            img.onload = () => {
                URL.revokeObjectURL(img.src);
            }
            img.src = URL.createObjectURL(this.files[0]);
            }
        });
    });
// Reset unuploaded image in edit product function
    $(document).ready(function() {
        $("#editProduct<?php echo $product['id']; ?>").on("hidden.bs.modal", function() {
            $("#editProduct<?php echo $product['id']; ?> input[type='file']").val('');
            var img = document.getElementById('img-content<?php echo $product['id']; ?>');
            img.src = "<?php print_r($product['image']);?>";
        });
    });    
</script>
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