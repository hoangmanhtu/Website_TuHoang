<?php
require_once 'Mvc/frontend/models/Producer.php';
class ProducerController extends Controller{
    public function hotProducer(){
        $producer_model=new Producer();
        $producers=$producer_model->hotProducer();
        $this->content=$this->render("Mvc/frontend/views/producers/hotproducer.php",["producers" => $producers]);
        echo $this->content;
    }
  public function ProducerCenter(){
    $producer_model=new Producer();
    $producers=$producer_model->Producer_Center();
    $this->content=$this->render("Mvc/frontend/views/producers/producer_center.php",["producers" => $producers]);
    echo $this->content;
  }
}