<?php
if (isset($_POST['search'])) {
    $search = htmlspecialchars($_POST['search']);
    $db = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');
    $req = $db->prepare('SELECT titre FROM film WHERE titre LIKE "' . $search . '%" LIMIT 10');
    $req->execute(array());
    $res = $req->fetchAll(5);
    if ($res != null) {
        echo '<ul>';
        foreach ($res as $film) {
            if ($film->titre != null) {
                echo '<li>' . $film->titre . '</li>';
            }
        }
        echo '</ul>';
    } else {
        echo 'No resuslts';
    }
}