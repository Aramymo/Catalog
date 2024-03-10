<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Каталог дерево</title>
      <!--bootstrap для css!-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
      <!--остальные стили!-->
      <link href="/src/css/nested_dropdown.css" rel="stylesheet" type="text/css">
    </head>
    <body>
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
              <a class="navbar-brand" href="#">Дерево категорий</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                            Каталог
                        </a>
                        <ul class="dropdown-menu" id="catalog_node_list" aria-labelledby="navbarDropdownMenuLink"></ul>
                      </li>
                  </ul>
              </div>
          </div>
        </nav>

        <button id="add-btn" type="button" onclick="hideAddMessageDiv()" class="btn btn-primary mt2" data-bs-toggle="modal" data-bs-target="#add-window">
          Добавить
        </button>

        <!-- Modal -->
        <div class="modal fade" id="add-window" tabindex="-1" aria-labelledby="addWindowModalLabel" aria-hidden="true">
          <form method ="POST" id="create-node">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addWindowModalLabel">Добавить узел</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="hidden" id="form_type" value="add_node">
                  <label for="node_name" class="form-label">Название узла</label>
                  <input type="text" class="form-control" name="node_name" id="node_name"><br>
                  <div id="add_node_message"></div> 
                  <label for="add_node" class="form-label">Выберите место добавления узла</label>
                  <div id="add_node"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                  <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
              </div>
            </div>
          </form>
        </div>

        <button type="button" class="btn btn-danger mt2" onclick="hideDeleteMessageDiv()" data-bs-toggle="modal" data-bs-target="#delete-window">
          Удалить
        </button>

        <!-- Modal -->
        <div class="modal fade" id="delete-window" tabindex="-1" aria-labelledby="deleteWindowModalLabel" aria-hidden="true">
          <form method ="POST" id="delete-node">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteWindowModalLabel">Удалить узел</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="hidden" id="delete_form" value="delete_node">
                  <label for="delete_node" class="form-label">Выберите узел для удаления</label>
                  <div id="delete_node"></div>
                  <div id="delete_node_message"></div> 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                  <button type="submit" class="btn btn-primary">Удалить</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--подключение jquery!-->
      <script src="/src/scripts/jquery-3.7.1.js" type="text/javascript"></script>
      <!--bootstrap для js!-->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
      <!--остальные скрипты!-->
      <script src="/src/scripts/get_nodes.js" type="text/javascript"></script>
      <script src="/src/scripts/display_catalog_nodes.js" type="text/javascript"></script>
      <script src="/src/scripts/display_select_nodes.js" type="text/javascript"></script>
      <script src="/src/scripts/send_new_node.js" type="text/javascript"></script>
      <script src="/src/scripts/delete_node.js" type="text/javascript"></script>
      <script src="/src/scripts/nested_node_display.js" type="text/javascript"></script>
    </body>
</html>