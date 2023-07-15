<?php
$_nav = array(
    array(
        "names" => "Home",
        "href" => "",
        "url" => "home.php",
        "icons" => "fa fa-bullhorn"
    ),
    array(
        "class" => "menu-title",
        "names" => "Monitoring"
    ), array(
        "names" => "DAT",
        "href" => "monitor-dat",
        "url" => "pages/monitors/dat.php",
        "icons" => "fa fa-suitcase"
    ), array(
        "names" => "Printer",
        "href" => "monitor-printer",
        "url" => "pages/monitors/printer.php",
        "icons" => "fa fa-bath"
    ), array(
        "names" => "Chip Mouter",
        "href" => "monitor-chip-mouter",
        "url" => "pages/monitors/chip.php",
        "icons" => "fa fa-train"
    ),
    array(
        "class" => "submenu",
        "names" => "Nhiệt độ - Độ ẩm",
        "icons" => "fa fa-tv",
        "items" => array(
            array(
                "names" => "Xưởng",
                "href" => "monitors-nhietdo-doam-xuong",
                "url" => "pages/monitors/nhietdo-doam-xuong.php",
            ), array(
                "names" => "Tủ bảo quản LKĐT",
                "href" => "monitors-nhietdo-doam-tu-lkdt",
                "url" => "pages/monitors/nhietdo-doam-tu-lkdt.php",
            ),
        )
    ), array(
        "names" => "Reflow",
        "href" => "monitor-reflow",
        "url" => "pages/monitors/reflow.php",
        "icons" => "fa fa-rocket"
    ),
    array(
        "class" => "menu-title",
        "names" => "Equipment Report"
    ), array(
        "names" => "Báo cáo hàng ngày",
        "href" => "eq-report-daily",
        "url" => "pages/EQ Report/daily.php",
        "icons" => "fa fa-book"
    ), array(
        "names" => "Sự cố bất thường",
        "href" => "eq-report-troubleshooting",
        "url" => "pages/EQ Report/troubleshooting.php",
        "icons" => "fa fa-bug"
    ),
);
?>



<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <?php
                foreach ($_nav as $nav) {
                    if (isset($nav["class"])) {
                        if ($nav["class"] == "menu-title") {
                            echo '<li class="menu-title"> <span>' . $nav['names'] . '</span> </li>';
                        } elseif ($nav["class"] == "submenu") {
                            echo '<li className="submenu">';
                            echo '<a class="navsub"><i class="' . $nav['icons'] . '"></i><span>' . $nav['names'] . '</span><span class="menu-arrow"></span></a><ul>';
                            foreach ($nav['items'] as $sb) {
                                echo '<li><a href="' . $_DOMAIN . $sb['href'] . '">' . $sb['names'] . '</a></li >';
                            }
                            echo '</ul></li>';
                        }
                    } else {
                        echo '<li> <a href="' . $_DOMAIN . $nav['href'] . '"> <i class="' . $nav['icons'] . '"></i><span>' . $nav['names'] . '</span></a></li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>