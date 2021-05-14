<?php
class Home extends Model{
  public function MoneyMoth(){
    $select_all="SELECT CONVERT(created_at, DATE) as day, SUM(price_total) AS DOANHTHU FROM orders GROUP BY CONVERT(created_at, DATE)";
    $obj_select=$this->connection->prepare($select_all);
    $obj_select->execute();
    $money=$obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $money;
  }
}