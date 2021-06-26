<?php


class Product
{

    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData($table = 'product')
    {


        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
       return $resultArray;
    }

    public function getProduct($item_id = null, $table = 'product')
    {
        if (isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_id = {$item_id}");
            $resultArray = array();

            while ($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;

        }
    }

    public function getQuantity($item_id){
        if (isset($item_id)){
            $result = $this->db->con->query("SELECT quantity FROM product WHERE item_id = {$item_id}");
            $item = mysqli_fetch_array($result,MYSQLI_ASSOC);
            return $item['quantity'];
        }
    }

    public function getStoreValue()
    {
     $items = $this->getData();
     $sum = 0;
     foreach ($items as $item){
         $s = $item['quantity'] * $item['item_price'];
         $sum += $s;
     }
     return $sum;
    }

    public function boughtProduct(){
        $result = $this->db->con->query("SELECT p.item_id, p.item_name, p.item_price, c.user_id, 
       COUNT(p.item_name) as count, SUM(p.item_price) as total FROM product p, cart c
    WHERE p.item_id IN (SELECT item_id FROM cart ) AND p.item_id = c.item_id
    GROUP BY c.user_id");
        $resultArray = array();

        while ($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function createProduct($name, $brand, $price, $image, $quantity)
    {
        $params = array(
            'item_brand'=>$brand,
            'item_name' =>$name,
            'item_price' => $price,
            'item_image' => $image,
            'quantity' => $quantity
        );
        $columns = implode(',', array_keys($params));
        $values = implode(',', array_values($params));
        $query_string = sprintf("INSERT INTO product(%s)VALUES(%s)", $columns, $values);
        echo $query_string;
        $result = $this->db->con->query($query_string);
        return $result;
    }
}