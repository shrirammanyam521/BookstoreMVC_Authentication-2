<?php

$publisher_id = 1;
if (isset($_GET['publisher_id'])) {
    $publisher_id = $_GET['publisher_id'];
}
$publishers = PublisherRepository::getPublishers();
$publisher = PublisherRepository::getPublisher($publisher_id);
$books = BookRepository::getBooksByPublisher($publisher_id);
return 'views/book_list_view.php';

