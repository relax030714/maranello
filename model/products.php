<?php
//class Products extends Database{
//    
//    public function getProduct_To_Category($category_id) {
//        return  $this->get_all_db("SELECT * FROM products as p JOIN product_to_category as ptc WHERE p.product_id=ptc.product_id AND ptc.category_id=$category_id");
//    }
//    
//    public function getProductLink($product_id) {
//        $res = $this->get_one_db("SELECT alias FROM url_alias WHERE url = 'product_id=$product_id'");
//        if(isset($res['alias']) && $res['alias']){
//            return $res['alias'];
//        }
//        else{
//            return FALSE;
//        }
//    }
//    
//    public function getOneProduct($product_id) {
//        return $this->get_one_db("SELECT * FROM products WHERE product_id = $product_id");
//    }
//}