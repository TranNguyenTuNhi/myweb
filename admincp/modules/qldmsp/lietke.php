 <?php
    $sql_liekte_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
    $query_liekte_danhmucsp = mysqli_query($mysqli, $sql_liekte_danhmucsp);
?>
 <p>Liệt kê danh mục sản phẩm</p>
 <table width="100%" border="1" style="border-collapse: collapse;">
     <tr>
         <td>Id</td>
         <td>Tên danh mục</td>
         <td>Quản lý</td>
     </tr>
     <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_liekte_danhmucsp)) { //lay du lieu tu csdl
            $i++;
        ?>
         <tr>
             <td><?php echo $i ?></td>
             <td><?php echo $row['tendanhmuc'] ?></td>
             <td>
                <a href="modules/qldmsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xóa</a> |
                <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a>

             </td>
         </tr>
     <?php
        }
        ?>
 </table>