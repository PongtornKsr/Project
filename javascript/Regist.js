$('document').ready(function() {

    var username_state = false;
    var email_state = false;
    var passwordin_state = false;
    var passwordinc_state = false;

    $('#username').on('blur', function() {
        var username = $('#username').val();
        if (username == '') {
            username_state = false;
            return;
        }
        $.ajax({
            url: 'Regist_backend.php',
            type: 'post',
            data: {
                'username_check': 1,
                'username': username
            },
            success: function(response) {
                if (response == 'taken') {
                    username_state = false;
                    $('#username').parent().removeClass();
                    $('#username').parent().addClass('form_error');
                    $('#username').siblings("span").text("ชื่อผู้ใช้มีการลงทะเบียนในระบบแล้ว");
                } else if (response == "not_taken") {
                    username_state = true;
                    $('#username').parent().removeClass();
                    $('#username').parent().addClass('form_success');
                    $('#username').siblings("span").text("ชื่อผู้ใช้สามารถใช้ได้");
                    
                }
            }
        })
    });

    $('#email').on('blur', function() {
        var email = $('#email').val();
        if (email == '') {
            email_state = false;
            return;
        }
        $.ajax({
            url: 'Regist_backend.php',
            type: 'post',
            data: {
                'email_check': 1,
                'email': email
            },
            success: function(response) {
                if (response == 'taken') {
                    email_state = false;
                    $('#email').parent().removeClass();
                    $('#email').parent().addClass('form_error');
                    $('#email').siblings("span").text("อีเมลนี้มีการลงทะเบียนในระบบแล้ว");
                } else if (response == "not_taken") {
                    email_state = true;
                    $('#email').parent().removeClass();
                    $('#email').parent().addClass('form_success');
                    $('#email').siblings("span").text("อีเมลสามารถใช้ได้");
       
                }
            }
        })
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
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        if (username_state == false || email_state == false || passwordin_state == false || passwordinc_state == false) {
            e.preventDefault();
            $("#error_msg").text("กรุณากรอกข้อมูลให้ถูกต้องก่อนดำเนินการลงทะเบียน");
        } else {
            $.ajax({
                url: 'Regist_backend.php',
                type: 'post',
                data: {
                    'save': 1,
                    'email': email,
                    'username': username,
                    'password': password,
                    'fname' : fname,
                    'lname' : lname
                },
                success: function(response) {
                    alert('User saved');
                    $('#username').val('');
                    $('#email').val('');
                    $('#password').val('');
                    $('#password2').val('');
                    $("#fname").val('');
                    $("#lname").val('');
                    $('#cpassword').val('');
                    window.location.href = 'Login.php';
                }
            })
        }
    });

});