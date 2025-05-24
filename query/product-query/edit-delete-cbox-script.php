<script>
    
// ========================Product Check Status box design==========================//
// ========================Product Check Status box design==========================//    


// ====================EDIT FUNCTION ===============================
// triggers when the checkbox is clicked
    $("#inputProductStatus"+<?php echo $product['id']; ?>).on('click', ()=>{
        if( $("#inputProductStatus"+<?php echo $product['id']; ?>).is(":checked")){
            $('[name="status<?php echo $product['id']; ?>"]').css('margin', "5px 12px 2px 12px");
            $('[name="status<?php echo $product['id']; ?>"]').css('font-size', "14px");
            $('[name="status<?php echo $product['id']; ?>"]').css('color', 'grey');
        }  
        else{
            $('[name="status<?php echo $product['id']; ?>"]').css('margin', "15px 12px 5px 12px");
            $('[name="status<?php echo $product['id']; ?>"]').css('font-size', "black");
            $('[name="status<?php echo $product['id']; ?>"]').css('color', '');
        }          
    });
//triggers when the document is loaded
    $(document).ready(()=>{
        if( $("#inputProductStatus"+<?php echo $product['id']; ?>).is(":checked")){
            $('[name="status<?php echo $product['id']; ?>"]').css('margin', "5px 12px 2px 12px");
            $('[name="status<?php echo $product['id']; ?>"]').css('font-size', "14px");
            $('[name="status<?php echo $product['id']; ?>"]').css('color', 'grey');
        }  
        else{
            $('[name="status<?php echo $product['id']; ?>"]').css('margin', "15px 12px 5px 12px");
            $('[name="status<?php echo $product['id']; ?>"]').css('font-size', "black");
            $('[name="status<?php echo $product['id']; ?>"]').css('color', '');
        }  
    }) 
// =========================End Product Check Status box design=========================//
// =========================End Product Check Status box design=========================//

</script>