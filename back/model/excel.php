<?php
class Excel extends Database{
    
    public function setProductFromPrice($products) {
        
        $product_id = array();
        
        foreach($products as $product){
            $name = mysqli_real_escape_string($this->db , $product['name']);
            $art = mysqli_real_escape_string($this->db , $product['art']);
            $price = (int)$product['price'];
            $quantity = (int)$product['quantity'];
            $status = (int)$product['status'];
            
            $sql = "INSERT INTO `products` SET `name` = '$name', `articul` = '$art', `price` = '$price', `quantity` = '$quantity', `status` = '$status'";
            $product_id[] = $this->insert_to_db($sql);
        }
        
        return  $product_id;
    }
}