<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function add_user($email, $password, $is_admin) {
    global $db;
    $query = 'INSERT INTO users (emailAddress, password, isAdmin)
              VALUES (:email, :password, :is_admin)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':is_admin', $is_admin);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        DBContext::displayDBError($error_message);
    }
}

function is_valid_admin_login($email, $password) {
    global $db;
    $query = 'SELECT userID FROM users
              WHERE emailAddress = :email AND password = :password AND isAdmin = 1';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $valid = ($statement->rowCount() >= 1);
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        DBContext::displayDBError($error_message);
    }
    return $valid;
}
