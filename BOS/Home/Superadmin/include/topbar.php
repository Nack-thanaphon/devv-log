<!-- Nav Item - Search Dropdown (Visible Only XS) -->
<li class="nav-item dropdown no-arrow d-sm-none">
    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search fa-fw"></i>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
        <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</li>


<!-- Nav Item - Messages -->
<li class="nav-item dropdown no-arrow mx-1">
    <a href="https://mugh.or.th" target="_blank" class="nav-link dropdown-toggle">

        <i class="fas fa-home fa-fw mx-auto "></i>
        <span class="pl-2 p-0 m-0 d-none d-sm-block">กลับสู่หน้าเว็บไซต์</span>

    </a>
</li>
<!-- <li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>
         Counter - Messages -->
<span class="badge badge-danger badge-counter"></span>
</a>

<div class="topbar-divider d-none d-sm-block"></div>

<!-- Nav Item - User Information -->
<li class="nav-item dropdown no-arrow align-self-left">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <div class="row p-0 m-0">
            <div class="col-12 p-0 m-0">
                <span class=" d-none d-lg-inline text-gray-600 small">
                    <?php echo $_SESSION['user']['full_name'] ?>
                </span>
            </div>
            <div class="col-12 p-0 m-0">
                <span class="badge badge-pill badge-primary">
                    <?php echo $_SESSION['user']['user_position'] ?>
                </span>
            </div>
        </div>
        <div class="col-12 px-3 p-0 m-0">

            <img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg">
        </div>
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
        </a>
        <a class="dropdown-item" href="./user_profile.php">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Settings
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
        </a>
    </div>
</li>