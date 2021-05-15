<?php
class ContactController extends Controller{
  public function index(){
    $this->content=$this->render('Mvc/Frontend/views/contacts/storeSystem.php');
    require_once 'Mvc/Frontend/views/layouts/main.php';
  }
  public function storeSystem(){
    $this->content=$this->render('Mvc/Frontend/views/contacts/aboutus.php');
    require_once 'Mvc/Frontend/views/layouts/main.php';
  }
}