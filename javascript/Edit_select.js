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
   });