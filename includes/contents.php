<script src="<?php echo $_DOMAIN; ?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<div class="page-wrapper">
    <div class="content container-fluid">

        <?php
        // Lấy tham số tab / tham số sau dấu "/" đầu tiên
        if (isset($_GET['tab'])) $tab = trim(addslashes(htmlspecialchars($_GET['tab'])));
        else $tab = '';


        // Nếu có tham số tab
        if ($tab != '') {
            $count = 0;
            foreach ($_nav as $nav) {
                if (isset($nav['href'])) { //lọc các nav có đường dẫn
                    if ($tab == $nav['href']) { //kiểm tra biến tab với đường dẫn
                        if (file_exists($nav['url'])) include_once $nav['url'];
                        else include_once 'pages/authentication/404.php';
                        $count++;
                        break;
                    }
                } else if (isset($nav['items'])) { //lọc các nav có thư mục con
                    foreach ($nav['items'] as $item) {
                        if ($tab == $item['href']) {
                            if (file_exists($item['url'])) include_once $item['url'];
                            else include_once 'pages/authentication/404.php';
                            $count++;
                            break;
                        }
                    }
                }
            }
            if ($count == 0)
                include_once 'pages/authentication/404.php';
        }
        // Ngược lại không có tham số tab
        else {
            // Hiển thị template bảng điều khiển
            include_once 'home.php';
        }
        ?>
    </div>
    <footer>
        <p>Copyright © 2022 Dreamguys.</p>
    </footer>
</div>