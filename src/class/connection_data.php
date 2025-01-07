<?php
class connection_db
{
    private $host = 'localhost';
    private $dbName = 'DriveLoc';
    private $userName = 'root';
    private $pw = '1234';

    protected $conx;

    public function connect()
    {
        try {
            $this->conx = new PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->userName, $this->pw);
            $this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            return $this->conx;
        } catch (PDOException $e) {
            error_log("Connection error: " . $e->getMessage());
            return null;  
        }
    }
}






