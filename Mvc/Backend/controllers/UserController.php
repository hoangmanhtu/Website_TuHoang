<?php
require_once 'Mvc/Backend/models/staff.php';
require_once 'Mvc/Backend/models/User.php';

class UserController extends Controller
{
  public function register()
  {

    if (!isset($_GET['id']) || !is_numeric($_GET["id"])) {
      $_SESSION['error'] = "Id không hợp lệ";
      header('location:index.php?area=backend&controller=staff');
      exit();
    }
    $id = $_GET["id"];
    $staff_model = new Staff();
    $staff = $staff_model->getById($id);
    $user_model = new User();
    $users = $user_model->getByIdAdmin($id);
    if (isset($_POST['submit'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $quyen = $_POST['quyen'];
      if (empty($this->error)) {
        $user_model = new User();
        $user_model->email = $email;
        $user_model->password = md5($password);
        $user_model->quyen = $quyen;
        $is_insert = $user_model->register($id);
        if ($is_insert) {
          $_SESSION["success"] = "Cấp tài khoản cho nhân viên thành công !";
        } else {
          $_SESSION["error"] = ' Cấp tài khoản cho nhân viên thất bại';
        }
        header("location:index.php?area=backend&controller=staff");
        exit();
      }
    }
    $this->content = $this->render("Mvc/Backend/views/users/register.php", ['staff' => $staff, 'user' => $users]);
    require_once 'Mvc/Backend/views/layouts/main.php';
  }

  public function validateEmail()
  {
    $email = $_POST["email"];
    $user_model = new User();
    $user = $user_model->getUser($email);
    if (!empty($user)) {
      echo "True";
    } else {
      echo "false";
    }
  }

  public function index()
  {

    if (isset($_POST['submit'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      if (empty($email)) {
        $this->error = ' * Tên đăng nhập không được để trống';
      }
      if (empty($password)) {
        $this->error = ' * Mật khẩu không được để trống';
      }
      if (empty($this->error)) {
        $user_model = new User();
        $password = md5($password);
        $user = $user_model->getUserLogin($email, $password);
        if (empty($user)) {
          $_SESSION['error'] = 'Sai username hoặc password';
          header("Location:index.php?area=backend&controller=user");
          exit();
        } else {
          $_SESSION['success'] = 'Đăng nhập thành công';
          $_SESSION['user_admin'] = $user;
          header('Location: index.php?area=backend');
          exit();
        }
      }
    }
    $this->content = $this->render("Mvc/Backend/views/users/login.php");
    echo $this->content;
  }

  public function logout()
  {
    unset($_SESSION['user_admin']);
    $_SESSION['success'] = ' Đăng xuất thành công';
    header("Location:index.php?area=backend&controller=user");
    exit();
  }

  public function getAll()
  {
    $user_model = new User();
    if ($_SESSION['user_admin']['quyen'] == 1) {
      $users = $user_model->getAllUser();
      $this->content = $this->render("Mvc/Backend/views/users/getAll.php", ['users' => $users]);
      require_once 'Mvc/Backend/views/layouts/main.php';
    } else {
      $this->UpdateUser();
    }
  }
  public function UpdateUser(){
    //      print_r($_SESSION['user_admin']);
//      die();
    $user_model = new User();
    $id = $_SESSION['user_admin']['staff_id'];
    $staff_model = new Staff();
    $staff = $staff_model->getById($id);
    if (isset($_POST['submit'])) {
      $name = $_POST["name"];
      $date_birth = $_POST['date_birth'];
      $phone = $_POST["phone"];
      $avatar_file = $_FILES["avatar"];
      $address = $_POST['address'];
      if (empty($this->error)) {
        $avatar = $staff['avatar'];
        if ($avatar_file['error'] == 0) {
          $staff_model->images($id);
          $dir_upload = __DIR__ . "/../../../Assets/Uploads/staffs";
          if (!file_exists($dir_upload)) {
            mkdir($dir_upload);
          }
          $avatar = time() . "-" . $avatar_file["name"];
          move_uploaded_file($avatar_file["tmp_name"], $dir_upload . "/" . $avatar);
        }
        $staff_model->name = $name;
        $staff_model->avatar = $avatar;
        $staff_model->date_birth = $date_birth;
        $staff_model->phone = $phone;
        $staff_model->address = $address;
        $staff_model->updated_at = date('Y-m-d H:i:s');
        $is_update = $staff_model->update($id);
        if ($is_update) {
          $_SESSION['success'] = 'Chỉnh sửa thông tin thành công';
          $user = $user_model->getUser_Account($id);
          $_SESSION["user_admin"] = $user;

        } else {
          $_SESSION['error'] = 'Chỉnh sửa thông tin thất bại';
        }
      }
    }
    $this->content = $this->render("Mvc/Backend/views/users/UpdateUser.php");
    require_once 'Mvc/Backend/views/layouts/main.php';

  }

  public function getAdmin()
  {
    $user_model = new User();
    $admin = $user_model->getAllAdmin();
    $this->content = $this->render("Mvc/Backend/views/users/getAllAdmin.php", ['admin' => $admin]);
    require_once 'Mvc/Backend/views/layouts/main.php';
  }

}