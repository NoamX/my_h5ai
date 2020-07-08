<?php
// -------  Initialisation de $_SESSION
session_start();
include 'database.php';
// var_dump($_SESSION);
// var_dump($_POST['tweet']);

// -------  stock de l'ID && CONTENT
$id = $_SESSION['user_id'];
$content = htmlspecialchars($_POST['tweet']);

//-------  REQUETTE CREATION DU TWEET
$query = $db->prepare('INSERT into tweet(user_id,content) VALUES(:user_id,:content)');
$query->execute(array(
    'user_id' => $id,
    'content' => $content
));

$tab = explode(' ', $content);
$tab1 = [];
foreach ($tab as $value) {
    if ($value == strpos($value, '#')) {
        array_push($tab1, $value);
    }
}

// -------  REQUETTE RECUPERER ID DU TWEET
$query = $db->prepare('SELECT id from tweet where content=:content and user_id=:user_id');
$ress = $query->execute(array(
    'content' => $content,
    'user_id' => $id
));
$res = $query->fetch(PDO::FETCH_OBJ);

$tab2 = implode(' ', $tab1);

if (!empty($tab2)) {
// -------  REQUETTE CREATION DES TAGS EN FONCTION DU TWEET
    $query = $db->prepare('INSERT into tag(tweet_id,tagName) values(:tweet_id,:tagName)');
    $query->execute(array(
        'tweet_id' => $res->id,
        'tagName' => $tab2
    ));
}

