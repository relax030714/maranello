<?php
//model
class Reproducts extends Database{
    
    public function getProducts($from, $to) {
        return  $this->get_all_db("SELECT * FROM products LIMIT $from, $to");
    }
    
    public function getProductsList(){
        return  $this->get_all_db("SELECT product_id, name FROM products");
    }
    
     public function getCategoriesList(){
        return  $this->get_all_db("SELECT category_id, category_name FROM categories");
    }
    
    public function getProdsLink($news_id) {
        $res = $this->get_one_db("SELECT alias FROM url_alias WHERE url = 'product_id=$news_id'");
        if(isset($res['alias']) && $res['alias']){
            return $res['alias'];
        }
        else{
            return '#';
        }
    }
    
    public function getProduct($product_id) {
        return  $this->get_one_db("SELECT * FROM products WHERE product_id='" . $product_id . "'" );
    }
    
    public function setProduct($mass) {

        $product_id = (int)$mass['product_id'];
        $category_id = (int)$mass['category_id'];
        $name = $this->save_string($mass['name']);
        $product_description = $this->save_string($mass['product_description']);
        $articul = (int)$mass['articul'];
        $price = (int)$mass['price'];
        $quantity = (int)$mass['quantity'];
        $status = (int)$mass['status'];
        $product_url = $this->save_string($mass['product_url']);
       
        $new_id = $this->insert_to_db("INSERT INTO products SET product_id='" . $product_id . "', "
                                                        . "name = '" . $name . "', "
                                                        . "articul = '" . $articul . "', "
                                                        . "product_description = '" . $product_description . "', "
                                                        . "price = '" . $price . "', "
                                                        . "quantity = '" . $quantity . "', "
                                                        . "status = '" . $status . "'");
         
        if($category_id && $new_id){
            $this->insert_to_db("INSERT INTO product_to_category SET product_id='".$new_id."',"." category_id='".$category_id."'");
        }
        
        if($product_url){
            $this->insert_to_db("INSERT INTO url_alias SET url='product_id=" . $new_id . "', alias = '" . $product_url . "'"); 
        }
        
        return $new_id;
       
    }
 
    public function updateProduct($mass) {
        
       $product_id = (int)$mass['product_id'];
       $category_id = (int)$mass['category_id'];
       $name = $this->save_string($mass['name']);
       $product_description = $this->save_string($mass['product_description']);
       $articul = (int)$mass['articul'];
       $price = (int)$mass['price'];
       $quantity = (int)$mass['quantity'];
       $status = (int)$mass['status'];
       $product_url = $this->save_string($mass['product_url']);
        
       if($product_url){
            $this->update_in_db("UPDATE url_alias SET alias = '" . $product_url . "' WHERE url='product_id=" . $product_id . "'" ); 
        }

        $this->update_in_db("UPDATE products SET name = '" . $name . "', "
                                                        . "articul = '" . $articul . "', "
                                                        . "product_description = '" . $product_description . "', "
                                                        . "price = '" . $price . "', "
                                                        . "quantity = '" . $quantity . "', "
                                                        . "status = '" . $status . "'"               
                                                        . "WHERE product_id='" . $product_id . "'" );
        
        if($category_id && $product_id){
            $this->update_in_db("UPDATE product_to_category SET product_id='".$product_id."',"." category_id='".$category_id."'");
        }
        
    }    
    
    public function delProduct($product_id) {
        $this->del_from_db("DELETE FROM url_alias WHERE url='product_id=" . $product_id . "'");
        $this->del_from_db("DELETE FROM product_to_category WHERE product_id='" . $product_id . "'");
        return $this->del_from_db("DELETE FROM products WHERE product_id='" . $product_id . "'");
    }
    
    public function setImageProduct($product_id, $filename) {
        $this->update_in_db("UPDATE products SET product_image = '" . $filename . "' WHERE product_id='" . $product_id . "'"); 
    }
}
