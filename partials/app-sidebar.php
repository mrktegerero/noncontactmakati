<div class="dashboard_sidebar" id="dashboard_sidebar">
            <h3 class="dashboard_logo" id="dashboard_logo">Makati</h3>
            <div class="dashboard_sidebar_user">
            
                <img src="assets/img/icon.png" alt="User image." id="userImage">
                <span><?= $admin['name']?></span>
            </div>
            <div class="dashboard_sidebar_menus" id="dashboard_sidebar_menus">
                <ul class="dashboard_menu_lists" id="dashboard_menu_lists">
                <!-- class="menuActive" -->
                    <li ><a href="./dashboard.php" id="link"><i class="fa fa-dashboard "></i> <span class="menuText">Dashboard</span></a></li>
                    <li ><a href="./users-add.php" id="link"><i class="fa fa-user-plus"></i> <span class="menuText">Add Violation</span></a></li>
                    <li ><a href="./disputereq.php" id="link"><i class="fa fa-envelope"></i> <span class="menuText">Dispute Requests</span></a></li>
                    <li ><a href="./paymentsreq.php" id="link"><i class="fas fa-money-bill"></i> <span class="menuText">Payments</span></a></li>
                    <li ><a href="./change-pass.php" id="link"><i class="fas fa-cog"></i> <span class="menuText">Settings</span></a></li>
                </ul>
            </div>
        </div>