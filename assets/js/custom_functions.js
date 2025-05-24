/************************************************************* */
/**********************PRELOADER***************************** */
/**********************PRELOADER***************************** */
    function preloader(){
        $('.loader').fadeIn('slow');
        setTimeout(
            ()=>{
                $('.loader').fadeOut()
                window.location.reload()
            }, 2000
        )
    }
/************************************************************* */
/**********************VALIDATE EMAIL************************ */
/**********************VALIDATE EMAIL************************ */
function validateGmail(email) {
    const gmailRegex0 = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
    const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.com$/;
    if(gmailRegex0.test(email)){
        return gmailRegex0.test(email);
    }
    if(regex){
        return regex.test(email);
    }
}