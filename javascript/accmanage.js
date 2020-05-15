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
    $('#sort_table').html(data);
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

$(document).on('click', '.column_sort', function () {
  var column_name = $(this).attr("id");
  var order = $(this).data("order");
  var arrow = "";
  if(order == 'desc'){ arrow = "&nbsp;<span>&#8595;</span>"; }
  else{ arrow = "&nbsp;<span>&#8593;</span>"}
  $.ajax({
    url:"Accmanagebackend.php",
    method : "POST",
    data:{'sort' : 1 ,'column_name':column_name,'order' : order},
    success:function(data){
      $('#sort_table').html(data);
      $('#'+column_name+'').append(arrow);
    }
  })
});