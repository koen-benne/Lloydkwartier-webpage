<?php


namespace System\Databases;


class Database
{
    private $host, $username, $password, $dbname;
    /**
     * @var \PDO
     */
    private $connection;


    /**
     * Databases constructor.
     * @param $host
     * @param $username
     * @param $password
     * @param $dbname
     * @throws \Exception
     */
    public function __construct($host, $username, $password, $dbname)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->connect();
    }

    /**
     * @throws \Exception
     */
    private function connect(): void
    {
        try {
            $this->connection = new \PDO("mysql:dbname=$this->dbname;host=$this->host",
                $this->username, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \Exception("DB connection failed: {$e->getMessage()}");
        }
    }
    /**
     * @return \PDO
     */
    public function getConnection(): \PDO
    {
        return $this->connection;
    }

    public function closeConnection(): void
    {
        $this->connection = null;
    }

}