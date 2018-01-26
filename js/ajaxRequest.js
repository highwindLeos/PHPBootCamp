$('.like-btn').click( function() {
    $.ajax({
        url:'http://localhost/likeProcess.php',
        dataType:'json',
        type:'POST',
        data:{
            like:$('result').val()},
            success:function(result){
            if(result['result'] == true){
              $('#result').html(result['msg']);
            }
        }
    });
})