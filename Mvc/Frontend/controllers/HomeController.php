<?php
class HomeController extends Controller{
    public function index(){
        $this->content=$this->render("Mvc/Frontend/views/home/home.php");
       require_once 'Mvc/Frontend/views/layouts/main.php';
    }
}