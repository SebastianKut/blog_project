<?php

class Admin {
    private $db;
    private $username;

    public function __construct($pUsername) {
        $this->username = $pUsername;
        $this->db = new Database();
    }

    public function isValidLogin($pPassword) {
        $sql = "SELECT password FROM members WHERE username = :username AND is_admin = true";

        $values = [
            [':username', $this->username]
        ];

        $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);

        if (isset($result['password']) && password_verify($pPassword, $result['password'])) 
            return true;
        else
            return false;
    }

    public function insertIntoPostDB($title, $post, $audience) {
        $sql = "INSERT INTO posts (username, title, post, audience) VALUES (:username, :title, :post, :audience)";

        $values = [
            [':username', $this->username],
            [':title', $title],
            [':post', $post],
            [':audience', $audience]
        ];

        $this->db->queryDB($sql, Database::EXECUTE, $values);
    }

}