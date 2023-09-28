<?php

    include "inc/header.php";

    $login_user = $_SESSION['u_id'];

?>

        <section class="section lb m3rem">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

                        <!-- Single post read opration php code -->
                        <?php

                             if(isset($_GET['post_id'])){

                                $single_post_id = $_GET['post_id'];

                                $query = "SELECT * FROM posts WHERE p_id = '$single_post_id'";
                                $all_posts = mysqli_query($db, $query);

                                while ($row = mysqli_fetch_assoc($all_posts)) {

                                    $p_id              = $row['p_id'];
                                    $p_title           = $row['p_title'];
                                    $p_image           = $row['p_image'];
                                    $p_author          = $row['p_author'];
                                    $p_description     = $row['p_description'];
                                    $p_date            = $row['p_date'];
                                    $p_category        = $row['p_category'];
                                    $p_comment         = $row['p_comment'];
                                    $p_status          = $row['p_status'];
                                }

                                ?>

                                <div class="page-wrapper">
                                    <div class="blog-title-area">
                                        <ol class="breadcrumb hidden-xs-down">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                            <li class="breadcrumb-item active">The golden rules you need to know for a positive life</li>
                                        </ol>

                                        <span class="color-yellow"><a href="" title="">
                                                
                                            <?php 

                                                $cat_name = "SELECT c_name FROM category WHERE c_id = '$p_category'";
                                                $c_res = mysqli_query($db, $cat_name);

                                                while ($row = mysqli_fetch_assoc($c_res)) {
                                                    $c_name = $row['c_name'];
                                                }

                                                echo $c_name;

                                             ?>

                                        </a></span>

                                        <h3><?php echo $p_title;?></h3>

                                        <div class="blog-meta big-meta">
                                            <small><a href="" title=""><?php echo $p_date;?></a></small>
                                            <small><a href="" title="">by 

                                                <?php

                                                    $user_name = "SELECT u_name FROM users WHERE u_id  = '$p_author'";
                                                    $u_res = mysqli_query($db, $user_name);

                                                    while ($row = mysqli_fetch_assoc($u_res)) {
                                                        $u_name = $row['u_name'];
                                                    }

                                                    echo $u_name;

                                                ?>

                                            </a></small>
                                            <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
                                        </div><!-- end meta -->

                                        <div class="post-sharing">
                                            <ul class="list-inline">
                                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div><!-- end post-sharing -->
                                    </div><!-- end title -->

                                    <div class="single-post-media">
                                        <img src="admin/image/posts/<?php echo $p_image;?>" alt="" class="img-fluid">
                                    </div><!-- end media -->

                                    <div class="blog-content">  
                                        <div class="pp">
                                            <p><?php echo $p_description;?></p>

                                        </div><!-- end pp -->

                                    </div><!-- end content -->

                                    <div class="blog-title-area">
                                        <div class="tag-cloud-single">
                                            <span>Tags</span>
                                            <small><a href="#" title="">lifestyle</a></small>
                                            <small><a href="#" title="">colorful</a></small>
                                            <small><a href="#" title="">trending</a></small>
                                            <small><a href="#" title="">another tag</a></small>
                                        </div><!-- end meta -->

                                        <div class="post-sharing">
                                            <ul class="list-inline">
                                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div><!-- end post-sharing -->
                                    </div><!-- end title -->

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="banner-spot clearfix">
                                                <div class="banner-img">
                                                    <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                                                </div><!-- end banner-img -->
                                            </div><!-- end banner -->
                                        </div><!-- end col -->
                                    </div><!-- end row -->

                                    <hr class="invis1">

                                    <div class="custombox authorbox clearfix">
                                        <h4 class="small-title">About author</h4>

                                        <?php

                                            $sql = "SELECT * FROM users WHERE u_id = '$p_author'";
                                            $result = mysqli_query($db, $sql);
                                            $count = 0;
                                            while ($row = mysqli_fetch_assoc($result)) {

                                                 $u_id        = $row['u_id'];
                                                 $u_name      = $row['u_name'];
                                                 $u_image     = $row['u_image'];
                                                 $u_email     = $row['u_email'];
                                                 $u_password  = $row['u_password'];
                                                 $u_address   = $row['u_address'];
                                                 $u_phone     = $row['u_phone'];
                                                 $u_dob       = $row['u_dob'];
                                                 $u_gender    = $row['u_gender'];
                                                 $u_bio       = $row['u_bio'];
                                                 $u_education = $row['u_education'];
                                                 $u_role      = $row['u_role'];
                                                 $u_status    = $row['u_status'];
                                             }

                                        ?>


                                        <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                <img src="admin/image/users/<?php echo $u_image;?>" alt="" class="img-fluid rounded-circle"> 
                                            </div><!-- end col -->

                                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                                <h4><a href="#"><?php echo $u_name;?></a></h4>
                                                <p><?php echo $u_bio;?></p>

                                                <div class="topsocial">
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                                </div><!-- end social -->

                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end author-box -->

                                    <hr class="invis1">

                                    <div class="custombox clearfix">
                                        <h4 class="small-title">You may also like</h4>
                                        <div class="row">

                                            <!-- Read Another post in same category -->
                                            <?php

                                                if(isset($_GET['cat_id'])){

                                                    $category_id = $_GET['cat_id'];

                                                    $query1 = "SELECT * FROM posts WHERE p_category = '$category_id' AND p_id != '$single_post_id' ORDER BY p_id DESC LIMIT 2";
                                                    $all_posts1 = mysqli_query($db, $query1);

                                                    while ($row = mysqli_fetch_assoc($all_posts1)) {

                                                        $p_id              = $row['p_id'];
                                                        $p_title           = $row['p_title'];
                                                        $p_image           = $row['p_image'];
                                                        $p_author          = $row['p_author'];
                                                        $p_description     = $row['p_description'];
                                                        $p_date            = $row['p_date'];
                                                        $p_category        = $row['p_category'];
                                                        $p_comment         = $row['p_comment'];
                                                        $p_status          = $row['p_status'];

                                                        ?>

                                                        <div class="col-lg-6">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single-post.php?post_id=<?php echo $p_id;?>&cat_id=<?php echo $category_id;?>" title="">
                                                                        <img src="admin/image/posts/<?php echo $p_image;?>">
                                                                        <div class="hovereffect">
                                                                            <span class=""></span>
                                                                        </div><!-- end hover -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single-post.php?post_id=<?php echo $p_id;?>&cat_id=<?php echo $category_id;?>" title=""><?php echo $p_title;?></a></h4>

                                                                    <small><a href="archive.php?cat_id=<?php echo $p_category;?>" title="">
                                                                        
                                                                        <?php 

                                                                            $cat_name = "SELECT c_name FROM category WHERE c_id = '$p_category'";
                                                                            $c_res = mysqli_query($db, $cat_name);

                                                                            while ($row = mysqli_fetch_assoc($c_res)) {
                                                                                $c_name = $row['c_name'];
                                                                            }

                                                                            echo $c_name;

                                                                         ?>

                                                                    </a></small>
                                                                    <small><a href="" title=""><?php echo $p_date;?></a></small>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div><!-- end col -->

                                                        <?php
                                                    }

                                                }

                                            ?>
                                        </div><!-- end row -->
                                    </div><!-- end custom-box -->

                                    <hr class="invis1">

                                    <div class="custombox clearfix">

                                        <?php

                                        $query1 = "SELECT * FROM comment WHERE cmnt_post = '$single_post_id'";
                                        $result1 = mysqli_query($db, $query1);

                                        $no_of_comments = mysqli_num_rows($result1)

                                        ?>

                                        <h4 class="small-title"><?php echo $no_of_comments;?> Comments</h4>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="comments-list">

                                                    <!-- Comments read operation php code -->
                                                    <?php 

                                                        $query = "SELECT * FROM comment WHERE cmnt_post = '$single_post_id'";
                                                        $result = mysqli_query($db, $query);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $cmnt_id        = $row['cmnt_id'];
                                                            $cmnt_author    = $row['cmnt_author'];
                                                            $cmnt_desc      = $row['cmnt_desc'];
                                                            $cmnt_date      = $row['cmnt_date'];
                                                            $cmnt_post      = $row['cmnt_post'];

                                                            ?>

                                                            <div class="media">

                                                                <?php

                                                                    $user_name = "SELECT * FROM users WHERE u_id  = '$cmnt_author'";
                                                                    $u_res = mysqli_query($db, $user_name);

                                                                    while ($row = mysqli_fetch_assoc($u_res)) {
                                                                        $u_name = $row['u_name'];
                                                                        $u_image = $row['u_image'];
                                                                    }

                                                                ?>

                                                                <a class="media-left" href="#">
                                                                    <img src="admin/image/users/<?php echo $u_image;?>" alt="" class="rounded-circle">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading user_name"><?php echo $u_name;?><small><?php echo $cmnt_date;?></small></h4>
                                                                    <p><?php echo $cmnt_desc;?></p>
                                                                    <a href="" class="btn btn-primary btn-sm">Reply</a>
                                                                </div>
                                                                
                                                            </div>

                                                            <?php
                                                        }

                                                    ?>

                                                </div>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end custom-box -->

                                    <hr class="invis1">
                                    <div class="custombox clearfix">
                                    <?php

                                        if(empty($_SESSION['u_email'])){
                                            echo "<a href='http://localhost/newstoday/admin' target='_blank'><span class='alert bg-danger' style='color:#fff;'>Please login to make a comment</span></a>";
                                        }
                                        else{
                                            ?>

                                            <h4 class="small-title">Leave a Reply</h4>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form class="form-wrapper" method="post">
                                                        <!-- <input type="text" class="form-control" placeholder="Your name">
                                                        <input type="text" class="form-control" placeholder="Email address">
                                                        <input type="text" class="form-control" placeholder="Website"> -->
                                                        <textarea class="form-control" placeholder="Your comment" name="desc"></textarea>
                                                        <button type="submit" name="cmnt_submit" class="btn btn-primary">Submit Comment</button>
                                                    </form>

                                                    <!-- comment insert code here -->
                                                    <?php

                                                    if(isset($_POST['cmnt_submit'])){

                                                        $desc = $_POST['desc'];

                                                        $cmnt_sql = "INSERT INTO comment (cmnt_author, cmnt_desc, cmnt_date, cmnt_post) VALUES ('$login_user', '$desc', now(), '$single_post_id')"; 
                                                        $cmnt_res = mysqli_query($db, $cmnt_sql);

                                                        if($cmnt_res){

                                                            header("Refresh:0");

                                                        }
                                                        else{

                                                            die("Post comment error!".mysqli_error());

                                                        }

                                                    }

                                                    ?>

                                                </div>
                                            </div>

                                            <?php
                                        }

                                    ?>
                                    </div>

                                </div><!-- end page-wrapper -->

                                <?php

                             }

                        ?>


                        
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        
                        <?php

                            include "inc/sidebar.php";

                        ?>

                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

<?php
    
    include "inc/footer.php";

?>