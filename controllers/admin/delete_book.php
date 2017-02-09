<?php

// Get the IDs
$book_id = $_POST['book_id'];
$publisher_id = $_POST['publisher_id'];

// Delete the book
BookRepository::deleteBook($book_id);

// Display the Book List page for the current publisher
header("Location: .?controller=admin&publisher_id=$publisher_id");

