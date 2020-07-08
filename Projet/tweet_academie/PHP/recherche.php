<?php
include 'database.php';

$tagName = htmlspecialchars($_POST['tag']);

$content = explode(' ', $tagName);
foreach ($content as $value) {
    $test = 'SELECT DISTINCT username, tagName from user left join tweet on user.id=tweet.user_id left join tag on tweet.id=tag.tweet_id where username like "' . $value . '%" or tagName like "' . $value . '%" ';
    $query = $db->prepare($test);
    $query->execute();
}
$res = $query->fetchAll(PDO::FETCH_OBJ);

if ($res != null) {
    echo "<ul>";
    foreach ($res as $value) {
        echo "<li><a href=''>$value->username</a><br><a href='#'>$value->tagName</a></li>";
    }
    echo "</ul>";
} else {
    echo 'Search for : ';
}
