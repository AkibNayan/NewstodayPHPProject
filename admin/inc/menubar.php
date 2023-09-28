<?php

    ob_start();

    $userRole = $_SESSION['u_role'];

    if($userRole == 1 || $userRole == 2){
        ?>

        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <hr/>
                        <!-- Category -->

                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="category.php"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Category</span>
                            </a>
                        </li>
                        <!-- Post -->
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Posts</span> 
                                <span class="badge bg-inverse rounded-pill ms-auto me-3 font-weight-medium px-2 py-1"></span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="posts.php?do=Manage" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> View All Posts </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="posts.php?do=add" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Add New Posts </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <!-- User -->

                        <?php

                            $userRole = $_SESSION['u_role'];

                            if($userRole == 2){
                                ?>

                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                        <i class="far fa-clock" aria-hidden="true"></i>
                                        <span class="hide-menu">Users</span> 
                                        <span class="badge bg-inverse rounded-pill ms-auto me-3 font-weight-medium px-2 py-1"></span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item">
                                            <a href="users.php?do=Manage" class="sidebar-link">
                                                <i class="mdi mdi-adjust"></i>
                                                <span class="hide-menu"> View All Users </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="users.php?do=add" class="sidebar-link">
                                                <i class="mdi mdi-adjust"></i>
                                                <span class="hide-menu"> Add New User </span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <!-- comments -->
                                <li class="sidebar-item pt-2">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="comments.php?do=Manage"
                                        aria-expanded="false">
                                        <i class="far fa-clock" aria-hidden="true"></i>
                                        <span class="hide-menu">Comments</span>
                                    </a>
                                </li>
                                <!-- Theme Options -->
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                        <i class="far fa-clock" aria-hidden="true"></i>
                                        <span class="hide-menu">Settings</span> 
                                        <span class="badge bg-inverse rounded-pill ms-auto me-3 font-weight-medium px-2 py-1"></span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item">
                                            <a href="index.html" class="sidebar-link">
                                                <i class="mdi mdi-adjust"></i>
                                                <span class="hide-menu"> Logo </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="index2.html" class="sidebar-link">
                                                <i class="mdi mdi-adjust"></i>
                                                <span class="hide-menu"> Social Icon </span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <!-- profile -->
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php"
                                        aria-expanded="false">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span class="hide-menu">Profile</span>
                                    </a>
                                </li>

                                <?php

                            }

                        ?>
                        
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

        <?php

    }
    else{

        header('Location: http://localhost/newstoday');

    }

    ob_end_flush();

?>



