<?php

class report extends Model
{
//  public $ngaybatdau;
//  public $ngayketthuc;
  public function ProductNoData()
  {
    $sql_select = "select products.*,categories.name as category_name,producers.name as producer_name from products 
                      inner join categories inner join producers
                    on products.category_id=categories.id and producers.id=products.producer_id  WHERE products.id NOT IN(
                                    SELECT order_details.product_id FROM order_details)";
    $obj_select=$this->connection->prepare($sql_select);
    $obj_select->execute();
    $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
  public function sellingProducts()
  {
    $sql_select = "SELECT products.*, SUM(order_details.quality) AS TONG ,categories.name as category_name,producers.name as producer_name
                    FROM products INNER JOIN order_details inner join categories inner join producers
                    on products.category_id=categories.id and producers.id=products.producer_id
                 and products.id = order_details.product_id
                    GROUP BY products.title ORDER BY TONG DESC ";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
  public function moneyProduct($ngaybatdau,$ngayketthuc)
  {
    $sql_select = "select SUM(orders.price_total) from orders WHERE orders.created_at >= '$ngaybatdau' and orders.created_at <='$ngayketthuc' and status=1  ";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetchColumn();
    return $products;
  }
  public function ReportOrder($ngaybatdau,$ngayketthuc)
  {
    $sql_select = "select * from orders WHERE orders.created_at >= '$ngaybatdau' and orders.created_at <='$ngayketthuc' and status=1 ";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetchAll();
    return $products;
  }

  public function moneyProductStaff($id,$ngaybatdau,$ngayketthuc)
  {
    $sql_select = "select SUM(orders.price_total) from orders 
                  WHERE orders.created_at >= '$ngaybatdau' and orders.created_at <='$ngayketthuc'
                   and status=1 and admin_id=$id";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetchColumn();
    return $products;
  }
  public function ReportOrderStaff($id,$ngaybatdau,$ngayketthuc)
  {
    $sql_select = "select * from orders WHERE orders.created_at >= '$ngaybatdau' 
                    and orders.created_at <='$ngayketthuc' and status=1 and admin_id=$id";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetchAll();
    return $products;
  }

}