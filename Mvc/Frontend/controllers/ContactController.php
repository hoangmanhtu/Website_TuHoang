<?php
class ContactController extends Controller{
  public function index(){
    $this->content=$this->render('Mvc/frontend/views/contacts/aboutus.php');
    require_once 'Mvc/frontend/views/layouts/main.php';
  }
  public function storeSystem(){
    $this->content=$this->render('Mvc/frontend/views/contacts/storeSystem.php');
    require_once 'Mvc/frontend/views/layouts/main.php';
  }
}