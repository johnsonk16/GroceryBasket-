//getting value from 'ajax.php'
function fill (value){
  //assigning value to "search" 
  $('#search').val(Value);
  //hiding display
  $('#display').hide();
}

$(document).ready(function(){
  $("#search").keyup(function(){
    var name = $('#search').val();

    if(name ==""){
      $("#display").html("");
    }
    else {
      $.ajax({
        type:"POST",

        url: "ajax.php",

        data: {
          search: name
        },
        success: function(html){
          $("#display").html.show();
        }
      });
    }
  });
});