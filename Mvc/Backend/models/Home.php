<?php
class Home extends Model{
  public function MoneyMothHave(){
    $select_all="SELECT CONVERT(created_at, DATE) as day, SUM(price_total) AS DOANHTHU FROM orders where status=1 GROUP BY CONVERT(created_at, DATE)";
    $obj_select=$this->connection->prepare($select_all);
    $obj_select->execute();
    $money=$obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $money;
  }
  public function MoneyMothNoHave(){
    $select_all="SELECT CONVERT(created_at, DATE) as day, SUM(price_total) AS DOANHTHU FROM orders where status=0 GROUP BY CONVERT(created_at, DATE)";
    $obj_select=$this->connection->prepare($select_all);
    $obj_select->execute();
    $money=$obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $money;
  }
  public function CountNoUser(){
    $sql_select="SELECT COUNT(*) FROM orders WHERE orders.user_id NOT IN(SELECT users.id FROM users
                                                                         WHERE users.id = orders.user_id)";
    $obj_select=$this->connection->prepare($sql_select);
    $obj_select->execute();
    $users=$obj_select->fetchColumn();
    return $users;
  }
  public function OrderNoUser(){
    $sql_select="SELECT * FROM orders WHERE orders.user_id NOT IN(SELECT users.id FROM users
                                                                         WHERE users.id = orders.user_id)";
    $obj_select=$this->connection->prepare($sql_select);
    $obj_select->execute();
    $users=$obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $users;
  }
  public function countOrder0()
  {
    $obj_select=$this->connection->prepare("select count(orders.id) from orders where status=0");
    $obj_select->execute();
    return $obj_select->fetchColumn();
  }

  public function countUser(){
    $select_count="Select count(id) from users";
    $obj_select=$this->connection->prepare($select_count);
    $obj_select->execute();
    return $obj_select->fetchColumn();
  }
  public function countProductOut(){
    $sql_select="SELECT count(id) from products WHERE STATUS=1 and quality<=0";
    $obj_select=$this->connection->prepare($sql_select);
    $obj_select->execute();
    $users=$obj_select->fetchColumn();
    return $users;
  }

  public function hotProduct()
  {
    $sql_select = "select products.*,categories.name as category_name,producers.name as producer_name 
                    from categories  inner join products inner join producers
                    on categories.id=products.category_id and producers.id=products.producer_id
                     where products.status=1 and products.hotproduct=1 
                    ORDER BY products.updated_at limit 6 ";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
  public function hotProductAll()
  {
    $sql_select = "select products.*,categories.name as category_name,producers.name as producer_name 
                    from categories  inner join products inner join producers
                    on categories.id=products.category_id and producers.id=products.producer_id
                     where products.status=1 and products.hotproduct=1 
                    ORDER BY products.updated_at desc";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
}