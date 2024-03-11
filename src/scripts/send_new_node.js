$('#create-node').submit(function(event){
    var formData = {
        node_name: $('#node_name').val().trim(),
        node_list: $('#select_add_node').val(),
        form_type: $('#form_type').val(),
    };

    if(formData["node_name"].length === 0)
    {
        //если имя пустое вывод сообщения
        showMessageInAdd('Введите имя');
    }
    else
    {
        $.ajax({
            url : "/app/Controller.php",
            type: "POST",
            dataType: "json",
            data: formData,
            encode: true,
            success: function(data){
                //обновление деревьев сразу после запроса
                getTreeData();
                //отображение результата запроса
                showMessageInAdd(data["message"]);
            },
            error: function(xhr, status, error){
                //отображение сообщения об ошибке
                showMessageInAdd('Что-то пошло не так');
            }
        });
    }

    event.preventDefault();
});

//очистка контейнера с сообщением результата запроса
function hideAddMessageDiv()
{
    document.getElementById('add_node_message').innerHTML = '';
    document.getElementById('node_name').value = '';
}

function showMessageInAdd(message)
{
    document.getElementById('add_node_message').innerHTML = '';
    document.getElementById("add_node_message").innerHTML += "<div class='centered_text'>"+ message +"</div>";
}