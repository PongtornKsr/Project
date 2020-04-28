$('#document').ready(function(){
    var email_state = false;
    var user_state = false;
    var passwordin_state = false;
    var passwordinc_state = false;

    $('#username').on('blur',function(){
        var username = $('#username').val();
        var email = $('#email').val();
        if(username == ''){
            user_state = false;
            return;
        }
        $.ajax({ url: 'Setnewpass_backend.php',type:'post',data:{ 'username_check':1 , 'username' : username,'email' : email},
            success: function(response){
                if(response == 'exist'){
                    user_state = true;
                    $('#username').parent().removeClass();
                    $('#username').parent().addClass('form_success');
                    $('#username').siblings("span").text("ชื่อผู้ใช้งานตรงกับอีเมล");
                } else if(response == 'not_exist'){
                    user_state = false;
                    $('#username').parent().removeClass();
                    $('#username').parent().addClass('form_error');
                    $('#username').siblings("span").text("ชื่อผู้ใช้งานไม่ตรงกับอีเมล");
                }
            }
        
        
    });
    });

    $('#email').on('blur',function(){
        var email = $('#email').val();
        var username = $('#username').val();
        if(email == ''){
            email_state = false;
            return;
        }
        $.ajax({
            url : 'Setnewpass_backend.php',
            type : 'post',
            data :{ 'email_check' : 1,
                    'email' : email,
                    'username' : username
            },
            success: function(response){
                if (response == 'exist') {
                    email_state = true;
                    $('#email').parent().removeClass();
                    $('#email').parent().addClass('form_success');
                    $('#email').siblings("span").text("พบอีเมลในระบบ");
                } else if (response == "not_exist") {
                    email_state = false;
                    $('#email').parent().removeClass();
                    $('#email').parent().addClass('form_error');
                    $('#email').siblings("span").text("ไม่พบอีเมลในระบบ");
       
                }
            }
        });
    });
    $('#password').on('keyup',function(){
        var value = $('#password').val();
        if(value.length < 8 && value != "Default text"){
            passwordin_state = false;
            $('#password').parent().removeClass();
            $('#password').parent().addClass('form_error');
            $('#password').siblings("span").text("รหัสผ่านต้องมี8ตัวอักษรหรือมากกว่า");
        } 
        else{
            passwordin_state = true;
            $('#password').parent().removeClass();
            $('#password').parent().addClass('form_success');
            $('#password').siblings("span").text("");
            $('#password').parent().removeClass();
        }
        var passwordin1 = $('#password').val();
        var passwordin2 = $('#password2').val();
        if(passwordin2 != passwordin1){
            passwordinc_state = false;
            $('#password2').parent().removeClass();
            $('#password2').parent().addClass('form_error');
            $('#password2').siblings("span").text("รหัสผ่านไม่ตรงกัน");
        }
        else{
            passwordinc_state = true;
            $('#password2').parent().removeClass();
            $('#password2').parent().addClass('form_success');
            $('#password2').siblings("span").text("");
            $('#password2').parent().removeClass();
        }
    });
    $('#password2').on('keyup',function(){
        var value = $('#password').val();
        if(value.length < 8 && value != "Default text"){
            passwordin_state = false;
            $('#password').parent().removeClass();
            $('#password').parent().addClass('form_error');
            $('#password').siblings("span").text("รหัสผ่านต้องมี8ตัวอักษรหรือมากกว่า");
        } 
        else{
            passwordin_state = true;
            $('#password').parent().removeClass();
            $('#password').parent().addClass('form_success');
            $('#password').siblings("span").text("");
            $('#password').parent().removeClass();
        }
        var passwordin1 = $('#password').val();
        var passwordin2 = $('#password2').val();
        if(passwordin2 != passwordin1){
            passwordinc_state = false;
            $('#password2').parent().removeClass();
            $('#password2').parent().addClass('form_error');
            $('#password2').siblings("span").text("รหัสผ่านไม่ตรงกัน");
        }
        else{
            passwordinc_state = true;
            $('#password2').parent().removeClass();
            $('#password2').parent().addClass('form_success');
            $('#password2').siblings("span").text("");
            $('#password2').parent().removeClass();
        }
    });
    $('#reg_btn').on("click", function(e) {
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();
        if (user_state == false || email_state == false || passwordin_state == false || passwordinc_state == false) {
            e.preventDefault();
            $("#error_msg").text("กรุณากรอกข้อมูลให้ถูกต้องก่อนดำเนินการ");
        } else {
            $.ajax({
                url: 'Setnewpass_backend.php',
                type: 'post',
                data: {
                    'save': 1,
                    'email': email,
                    'username': username,
                    'password': password
                },
                success: function(response) {
                    if(response == 'Saved'){
                    alert('Update Complete');
                    $('#username').val('');
                    $('#email').val('');
                    $('#password').val('');
                    $('#password2').val('');
                    window.location.href = 'login.php';}
                    else if(response == 'not_exist'){
                        alert('Update Error');
                    $('#username').val('');
                    $('#email').val('');
                    $('#password').val('');
                    $('#password2').val('');
                    }
                }
            })
        }
    });

});