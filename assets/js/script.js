/************************************************************* */
/**********************LOGIN********************************** */
/**********************LOGIN********************************** */
$('#login-form').on('submit', ()=>{
    form = new FormData();
    form.append('email', $('#inputEmail').val())
    form.append('password', $('#inputPassword').val())
    $.ajax({
        data:form,
        method:'POST',
        url:'query/login.php',
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: ()=>{},
        success:(data)=>{
            $('#login-response').html(data)   
            preloader()
            $('.card-login').css('margin-bottom', '48px');       
        },
        error:(data)=>{
            console.log(data)
        }
    });
    return false;
})
/************************************************************* */
/**********************REGISTER******************************* */
/**********************REGISTER******************************* */
$('#register-form').on('submit', ()=>{
    form = new FormData();
    form.append('first-name', $('#inputFirstName').val())
    form.append('middle-name', $('#inputMiddleName').val())
    form.append('last-name', $('#inputLastName').val())
    form.append('email', $('#inputEmail').val())
    form.append('password', $('#inputPassword').val())
    form.append('confirm-password', $('#inputPasswordConfirm').val())
    $.ajax({
        data:form,
        method:'POST',
        url:'query/create-account.php',
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: ()=>{},
        success:(data)=>{
            $('#register-response').html(data)
            preloader()
            $('#img-register').css('height', '118vh');
        },
        error:(data)=>{
            console.log(data)
        }
    });
    return false;
})
/************************************************************* */
/**********************FORGOT PASSWORD************************ */
/**********************FORGOT PASSWORD************************ */
$('#form-create-password').on('submit', function() {
    let email = $('#inputforgotEmail').val();
    if($('#inputforgotEmail').val() != ""){
        
        if(validateGmail(email) == true){

            form=new FormData();
            form.append('email',$('#inputforgotEmail').val())
            $.ajax({
                data: form,
                method: 'post',
                url: 'report/emails/create-password-send-email.php',
                // dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend:()=>{ 
                    $('#forgot-password-response').html( "<div class='alert alert-warning alert-dismissible fade show' role='alert'>\
                        <strong>Checking:</strong> Please wait for a moment.\
                    </div>");
    
                    $('.loader').fadeIn('slow'); 
                },
                success: (data)=>{
                    $('#forgot-password-response').html(data)
                    setTimeout(
                        ()=>{
                            $('.loader').fadeOut()
                        }, 4600
                    )
                    setTimeout(
                        ()=>{
                            history.go();
                        }, 5000
                    ) 
                },
                error: (data)=>{
                    $('#forgot-password-response').html( "<div class='alert alert-warning alert-dismissible fade show' role='alert'>\
                        <strong>Warning:</strong> Something went wrong.\
                    </div>")
                    console.log(data);
                },
                complete:()=>{},
            })
            console.log('valid')
        }
        else{
            console.log('invalid')
            $('#forgot-password-response').html('<div class="alert alert-warning alert-dismissible fade show" role="alert">\
                <strong>Email Invalid:</strong> Message could not be sent.\
            </div');
            
            preloader();
        }
    }
    else{
        console.log('empty')
    }
    return false;
});
/************************************************************* */
/**********************RESET PASSWORD************************ */
/**********************RESET PASSWORD************************ */
$('#form-new-password').on('submit', (e)=>{
    e.preventDefault();
    password = $('#inputNewPassword').val();
    confirm_password = $('#inputConfirmNewPassword').val();
    token = $('#token').val();
    form = new FormData();
    form.append('token',token)
    form.append('password',password)
    form.append('confirm-password',confirm_password)
    $.ajax({
        data: form,
        method: 'post',
        url: 'query/create-new-password.php',
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: ()=>{},
        success: (data)=>{
            console.log(data);
            preloader();
            $('#new-password-response').html(data);
        },
        error: (data)=>{
            console.log(data);
        }
    });
    return false;
});
/************************************************************* */
/**********************REMEMBER PASSWORD************************ */
/**********************REMEMBER PASSWORD************************ */

$(document).ready(function() {
    // Check if cookies exist and pre-fill the form
    if (localStorage.getItem('rememberEmail')) {
        $('#inputEmail').val(localStorage.getItem('rememberEmail'));
        $('#inputPassword').val(localStorage.getItem('rememberPassword'));
        $('#inputRememberPassword').prop('checked', true);
    }

    // Save credentials to localStorage if "Remember Password" is checked
    $('#login-form').on('submit', function(e) {
        if ($('#inputRememberPassword').is(':checked')) {
            localStorage.setItem('rememberEmail', $('#inputEmail').val());
            localStorage.setItem('rememberPassword', $('#inputPassword').val());
        } else {
            localStorage.removeItem('rememberEmail');
            localStorage.removeItem('rememberPassword');
        }
    });
});