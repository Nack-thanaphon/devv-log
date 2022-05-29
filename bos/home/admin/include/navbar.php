<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">

        <div class="sidebar-brand-text text-left p-0 m-0 ">
            <strong class="p-0" style="font-size: 1.5rem;">MUGH</strong>
            <p class="p-0 m-0" style="font-size: 0.6rem;">E-MANAGEMENT SYSTEMS</p>
        </div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="./index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Website management
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item  active">
        <a class="nav-link collapsed " href="./news.php" aria-controls="collapseTwo">
            <i class="fas fa-rss-square"></i>
            <span>จัดการข่าวสาร</span>
        </a>
    </li>
    <li class="nav-item  active">
        <a class="nav-link collapsed " href="./banner.php" aria-controls="collapseTwo">
            <i class="fab fa-font-awesome-flag"></i>
            <span>จัดการแบนเนอร์</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link collapsed" href="./file.php" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-bookmark"></i>
            <span>จัดการดาวน์โหลด</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">File management:</h6>
                <a class="collapse-item" href="./file.php">จัดการเอกสาร</a>
                <a class="collapse-item" href="./file_group.php">จัดการประเภทเอกสาร</a>
                <a class="collapse-item" href="./file_type.php">จัดการชนิดเอกสาร</a>
            </div>
        </div>
    </li>

    <li class="nav-item active">
        <a class="nav-link collapsed" href="./activity.php" data-toggle="collapse" data-target="#activity" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-calendar-day"></i>
            <span>จัดการกิจกรรม</span>
        </a>
        <div id="activity" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Activity management:</h6>
                <a class="collapse-item" href="./activity.php">เพิ่ม-แก้ไข กิจกรรม</a>
                <a class="collapse-item" href="./activity_type.php">เพิ่มหัวข้อกิจกรรม</a>
                <a class="collapse-item" href="./activity_table.php">จัดการระบบกิจกรรม</a>

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Website-Panal
    </div>

    <li class="nav-item active">
        <a class="nav-link" href="./gallery.php">
            <i class="fas fa-fw fa-table"></i>
            <span>จัดการคลังภาพ</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="./newsletter.php">
            <i class="fas fa-envelope-open-text"></i>
            <span>จัดการ Newsletter</span></a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-book-open"></i>
            <span>คู่มือการใช้งาน</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>ออกจากระบบ</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>