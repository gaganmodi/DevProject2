$(document).ready(function(){
  $('.actionItem').change(function(){
    if($(this).val() != '') {
      var action = $(this).attr("id");
      var query = $(this).val();
      var result = '';
      if(action == "item_name") {
        result = 'productID';
      }
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{action:action, query:query},
        success:function(data){
          $('#'+result).html(data);
        }
      })
    }
  });
  $('.actionStaff').change(function(){
    if($(this).val() != '') {
      var action = $(this).attr("id");
      var query = $(this).val();
      var result = '';
      if(action == "staff_name") {
        result = 'staffID';
      }
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{action:action, query:query},
        success:function(data){
          $('#'+result).html(data);
        }
      })
    }
  });
});