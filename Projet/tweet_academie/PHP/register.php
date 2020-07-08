<?php
require 'database.php';
if (isset($_POST['fullname'], $_POST['email'], $_POST['password'])) {
    $fullname = htmlspecialchars($_POST['fullname']);
    $username = '@' . htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $pass_hash = password_hash($password, PASSWORD_BCRYPT);

    $reqCheck = $db->prepare('SELECT * FROM user WHERE email = "' . $email . '" OR username = "' . $username . '"');
    $reqCheck->execute(array());
    $res = $reqCheck->fetch(5);

    $req = $db->prepare('INSERT INTO user(fullname, username, email, pwd) VALUES(:fullname, :username, :email, :password)');

    if ($res->email != $email || $res == null) {
        if ($res->username != $username) {
            $req->execute(array(
                'fullname' => $fullname,
                'username' => $username,
                'email' => $email,
                'password' => $pass_hash
            ));
            session_start();
            $_SESSION['user_id'] = $res->id;
            $_SESSION['fullname'] = $fullname;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
        } else {
            echo 'FailUser';
        }
    } else {
        echo 'Failed';
    }
}
