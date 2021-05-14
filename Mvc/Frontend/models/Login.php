<?php
class Login extends Model{
    public $fullname;
    public $email;
    public $phone;
    public $password;
    public $address;
    public $status;
    public function getUser($email) {
        $sql_select_one =
            "SELECT * FROM users WHERE `email` = :email ";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $arr_select = [
            ':email' => $email,
        ];
        $obj_select_one->execute($arr_select);
        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function getUserPhone($phone) {
        $sql_select_one =
            "SELECT * FROM users WHERE `phone` = :phone";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $arr_select = [
            ':phone' => $phone,
        ];
        $obj_select_one->execute($arr_select);
        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function register() {
        $sql_insert = "INSERT INTO users(`fullname`,`email`,`phone`,`address` ,`password`)
                        VALUES(:fullname,:email,:phone,:address, :password)";
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        $arr_insert = [
            ':fullname' => $this->fullname,
            ':email' => $this->email,
            ':phone' => $this->phone,
            ':address' => $this->address,
            ':password' => $this->password,
        ];
        return $obj_insert->execute($arr_insert);
    }
    public function getUserLogin($email, $password) {
        $sql_select_one =
            "SELECT * FROM users WHERE `email` = :email AND `password` = :password AND `status`= 0";
        $obj_select_one =
            $this->connection->prepare($sql_select_one);
        $arr_select = [
            ':email' => $email,
            ':password' => $password,
        ];
        $obj_select_one->execute($arr_select);
        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
  public function getUser_Account($id) {
    $sql_select_one =
        "SELECT * FROM users WHERE id=$id AND `status`= 0";
    $obj_select_one = $this->connection
        ->prepare($sql_select_one);

    $obj_select_one->execute();
    $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
    return $user;
  }
  public function images($id)
  {
    $obj_delete_img=$this->connection->prepare("select avatar from users where id=$id");
    $obj_delete_img->execute();
    $result=$obj_delete_img->fetch(PDO::FETCH_ASSOC);
    if($result["avatar"] != "" && file_exists("assets/uploads/users/".$result["avatar"]))
    {
      unlink("assets/uploads/users/".$result["avatar"]);
    }
  }
  public function update($id) {
    $sql_insert = "UPDATE users SET fullname=:fullname,address=:address,avatar=:avatar,updated_at=:updated_at WHERE id = $id ";
    $obj_insert = $this->connection
        ->prepare($sql_insert);
    $arr_insert = [
        ':fullname' => $this->fullname,
        ':avatar' => $this->avatar,
        ':address' => $this->address,
        ':updated_at' => $this->updated_at,
    ];
    return $obj_insert->execute($arr_insert);
  }
}