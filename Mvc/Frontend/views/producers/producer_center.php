<div class="widget_list">
    <h2>Danh sách Thương hiệu </h2>
    <ul>
        <?php foreach ($producers as $producer): ?>
            <label class="producers"> <?php echo $producer['name']; ?>
                <input type="checkbox" value="<?php echo $producer['id']; ?>" name="producer[]"
                       class="common_selector brand">
                <span class="w3docs"></span>
            </label>
        <?php endforeach; ?>
    </ul>
</div>
<div class="widget_list">
    <h2>Tìm kiếm theo khoảng giá</h2>
    <ul>
        <label class="producers"> Dưới 1.000.000đ
            <input type="checkbox" value="0" name="price[]" class="common_selector price">
            <span class="w3docs"></span>
        </label>
        <label class="producers"> Từ 1.0000.000đ - 3.000.000đ
            <input type="checkbox" value="1" name="price[]" class="common_selector price">
            <span class="w3docs"></span>
        </label>
        <label class="producers"> Từ 5.000.000đ - 10.000.000đ
            <input type="checkbox" value="2" name="price[]" class="common_selector price">
            <span class="w3docs"></span>
        </label>
        <label class="producers"> Từ 10.000.000đ - 20.000.000đ
            <input type="checkbox" value="3" name="price[]" class="common_selector price">
            <span class="w3docs"></span>
        </label>
        <label class="producers"> Trên 20.000.000đ
            <input type="checkbox" value="4" name="price[]" class="common_selector price">
            <span class="w3docs"></span>
        </label>
    </ul>
</div>
