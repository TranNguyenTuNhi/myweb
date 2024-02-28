<?php
    $sql_liekte_sp = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
    $query_liekte_sp = mysqli_query($mysqli, $sql_liekte_sp);
    if (!$query_liekte_sp) {
        die("Lỗi truy vấn: " . mysqli_error($mysqli));
    }
?>
<p>Liệt kê sản phẩm</p>
<table width="100%" border="1" style="border-collapse: collapse;">
    <tr>
        <td>Id</td>
        <td>Tên sản phẩm</td>
        <td>Mã SP</td>
        <td>Hình ảnh</td>
        <td>Giá sản phẩm</td>        
        <td>Số lượng</td>
        <td>Danh mục</td>
        <td>Mô tả</td>
        <td>Trạng thái</td>
        <td>Quản lý</td>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_liekte_sp)) { // Sử dụng mysqli_fetch_assoc để lấy dữ liệu theo tên cột
        $i++;
    ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['tensp'] ?></td> <!-- Đã sửa lại tên cột tương ứng -->
            <td><?php echo $row['masp'] ?></td>
            <td><img src = "modules/qlsp/uploads/<?php echo $row['hinhanh'] ?>"width = "150px"></td>
            <td><?php echo $row['giasp'] ?></td>
            <td><?php echo $row['soluong'] ?></td>
            <td><?php echo $row['tendanhmuc'] ?></td>
            <td><?php echo $row['mota'] ?></td>
            <td><?php echo ($row['tinhtrang'] == 1) ? 'Kích hoạt' : 'Ẩn'; ?></td>
            <td>
                <a href="modules/qlsp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a> |
                <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
