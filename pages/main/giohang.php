<p>Gio hang</p>
<?php
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    echo '<form method="POST" action="pages/main/giohang.php">';
    echo '<table width="100%" border="1">';
    echo '<tr>';
    echo '<td>Tên sản phẩm</td>';
    echo '<td>Ảnh sản phẩm</td>';
    echo '<td>Giá sản phẩm</td>';
    echo '<td>Số lượng</td>';
    echo '<td>Tổng tiền</td>';
    echo '<td>Quản lý</td>';
    echo '</tr>';
    $tongtien = 0;
    foreach ($_SESSION['cart'] as $cart_itm) {
        echo '<tr>';
        echo '<td>' . $cart_itm['tensp'] . '</td>';
        echo '<td><img width="100px" src="admincp/modules/qlsp/uploads/' . $cart_itm['hinhanh'] . '"></td>';
        echo '<td>' . number_format($cart_itm['giasp'], 0, ',', '.') . 'vnd</td>';
        echo '<td><input type="text" name="soluong[' . $cart_itm['id_sanpham'] . ']" value="' . $cart_itm['soluong'] . '" size="5"></td>';
        echo '<td>' . number_format($cart_itm['giasp'] * $cart_itm['soluong'], 0, ',', '.') . 'vnd</td>';
        echo '<td><a href="pages/main/giohang.php?xoa=' . $cart_itm['id_sanpham'] . '">Xóa</a></td>';
        echo '</tr>';
        $tongtien += $cart_itm['giasp'] * $cart_itm['soluong'];
    }
    echo '<tr>';
    echo '<td colspan="5">Tổng tiền</td>';
    echo '<td>' . number_format($tongtien, 0, ',', '.') . 'vnd</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td colspan="6"><input type="submit" name="capnhatgiohang" value="Cập nhật giỏ hàng"></td>';
    echo '</tr>';
    echo '</table>';
    echo '</form>';
} else {
    echo 'Giỏ hàng trống';
}
?>