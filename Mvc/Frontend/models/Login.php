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
}