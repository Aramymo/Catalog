document.onload = generateCatalog();
function generateCatalog()
{
    $.ajax({
        url : "http://localhost:8888/app/Controller.php",
        type: "GET",
        dataType: "json",
        cache: false,
        success: function(data){
            //отображение сообщения об успехе
            console.log(data);
            treeData = buildTree(data);
            console.log(treeData);
            displayCatalog(treeData);
        },
        error: function(xhr, status, error){
            //отображение сообщения об ошибке
            console.error(xhr);
        }
    });
}
function displayCatalog(items, level = 0) {
    items.forEach(item => {
        if(level == 0)
        {
            ul_name = 'catalog_node_list';
        }
        else
        {
            prev_level = level-1;
            ul_name = 'catalog_node_list' + item["parent_id"] + prev_level;
        }
        li_name = 'catalog_element' + item["id"] + level;
        document.getElementById(ul_name).innerHTML += '<li class="dropdown-submenu" id="'+ li_name +'"> <span class="dropdown-item">' + item["name"] + '</span></li>';
        if (item.children && item.children.length > 0) {
            parent_id = item["id"];
            document.getElementById(li_name).innerHTML += '<ul class="dropdown-menu" id ="catalog_node_list'+ parent_id + level +'"></ul>';
            displayCatalog(item.children, level + 1); // Рекурсивно обрабатываем вложенные элементы
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