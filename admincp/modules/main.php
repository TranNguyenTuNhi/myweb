<div class="clear"></div>
<div class="main">
    <?php
        // Kiểm tra xem cả 'action' và 'query' có được thiết lập không
        if (isset($_GET['action']) && isset($_GET['query'])) {
            $tam = $_GET['action'];
            $query = $_GET['query'];
        } else {
            $tam = '';
            $query = '';
        }

        // Kiểm tra điều kiện của 'action' và 'query'
        //quanlydanhmucsanpham
        if ($tam == 'quanlydanhmucsanpham' && $query == 'them') {
            include('modules/qldmsp/them.php');
            include('modules/qldmsp/lietke.php');
        } elseif ($tam == 'quanlydanhmucsanpham' && $query == 'sua') {
            include('modules/qldmsp/sua.php');
        
        //quanlysanpham
        } elseif ($tam == 'quanlysanpham' && $query == 'them') {
            include('modules/qlsp/them.php');
            include('modules/qlsp/lietke.php');
        } elseif ($tam == 'quanlysanpham' && $query == 'sua') {
            include('modules/qlsp/sua.php');
        }
        
        //quanlydonhang
        // elseif ($tam == 'quanlydonhang' && $query == 'xemdonhang') {
        //     include('modules/qldh/xemdonhang.php');
        // } elseif ($tam == 'quanlydonhang' && $query == 'xulydonhang') {
        //     include('modules/qldh/xulydonhang.php');
        // }
        else {
            include('modules/dashboard.php');
        }
    ?>
</div>
