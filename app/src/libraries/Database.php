<?php
/**
 * The application's database class
 * 
 * @package atomar
 * @author change <spr1t3-0@riseup.net>
 */

class Database
{
    private $conn;

    public function __construct()
    {

        $credentials = DB_Connections[ENVIRONMENT];

        $this->conn = new PDO("mysql:host=" . $credentials["HOST"] . ";dbname=" . $credentials["NAME"], $credentials["USERNAME"], $credentials["PASSWORD"]);
    }

    /**
     * Get a PDO-Connection for use outside of the database class
     *
     * @return PDO
     */
    public function getConn():PDO {
        return $this->conn;
    }


    /**
     * Execute a simple query statement
     *
     * @param string $query
     * @return PDOStatement | false
     */
    public function query(string $query): PDOStatement | false
    {
        return $this->conn->query($query);
    }

    /**
     * Execute a simple query statement with parameters
     *
     * @param string $query
     * @param array $params
     * @return boolean
     */
    public function queryWithParams(string $query, array $params): bool
    {
        $data = $this->conn->prepare($query);
        return $data->execute($params);
    }

    /**
     * Execute a qeuery statement and fetch all results
     *
     * @param string $query
     * @param array $params
     * @return boolean
     */
    public function fetchAllQuery(string $query, array $params): bool
    {
        return $this->conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Execute a query statement with parameters and fetch one result
     *
     * @param string $query
     * @param array $params
     * @return array|false
     */
    public function fetchQueryWithParams(string $query, array $params): array|false
    {
        $data = $this->conn->prepare($query);
        $data->execute($params);
        return $data->fetch();
    }

    /**
     * Execute a query statement with parameters and fetch all results
     *
     * @param string $query
     * @param array $parrams
     * @return array|false
     */
    public function fetchAllQueryWithParams(string $query, array $params): array|false
    {
        $data = $this->conn->prepare($query);
        $data->execute($params);
        return $data->fetchAll();
    }
}
