<?php

include "database.php";
$query = $db->prepare('CALL tag');
$query->execute();
$trends = $query->fetchAll(PDO::FETCH_OBJ);
echo "<ul>";
foreach ($trends as $trend) {
    echo "<li><a href='#'>$trend->tagName</a><br>$trend->nb tweet(s)</li><br>";
}
echo "<ul>";
