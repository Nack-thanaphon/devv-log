<!-- Nav Item - Search Dropdown (Visible Only XS) -->


<!-- Nav Item - Messages -->
<li class="nav-item dropdown no-arrow mx-1">
    <a href="https://aun-hpn.or.th" target="_blank" class="nav-link dropdown-toggle">

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
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <input type="hidden" id="profile_id" value="<?php echo $_SESSION['user']['salt'] ?>">
            </div>
        </div>
        <div class="col-12 px-3 p-0 m-0">
            <img class="img-profile rounded-circle" id="profile_top" src="">
            <!-- <img src="                           alt="..." class="img-circle profile-img"> -->
        </div>
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <!-- <a class="dropdown-item" id="profile" href="#" data-toggle="modal">
   
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
        </a> -->

        <a class="dropdown-item" id="" href="./user_profile.php?salt=<?php echo $_SESSION['user']['salt'] ?>">
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

<script>
    $(document).ready(function() {

        var salt = $("#profile_id").val()
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "../../services/User/update.php",
            data: {
                salt: salt,
            },
            success: function(data) {
                data = data.result;


                $('#profile_top').attr('src', '../../uploads/profile/' + data[0].image + '');


            },
            error: function(err) {
                console.log("bad", err)

            }
        })
    })
</script>