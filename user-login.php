<ul class="navbar-nav ml-auto">
    <?php
        if(isset($_SESSION['username'])){ ?>

            <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-user-circle"></i><?php echo $_SESSION['username']; ?>
                    <span class="d-lg-none">Profile</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                    <div class="dropdown-divider"></div>

                </div>
            </li>-->
            <li class="nav-item">
                <?php
                    if($_SESSION['is_admin']==1)
                    {
                        echo "<a class=\"nav-link\" href=\"#\">
                              <i class=\"fa fa-fw fa-user-circle\"></i>
                              </a>";

                    }else if($_SESSION['student_id']!= 0)
                        {
                            echo "<a class=\"nav-link\" href=\"#\">
                                    <i class=\"fa fa-fw fa-graduation-cap\"></i>
                                  </a>";
                        }
                        else
                            {
                                echo "<a class=\"nav-link\" href=\"#\">
                                    <i class=\"fa fa-fw fa-suitcase\"></i>
                                  </a>";
                            }
                ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>

    <?php  }else{ ?>

            <li class="nav-item">
                <a class="nav-link" href="login.php">
                    <i class="fa fa-fw fa-sign-in"></i> Login</a>
            </li>

     <?php  } ?>

</ul>