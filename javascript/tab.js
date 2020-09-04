$(document).ready(function(){
  $('#stat').css('display','block');
  $('#tabstat').attr('class','tablinks active');

  function tabset(){
    $('.tabcontent').css('display','none');
    $('.tablinks').attr('class', 'tablinks');
    
  }
  $(document).on('click','#tabstat',function(){
    tabset();
    $('#stat').css('display','block');
    $('#tabstat').attr('class','tablinks active');
  });
  $(document).on('click','#tabtype',function(){
    tabset();
    $('#type').css('display','block');
    $('#tabtype').attr('class','tablinks active');
  });
  $(document).on('click','#tabdtype',function(){
    tabset();
    $('#dtype').css('display','block');
    $('#tabdtype').attr('class','tablinks active');
  });
  $(document).on('click','#tabgm',function(){
    tabset();
    $('#gm').css('display','block');
    $('#tabgm').attr('class','tablinks active');
  });
  $(document).on('click','#tabmt',function(){
    tabset();
    $('#mt').css('display','block');
    $('#tabmt').attr('class','tablinks active');
  });
  $(document).on('click','#tabrp',function(){
    tabset();
    $('#rp').css('display','block');
    $('#tabrp').attr('class','tablinks active');
  });
  $(document).on('click','#tabrm',function(){
    tabset();
    $('#rm').css('display','block');
    $('#tabrm').attr('class','tablinks active');
  });
  $(document).on('click','#tabvd',function(){
    tabset();
    $('#vd').css('display','block');
    $('#tabvd').attr('class','tablinks active');
  });
});