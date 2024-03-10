$('#delete-node').submit(function(event){
    var formData ={
        node_list: $('#select_delete_node').val(),
        form_type: $('#delete_form').val(),
    };
    //подтверждение удаления
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
                document.getElementById('delete_node_message').innerHTML = '';
                document.getElementById("delete_node_message").innerHTML += "<div class='centered_text'>" + data["message"] + "</div>";
            },
            error: function(xhr, status, error){
                //отображение сообщения об ошибке
                console.error(xhr);
            }
        });
    }
    else
    {
        document.getElementById('delete_node_message').innerHTML = '';
        document.getElementById("delete_node_message").innerHTML += "<div class='centered_text'>Удаление отменено</div>";
    }
    event.preventDefault();
});

//очистка контейнера с сообщением результата запроса
function hideDeleteMessageDiv()
{
    document.getElementById('delete_node_message').innerHTML = '';
}