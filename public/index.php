<!DOCTYPE html>
<html>
    <head>
        <script> <?php include __DIR__ .'/../src/scripts/jquery-3.7.1.js'?></script>
        <!--bootstrap для css!-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <!--bootstrap для js!-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    
        <script>
            // Обработчик клика на вложенный элемент
            document.querySelectorAll('.dropdown-submenu .dropdown-toggle').forEach(item => {
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    this.parentElement.querySelector('.dropdown-menu').classList.toggle('show');
                });
            });
        </script>

    </head>
    <style>
        .dropdown-submenu .dropdown-menu {
            padding: 8px;
            left: 100%;
            top: 0;
        }
        .dropdown-submenu {
            position: relative;
        }
        .dropdown-submenu:hover > .dropdown-menu {
            display: block;
        }
    </style>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        Dropdown
                    </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li class="dropdown-submenu">
                                <span class="dropdown-item dropdown-toggle">Акксесуары</span>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <span class="dropdown-item">бебрик</span>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <span class="dropdown-item">бебрик</span>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <span class="dropdown-item">бебрик</span>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <span class="dropdown-item dropdown-toggle">Акксесуары</span>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <span class="dropdown-item">бебрик</span>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <span class="dropdown-item">бебрик</span>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <span class="dropdown-item">бебрик</span>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <span class="dropdown-item dropdown-toggle">Акксесуары</span>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <span class="dropdown-item">бебрик</span>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <span class="dropdown-item">бебрик</span>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <span class="dropdown-item">бебрик</span>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                            <li>
                                                <span class="dropdown-item">aboabab</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        <!--action="../app/Controller.php"!-->
        <form method ="POST" id="create-node">
            Node name: <input type="text" name="node_name" id="node_name"><br>
            <input type="submit">
        </form>
        <div id="node_message"></div>
        <div id="select_node"></div>



        <script> <?php include __DIR__ . '/../src/scripts/send_new_node.js'?></script>
        <script> <?php include __DIR__ . '/../src/scripts/get_nodes.js'?></script>
    </body>
</html>