<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('../../admincp/config/config.php');

// Thêm sản phẩm vào giỏ hàng
if (isset($_POST['themgiohang'])) {
    $id = $_GET['id'];
    $soluong = 1;
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    if ($query && mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);
        $new_product = array(
            'tensp' => $row['tensp'],
            'id_sanpham' => $id,
            'soluong' => $soluong,
            'giasp' => $row['giasp']
        );

        if (isset($_SESSION['cart'])) {
            $found = false;
            foreach ($_SESSION['cart'] as &$cart_itm) {
                if ($cart_itm['id_sanpham'] == $id) {
                    $cart_itm['soluong'] += $soluong;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $_SESSION['cart'][] = $new_product;
            }
        } else {
            $_SESSION['cart'] = array($new_product);
        }
    }
    header('Location: ../../index.php?quanly=giohang');
    exit();
}

// Xóa sản phẩm khỏi giỏ hàng
if (isset($_GET['xoa'])) {
    $xoa_id = $_GET['xoa'];
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $cart_itm) {
            if ($cart_itm['id_sanpham'] == $xoa_id) {
                unset($_SESSION['cart'][$key]);
            }
        }
    }
    header('Location: ../../index.php?quanly=giohang');
    exit();
}

// Cập nhật giỏ hàng
if (isset($_POST['capnhatgiohang'])) {
    if (!empty($_SESSION['cart'])) {
        foreach ($_POST['soluong'] as $id => $soluong) {
            if ($soluong <= 0) {
                unset($_SESSION['cart'][$id]);
            } else {
                $_SESSION['cart'][$id]['soluong'] = $soluong;
            }
        }
    }
    header('Location: ../../index.php?quanly=giohang');
    exit();
}
?>