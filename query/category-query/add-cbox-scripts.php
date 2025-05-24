<script>
    
    // ========================Category Check Status box design==========================//
    // ========================Category Check Status box design==========================//    

    // ====================INSIDE ADD CATEGORY MODAL=============================== 
    //triggers when the checkbox is clicked 
    $("#inputStatus").on('click', ()=>{
        if( $("#inputStatus").is(":checked")){
            $('p#status').css('margin', "5px 12px 2px 12px");
            $('p#status').css('font-size', "14px");
            $('p#status').css('color', 'grey');
        }  
        else{
            $('p#status').css('margin', "15px 12px 5px 12px");
            $('p#status').css('font-size', "");
            $('p#status').css('color', '');
        }          
    });

</script>