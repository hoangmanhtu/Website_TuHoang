<?php
require_once 'Mvc/Frontend/models/Producer.php';
class ProducerController extends Controller{
    public function hotProducer(){
        $producer_model=new Producer();
        $producers=$producer_model->hotProducer();
        $this->content=$this->render("Mvc/Frontend/views/producers/hotproducer.php",["producers" => $producers]);
        echo $this->content;
    }
  public function ProducerCenter(){
    $producer_model=new Producer();
    $producers=$producer_model->Producer_Center();
    $this->content=$this->render("Mvc/Frontend/views/producers/producer_center.php",["producers" => $producers]);
    echo $this->content;
  }
}