$(document).ready(function(){

    condition_check();
    init_require();
    var fname=false,lname=false,email=false,username=false,pass=false;
    function injectin_check(ijtext){
        if(ijtext == "" || ijtext.trim() == "" || ijtext.includes("'") || ijtext.includes("*") || ijtext.includes(";") || ijtext.includes("<") || ijtext.includes(">") || ijtext.includes(",")){
            return false;
        }
        else { return true; }
    }

    function condition_check(){
        if(fname == true && lname == true && email == true && username == true && pass == true){
            $('#accsubmit').attr('disabled',false);
        }
        else{
            $('#accsubmit').attr('disabled',true);
            
        }
    }
    function init_require(){
        $('#email').siblings("span").hide();
        $('#fname').siblings("span").hide();
        $('#lname').siblings("span").hide();
        $('#pass').siblings("span").hide();
        $('#username').siblings("span").hide();
        /*
        $('#fname').css('border','solid 2px red');
        $('#lname').css('border','solid 2px red');
        $('#email').css('border','solid 2px red');
        $('#username').css('border','solid 2px red');
        $('#pass').css('border','solid 2px red');*/
    }
    $(document).on('keyup','#fname',function(){
        var n = $(this).val();
        
        fname = injectin_check(n);
        if(fname == true){
            $('#name_alert').html("");
            $('#name_alert').hide();
           // $('#fname').css('border','solid 2px green');
        }
        else if(fname == false){
            $('#name_alert').html('กรุณากรอกข้อมูลที่ไม่ใช่ค่าว่าง และ ห้ามใช้ตัวอักษรพิเศษเช่น " * / < > ; , "' );
            $('#name_alert').css('color','red');
            $('#name_alert').show();
            
           // $('#fname').css('border','solid 2px red');
        }
        condition_check();
    });
    $(document).on('keyup','#lname',function(){
        var n = $(this).val().trim();
        lname = injectin_check(n);
        if(lname == true){
            $('#lname_alert').html("");
            $('#lname_alert').hide();
           // $('#lname').css('border','solid 2px green');
        }
        if(lname == false){
            $('#lname_alert').html('กรุณากรอกข้อมูลที่ไม่ใช่ค่าว่าง และ ห้ามใช้ตัวอักษรพิเศษเช่น " * / < > ; , "' );
            $('#lname_alert').css('color','red');
            $('#lname_alert').show();
           // $('#lname').css('border','solid 2px red');
        }
        condition_check();
    });

    $(document).on('keyup','#pass',function(){
        var n = $(this).val().trim();
        pass = injectin_check(n);
        if(pass == true){
            $('#pass_alert').html("");
            $('#pass_alert').hide();
           // $('#pass').css('border','solid 2px green');
        }
        if(pass == false){
            $('#pass_alert').html('กรุณากรอกข้อมูลที่ไม่ใช่ค่าว่าง และ ห้ามใช้ตัวอักษรพิเศษเช่น " * / < > ; , "' );
            $('#pass_alert').css('color','red');
            $('#pass_alert').show();
           // $('#pass').css('border','solid 2px red');
        }
        condition_check();
    });

    $(document).on('keyup','#email',function(){
        var n = $(this).val().trim();
        var ch = "";
        $.ajax({
            url: "userinsert_back.php",
            method: "POST",
            data: {
                'email' : n
            },
            success:function(data){
                ch = data;
                
                email = injectin_check(n);
                if(email == true && ch == ""){
                    $('#email_alert').html("");
                    //$('#email').css('border','solid 2px green');
                    $('#email_alert').hide();
                }
                if(email == false){
                    $('#email_alert').html('กรุณากรอกข้อมูลที่ไม่ใช่ค่าว่าง และ ห้ามใช้ตัวอักษรพิเศษเช่น " * / < > ; , "' );
                    $('#email_alert').css('color','red');
                   // $('#email').css('border','solid 2px red');
                   $('#email_alert').show();
                }
                if(ch != ""){
                    $('#email_alert').html(ch);
                    $('#email_alert').css('color','red');
                   // $('#email').css('border','solid 2px red');
                    email = false;
                    $('#email_alert').show();

                }
                condition_check();
            }
        });
    });
        $(document).on('keyup','#username',function(){
            var n = $(this).val().trim();
            var ch = "";
            $.ajax({
                url: "userinsert_back.php",
                method: "POST",
                data: {
                    'username' : n
                },
                success:function(data){
                    ch = data;
                    
                    username = injectin_check(n);
                    if(username == true && ch == ""){
                        $('#username_alert').html("");
                      //  $('#username').css('border','solid 2px green');
                      $('#username_alert').hide();
                    }
                    if(username == false){
                        $('#username_alert').html('กรุณากรอกข้อมูลที่ไม่ใช่ค่าว่าง และ ห้ามใช้ตัวอักษรพิเศษเช่น " * / < > ; , "' );
                        $('#username_alert').css('color','red');
                        $('#username_alert').show();
                        //$('#username').css('border','solid 2px red');
                    }
                    if(ch != ""){
                        $('#username_alert').html(ch);
                        $('#username_alert').css('color','red');
                      //  $('#username').css('border','solid 2px red');
                      $('#username_alert').show();
                        username = false;
    
                    }
                    condition_check();
                }
            });
        

    });

});
