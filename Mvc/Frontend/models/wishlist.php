<?php
class wishlist extends Model{
  public function wishlist(){
    $sql_select="INSERT INTO wishlist(user_id ,product_id) VALUES (:user_id,:product_id)";
    $obj_insert = $this->connection->prepare($sql_select);
    $arr_insert = [
        ':user_id' => $this->user_id,
        ':product_id' => $this->product_id,
    ];
    $obj_insert->execute($arr_insert);
    $product_id = $this->connection->lastInsertId();
    return $product_id;
  }
  public function getAllwishlist($user_id){
    $sql_select="select * from wishlist where user_id=$user_id";
    $obj_select=$this->connection->prepare($sql_select);
    $obj_select->execute();
    $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
  public function countwishlist($id){
    $sql_select="select count(id) from wishlist where product_id=$id";
    $obj_select=$this->connection->prepare($sql_select);
    $obj_select->execute();
    $products=$obj_select->fetchColumn();
    return $products;
  }
  public function getAllProductUser($user_id)
  {
    $sql_select = "select products.* ,categories.name as category_name,wishlist.user_id
                      from wishlist inner join products inner join categories 
                      on wishlist.product_id=products.id and products.category_id=categories.id 
                      where wishlist.user_id=$user_id";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
  public function deleteWish($id)
  {
    $obj_delete = $this->connection->prepare("DELETE FROM wishlist WHERE product_id = $id");
    $is_delete = $obj_delete->execute();
    return $is_delete;
  }
}