//отображает нужную структуру в каталоге страницы
function displayCatalog(items)
{
    document.getElementById('catalog_node_list').innerHTML = ' ';
    generateCatalog(items);
}

//генерирует структуру 
//li
//--span
//--ul
//----li
//------span
//------ul...
function generateCatalog(items, level = 0) {
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
            generateCatalog(item.children, level + 1); // Рекурсивно обрабатываем вложенные элементы
        }
    });
}
