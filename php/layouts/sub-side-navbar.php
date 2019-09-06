<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion shadow-lg" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="userdashboard.php">
  <div class="sidebar-brand-icon rotate-n-15">
    V
  </div>
  <div class="sidebar-brand-text mx-3">Vision Media <sup>Services</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="userdashboard.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>V</span> <sub><?= $location ?></sub></a>
</li>
<hr class="sidebar-divider my-0">
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="#" id="SubStaffPageLoad">
    <i class="fas fa-fw fa-table"></i>
    <span>Create Profile</span></a>
</li>

<li class="nav-item">
    <!-- <a class="nav-link" href="#" id="SubStaffViewLoad"> -->
    <a class="nav-link" href="../php/subStaffViewProfile.php">
    <i class="fas fa-fw fa-table"></i>
    <span>View Profile</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="#" id="SubStaffEditLoad">
    <i class="fas fa-fw fa-table"></i>
    <span>Edit Profile</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="../appraisal" id="AppraisalFormBtn">
    <i class="fas fa-fw fa-table"></i>
    <span>Appraisal Form</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="../appraisal/viewappraisal.php" id="ViewAppraisalFormBtn">
    <i class="fas fa-fw fa-table"></i>
    <span>View Appraisal</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
