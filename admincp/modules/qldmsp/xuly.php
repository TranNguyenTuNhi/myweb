<?php
include('../../config/config.php');

// Lấy dữ liệu từ biểu mẫu POST
$tendanhmuc = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];

// Kiểm tra nút được nhấn trên biểu mẫu
if (isset($_POST['themdanhmuc'])) {
    // Nếu nút "Thêm danh mục" được nhấn
    $sql_them = "INSERT INTO tbl_danhmuc(tendanhmuc, thutu) VALUES ('$tendanhmuc', '$thutu')"; // Thêm vào CSDL
    mysqli_query($mysqli, $sql_them); // Kết nối CSDL
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
} elseif (isset($_POST['suadanhmuc'])) {
    // Nếu nút "Sửa danh mục" được nhấn
    $iddanhmuc = $_GET['iddanhmuc']; // Lấy ID danh mục từ tham số trên URL
    $sql_update = "UPDATE tbl_danhmuc SET tendanhmuc='$tendanhmuc', thutu='$thutu' WHERE id_danhmuc='$iddanhmuc'"; // Sửa vào CSDL
    mysqli_query($mysqli, $sql_update); // Kết nối CSDL
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
} else {
    // Nếu không có nút nào được nhấn, giả sử là nút "Xóa danh mục"
    $id = $_GET['iddanhmuc']; // Lấy ID danh mục từ tham số trên URL
    $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc = '$id'"; // Xóa vào CSDL
    mysqli_query($mysqli, $sql_xoa); // Kết nối CSDL
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}
?>
