    <?php
    session_start();

    ?>

    <div class="left side-menu">

        <div class="sidebar-inner slimscrollleft">



            <!--- Sidemenu -->

            <div id="sidebar-menu">

                <ul>

                    <li class="menu-title">Navigation</li>



                    <li class="has_sub">

                        <a href="dashboard.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i>
                            <span> Dashboard </span> </a>



                    </li>

                    <?php
                            if ($_SESSION['type'] == 'superadmin') {
                                echo'<li class="has_sub">

                                    <a href="javascript:void(0);" class="waves-effect"><i
                                            class="mdi mdi-format-list-bulleted"></i> <span> Ports </span> <span
                                            class="menu-arrow"></span></a>

                                    <ul class="list-unstyled">

                                        <li><a href="add-ports.php">Add Ports</a></li>

                                        <li><a href="manage-ports.php">Manage Ports</a></li>

                                    </ul>

                                    </li>';
                            }

                            ?>

                    <li class="has_sub">

                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                            <span> Students </span> <span class="menu-arrow"></span></a>

                        <ul class="list-unstyled">

                            <li><a href="add-post.php">Add Students</a></li>

                            <li><a href="manage-posts.php">Manage Students</a></li>

                            <li><a href="trash-posts.php">Trash </a></li>

                        </ul>

                    </li>






                </ul>

            </div>

            <!-- Sidebar -->

            <div class="clearfix"></div>



            <div class="help-box">

                <h5 class="text-muted m-t-0">For Help ?</h5>

                <p class=""><span class="text-custom">Email:</span> <br /> huc.edu@gmail.com</p>

            </div>



        </div>

        <!-- Sidebar -left -->



    </div>