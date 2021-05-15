<?php
require_once 'Mvc/Frontend/models/Category.php';
class CategoryController extends Controller{
    public function getCategoryProduct(){
        $category_model=new Category();
        $categories=$category_model->getCategoryProduct();
        $this->content=$this->render("Mvc/Frontend/views/categories/menu.php",["categories" => $categories]);
        echo $this->content;
    }
    public function CategoryHot(){
        $category_model=new Category();
        $categories=$category_model->hotCategory();
        $this->content=$this->render("Mvc/Frontend/views/categories/hotcategory.php",["categories" => $categories]);
        echo $this->content;
    }
    public function getCategoryLeft(){
      $category_model=new Category();
      $categories=$category_model->getCategoryProduct();
      $this->content=$this->render("Mvc/Frontend/views/categories/menuleft.php",["categories" => $categories]);
      echo $this->content;
    }
    public function getCategoryProductSale(){
      $category_model=new Category();
      $categories=$category_model->getCategoryProduct();
      $this->content=$this->render("Mvc/Frontend/views/categories/categoryproductsale.php",["categories" => $categories]);
      echo $this->content;
    }
  public function getCategoryCenter(){
    $category_model=new Category();
    $categories=$category_model->getCategoryProduct();
    $this->content=$this->render("Mvc/Frontend/views/categories/category_center.php",["categories" => $categories]);
    echo $this->content;
  }

}