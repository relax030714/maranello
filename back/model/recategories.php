<?php
class Recategories extends Database{
    
    public function getCategories($from, $to) {
        return  $this->get_all_db("SELECT * FROM categories LIMIT $from, $to");
    }
    
    public function getCategoriesList(){
        return  $this->get_all_db("SELECT category_id, category_name FROM categories");
    }
    
    public function getCatsLink($news_id) {
        $res = $this->get_one_db("SELECT alias FROM url_alias WHERE url = 'category_id=$news_id'");
        if(isset($res['alias']) && $res['alias']){
            return $res['alias'];
        }
        else{
            return '#';
        }
    }
    
    public function getCategory($category_id) {
        return  $this->get_one_db("SELECT * FROM categories WHERE category_id='" . $category_id . "'" );
    }
    
    public function setCategory($mass) {

        $category_id = (int)$mass['category_id'];
        $parent_id = (int)$mass['parent_id'];
        $category_url = $this->save_string($mass['category_url']);
        $category_name = $this->save_string($mass['category_name']);
        $category_text = $this->save_string($mass['category_text']);
        $category_text_small = $this->save_string($mass['category_text_small']);
        $category_seo_title = $this->save_string($mass['category_seo_title']);
        $category_seo_description = $this->save_string($mass['category_seo_description']);
        $category_seo_keywords = $this->save_string($mass['category_seo_keywords']);
        //$category_image = $this->save_string($mass['category_name']);
        $sort_order = (int)$mass['sort_order'];
        $status = (int)$mass['status'];
       
        $new_id = $this->insert_to_db("INSERT INTO categories SET category_id='" . $category_id . "', "
                                                        . "parent_id = '" . $parent_id . "', "
                                                        . "category_name = '" . $category_name . "', "
                                                        . "category_text = '" . $category_text . "', "
                                                        . "category_text_small = '" . $category_text_small . "', "
                                                        . "category_seo_title = '" . $category_seo_title . "', "
                                                        . "category_seo_description = '" . $category_seo_description . "', "
                                                        . "category_seo_keywords = '" . $category_seo_keywords . "', "
                                                        /*. "category_image = '" . $parent_id . "', "*/
                                                        . "sort_order = '" . $sort_order . "', "  
                                                        . "status = '" . $status . "'");
        
        
        if($category_url){
            $this->insert_to_db("INSERT INTO url_alias SET url='category_id=" . $new_id . "', alias = '" . $category_url . "'"); 
        }
        return $new_id;
    }
 
    public function updateCategory($mass) {
        
        $category_id = (int)$mass['category_id'];
        $parent_id = (int)$mass['parent_id'];
        $category_url = $this->save_string($mass['category_url']);
        $category_name = $this->save_string($mass['category_name']);
        $category_text = $this->save_string($mass['category_text']);
        $category_text_small = $this->save_string($mass['category_text_small']);
        $category_seo_title = $this->save_string($mass['category_seo_title']);
        $category_seo_description = $this->save_string($mass['category_seo_description']);
        $category_seo_keywords = $this->save_string($mass['category_seo_keywords']);
        //$category_image = $this->save_string($mass['category_name']);
        $sort_order = (int)$mass['sort_order'];
        $status = (int)$mass['status'];
        
        if($category_url){
            $this->update_in_db("UPDATE url_alias SET alias = '" . $category_url . "' WHERE url='category_id=" . $category_id . "'" ); 
        }

        $this->update_in_db("UPDATE categories SET parent_id = '" . $parent_id . "', "
                                                        . "category_name = '" . $category_name . "', "
                                                        . "category_text = '" . $category_text . "', "
                                                        . "category_text_small = '" . $category_text_small . "', "
                                                        . "category_seo_title = '" . $category_seo_title . "', "
                                                        . "category_seo_description = '" . $category_seo_description . "', "
                                                        . "category_seo_keywords = '" . $category_seo_keywords . "', "
                                                        /*. "category_image = '" . $parent_id . "', "*/
                                                        . "sort_order = '" . $sort_order . "', "  
                                                        . "status = '" . $status . "'"                
                                                        . "WHERE category_id='" . $category_id . "'" );
        
    }    
    
    public function delCategory($category_id) {
        $this->del_from_db("DELETE FROM url_alias WHERE url='category_id=" . $category_id . "'");
        return $this->del_from_db("DELETE FROM categories WHERE category_id='" . $category_id . "'");
    }
    
    public function setImageCategory($category_id, $filename) {
        $this->update_in_db("UPDATE categories SET category_image = '" . $filename . "' WHERE category_id='" . $category_id . "'"); 
    }
}
