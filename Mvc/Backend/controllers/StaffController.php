<?php
require_once 'Mvc/Backend/models/staff.php';
require_once 'Mvc/Backend/models/user.php';

class StaffController extends Controller{
  public function index(){
    $pageSize=3;
    $page="";
    if(isset($_POST["page"]) && is_numeric($_POST["page"]))
    {
      $page=$_POST["page"];
    }
    else
    {
      $page=1;
    }
    $staff_model=new Staff();
    $countStaff=$staff_model->countTotal();
    $numPage=ceil($countStaff/$pageSize);
    $staffs=$staff_model->getAll($pageSize,$page);
    $output=[
        "staffs" => $staffs,
        "numPage" => $numPage,
        "page" => $page
    ];
    $this->content=$this->render("Mvc/Backend/views/staffs/index.php",$output);
    require_once 'Mvc/Backend/views/layouts/main.php';
  }
//
  public function search()
  {
    $pageSize=3;
    $page="";

    if(isset($_POST["page"]) && is_numeric($_POST["page"]))
    {
      $page=$_POST["page"];
    }
    else
    {
      $page=1;
    }
    $staff_model=new Staff();
    if(isset($_POST["query"]) && $_POST["query"] != "")
    {
      $search=$_POST["query"];
      $countStaffSearch=$staff_model->countTotalSearch($search);
      $numPage=ceil($countStaffSearch/$pageSize);
      $staffs=$staff_model->search($search,$pageSize,$page);
      $this->content=$this->render("Mvc/Backend/views/staffs/search.php",
          ["staffs" => $staffs,
          "numPage" => $numPage,
          "page" => $page]);
      echo $this->content;
    }
    else
    {
      $countStaff=$staff_model->countTotal();
      $numPage=ceil($countStaff/$pageSize);
      $staffs=$staff_model->getAll($pageSize,$page);
      $this->content=$this->render("Mvc/Backend/views/staffs/search.php",
          ["staffs" => $staffs,
          "numPage" => $numPage,
          "page" => $page]);
      echo $this->content;
    }

  }
//
  public function create(){
    $staff_model=new Staff();
    if(isset($_POST['submit'])){
      $name = $_POST["name"];
      $date_birth = $_POST['date_birth'];
      $phone = $_POST["phone"];
      $avatar_file = $_FILES["avatar"];
      $address=$_POST['address'];
      if(empty($this->error)){
        $avatar='';
        if($avatar_file['error']== 0){
          $dir_uploads= __DIR__."/../../../Assets/Uploads/staffs";
          if(!file_exists($dir_uploads)){
            mkdir($dir_uploads);
          }
          $avatar=time().'-'.$avatar_file["name"];
          move_uploaded_file($avatar_file['tmp_name'],$dir_uploads.'/'.$avatar);
        }
        $staff_model->name=$name;
        $staff_model->avatar=$avatar;
        $staff_model->date_birth=$date_birth;
        $staff_model->phone=$phone;
        $staff_model->address=$address;
        $is_insert=$staff_model->insert();
        if($is_insert){
          $_SESSION["success"] = " Thêm nhân viên mới thành công !";
        }else{
          $_SESSION["error"] = ' Thêm nhân viên mới thất bại';
        }
        header("location:index.php?area=backend&controller=staff");
        exit();
      }
    }
    $this->content=$this->render("Mvc/Backend/views/staffs/create.php");
    require_once 'Mvc/Backend/views/layouts/main.php';
  }
  public function detail(){
    if(!isset($_GET['id']) || !is_numeric($_GET["id"])) {
      $_SESSION['error'] = "Id không hợp lệ";
      header('location:index.php?area=backend&controller=staff');
      exit();
    }
    $id=$_GET["id"];
    $staff_model=new Staff();
    $staff=$staff_model->getById($id);
    $user_model=new User();
    $users=$user_model->getByIdAdmin($id);
    $this->content=$this->render('Mvc/Backend/views/staffs/detail.php',['staff' => $staff,'users' => $users]);
    require_once 'Mvc/Backend/views/layouts/main.php';
  }
    public function update(){
      if(!isset($_GET["id"]) || !is_numeric($_GET["id"])){
        $_SESSION['error'] = "Id không hợp lệ";
        header('location:index.php?area=backend&controller=staff');
        exit();
      }
      $id=$_GET["id"];
      $staff_model=new Staff();
      $staff=$staff_model->getById($id);
      if(isset($_POST['submit'])){
        $name = $_POST["name"];
        $date_birth = $_POST['date_birth'];
        $phone = $_POST["phone"];
        $avatar_file = $_FILES["avatar"];
        $address=$_POST['address'];
        if(empty($this->error)){
          $avatar=$staff['avatar'];
          if($avatar_file['error'] == 0){
            $staff_model->images($id);
            $dir_upload=__DIR__."/../../../Assets/Uploads/staffs";
            if(!file_exists($dir_upload)){
              mkdir($dir_upload);
            }
            $avatar=time()."-". $avatar_file["name"];
            move_uploaded_file($avatar_file["tmp_name"],$dir_upload."/".$avatar);
          }
          $staff_model->name=$name;
          $staff_model->avatar=$avatar;
          $staff_model->date_birth=$date_birth;
          $staff_model->phone=$phone;
          $staff_model->address=$address;
          $staff_model->updated_at = date('Y-m-d H:i:s');
          $is_update = $staff_model->update($id);
          if ($is_update) {
            $_SESSION['success'] = 'Chỉnh sửa nhân viên thành công';
          } else {
            $_SESSION['error'] = 'Chỉnh sửa nhân viên thất bại';
          }
          header("location:index.php?area=backend&controller=staff");
          exit();
        }
      }
      $this->content=$this->render("Mvc/Backend/views/staffs/update.php",['staff' => $staff]);
      require_once 'Mvc/Backend/views/layouts/main.php';
  }
  public function delete(){
    if(!isset($_GET["id"])|| !is_numeric($_GET["id"])){
      $_SESSION["error"] =" ID không hợp lệ";
      header('location:index.php?area=backend&controller=staff');
      exit();
    }
    $id=$_GET["id"];
    $staff_model=new Staff();
    $staff_model->images($id);
    $is_delete=$staff_model->delete($id);;
    if($is_delete)
    {
      $_SESSION["success"] = "Xóa thành công nhân viên";
    }
    else
    {
      $_SESSION["error"] = " Xóa Thất Bại nhân viên ";
    }
    header("location:index.php?area=backend&controller=staff");
    exit();
  }
}