<?php
    // Lấy id danh mục từ URL
    $id_danhmuc = $_GET['id'];

    // Truy vấn để lấy các sản phẩm của danh mục
    $sql_pro = "SELECT * FROM tbl_sanpham WHERE id_danhmuc = '$id_danhmuc' ORDER BY id_sanpham DESC";
    $query_pro = mysqli_query($mysqli, $sql_pro);

    // Truy vấn để lấy thông tin của danh mục
    $sql_category = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc = '$id_danhmuc' LIMIT 1";
    $query_category = mysqli_query($mysqli, $sql_category);
    $row_title = mysqli_fetch_array($query_category);
?>
<h3> Danh mục sản phẩm:  <?php echo $row_title['tendanhmuc']?></h3>
<ul class="product_list">
    <?php
    while ($row_pro = mysqli_fetch_array($query_pro)) {
    ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']?>">
                <img src="admincp/modules/qlsp/uploads/<?php echo $row_pro['hinhanh']?>" alt="<?php echo $row_pro['tensp']?>">
                <p class="title_product">Tên sản phẩm: <?php echo $row_pro['tensp']?></p>
                <p class="price_procduct">Giá: <?php echo number_format($row_pro['giasp'],0,',','.').'vnd' ?></p>
            </a>
        </li>
    <?php
    }
    ?>
</ul>


