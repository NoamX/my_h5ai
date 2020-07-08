<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=tweet_academie', 'root', '');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}