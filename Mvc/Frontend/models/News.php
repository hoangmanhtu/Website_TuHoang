<?php
class News extends Model{
    public function hotNews(){
        $sql_select="select news.*,categories.name as category_name from categories inner join news 
                    on categories.id=news.category_id where news.status=1 and hotnews=1 ORDER BY news.created_at  desc limit 4 ";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function detail($id){
      $sql_select="select news.*,categories.name as category_name from categories inner join news 
                    on categories.id=news.category_id where news.id=$id";
      $obj_select=$this->connection->prepare($sql_select);
      $obj_select->execute();
      $news=$obj_select->fetch(PDO::FETCH_ASSOC);
      return $news;
    }
  public function newsCategory(){
    $sql_select="select news.*,categories.name as category_name from categories inner join news 
                    on categories.id=news.category_id where news.status=1  ORDER BY news.created_at  desc ";
    $obj_select=$this->connection->prepare($sql_select);
    $obj_select->execute();
    $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }

}