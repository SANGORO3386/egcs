 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">EGCS <sup>Admin</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-fw fa-user"></i>
        <span>Students</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Students:</h6>
            <a class="collapse-item" href="addStudent.php">New Student</a>
            <a class="collapse-item" href="viewStudent.php">View Student</a>
            <a class="collapse-item" href="updateStudent.php">Update Student</a>
            <a class="collapse-item" href="deleteStudent.php">Delete Student</a>
        </div>
    </div>
</li>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-book"></i>
        <span>Teachers</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Teachers:</h6>
            <a class="collapse-item" href="addTeacher.php">New Teacher</a>
            <a class="collapse-item" href="viewTeacher.php">View Teacher</a>
            <a class="collapse-item" href="updateTeacher.php">Update Teacher</a>
            <a class="collapse-item" href="deleteTeacher.php">Delete Teacher</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
        <i class="fas fa-fw fa-info-circle"></i>
        <span>Parents</span>
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Parents:</h6>
            <a class="collapse-item" href="addParent.php">New Parent</a>
            <a class="collapse-item" href="viewParent.php">View Parent</a>
            <a class="collapse-item" href="updateParent.php">Update Parent</a>
            <a class="collapse-item" href="deleteParent.php">Delete Parent</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
        <i class="fas fa-fw fa-book"></i>
        <span>Staffs</span>
    </a>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Staffs:</h6>
            <a class="collapse-item" href="addStaff.php">New Staff</a>
            <a class="collapse-item" href="viewStaff.php">View Staff</a>
            <a class="collapse-item" href="updateStaff.php">Update Staff</a>
            <a class="collapse-item" href="deleteStaff.php">Delete Staff</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
        <i class="fas fa-fw fa-info-circle"></i>
        <span>Course</span>
    </a>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Courses:</h6>
            <a class="collapse-item" href="addCourse.php">New Course</a>
            <a class="collapse-item" href="viewCourse.php">View Course</a>
            <a class="collapse-item" href="updateCourse.php">Update Course</a>
            <a class="collapse-item" href="deleteCourse.php">Delete Course</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
        <i class="fas fa-fw fa-info-circle"></i>
        <span>Attendance</span>
    </a>
    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Attendances:</h6>
            <a class="collapse-item" href="teacherAttendance.php">Teacher Attendance</a>
            <a class="collapse-item" href="staffAttendance.php">Staff Attendance</a>
            <a class="collapse-item" href="viewAttendance.php">View Attendance</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
        <i class="fas fa-fw fa-info-circle"></i>
        <span>Exam Schedule</span>
    </a>
    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Exams:</h6>
            <a class="collapse-item" href="createExamSchedule.php">Create Exam Schedule</a>
            <a class="collapse-item" href="viewExamSchedule.php">View Exam Schedule</a>
            <a class="collapse-item" href="updateExamSchedule.php">Update Exam Schedule</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
        <i class="fas fa-fw fa-info-circle"></i>
        <span>Salary</span>
    </a>
    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Salaries:</h6>
            <a class="collapse-item" href="updateTeacherSalary.php">Update Teacher Salary</a>
            <a class="collapse-item" href="updateStaffSalary.php">Update Staff Salary</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="report.php">
        <i class="fas fa-fw fa-edit"></i>
        <span>Report</span></a>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
        <i class="fas fa-fw fa-info-circle"></i>
        <span>Payment</span>
    </a>
    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Payments:</h6>
            <a class="collapse-item" href="addPayment.php">Add Payment</a>
            <a class="collapse-item" href="deletePayment.php">Delete Payment</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Addons
</div>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="change_password.php">
        <i class="fas fa-fw fa-edit"></i>
        <span>Change Password</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="settings.php">
        <i class="fas fa-fw fa-cog"></i>
        <span>Email Notification Settings</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
