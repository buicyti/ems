<div class="header">

    <div class="header-left">
        <a href="<?php echo $_DOMAIN; ?>" class="logo">
            <img src="<?php echo $_DOMAIN; ?>assets/images/logo/logo_for_light.svg" alt="Logo" width="200" height="32">
        </a>
        <a href="<?php echo $_DOMAIN; ?>" class="logo logo-small">
            <img src="<?php echo $_DOMAIN; ?>assets/images/logo/default-small.svg" alt="Logo" width="30" height="30">
        </a>
    </div>
    <div class="menu-toggle">
        <p id="toggle_btn">
            <i class="fas fa-bars"></i>
        </p>
    </div>

    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>

    <ul class="nav user-menu">
        <li class="nav-item me-2">
            <span class="dropdown-toggle nav-link header-nav-list">
                <i class="feather-camera"></i>
            </span>
        </li>

        <li class="nav-item zoom-screen me-2">
            <span class="nav-link header-nav-list win-maximize">
                <i class="feather-maximize"></i>
            </span>
        </li>

        <li class="nav-item dropdown has-arrow new-user-menus">
            <span class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img class="rounded-circle" src="<?php if (!file_exists('assets/images/avatars/' . $data_user["anh_dai_dien"])) echo $_DOMAIN . 'assets/images/user-profile.png';
                                                        else echo $_DOMAIN . 'assets/images/avatars/' . $data_user["anh_dai_dien"]; ?>" width="31" alt="<?php echo $data_user['name_employee']; ?>">
                    <div class="user-text">
                        <h6><?php echo $data_user['name_employee']; ?></h6>
                        <p class="text-muted mb-0"><?php echo $data_user['chuc_danh']; ?></p>
                    </div>
                </span>
            </span>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="profile.html"><i class="fa fa-book"></i> &nbsp; My Profile</a>
                <a class="dropdown-item" href="inbox.html"><i class="fa fa-envelope"></i> &nbsp; Inbox</a>
                <a class="dropdown-item" href="pages/authentication/logout.php"><i class="fa fa-times-circle"></i> &nbsp; Đăng xuất</a>
            </div>
        </li>

    </ul>

</div>