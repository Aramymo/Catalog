$('#create-node').submit(function(event){
    var formData ={
        node_name: $('#node_name').val().trim(),
        node_list: $('#select_add_node').val(),
        form_type: $('#form_type').val(),
    };
    console.log(formData["form_type"]);
    if(formData["node_name"].length === 0)
    {
        document.getElementById('add_node_message').innerHTML = '';
        document.getElementById("add_node_message").innerHTML += "<div class='centered_text'>Введите имя</div>";
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
                getTreeData();
                document.getElementById('add_node_message').innerHTML = '';
                document.getElementById("add_node_message").innerHTML += "<div class='centered_text'>" + data["message"] + "</div>";
            },
            error: function(xhr, status, error){
                //отображение сообщения об ошибке
                console.error(xhr);
            }
        });
    }
    event.preventDefault();
});

function hideAddMessageDiv()
{
    document.getElementById('add_node_message').innerHTML = '';
}