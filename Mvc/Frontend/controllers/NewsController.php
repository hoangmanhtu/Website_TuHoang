<?php
require_once 'Mvc/frontend/models/News.php';
class NewsController extends Controller{
    public function hotNews(){
        $news_model=new News();
        $news=$news_model->hotNews();
        $this->content=$this->render('Mvc/frontend/views/news/hotnews.php',['news' => $news]);
        echo $this->content;
    }
  public function detail(){
      $id=$_GET['id'];
    $news_model=new News();
    $news=$news_model->detail($id);
    $this->content=$this->render('Mvc/frontend/views/news/detail.php',['news' => $news]);
    require_once 'Mvc/frontend/views/layouts/main.php';
  }
}