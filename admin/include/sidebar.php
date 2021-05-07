    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="../dist/img/dycilogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-">STRAND DSS</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../dist/img/user3-128x128.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <!-- school -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-school"></i>
                <p>
                  School
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">6</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="school_details.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="school_facilitator.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Facilitator</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="school_students.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Students</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- school -->
            <!-- Exam -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                  Examination
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">6</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="exam_examination.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Examination</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="exam_category.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Categories</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="boxed" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Exam Results</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- exam -->

            <!-- Settings -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Settings
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">6</span>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <?php
                if ($_SESSION['role'] == 'Super Admin') { ?>

                  <li class="nav-item">
                    <a href="settings_account.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Account</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="boxed" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Maintenance</p>
                    </a>
                  </li>

                <?php
                }

                ?>
                <li class="nav-item">
                  <a href="settings_audit.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Audit Trail</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="settings_update_acc.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Update Account</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Settings -->

            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>