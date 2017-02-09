<?php

$addBookSubmitted = isset($_POST['addbook_submitted']);
if ($addBookSubmitted) {
    $publisher_id = $_POST['publisher_id'];;
    $isbn = $_POST['isbn'];
    $title = $_POST['book_title'];
    $price = $_POST['book_price'];

    // Validate the inputs
    if (empty($isbn) || empty($title) || empty($price)) {
        $error = "Invalid book data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        $publisher = PublisherRepository::getPublisher($publisher_id);
        $book = new Book($isbn, $title, $price, $publisher);
        BookRepository::addBook($book);

        // Display the Book List page for the current publisher
        header("Location: .?controller=admin&publisher_id=$publisher_id");
    }
}
else
{
    $publishers = PublisherRepository::getPublishers();
    return 'views/add_book_view.php';
}
