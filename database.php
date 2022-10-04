<?php 
class Database
{
    private $localhost = "localhost";
    private $server = "root";
    private $password = "";
    private $dbname = "accounts";

    public function setConnection()
    {
        $conn = new mysqli($this->localhost, $this->server, $this->password, $this->dbname);
        return $conn;
    }

}
$database = new Database();
?>