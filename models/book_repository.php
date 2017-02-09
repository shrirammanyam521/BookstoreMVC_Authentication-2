<?php

class BookRepository {

    public static function getBooks() {
        global $db;
        $query = 'SELECT * FROM books ORDER BY bookID';
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $statement->closeCursor();

            $books = array();
            foreach ($result as $row) {
                $publisher = new Publisher($row['publisherID'], $row['publisherName']);
                $book = new Book($row['isbn'], $row['bookTitle'], $row['bookPrice'], $publisher);
                $books[] = $book;
            }
            return $books;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            DBContext::displayDBError($error_message);
        }
    }

    public static function getBooksByPublisher($publisher_id) {
        global $db;
        $publisher = PublisherRepository::getPublisher($publisher_id);
        $query = 'SELECT * FROM books '
                . 'WHERE publisherID = :publisher_id '
                . 'ORDER BY isbn';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':publisher_id', $publisher_id);
            $statement->execute();
            $result = $statement->fetchAll();
            $statement->closeCursor();

            $books = array();
            foreach ($result as $row) {
                $book = new Book($row['isbn'], $row['bookTitle'], $row['bookPrice'], $publisher);
                $book->setID($row['bookID']);
                $books[] = $book;
            }
            return $books;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            DBContext::displayDBError($error_message);
        }
    }

    public static function getBook($book_id) {
        global $db;
        $query = 'SELECT * FROM books WHERE bookID = :book_id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':book_id', $book_id);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
            $publisher = PublisherRepository::getPublisher($row['publisherID']);
            $book = new Book($row['isbn'], $row['bookTitle'], $row['bookPrice'], $publisher);
            $book->setID($row['bookID']);
            return $book;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            DBContext::displayDBError($error_message);
        }
    }

    public static function deleteBook($book_id) {
        global $db;
        $query = 'DELETE FROM books WHERE bookID = :book_id';
        $db->exec($query);

        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':book_id', $book_id);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            DBContext::displayDBError($error_message);
        }
    }

    public static function addBook($book) {
        global $db;
        $query = 'INSERT INTO books
                (publisherID, isbn, bookTitle, bookPrice)
              VALUES
                (:publisher_id, :isbn, :title, :price)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':publisher_id', $publisher_id);
            $statement->bindValue(':isbn', $isbn);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':price', $price);
            $statement->execute();
            $statement->closeCursor();

            // Get the last product ID that was automatically generated
            $book_id = $db->lastInsertId();
            return $book_id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            DBContext::displayDBError($error_message);
        }
    }

}
?>

