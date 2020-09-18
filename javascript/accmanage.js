$('#document').ready(function(){

load_acc_search();

function alertdel(){
  alert('ADMIN is Unblockable please Change Role Before Blocking');
               // window.location.href='Accountmanage.php';
              }
                
                
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

 $(document).on('click','#del_b',function(){
  Swal.fire({
    title: 'ลบผู้ใช้งานนี้หรือไม่?',
    text: "ยืนยันที่จะลบผู้ใช้งานนี้",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'ยืนยัน',
    cancelButtonText: 'ยกเลิก'
  }).then((result) => {
    if (result.isConfirmed) {
      var IDx = $(this).val();
      var func = $(this).data("func");
      $.ajax({
        url : "usermanage.php?ID="+IDx+"&function="+func,
        method : "GET",
        success:function(dataxx){
          if(dataxx=="PASS"){
           
            Swal.fire(
              'Deleted!',
              'ทำการลบผู้ใช้งานเรียบร้อย',
              'success',
            );
            setTimeout(function() {
              window.location.href = "AccountManage.php";
            }, 2000);
           
          }
          else{
           
            Swal.fire({
              icon: 'error',
              title: 'มีบางอย่างผิดพลาด',
              text: 'ไม่สามารถลบผู้ใช้งานที่เป็นAdminได้'
             
            })
          }
        }
       
      })

      }
      
    
  })
 
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