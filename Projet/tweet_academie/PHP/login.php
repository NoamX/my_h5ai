<?php
include 'database.php';
if (isset($_POST['log_user'], $_POST['password'])) {
    $log_user = htmlspecialchars($_POST['log_user']);
    $password = htmlspecialchars($_POST['password']);

    $req = $db->prepare('SELECT * FROM user WHERE email = :log_user');
    $req->execute(array(
        'log_user' => $log_user
    ));
    $res = $req->fetch(PDO::FETCH_OBJ);


    if ($res == null) {
        echo 'Nothing';
    } else {
        $check = password_verify($password, $res->pwd);
        if ($check) {
            session_start();
            $_SESSION['user_id'] = $res->id;
            $_SESSION['fullname'] = $res->fullname;
            $_SESSION['username'] = $res->username;
            $_SESSION['email'] = $res->email;
        } else {
            echo 'Failed';
        }
    }
}