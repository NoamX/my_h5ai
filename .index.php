<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/FirstY/PHP/my_h5ai/.css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://localhost/FirstY/PHP/my_h5ai/.js/search.js"></script>
    <script src="http://localhost/FirstY/PHP/my_h5ai/.js/order.js"></script>
    <script src="http://localhost/FirstY/PHP/my_h5ai/.js/nav.js"></script>
    <link rel="icon" href="http://localhost/FirstY/PHP/my_h5ai/.assets/icon.png">
    <title>my_h5ai</title>
</head>

<body>
    <span class="d-block p-2 bg-dark text-white">
        <h2><a href="http://localhost/FirstY/PHP/my_h5ai/"><span class="badge badge-secondary">my_h5ai</span></h2></a>
    </span>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php
            include './.php/breadcrumb.php';
            ?>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <form class="form-search">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <img src="http://localhost/FirstY/PHP/my_h5ai/.assets/search.png" width="23px">
                                </div>
                            </div>
                            <input type="search" id="search" placeholder="SEARCH" class="form-control">
                        </div>
                    </div>
                </form>
                <div class="tree">
                    <ul class="list-group" style="background: white;">
                        <li class="list-group-item"><a href="http://localhost/FirstY/PHP/my_h5ai/"><img src="http://localhost/FirstY/PHP/my_h5ai/.assets/home.png" width="25px"> my_h5ai</a>
                        </li>
                        <?php
                        include './.php/get_tree.php';
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="folder">
                    <ul class="list-group">
                        <li class="list-group-item" id="order">
                            <button class="btn btn-secondary" id="back">Précédent</button>
                            <button class="btn btn-secondary" id="forward">suivant</button>
                        </li>
                        <li class="list-group-item" id="order">
                            <div class="row">
                                <div class="col-4">
                                    <button type="button" class="btn btn-light" id="nom">Nom ⮟</button>
                                </div>
                                <div class="col-4" align="right">
                                    <button type="button" class="btn btn-light" id="taille">Taille</button>
                                </div>
                                <div class="col-4" align="right">
                                    <button type="button" class="btn btn-light" id="modif">Dernière modification</button>
                                </div>
                            </div>
                        </li>
                        <div class="order">
                            <?php
                            include './.php/my_scandir.php';
                            ?>
                        </div>
                    </ul>
                    <br>
                    <ul class="list-group">
                        <?php
                        $server = $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REDIRECT_URL'];
                        function get_file($file)
                        {
                            if (is_file($file) && strstr(mime_content_type($file), '/', true) != 'image' && strstr(mime_content_type($file), '/', true) != 'videos') {
                                echo "<li class='list-group-item'>" . basename($file) . "</li>";
                                foreach (file($file) as $line => $value) {
                                    echo "<li class='list-group-item'>$line - " . htmlspecialchars($value) . "</li>";
                                }
                            }
                        }

                        get_file($server);
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>