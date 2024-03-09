$('#delete-node').submit(function(event){
    var formData ={
        node_list: $('#select_delete_node').val(),
        form_type: $('#delete_form').val(),
    };
    console.log(formData);
    $.ajax({
        url : "http://localhost:8888/app/Controller.php",
        type: "POST",
        dataType: "json",
        data: formData,
        encode: true,
        success: function(data){
            //отображение сообщения об успехе
            console.log(data);
        },
        error: function(xhr, status, error){
            //отображение сообщения об ошибке
            console.error(xhr);
            console.error(status);
            console.error(error);
            document.getElementById('node_message').innerHTML = '';
            document.getElementById("node_message").innerHTML += "<div class='review_send_status_error centered_text'>Отказ</div>";
        }
    });
    event.preventDefault();
});