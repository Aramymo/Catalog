document.onload = getTreeData();
var treeData = [];
function getTreeData()
{
    $.ajax({
        url : "http://localhost:8888/app/Controller.php",
        type: "GET",
        dataType: "json",
        cache: false,
        success: function(data){
            treeData = buildTree(data);
            displayCatalog(treeData);
            displaySelectNode(treeData,'add_node');
            displaySelectNode(treeData,'delete_node');
        },
        error: function(xhr, status, error){
            //отображение сообщения об ошибке
            console.error(xhr);
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