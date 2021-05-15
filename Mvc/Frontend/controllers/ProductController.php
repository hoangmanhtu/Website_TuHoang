<?php
require_once 'Mvc/Frontend/models/Product.php';
require_once 'Mvc/Frontend/models/Category.php';
require_once 'Mvc/Frontend/models/Producer.php';
require_once 'Mvc/Frontend/models/Rating.php';
class ProductController extends Controller{
  public function productSale()
  {
      $category_id = $_POST['name'];
    $category_id = str_replace( array('#', '$', '%') , '', $category_id );
      $category_model = new Category();
      $categories = $category_model->getCategoryProduct();
      $product_model = new Product();
      $products = $product_model->ProductSale($category_id);
      $output = [
          "categories" => $categories,
          "products" => $products,
      ];
      $this->content=$this->render("Mvc/Frontend/views/home/home.php",$output);
      echo $this->content;

  }
    public function productcategory(){
        $id=$_GET["id"];
        $product_model=new Product();
        $category_model=new Category();
        $category=$category_model->getCategoryById($id);
        $products=$product_model->ProductCategory($id);
        $output=["products" => $products,
                "category" => $category
        ];
       $this->content=$this->render("Mvc/Frontend/views/products/productcategory.php",$output);
       require_once 'Mvc/Frontend/views/layouts/main.php';
    }
    public function SellingProducts(){
      $products_model=new Product();
      $products=$products_model->sellingProducts();
//      echo "<pre>";
//      print_r($products);
//      echo "</pre>";
//      die();
      $this->content=$this->render("Mvc/Frontend/views/products/SellingProduct.php",["products" => $products]);
      echo $this->content;
    }
    public function starProducts(){
      $products_model=new Product();
      $products=$products_model->starProducts();
//      echo "<pre>";
//      print_r($products);
//      echo "</pre>";
//      die();
      $this->content=$this->render("Mvc/Frontend/views/products/starProducts.php",["products" => $products]);
      echo $this->content;
    }

    public function hotProduct(){
        $product_model=new Product();
        $products=$product_model->hotProduct();
        $this->content=$this->render("Mvc/Frontend/views/products/hotproduct.php",["products" => $products]);
        echo $this->content;
    }
    public function NewsProduct(){
        $product_model=new Product();
        $products=$product_model->newProduct();
        $this->content=$this->render("Mvc/Frontend/views/products/newproduct.php",["products" => $products]);
        echo $this->content;
    }
    public function productproducer(){
        $id=$_GET["id"];
        $product_model=new Product();
        $producer_model=new Producer();
        $producer=$producer_model->getProducerById($id);
        $products=$product_model->ProductProducer($id);
        $output=["products" => $products,
            "producer" => $producer
        ];
        $this->content=$this->render("Mvc/Frontend/views/products/productproducer.php",$output);
        require_once 'Mvc/Frontend/views/layouts/main.php';
    }
    public function detail(){
        $id=$_GET["id"];
        $product_model=new Product();
        $product=$product_model->detailProduct($id);
        $product_images=$product_model->getImages($id);
        $rating_model=new Rating();
        $ratings=$rating_model->All_Rating($id);
        $this->content=$this->render("Mvc/Frontend/views/products/detailproduct.php",["product" => $product,
                                                                                          "product_images" =>$product_images,
                                                                                          'ratings' =>$ratings]);
        require_once "Mvc/Frontend/views/layouts/main.php";
    }
  public function detailModal(){
    $product_model=new Product();
    $products=$product_model->Modal();
    $product_images=$product_model->ImagesAll();
    $this->content=$this->render("Mvc/Frontend/views/products/modal.php",["products" => $products,
        "product_images" =>$product_images]);
   echo $this->content;
  }
    public function ProductNewsCenter(){
        $query="";
        $product_model=new Product();
        $products=$product_model->ProductNews_Center($query);
        $this->content=$this->render("Mvc/Frontend/views/products/productcategory.php",["products" => $products]);
        require_once 'Mvc/Frontend/views/layouts/main.php';
  }
  public function SellingproductCenter(){
      $products_model=new Product();
      $products=$products_model->starProducts();
      $this->content=$this->render("Mvc/Frontend/views/products/SellingproductCenter.php",["products" => $products]);
      echo $this->content;
  }
  public function searchProduct(){
      $id=isset($_POST['id']) ? $_POST['id'] : "";
      $query="";
      if (isset($_POST["price"])) {
          $price_filter = implode("','", $_POST["price"]);
          foreach ($_POST["price"] as $price)
          {
              switch ($price)
              {
                  case 0:
                      $query .= " OR (products.price < 1000000) ";
                      break;
                  case 1:
                      $query .= " OR (products.price BETWEEN 1000000 AND 5000000) ";
                      break;
                  case 2 :
                      $query .= " OR (products.price BETWEEN 5000000 AND 10000000) ";
                      break;
                  case 3 :
                      $query .= " OR (products.price BETWEEN 10000000 AND 20000000) ";
                      break;
                  case 4 :
                      $query .= " OR (products.price > 20000000) ";
                      break;
              }
          }
          $query=substr($query,3);
          $query="AND "."($query)";
      }
      if (isset($_POST["brand"])) {
          $brand_filter = implode("','", $_POST["brand"]);
          $query .= " AND products.producer_id IN('" . $brand_filter . "')";
      }
      if(empty($id)){
          $product_model=new Product();
          $products=$product_model->ProductNews_Center($query);
          $countProduct=$product_model->CountProductNews_Center($query);
          $output = ["products" => $products,'countProduct' =>$countProduct];
          $this->content = $this->render("Mvc/Frontend/views/products/search.php", $output);
          echo $this->content;
      }
      else{
          $product_model = new Product();
          $products = $product_model->ProductCategory($id,$query);
          $category_model=new Category();
          $category=$category_model->getCategoryById($id);
          $countProduct=$product_model->CountProduct($id,$query);
          $output = ["products" => $products,'category' => $category,'countProduct' =>$countProduct];
          $this->content = $this->render("Mvc/Frontend/views/products/search.php", $output);
          echo $this->content;
      }
  }
  public function searchProductName(){
    if(isset($_POST["search"])){
      $search=$_POST["search"];
      $product_model=new Product();
      $products=$product_model->search($search);
      $this->content = $this->render("Mvc/Frontend/views/products/searchName.php", ['products' =>$products]);
      echo $this->content;
    }

  }
}
