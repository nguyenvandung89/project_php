$(document).ready(function(){
  $('#category').change(function() {
    var category_id = $("#category").val();
    $.ajax({
      url: 'get_category',
      data: {category_id: category_id},
      type: 'POST',
      datatype: 'json',
      success: function(data){
        var option = "";
        $.each($.parseJSON(data),function(key, value){
          option += "<option value='"+value['id']+"'>"+value['title']+"</option>"
        })
        $("#sub_category").html(option);
      }
    });
  });
});
