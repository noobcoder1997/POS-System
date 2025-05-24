<script>
    
// ========================Category Check Status box design==========================//
// ========================Category Check Status box design==========================//     

    // ====================INSIDE EDIT FUNCTION MODAL===============================
    //triggers when the checkbox is clicked
    $("#inputStatus"+<?php echo $cat['id']; ?>).on('click', ()=>{
        if( $("#inputStatus"+<?php echo $cat['id']; ?>).is(":checked")){
            $('[name="status<?php echo $cat['id']; ?>"]').css('margin', "5px 12px 2px 12px");
            $('[name="status<?php echo $cat['id']; ?>"]').css('font-size', "14px");
            $('[name="status<?php echo $cat['id']; ?>"]').css('color', 'grey');
        }  
        else{
            $('[name="status<?php echo $cat['id']; ?>"]').css('margin', "15px 12px 5px 12px");
            $('[name="status<?php echo $cat['id']; ?>"]').css('font-size', "black");
            $('[name="status<?php echo $cat['id']; ?>"]').css('color', '');
        }          
    });
    //triggers when the document is loaded
    $(document). ready(()=>{
        if( $("#inputStatus"+<?php echo $cat['id']; ?>).is(":checked")){
            $('[name="status<?php echo $cat['id']; ?>"]').css('margin', "5px 12px 2px 12px");
            $('[name="status<?php echo $cat['id']; ?>"]').css('font-size', "14px");
            $('[name="status<?php echo $cat['id']; ?>"]').css('color', 'grey');
        }  
        else{
            $('[name="status<?php echo $cat['id']; ?>"]').css('margin', "15px 12px 5px 12px");
            $('[name="status<?php echo $cat['id']; ?>"]').css('font-size', "black");
            $('[name="status<?php echo $cat['id']; ?>"]').css('color', '');
        }  
    }) 
    // =========================End Category Check Status box design=========================//
    // =========================End Category Check Status box design=========================//
</script>