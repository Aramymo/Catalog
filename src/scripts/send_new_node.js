$('#create-node').submit(function(event){
    event.preventDefault();
    console.log("Triggered");
    var formData ={
        node_name: $('#node_name').val().trim(),
        node_list: $('#select_add_node').val(),
        form_type: $('#form_type').val(),
    };
    if(formData["node_name"].length === 0)
    {
        document.getElementById('node_message').innerHTML = '';
        document.getElementById("node_message").innerHTML += "<div class='review_send_status_error centered_text'>Введите имя</div>";
    }
    else
    {
        $.ajax({
            url : "http://localhost:8888/app/Controller.php",
            type: "POST",
            dataType: "json",
            data: formData,
            encode: true,
            success: function(data){
                //отображение сообщения об успехе
                //console.log(data);
                document.getElementById('node_message').innerHTML = '';
                document.getElementById("node_message").innerHTML += "<div class='review_send_status_success centered_text'>Успех " + data["name"] + "</div>";
            },
            error: function(xhr, status, error){
                //отображение сообщения об ошибке
                console.error(xhr);
                document.getElementById('node_message').innerHTML = '';
                document.getElementById("node_message").innerHTML += "<div class='review_send_status_error centered_text'>Отказ</div>";
            }
        });
    }
});