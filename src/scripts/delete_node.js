$('#delete-node').submit(function(event){
    var formData ={
        node_list: $('#select_delete_node').val(),
        form_type: $('#delete_form').val(),
    };
    if(formData.node_list === null)
    {
        showMessageInDelete('Невозможно удалить этот узел');
    }
    else
    {
        if(confirm("Удалить элемент и все его подкатегории?"))
        {
            $.ajax({
                url : "/app/Controller.php",
                type: "POST",
                dataType: "json",
                data: formData,
                encode: true,
                success: function(data){
                    //обновление данных
                    getTreeData();
                    showMessageInDelete(data["message"]);
                },
                error: function(xhr, status, error){
                    //отображение сообщения об ошибке
                    showMessageInDelete('Что-то пошло не так');
                }
            });
        }
        else
        {
            showMessageInDelete('Удаление отменено');
        }
    }
    //подтверждение удаления
    event.preventDefault();
});

//очистка контейнера с сообщением результата запроса
function hideDeleteMessageDiv()
{
    document.getElementById('delete_node_message').innerHTML = '';
}

function showMessageInDelete(message)
{
    document.getElementById('delete_node_message').innerHTML = '';
    document.getElementById("delete_node_message").innerHTML += "<div class='centered_text'>"+ message +"</div>";
}