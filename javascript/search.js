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
});