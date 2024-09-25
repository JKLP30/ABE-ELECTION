    <div id="wrapper">
        <div class="overlay"></div>
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="home.php">
                        <img class="img-responsive" src="assets/img/logo.png">
                    </a>
                </li>
                <li>
                    <a href="home.php"><i class="fa fa-fw fa-home"></i> Home</a>
                </li>
                <?php if($_SESSION['user_level'] == 1): ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-plus"></i> Professors <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Professors Profiles</li>
                    <li><a href="v_prof.php">List of Professor</a></li>
                    <li><a href="add-prof.php">Add Professor</a></li>
                    <li><a href="archieve-prof.php">Archieve Professor</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-plus"></i> User Manager <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">User Manager Profile</li>
                    <li><a href="users.php">List of Users</a></li>
                    <li><a href="admin_list.php">List of Admin user</a></li>
                    <li><a href="add-user.php">Add User</a></li>
                    <li><a href="add-admin.php">Add Admin</a></li>
                    <li><a href="archieve-user.php">Archieve User</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-plus"></i> Announcement <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">List of Announcement</li>
                    <li><a href="announcement.php">Announcements</a></li>
                    <li><a href="add-announcement.php">Add Announcement</a></li>
                    <li><a href="archieve-announcement.php">Archieve Announcement</a></li>
                  </ul>
                </li>
                 <li>
                <a href="evaluate.php"><i class="fa fa-users"></i> Evaluate Results</a>
                </li>
                <li>
                    <a href="report.php"><i class="fa fa-fw fa-print"></i> Current Evaluation</a>
                </li>
                <li>
                    <a href="old_report.php"><i class="fa fa-fw fa-print"></i> Previous Evaluation</a>
                </li>
                <?php endif; ?>
                <?php if($_SESSION['user_level'] == 2): ?>
                <li>
                    <a href="evaluate-form.php"><i class="fa fa-users"></i> Evaluate</a>
                </li>
                <?php endif; ?>
                <li>
                    <form name="form1" method="post" action="process.php">
                        <input name="btnLogout" type="submit" class="btn btn-info pull-right" id="btnLogout" value="Logout">
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
          </button>