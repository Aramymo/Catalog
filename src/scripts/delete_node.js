$('#delete-node').submit(function(event){
    var formData ={
        node_list: $('#select_delete_node').val(),
        form_type: $('#delete_form').val(),
    };
    $.ajax({
        url : "http://localhost:8888/app/Controller.php",
        type: "POST",
        dataType: "json",
        data: formData,
        encode: true,
        success: function(data){
            //отображение сообщения об успехе
            getTreeData();
            document.getElementById('delete_node_message').innerHTML = '';
            document.getElementById("delete_node_message").innerHTML += "<div class='centered_text'>" + data["message"] + "</div>";
        },
        error: function(xhr, status, error){
            //отображение сообщения об ошибке
            console.error(xhr);
        }
    });
    event.preventDefault();
});

function hideDeleteMessageDiv()
{
    document.getElementById('delete_node_message').innerHTML = '';
}