<?php

$book_id = 1;
if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
}
$publishers = PublisherRepository::getPublishers();
$book_id = $_GET['book_id'];
$book = BookRepository::getBook($book_id);
return 'views/book_view.php';