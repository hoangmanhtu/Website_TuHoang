<section class="content-header" style="margin-bottom: 15px;">
  <h1>
    <?php echo $product['title'] ?>
    <?php
    $rating=0;
    if($product["total_rating"] > 0)
    {
      $rating=round($product["total_number_rating"]/ $product["total_rating"],2);
    }
    ?>
    <?php for($i=1;$i<=5;$i++): ?>
      <li style="display: inline-block;list-style: none"><a href=""><i class="fa fa-star <?php if( $i <= $rating) echo "icon-star"; else  echo "" ?>"></i></a></li>
    <?php endfor; ?>
    <small>
      <?php if(!empty($product['total_rating'])): ?>
      <?php echo $rating; ?>/5 <i class="fa fa-star"></i>
      <?php endif; ?>
    </small>
  </h1>
<!--  <ol class="breadcrumb">-->
<!--    <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>-->
<!--    <li><a href="index.php?area=backend&controller=product"><i class="fa fa-address-book"></i>Sản phẩm</a></li>-->
<!--    <li class="active"> <i class="fa fa-address-book"></i>  Danh sách bình luận</li>-->
<!--  </ol>-->
</section>

<div id="order_table_text">
  <div class="box">
    <div class="box-body table-responsive no-padding ">
      <table class="table table-bordered">
        <tr>
          <th  style="text-align: center;">Người đánh giá</th>
          <th style="text-align: center;width: 15%">Nội dung đánh giá</th>
          <th style="text-align: center">Số sao đánh giá</th>
          <th style="text-align: center">Ngày đánh giá</th>
<!--          <th style="text-align: center;">Chức năng</th>-->
        </tr >
        <?php if(!empty($ratings)): ?>
          <?php foreach ($ratings as $rating): ?>
            <tr style="text-align: center">
              <td> <?php echo $rating["name"]; ?></td>
              <!--                -->
              <td>
                <?php echo $rating['content']; ?>
              </td>

              <td>
                <ul style="margin: 0px;padding: 0px;">
                  <?php for($i=1;$i<=5;$i++): ?>
                    <li><i style="font-size: 18px;" class="fa fa-star <?php if( $i <= $rating["number"]) echo "icon-star"; else  echo "" ?>"></i></a></li>
                  <?php endfor; ?>
                </ul>
              </td>
              <td><?php echo date('d/m/Y - H:i:s', strtotime($rating['created_at'])); ?></td>
              <!--              -->
<!--              <td style="text-align: center">-->
<!---->
<!--                --><?php //if(!$_SESSION["user_admin"]['quyen'] !=1): ?>
<!--                  <a  style="margin-right: 10px;"-->
<!--                      href="index.php?area=backend&controller=product&action=Ratingdelete&id=--><?php //echo $rating['id']?><!--"-->
<!--                      onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này')">-->
<!--                    <i class="fa fa-trash"></i>-->
<!--                  </a>-->
<!--                --><?php //endif; ?>
<!--              </td>-->
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="8">Không có đánh giá nào của sản phẩm này</td>
          </tr>
        <?php endif; ?>
      </table>
      <a href="index.php?area=backend&controller=product" style="margin: 10px" class="btn btn-primary">Danh sách sản phẩm</a>
    </div>
  </div>
</div>

