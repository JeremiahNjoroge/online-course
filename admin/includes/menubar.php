<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class=""><a href="application_details.php"><span class="fa fa-address-book"></span> <span>Application Details</span></a></li>
      <li class="header">MANAGE</li>
      <li class=""><a href="applicants.php"><i class="fa fa-users"></i> <span>Applicants</span></a></li>
      <li class=""><a href="intakes.php"><i class="fa fa-tasks"></i> <span>Intakes</span></a></li>
      <li class=""><a href="courses.php"><i class="fa fa-black-tie"></i> <span>Courses</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<?php include 'config_modal.php'; ?>