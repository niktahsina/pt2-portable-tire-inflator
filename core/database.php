<?php

class Database {
    private $connection;

    public function __construct() {
        try {
            // For local Laragon/XAMPP MySQL, host is typically localhost or 127.0.0.1
            // Update dbname, username, and password to match your database setup
            $this->connection = new PDO(
                "mysql:host=localhost;dbname=<A228221>;charset=utf8mb4",
                "<a228221>",
                "<bigblackfox>"
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Database connection failed: " . $e->getMessage();
            exit;
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}