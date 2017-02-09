<?php

class PublisherRepository {

    public static function getPublishers() {
        global $db;
        $query = 'SELECT * FROM publishers ORDER BY publisherID';
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $statement->closeCursor();
            $publishers = array();
            foreach ($result as $row) {
                $publisher = new Publisher($row['publisherID'], $row['publisherName']);
                $publishers[] = $publisher;
            }
            return $publishers;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            DBContext::displayDBError($error_message);
        }
    }

    public static function getPublisher($publisher_id) {
        global $db;
        $query = 'SELECT * FROM publishers WHERE publisherID = :publisher_id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':publisher_id', $publisher_id);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
            $publisher = new Publisher($row['publisherID'], $row['publisherName']);
            return $publisher;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            DBContext::displayDBError($error_message);
        }
    }
}
