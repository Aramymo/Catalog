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
            console.log(data);
            treeData = buildTree(data);
            if(!data.length)
            {
                displayCatalogError('Нет предметов в каталоге');
            }
            else
            {
                displayCatalog(treeData);
                displaySelectNode(treeData,'delete_node');
            }
            //отображение
            displaySelectNode(treeData,'add_node');
        },
        error: function(xhr, status, error){
            //отображение сообщения об ошибке
            alert("Проблема с подключением к базе данных");
            displayCatalogError("Ошибка при отображении каталога");
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

function displayCatalogError(message)
{
    document.getElementById('catalog_node_list').innerHTML = ' ';
    document.getElementById('catalog_node_list').innerHTML = '<li class="dropdown-submenu"> <span class="dropdown-item">' + message + '</span></li>';
}