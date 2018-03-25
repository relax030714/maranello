<?php
class Renews extends Database{
    
    public function getNews($from, $to) {
        
        return  $this->get_all_db("SELECT * FROM news WHERE status = '1' LIMIT $from, $to");

    }
    
     public function getNewsList(){
        return  $this->get_all_db("SELECT news_id, name FROM news");
    }
    
    public function getNewsLink($news_id) {
        $res = $this->get_one_db("SELECT alias FROM url_alias WHERE url = 'news_id=$news_id'");
        if(isset($res['alias']) && $res['alias']){
            return $res['alias'];
        }
        else{
            return '#';
        }
    }
    
        public function getNew($news_id) {
        return  $this->get_one_db("SELECT * FROM news WHERE news_id='" . $news_id . "'" );
    }
    
    public function setNews($mass) {

        $news_id = (int)$mass['news_id'];
        $name = $this->save_string($mass['name']);
        $text = $this->save_string($mass['text']);
        $title = $this->save_string($mass['title']);
        $status = (int)$mass['status'];
        $news_url = $this->save_string($mass['news_url']);
       
        $new_id = $this->insert_to_db("INSERT INTO news SET news_id='" . $news_id . "', "
                                                        . "name = '" . $name . "', "
                                                        . "text = '" . $text . "', "
                                                        . "title = '" . $title . "', "
                                                        . "status = '" . $status . "'");
         
        if($news_url){
            $this->insert_to_db("INSERT INTO url_alias SET url='news_id=" . $new_id . "', alias = '" . $news_url . "'"); 
        }
        
        return $new_id;
       
    }
 
    public function updateNews($mass) {
        
       $news_id = (int)$mass['news_id'];
       $name = $this->save_string($mass['name']);
       $text = $this->save_string($mass['text']);
       $title = $this->save_string($mass['title']);
       $status = (int)$mass['status'];
       $news_url = $this->save_string($mass['news_url']);
        
       if($news_url){
            $this->update_in_db("UPDATE url_alias SET alias = '" . $news_url . "' WHERE url='news_id=" . $news_id . "'" ); 
        }

        $this->update_in_db("UPDATE news SET name = '" . $name . "', "
                                                        . "text = '" . $text . "', "
                                                        . "title = '" . $title . "', "
                                                        . "status = '" . $status . "'"               
                                                        . "WHERE news_id='" . $news_id . "'" );
        
    }    
    
    public function delNews($news_id) {
        $this->del_from_db("DELETE FROM url_alias WHERE url='news_id=" . $news_id . "'");
        return $this->del_from_db("DELETE FROM news WHERE news_id='" . $news_id . "'");
    }
}



