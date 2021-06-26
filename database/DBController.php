<?php


class DBController
{
    protected $host = 'localhost:3309';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'shopee';

    public $con = null;
    public function __construct()
    {
        $this->con = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->con->connect_error){
            echo 'fail'.$this->con->connect_error;
        }
//        echo 'connected for test!!';
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    public function closeConnection(){
        if ($this->con != null){
            $this->con->close();
            $this->con = null;
        }
    }
}


