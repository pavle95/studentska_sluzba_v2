<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Student service</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="index.php">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                <a class="nav-link" href="users.php">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="nav-link-text">Users</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="subjects.php">
                    <i class="fa fa-fw fa-book"></i>
                    <span class="nav-link-text">Subjects</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link" href="professors.php">
                    <i class="fa fa-fw fa-suitcase"></i>
                    <span class="nav-link-text">Professors</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link" href="students.php">
                    <i class="fa fa-fw fa-graduation-cap"></i>
                    <span class="nav-link-text">Students</span>
                </a>
            </li>
            <br>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                    <span class="nav-link-text">Add database entries</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                    <li>
                        <a class="nav-link" href="add-user.php">
                            <i class="fa fa-fw fa-plus-circle"></i>
                            <span class="nav-link-text">Admin</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="add-subject.php">
                            <i class="fa fa-fw fa-plus-circle"></i>
                            <span class="nav-link-text">Subjects</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="add-professor.php">
                            <i class="fa fa-fw fa-plus-circle"></i>
                            <span class="nav-link-text">Professor</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="add-student.php">
                            <i class="fa fa-fw fa-plus-circle"></i>
                            <span class="nav-link-text">Student</span>
                        </a>
                    </li>
                </ul>
            </li>


        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <!-- -->
        <?php include "user-login.php"; ?>
        <!-- -->
    </div>
</nav>