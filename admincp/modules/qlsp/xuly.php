<?php
include('../../config/config.php');

// Lấy dữ liệu từ biểu mẫu POST
$tensp = $_POST['tensp'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$soluong = $_POST['soluong'];
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time() . '_' . $hinhanh;
$mota = $_POST['mota'];
$chitiet = $_POST['chitiet'];
$tinhtrang = $_POST['tinhtrang'];
$id_danhmuc = $_POST['danhmuc'];

// Kiểm tra nút được nhấn trên biểu mẫu
if (isset($_POST['themsanpham'])) {
    // Nếu nút "Thêm sanpham" được nhấn
    $sql_them = "INSERT INTO tbl_sanpham(tensp, masp,giasp, soluong, hinhanh, mota, chitiet, tinhtrang,id_danhmuc) 
    VALUES ('$tensp', '$masp', '$giasp', '$soluong', '$hinhanh', '$mota', '$chitiet', '$tinhtrang', '$id_danhmuc')"; // Thêm vào CSDL
    mysqli_query($mysqli, $sql_them); // Kết nối CSDL
    move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh); // Di chuyển hình ảnh vào thư mục uploads  
    header('Location:../../index.php?action=quanlysanpham&query=them');
} elseif (isset($_POST['suasanpham'])) {
    if ($hinhanh != '') {
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh); // Di chuyển hình ảnh vào thư mục uploads

        $sql_update = "UPDATE tbl_sanpham SET tensp='$tensp', masp='$masp', giasp='$giasp', soluong='$soluong', hinhanh='$hinhanh', 
            mota='$mota', chitiet='$chitiet', tinhtrang='$tinhtrang',id_danhmuc='$id_danhmuc' WHERE id_sanpham='$_GET[idsanpham]'";

        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]'LIMIT 1 ";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {// xóa hình ảnh cũ
            unlink('uploads/' . $row['hinhanh']);
        }
        

    } else {
        $sql_update = "UPDATE tbl_sanpham SET tensp='$tensp', masp='$masp', giasp='$giasp', soluong='$soluong',  
            mota='$mota', chitiet='$chitiet', tinhtrang='$tinhtrang',id_danhmuc='$id_danhmuc' WHERE id_sanpham='$_GET[idsanpham]'";
 // Sửa vào CSDL
    }
    // Nếu nút "Sửa sanpham" được nhấn
    // $iddanhmuc = $_GET['idsanpham']; // Lấy ID sanpham từ tham số trên URL
    // $sql_update = "UPDATE tbl_sanpham SET tensp='$tensp', masp='$masp', giasp='$giasp', soluong='$soluong', hinhanh='$hinhanh', 
    // mota='$mota', chitiet='$chitiet', tinhtrang='$tinhtrang' WHERE id_sanpham='$_GET[idsanpham]'"; // Sửa vào CSDL
    mysqli_query($mysqli, $sql_update); // Kết nối CSDL
    header('Location:../../index.php?action=quanlysanpham&query=them');
} else {
    $id = $_GET['idsanpham']; // Lấy ID sanpham từ tham số trên URL
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id'LIMIT 1 ";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham = '$id'"; // Xóa vào CSDL
    mysqli_query($mysqli, $sql_xoa); // Kết nối CSDL
    header('Location:../../index.php?action=quanlysanpham&query=them');
}
