<?php


class User
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getUsers($table = 'user', $elem = '*')
    {


        $result = $this->db->con->query("SELECT {$elem} FROM {$table}");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function insertIntoUserTable($params = null, $table = "user")
    {
        if ($this->db->con != null){

            if ($params != null){

                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));

                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                $result = $this->db->con->query($query_string);
                return $result;

            }
        }
    }
    public function addUser($user_name, $password)
    {
        if (isset($user_name) && isset($password)){
            $params = array(
                "user_name" =>$user_name,
                "password" => $password,
            );
            echo 'yes';
            $result = $this->insertIntoUserTable($params);
            if ($result){
                header("location:" .$_SERVER['PHP_SELF']);
            }
        }
    }

    public function getBuyer()
    {
        $result = $this->db->con->query("SELECT user_id, COUNT(item_id) AS count FROM cart GROUP BY user_id");
        $buyerArray = array();

        while ($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $buyerArray[] = $item;
        }
        return $buyerArray;
    }

    public function getUserById($user_id)
    {
        $result = $this->db->con->query("SELECT user_name FROM user WHERE user_id = {$user_id}");
        $item = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $item['user_name'];
    }


}