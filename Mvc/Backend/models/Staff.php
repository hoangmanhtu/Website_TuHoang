<?php
class Staff extends Model{
  public $name;
  public $avatar;
  public $phone;
  public $address;
  public $date_birth;
  public $created_at;
  public $updated_at;

  public function index(){

  }
  public function getAll($pageSize,$page){
    $from=($page-1) * $pageSize;
    $sql_select="SELECT staffs.* FROM staffs  where TRUE order by staffs.created_at limit $from,$pageSize";
    $obj_select_all=$this->connection->prepare($sql_select);
    $obj_select_all->execute();
    $staffs=$obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    return $staffs;
  }
  public function search($search,$pageSize,$page)
  {
    $from=($page-1) * $pageSize;
    $sql_query ="SELECT staffs.* FROM staffs  where staffs.name like '%$search%' order by staffs.created_at desc limit $from,$pageSize";
    $obj_select=$this->connection->prepare($sql_query);
    $obj_select->execute();
    $staffs=$obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $staffs;
  }
  public function countTotal()
  {
    $sql_count="select count(staffs.id) FROM  staffs ";
    $obj_select = $this->connection->prepare($sql_count);
    $obj_select->execute();
    return $obj_select->fetchColumn();
  }
  public function countTotalSearch($search)
  {
    $sql_count="select count(staffs.id) FROM  staffs  where staffs.name like '%$search%'";
    $obj_select = $this->connection->prepare($sql_count);
    $obj_select->execute();
    return $obj_select->fetchColumn();
  }


  public function insert(){
    $sql_insert="Insert into staffs(`name`,`avatar`,`phone`,`address`,`date_birth`)
        VALUES (:name,:avatar,:phone,:address,:date_birth)";
    $obj_insert=$this->connection->prepare($sql_insert);
    $arr_insert=[
        ':name' => $this->name,
        ':avatar' => $this->avatar,
        ':phone' => $this->phone,
        ':address' => $this->address,
        ':date_birth'=> $this->date_birth,
    ];
    return $obj_insert->execute($arr_insert);
  }
  public function getById($id){
    $select_one="SELECT * FROM staffs  where staffs.id=$id";
    $obj_select=$this->connection->prepare($select_one);
    $obj_select->execute();
    return $obj_select->fetch(PDO::FETCH_ASSOC);
  }
  public function update($id){
    $sql_update="Update staffs set `name`=:name,`avatar`=:avatar,`phone`=:phone,`address`=:address,
                `date_birth`=:date_birth,`updated_at`=:updated_at where id=$id";
    $obj_update=$this->connection->prepare($sql_update);
    $arr_update=[
        ':name' => $this->name,
        ':avatar' => $this->avatar,
        ':phone' => $this->phone,
        ':address' => $this->address,
        ':date_birth'=> $this->date_birth,
        ":updated_at" => $this->updated_at,

    ];
    return $obj_update->execute($arr_update);
  }
  public function images($id)
  {
    $obj_delete_img=$this->connection->prepare("select avatar from staffs where id=$id");
    $obj_delete_img->execute();
    $result=$obj_delete_img->fetch(PDO::FETCH_ASSOC);
    if($result["avatar"] != "" && file_exists("assets/uploads/staffs/".$result["avatar"]))
    {
      unlink("assets/uploads/staffs/".$result["avatar"]);
    }
  }
  public function delete($id)
  {
    $obj_delete = $this->connection->prepare("DELETE FROM staffs WHERE id = $id");
    $is_delete = $obj_delete->execute();
    $obj_delete_product = $this->connection->prepare("DELETE FROM admin WHERE staff_id = $id");
    $obj_delete_product->execute();
    return $is_delete;
  }
//
//  public function updateUser($id) {
//    $sql_insert = "Update staffs set `name`=:name,`avatar`=:avatar,`phone`=:phone,`address`=:address,
//                `date_birth`=:date_birth,`updated_at`=:updated_at where id=$id";
//    $obj_insert = $this->connection
//        ->prepare($sql_insert);
//    $arr_insert = [
//        ':fullname' => $this->fullname,
//        ':avatar' => $this->avatar,
//        ':email' => $this->email,
//        ':phone' => $this->phone,
//        ':updated_at' => $this->updated_at,
//    ];
//    return $obj_insert->execute($arr_insert);
//  }

}