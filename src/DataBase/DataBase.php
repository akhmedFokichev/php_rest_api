<?php

class Database
{
    // укажите свои учетные данные базы данных
    private Config $config;
    
    private $host = $config->host;
    private $db_name = $config->host;
    private $username = $config->username;
    private $password = $config->password;
    
    public $conn;

    public function __construct(Config $config) {
        $this->config = $config;
    }

    // получаем соединение с БД
    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Ошибка подключения: " . $exception->getMessage();
        }

        return $this->conn;
    }
}