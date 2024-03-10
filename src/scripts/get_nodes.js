//загрузка и отображение при загрузке страницы
document.onload = getTreeData();
//получает данные из бд и отображает
function getTreeData()
{
    $.ajax({
        url : "/app/Controller.php",
        type: "GET",
        dataType: "json",
        cache: false,
        success: function(data){
            //загрузка
            treeData = buildTree(data);
            //отображение
            displayCatalog(treeData);
            displaySelectNode(treeData,'add_node');
            displaySelectNode(treeData,'delete_node');
        },
        error: function(xhr, status, error){
            //отображение сообщения об ошибке
            alert("Проблема с подключением к базе данных");
            document.getElementById('catalog_node_list').innerHTML = '<li class="dropdown-menu"><span class="dropdown-item"Ошибка при отображении каталога</span></li>';
            document.getElementById("delete_button").disabled = true;
            document.getElementById("add_button").disabled = true;
        }
    });
}

//генерация данных в виде дерева
function buildTree(data, parentId = null) 
{
    const tree = [];
    for (const item of data) 
    {
        if (item.parent_id === parentId) 
        {
            const children = buildTree(data, item.id);
            if (children.length) 
            {
                item.children = children;
            }
            tree.push(item);
        }
    }
    return tree;
}