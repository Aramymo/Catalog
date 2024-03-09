document.onload = showUser();
function showUser()
{
    $.ajax({
        url : "http://localhost:8888/app/Controller.php",
        type: "GET",
        dataType: "json",
        cache: false,
        success: function(data){
            //отображение сообщения об успехе
            console.log(data);
            document.getElementById('select_node').innerHTML = '';
            document.getElementById("select_node").innerHTML += '<select name="node_list" id="node_list">' +
                                                                    '<option value="0">Добавить корневой узел</option>' +
                                                                '</select>';
            treeData = buildTree(data);
            console.log(treeData);
            displaySelectNode(treeData);
        },
        error: function(xhr, status, error){
            //отображение сообщения об ошибке
            console.error(xhr);
        }
    });
}

function displaySelectNode(items, level = 0) {
    //console.log(items[item]["id"]);
    items.forEach(item => {
        //console.log(item);
        if(item[item["parent_id"]])
        aboba = '&nbsp;'.repeat(level);
        //console.log(indentation);
        document.getElementById('node_list').innerHTML += "<option value=" + item["id"] +">" + '&emsp;'.repeat(level) + item["name"] + "</option>"; // Добавляем пробелы (4 пробела за уровень)
        if (item.children && item.children.length > 0) {
            displaySelectNode(item.children, level + 1); // Рекурсивно обрабатываем вложенные элементы
        }
    });
}

function buildTree(data, parentId = null) {
    const tree = [];
    for (const item of data) {
        if (item.parent_id === parentId) {
            const children = buildTree(data, item.id);
            if (children.length) {
                item.children = children;
            }
            tree.push(item);
        }
    }
    return tree;
}