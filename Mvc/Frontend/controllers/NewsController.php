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
  public function newsCategory(){
    $news_model=new News();
    $news=$news_model->newsCategory();
    $this->content=$this->render('Mvc/frontend/views/news/newsCategory.php',['news' => $news]);
    require_once 'Mvc/frontend/views/layouts/main.php';
  }
  public function newsHot(){
    $news_model=new News();
    $news=$news_model->hotNews();
    $this->content=$this->render('Mvc/frontend/views/news/NewsHot.php',['news' => $news]);
    echo $this->content;
  }
}