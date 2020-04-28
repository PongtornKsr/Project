$('#document').ready(function(){

load_acc_search();

function load_acc_search(query)
 {
  $.ajax({
   url:"Accmanagebackend.php",
   method:"POST",
   data:{ 'nmsearch' : 1,'query':query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 
 $('#search_text').keyup(function(){
    var search = $('#search_text').val();
  if(search != '')
  {
   load_acc_search(search);
  }
  else
  {
   load_acc_search();
  }

 });


});