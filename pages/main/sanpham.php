<p>Chi tiet san pham</p>
<?php
$sql_chitiet = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
    AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
    <div class=wapper_chitiet">

        <div class="hinhanh_sanpham">
            <img width="90%" src="admincp/modules/qlsp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
        </div>

        <form method="POST" action="pages/main/themgiohang.php?id=<?php echo $row_chitiet['id_sanpham'] ?>
        <div class="chitiet_sanpham">
            <h3 style="margin:0">Tên sản phẩm: <?php echo $row_chitiet['tensp'] ?></h3>
            <p>Mã sản phẩm: <?php echo $row_chitiet['masp'] ?></p>
            <p>Giá: <?php echo number_format($row_chitiet['giasp'], 0, ',', '.') . 'vnd' ?></p>
            <p>Số lượng: <?php echo $row_chitiet['soluong'] ?></p>
            <p>Danh mục: <?php echo $row_chitiet['tendanhmuc'] ?></p>
            <p>Chi tiết sản phẩm: <?php echo $row_chitiet['chitiet'] ?></p>
            <p><input class="themgh" name="themgiohang" type="submit" value="Thêm vào giỏ hàng"></p>

        </div>
    </form>
    </div>
<?php
}
?>