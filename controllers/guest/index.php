<?php
//complete code listing for controllers/guest/index.php
include_once 'models/book_repository.php';
include_once 'models/publisher_repository.php';
include_once 'models/book.php';
include_once 'models/publisher.php';

$hasAction = isset($_GET['action']);
if ($hasAction) {
    $action = $_GET['action'];
} else {
    $action = 'list_books';
}

//$content = include_once 'views/navigation_guest.php';
$content = include_once "controllers/guest/$action.php";
return $content;
