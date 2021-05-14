<?php
class User extends Model{
  public $email;
  public $quyen;
  public $password;
  public function getAllUser()
  {
    $sql_select="select * from users";
    $obj_select=$this->connection->prepare($sql_select);
    $obj_select->execute();
    $users=$obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $users;
  }
  public function getUserLogin($email,$password){
    $sql_select_one =
        "SELECT admin.*,staffs.* FROM admin inner join staffs on admin.staff_id=staffs.id WHERE `email` = :email AND `password` = :password";
    $obj_select_one = $this->connection->prepare($sql_select_one);
    $arr_select = [
        ':email' => $email,
        ':password' => $password
    ];
    $obj_select_one->execute($arr_select);
    $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
    return $user;
  }
  public function getUser($email) {
    $sql_select_one =
        "SELECT * FROM admin WHERE `email` = :email ";
    $obj_select_one = $this->connection->prepare($sql_select_one);
    $arr_select = [
        ':email' => $email,
    ];
    $obj_select_one->execute($arr_select);
    $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
    return $user;
  }
  public function register($id) {
    $sql_insert = "INSERT INTO admin(`email`,`staff_id`,`quyen` ,`password`)
                        VALUES(:email,:staff_id,:quyen, :password)";
    $obj_insert = $this->connection
        ->prepare($sql_insert);
    $arr_insert = [
        ':email' => $this->email,
        ':quyen' => $this->quyen,
        ':password' => $this->password,
        ':staff_id' => $id,
    ];
    return $obj_insert->execute($arr_insert);
  }
  public function getByIdAdmin($id){
    $select_one="SELECT * FROM admin  where staff_id=$id";
    $obj_select=$this->connection->prepare($select_one);
    $obj_select->execute();
    return $obj_select->fetch(PDO::FETCH_ASSOC);
  }
  public function getAllAdmin(){
    $select_one="SELECT admin.*,staffs.name as staff_name,staffs.id as staff_id FROM admin inner join staffs on admin.staff_id=staffs.id";
    $obj_select=$this->connection->prepare($select_one);
    $obj_select->execute();
    return $obj_select->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getUser_Account($id){
    $sql_select_one =
        "SELECT admin.*,staffs.* FROM admin inner join staffs on admin.staff_id=staffs.id WHERE staffs.id=$id";
    $obj_select_one = $this->connection->prepare($sql_select_one);
    $obj_select_one->execute();
    $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
    return $user;
  }

}