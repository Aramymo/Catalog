function displaySelectNode(treeData, fieldName)
{
    selectFieldName = "select_" + fieldName;
    document.getElementById(fieldName).innerHTML = '';
    document.getElementById(fieldName).innerHTML += '<select name="'+ selectFieldName +'" id="'+ selectFieldName +'"></select>';
    if(fieldName === "add_node")
    {
        document.getElementById(selectFieldName).innerHTML += '<option value="null">Добавить корневой узел</option>';
    }
    generateSelect(treeData,selectFieldName);
}

function generateSelect(items, selectName, level = 0) {
    //console.log(items[item]["id"]);
    items.forEach(item => {
        //console.log(item);
        // if(item[item["parent_id"]])
        // aboba = '&nbsp;'.repeat(level);
        //console.log(indentation);
        document.getElementById(selectName).innerHTML += "<option value=" + item["id"] +">" + '&emsp;'.repeat(level) + item["name"] + "</option>"; // Добавляем пробелы (4 пробела за уровень)
        if (item.children && item.children.length > 0) {
            generateSelect(item.children, selectName, level + 1); // Рекурсивно обрабатываем вложенные элементы
        }
    });
}