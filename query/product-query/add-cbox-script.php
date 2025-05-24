<script>
// ========================Product Check Status box design==========================//
// ========================Product Check Status box design==========================//    

// ====================ADD FUNCTION =============================== 
//triggers when the checkbox is clicked 
    $("#inputProductStatus").on('click', ()=>{
        if( $("#inputProductStatus").is(":checked")){
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