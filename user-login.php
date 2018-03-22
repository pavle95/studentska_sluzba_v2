<ul class="navbar-nav ml-auto">
    <?php

      /**
       * Checks to see if there's a logged in user, and if there
       * is, it assigns the correct icon corresponding to the users role
       */
        if(isset($_SESSION['username'])){ ?>


            <li class="nav-item">
                <a class="nav-link" href="#">
                <?php
                    if($_SESSION['is_admin']==1)
                    {
                        echo "<i class=\"fa fa-fw fa-user-circle\"></i>";

                    }
                    else if($_SESSION['student_id']!= 0)
                    {
                        echo "<i class=\"fa fa-fw fa-graduation-cap\"></i>";
                    }
                    else
                    {
                        echo "<i class=\"fa fa-fw fa-suitcase\"></i>";
                    }
                    echo $_SESSION['username'];
                ?>
                </a>
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