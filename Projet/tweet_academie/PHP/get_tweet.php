<?php
session_start();
require 'database.php';
$req = $db->prepare('SELECT DATE_FORMAT(date, "%M %d") AS dateT, fullname, username, content FROM tweet INNER JOIN user ON tweet.user_id = user.id WHERE user_id = "' . $_SESSION['user_id'] . '" ORDER BY date DESC;');
$req->execute();
$res = $req->fetchAll(5);
echo '<ul>';
foreach ($res as $tweet) {
    echo '<li><u>' . substr($tweet->dateT, 0, 3) . strstr($tweet->dateT, ' ') . '</u><br><strong>' . $tweet->fullname . '</strong> ' . $tweet->username . '<br>' . $tweet->content . '</li><br>';
}
echo '</ul>';