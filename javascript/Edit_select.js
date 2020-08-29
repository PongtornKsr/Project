$(document).ready(function(){
  
    stat_init();
    type_init();
    dtype_init();
    gm_init();
    mt_init();
    rp_init();
    rm_init();
    vd_init();
        function stat_init(query){
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'initop' : 1,'query':query},
                success:function(data)
                {
                 $('#stat_data').html(data);
                }
               });
        }
        function type_init(query){

            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'initop' : 2,'query':query},
                success:function(data)
                {
                 $('#type_data').html(data);
                }
               });
        }
        function dtype_init(query){
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'initop' : 3,'query':query},
                success:function(data)
                {
                 $('#dtype_data').html(data);
                }
               });

        }
        function gm_init(query){
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'initop' : 4,'query':query},
                success:function(data)
                {
                 $('#gm_data').html(data);
                }
               });

        }
        function mt_init(query){
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'initop' : 5,'query':query},
                success:function(data)
                {
                 $('#mt_data').html(data);
                }
               });

        }
        function rp_init(query){
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'initop' : 6,'query':query},
                success:function(data)
                {
                 $('#rp_data').html(data);
                }
               });

        }
        function rm_init(query){
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'initop' : 7,'query':query},
                success:function(data)
                {
                 $('#rm_data').html(data);
                }
               });

        }
        function vd_init(query){
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'initop' : 8,'query':query},
                success:function(data)
                {
                 $('#vd_data').html(data);
                }
               });

        }
        function injectin_check(ijtext){
            if(ijtext == "" || ijtext.trim() === "" || ijtext.length === 0 || ijtext.includes("'") || ijtext.includes("*") || ijtext.includes(";") ){
                return false;
            }
            else { return true; }

        }


        $(document).on('keyup','#stat_search',function(){
            var s = $('#stat_search').val();
            stat_init(s);
        });
        $(document).on('keyup','#type_search',function(){
            var s = $('#type_search').val();
            type_init(s);
        });
        $(document).on('keyup','#dtype_search',function(){
            var s = $('#dtype_search').val();
            dtype_init(s);
        });
        $(document).on('keyup','#gm_search',function(){
            var s = $('#gm_search').val();
            gm_init(s);
        });
        $(document).on('keyup','#mt_search',function(){
            var s = $('#mt_search').val();
            mt_init(s);
        });
        $(document).on('keyup','#rp_search',function(){
            var s = $('#rp_search').val();
            rp_init(s);
        });
        $(document).on('keyup','#rm_search',function(){
            var s = $('#rm_search').val();
            rm_init(s);
        });
        $(document).on('keyup','#vd_search',function(){
            var s = $('#vd_search').val();
            vd_init(s);
        });

        $(document).on('click','#addstat',function(){
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'initop' : 1,'addop' : 1 },
                success:function(data)
                {
                 $('#stat_data').html(data);
                 var s = $('#stat_name').val().trim();
                var q = injectin_check(s);
                if(q == true){ $('#stat_name').css('border','solid black'); $('#s_insert').attr('disabled',false);}
                else if( q == false ){ $('#stat_name').css('border','solid red'); $('#s_insert').attr('disabled',true); }
                }
            });
            
        });
        $(document).on('click','#addtype',function(){
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'initop' : 2,'addop' : 1 },
                success:function(data)
                {
                 $('#type_data').html(data);
                 var s = $('#type_name').val().trim();
                 var d = $('#noun_name').val().trim();
                 var q = injectin_check(s);
                 var w = injectin_check(d);
                 if(q == true ){ $('#type_name').css('border','solid black'); }
                 else if( q == false ){ $('#type_name').css('border','solid red');  }
                if(w == true){
                    $('#noun_name').css('border','solid black');
                }
                else if(w == false){ 
                    $('#noun_name').css('border','solid red'); 
                }
                if(q == true && w == true){
                    $('#t_insert').attr('disabled',false); $('#t_update').attr('disabled',false);
                }else{
                    $('#t_insert').attr('disabled',true); $('#t_update').attr('disabled',true);
                }
                }

            });

        });
        $(document).on('click','#adddtype',function(){
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'initop' : 3,'addop' : 1 },
                success:function(data)
                {
                 $('#dtype_data').html(data);
                }

            });

        });
        $(document).on('click','#addgm',function(){
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'initop' : 4,'addop' : 1 },
                success:function(data)
                {
                 $('#gm_data').html(data);
                }

            });

        });
        $(document).on('click','#addmt',function(){
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'initop' : 5,'addop' : 1 },
                success:function(data)
                {
                 $('#mt_data').html(data);
                }

            });

        });
        $(document).on('click','#addrp',function(){
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'initop' : 6,'addop' : 1 },
                success:function(data)
                {
                 $('#rp_data').html(data);
                }

            });

        });
        $(document).on('click','#addrm',function(){
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'initop' : 7,'addop' : 1 },
                success:function(data)
                {
                 $('#rm_data').html(data);
                }

            });

        });
        $(document).on('click','#addvd',function(){
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'initop' : 8,'addop' : 1 },
                success:function(data)
                {
                 $('#vd_data').html(data);
                }

            });

        });

        $(document).on('keyup','.statin',function(){
            var s = $('#stat_name').val().trim();
            var q = injectin_check(s);
            if(q == true){ $('#stat_name').css('border','solid black'); $('#s_insert').attr('disabled',false); $('#s_update').attr('disabled',false);}
            else if( q == false ){ $('#stat_name').css('border','solid red'); $('#s_insert').attr('disabled',true); $('#s_update').attr('disabled',true); }
        });
        $(document).on('keyup','.typein',function(){
            var s = $('#type_name').val().trim();
            var d = $('#noun_name').val().trim();
            var q = injectin_check(s);
            var w = injectin_check(d);
            if(q == true ){ $('#type_name').css('border','solid black'); }
            else if( q == false ){ $('#type_name').css('border','solid red');  }
           if(w == true){
               $('#noun_name').css('border','solid black');
           }
           else if(w == false){ 
               $('#noun_name').css('border','solid red'); 
           }

           if(q == true && w == true){
               $('#t_insert').attr('disabled',false); $('#t_update').attr('disabled',false);
           }else{
               $('#t_insert').attr('disabled',true); $('#t_update').attr('disabled',true);
           }
        });
        $(document).on('click','#s_insert',function(){
            var s = $('#stat_name').val().trim();
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'insertop' : 1 , 'stat_name' : s},
                success:function(){
                    stat_init();
                }

            })

        });
        $(document).on('click','#t_insert',function(){
            var s = $('#type_name').val();
            var n = $('#noun_name').val();
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'insertop' : 2 , 'type_name' : s , 'noun_name' : n},
                success:function(){
                    type_init();
                }

            })

        });
        $(document).on('click','#d_insert',function(){
            var s = $('#dtype_name').val();
           
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'insertop' : 3 , 'dtype_name' : s },
                success:function(){
                    dtype_init();
                }

            })

        });
        $(document).on('click','#gm_insert',function(){
            var s = $('#gm_name').val();
           
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'insertop' : 4 , 'gm_name' : s },
                success:function(){
                    gm_init();
                }

            })

        });
        $(document).on('click','#mt_insert',function(){
            var s = $('#mt_name').val();
           
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'insertop' : 5 , 'mt_name' : s },
                success:function(){
                    mt_init();
                }

            })

        });
        $(document).on('click','#rp_insert',function(){
            var s = $('#rp_name').val();
            var a = $('#rp_lname').val();
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'insertop' : 6 , 'rp_name' : s,'rp_lname' : a},
                success:function(){
                    rp_init();
                }

            })

        });
        $(document).on('click','#rm_insert',function(){
            var s = $('#rm_name').val();
            
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'insertop' : 7 , 'rm_name' : s},
                success:function(){
                    rm_init();
                }

            })

        });
        $(document).on('click','#vd_insert',function(){
            var s = $('#vd_name').val();
            var a = $('#vd_lo').val();
            var v = $('#vd_tel').val();
            var e = $('#vd_fax').val();
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{ 'insertop' : 8 , 'vd_name' : s,'vd_lo' : a, 'vd_tel' : v , 'vd_fax' : e},
                success:function(){
                    vd_init();
                }

            })

        });

        $(document).on('click', '#s_edit',function(){
            var s = $(this).val();
           
            $.ajax({
                url:"Edit_select_back.php",
                method :"POST",
                data:{
                    'initop' : 1 ,'updateop' : 1, 'id' : s , 
                },
                success:function(data){
                    $('#stat_data').html(data);
                }

            })

        });
        $(document).on('click', '#t_edit',function(){
            var s = $(this).val();

            $.ajax({
                url:"Edit_select_back.php",
                method :"POST",
                data:{
                    'initop' : 2 ,'updateop' : 2, 'id' : s
                },
                success:function(data){
                    $('#type_data').html(data);
                }

            })

        });
        $(document).on('click', '#d_edit',function(){
            var s = $(this).val();

            $.ajax({
                url:"Edit_select_back.php",
                method :"POST",
                data:{
                    'initop' : 3 ,'updateop' : 3, 'id' : s
                },
                success:function(data){
                    $('#dtype_data').html(data);
                }

            })

        });
        $(document).on('click', '#gm_edit',function(){
            var s = $(this).val();

            $.ajax({
                url:"Edit_select_back.php",
                method :"POST",
                data:{
                    'initop' : 4 , 'updateop' : 4, 'id' : s
                },
                success:function(data){
                    $('#gm_data').html(data);
                }

            })

        });
        $(document).on('click', '#mt_edit',function(){
            var s = $(this).val();

            $.ajax({
                url:"Edit_select_back.php",
                method :"POST",
                data:{
                    'initop' : 5 , 'updateop' : 5, 'id' : s
                },
                success:function(data){
                    $('#mt_data').html(data);
                }

            })

        });
        $(document).on('click', '#rp_edit',function(){
            var s = $(this).val();

            $.ajax({
                url:"Edit_select_back.php",
                method :"POST",
                data:{
                    'initop' : 6 , 'updateop' : 6, 'id' : s
                },
                success:function(data){
                    $('#rp_data').html(data);
                }

            })

        });
        $(document).on('click', '#rm_edit',function(){
            var s = $(this).val();

            $.ajax({
                url:"Edit_select_back.php",
                method :"POST",
                data:{
                    'initop' : 7 , 'updateop' : 7, 'id' : s
                },
                success:function(data){
                    $('#rm_data').html(data);
                }

            })

        });
        $(document).on('click', '#vd_edit',function(){
            var s = $(this).val();

            $.ajax({
                url:"Edit_select_back.php",
                method :"POST",
                data:{
                    'initop' : 8 , 'updateop' : 8, 'id' : s
                },
                success:function(data){
                    $('#vd_data').html(data);
                }

            })

        });

        $(document).on('click', '#s_delete',function(){
            var s = $(this).val();

            $.ajax({
                url:"Edit_select_back.php",
                method :"POST",
                data:{
                    'initop' : 1 ,'delop' : 1, 'id' : s
                },
                success:function(data){
                    $('#stat_data').html(data);
                }

            })

        });
        $(document).on('click', '#t_delete',function(){
            var s = $(this).val();

            $.ajax({
                url:"Edit_select_back.php",
                method :"POST",
                data:{
                    'initop' : 2 ,'delop' : 1, 'id' : s
                },
                success:function(data){
                    $('#type_data').html(data);
                }

            })

        });
        $(document).on('click', '#d_delete',function(){
            var s = $(this).val();

            $.ajax({
                url:"Edit_select_back.php",
                method :"POST",
                data:{
                    'initop' : 3 ,'delop' : 1, 'id' : s
                },
                success:function(data){
                    $('#dtype_data').html(data);
                }

            })

        });
        $(document).on('click', '#gm_delete',function(){
            var s = $(this).val();

            $.ajax({
                url:"Edit_select_back.php",
                method :"POST",
                data:{
                    'initop' : 4 ,'delop' : 1, 'id' : s
                },
                success:function(data){
                    $('#gm_data').html(data);
                }

            })

        });
        $(document).on('click', '#mt_delete',function(){
            var s = $(this).val();

            $.ajax({
                url:"Edit_select_back.php",
                method :"POST",
                data:{
                    'initop' : 5 ,'delop' : 1, 'id' : s
                },
                success:function(data){
                    $('#mt_data').html(data);
                }

            })

        });
        $(document).on('click', '#rp_delete',function(){
            var s = $(this).val();

            $.ajax({
                url:"Edit_select_back.php",
                method :"POST",
                data:{
                    'initop' : 6 ,'delop' : 1, 'id' : s
                },
                success:function(data){
                    $('#rp_data').html(data);
                }

            })

        });
        $(document).on('click', '#rm_delete',function(){
            var s = $(this).val();

            $.ajax({
                url:"Edit_select_back.php",
                method :"POST",
                data:{
                    'initop' : 7 ,'delop' : 1, 'id' : s
                },
                success:function(data){
                    $('#rm_data').html(data);
                }

            })

        });
        $(document).on('click', '#vd_delete',function(){
            var s = $(this).val();

            $.ajax({
                url:"Edit_select_back.php",
                method :"POST",
                data:{
                    'initop' : 8 ,'delop' : 1, 'id' : s
                },
                success:function(data){
                    $('#vd_data').html(data);
                }

            })

        });

        $(document).on('click', '#s_cancel', function(){
            stat_init();
            $('#stat_search').val('');
        });
        $(document).on('click', '#t_cancel', function(){
            type_init();
            $('#type_search').val('');
        });
        $(document).on('click', '#d_cancel', function(){
            dtype_init();
            $('#dtype_search').val('');
        });
        $(document).on('click', '#gm_cancel', function(){
            gm_init();
            $('#gm_search').val('');
        });
        $(document).on('click', '#mt_cancel', function(){
            mt_init();
            $('#mt_search').val('');
        });
        $(document).on('click', '#rp_cancel', function(){
            rp_init();
            $('#rp_search').val('');
        });
        $(document).on('click', '#rm_cancel', function(){
            rm_init();
            $('#rm_search').val('');
        });
        $(document).on('click', '#vd_cancel', function(){
            vd_init();
            $('#vd_search').val('');
        });


        $(document).on('click','#s_update',function(){
            var s = $(this).val();
            var r = $('#stat_name').val();
            $.ajax({
                url: "Edit_select_back.php",
                method:"POST",
                data: {
                    'update' : 1,
                    'id' : s,
                    'stat_name' : r
                },
                success:function(){
                    stat_init();
                }
            });
            
        });

        $(document).on('click','#t_update',function(){
            var s = $(this).val();
            var r = $('#type_name').val();
            var e = $('#noun_name').val();
            $.ajax({
                url: "Edit_select_back.php",
                method: "POST",
                data:{
                    'update': 2,
                    'id' : s,
                    'type_name': r,
                    'noun_name': e
                },
                success:function(){
                    type_init();
                }
            });
        });

        $(document).on('click','#d_update',function(){
            var s = $(this).val();
            var r = $('#dtype_name').val();;
            $.ajax({
                url: "Edit_select_back.php",
                method: "POST",
                data:{
                    'update': 3,
                    'id' : s,
                    'dtype_name' : r
                },
                success:function(){
                    dtype_init();
                }
            });
        });

        $(document).on('click','#gm_update',function(){
            var s = $(this).val();
            var r = $('#gm_name').val();
            $.ajax({
                url:"Edit_select_back.php",
                method: "POST",
                data:{
                    'update' : 4,
                    'id': s,
                    'gm_name': r
                },
                success:function(){
                    gm_init();
                }
            });
        });

        $(document).on('click','#mt_update',function(){
            var s = $(this).val();
            var r = $('#mt_name').val();
            $.ajax({
                url : "Edit_select_back.php",
                method:"POST",
                data:{
                    'update': 5,
                    'id' : s,
                    'mt_name': r
                },
                success:function(){
                    mt_init();
                }
            });
        });

        $(document).on('click','#rp_update',function(){
            var s = $(this).val();
            var r = $('#rp_name').val();
            var e = $('#rp_lname').val();
            $.ajax({
                url: "Edit_select_back.php",
                method:"POST",
                data:{
                    'update' : 6,
                    'id': s,
                    'rp_name':r,
                    'rp_lname' : e
                },
                success:function(){
                    rp_init();
                }
            });
        });

        $(document).on('click','#rm_update',function(){
            var s = $(this).val();
            var r = $('#rm_name').val();
            $.ajax({
                url: "Edit_select_back.php",
                method:"POST",
                data:{
                    'update' : 7,
                    'id': s ,
                    'rm_name': r
                },
                success:function(){
                    rm_init();
                }
            });
        });

        $(document).on('click','#vd_update',function(){
            var s = $(this).val();
            var r = $('#vd_name').val();
            var e = $('#vd_lo').val();
            var t = $('#vd_tel').val();
            var y = $('#vd_fax').val();
            $.ajax({
                url:"Edit_select_back.php",
                method:"POST",
                data:{
                    'update' : 8,
                    'id' : s,
                    'vd_name': r,
                    'vd_lo': e,
                    'vd_tel': t,
                    'vd_fax': y
                },
                success:function(){
                    vd_init();
                }
            });
        });

        $(document).on('click','#s_del',function(){
            var s = $(this).val();
            $.ajax({
                url: "Edit_select_back.php",
                method:"POST",
                data:{
                    'del': 1,
                    'id' : s
                },
                success:function(){
                    stat_init();
                }
            });
        });

        $(document).on('click','#t_del',function(){
            var s = $(this).val();
            $.ajax({
                url: "Edit_select_back.php",
                method: "POST",
                data:{
                    'del': 2,
                    'id': s
                },
                success:function(){
                    type_init();
                }
            });
        });

        $(document).on('click','#d_del',function(){
            var s = $(this).val();
            $.ajax({
                url: "Edit_select_back.php",
                method:"POST",
                data:{
                    'del' : 3,
                    'id' :s
                },
                success:function(){
                    dtype_init();
                }
            });
        });

        $(document).on('click','#gm_del',function(){
            var s = $(this).val();
            $.ajax({
                url: "Edit_select_back.php",
                method:"POST",
                data:{
                    'del' : 4,
                    'id' : s
                },
                success:function(){
                    gm_init();
                }
            });
        });

        $(document).on('click','#mt_del',function(){
            var s = $(this).val();
            $.ajax({
                url: "Edit_select_back.php",
                method: "POST",
                data:{
                    'del' : 5,
                    'id' : s
                },
                success:function(){
                    mt_init();
                }
            });
        });

        $(document).on('click','#rp_del',function(){
            var s = $(this).val();
            $.ajax({
                url: "Edit_select_back.php",
                method : "POST",
                data: {
                    'del' :6,
                    'id' : s
                },
                success:function(){
                    rp_init();
                }
            });
        });

        $(document).on('click','#rm_del',function(){
            var s = $(this).val();
            $.ajax({
                url: "Edit_select_back.php",
                method: "POST",
                data: {
                    'del' : 7,
                    'id' : s
                },
                success:function(){
                    rm_init();
                }
            });
        });

        $(document).on('click','#vd_del',function(){
            var s = $(this).val();
            $.ajax({
                url: "Edit_select_back.php",
                method: "POST",
                data: {
                    'del' : 8,
                    'id' : s
                },
                success:function(){
                    vd_init();
                }
            });
        });






   });