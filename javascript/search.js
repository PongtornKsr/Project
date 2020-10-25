$('document').ready(function(){

    hidshow();
    function hidshow(){
        $('#newsearch').hide();
        $('#result_table').hide();
    }
    $('#search_button').on('click',function(){
        var rm = $('#rm').val();
        var searchtxt = $('#searchtxt').val();
        $.ajax({
                url: 'search_backend.php',
                type: 'post',
                data: {
                    'search': 1,
                    'rm' : rm,
                    'searchtxt' : searchtxt
                },
                success: function(response) {
                    $('#result_table').html(response);
                    $('#result_table').show();
                    $('#sbox').hide();
                    $('#newsearch').show();
                }
        });
    });

    $('#newsearch').on('click',function(){
        $.ajax({
            url: 'search_backend.php',
            type: 'post',
            data: {
                'new': 1,
            },
            success: function(response) {
                $('#sbox').show();
                $('#newsearch').hide();
                $('#result_table').hide();
            }
        });
    });
    
   

 $('#gm').multiselect({
  nonSelectedText: 'เลือกวิธีการได้รับ',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true
 
 });
 $('#rm').multiselect({
  nonSelectedText: 'เลือกห้องที่จัดเก็บ',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true
 
 });
 $('#tp').multiselect({
  nonSelectedText: 'เลือกประเภทครุภัณฑ์',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true
 
 });
 $('#stt').multiselect({
  nonSelectedText: 'เลือกสถานะการใช้งาน',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true
 
 });
 $('#dstt').multiselect({
  nonSelectedText: 'เลือกสถานะการติดตั้ง',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true
 
 });
 $('#rp').multiselect({
  nonSelectedText: 'เลือกผู้รับผิดชอบ',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true
 
 });


 

});