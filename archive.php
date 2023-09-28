<?php

    include "inc/header.php";

?>

        <section id="cta" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 align-self-center">
                        <h2>A digital marketing blog</h2>
                        <p class="lead"> Aenean ut hendrerit nibh. Duis non nibh id tortor consequat cursus at mattis felis. Praesent sed lectus et neque auctor dapibus in non velit. Donec faucibus odio semper risus rhoncus rutrum. Integer et ornare mauris.</p>
                        <a href="#" class="btn btn-primary">Try for free</a>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="newsletter-widget text-center align-self-center">
                            <h3>Subscribe Today!</h3>
                            <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
                            <form class="form-inline" method="post">
                                <input type="text" name="email" placeholder="Add your email here.." required class="form-control" />
                                <input type="submit" value="Subscribe" class="btn btn-default btn-block" />
                            </form>         
                        </div><!-- end newsletter -->
                    </div>
                </div>
            </div>
        </section>

        <section class="section lb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-custom-build">

                                <!-- post read operation php code -->
                                <?php 

                                    if(isset($_GET['cat_id'])){

                                        $category_id = $_GET['cat_id'];

                                        $query = "SELECT * FROM posts WHERE p_category = '$category_id' ORDER BY p_id DESC";
                                        $all_posts = mysqli_query($db, $query);

                                        $postCount = mysqli_num_rows($all_posts);

                                        if($postCount > 0){

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

                                            if($p_status == 1){
                                                ?>

                                                <div class="blog-box wow fadeIn">
                                                <div class="post-media">
                                                <a href="single-post.php?post_id=<?php echo $p_id;?>&cat_id=<?php echo $category_id;?>" title="">
                                                    <img src="admin/image/posts/<?php echo $p_image;?>" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span></span>
                                                    </div>
                                                    <!-- end hover -->
                                                </a>
                                                </div>
                                            <!-- end media -->
                                            <div class="blog-meta big-meta text-center">
                                                <div class="post-sharing">
                                                    <ul class="list-inline">
                                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                                    </ul>
                                                </div><!-- end post-sharing -->
                                                <h4><a href="single-post.php?post_id=<?php echo $p_id;?>&cat_id=<?php echo $category_id;?>" title=""><?php echo $p_title;?></a></h4>

                                                <p><?php echo substr($p_description, 0,250).".....";?><a href="single-post.php?post_id=<?php echo $p_id;?>&cat_id=<?php echo $category_id;?>">Read More</a></p>

                                                <small><a href="" title="">
                                                        
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
                                                <small><a href="#" title="">by
                                                    
                                                    <?php

                                                        $user_name = "SELECT u_name FROM users WHERE u_id  = '$p_author'";
                                                        $u_res = mysqli_query($db, $user_name);

                                                        while ($row = mysqli_fetch_assoc($u_res)) {
                                                            $u_name = $row['u_name'];
                                                        }

                                                        echo $u_name;

                                                    ?>

                                                </a></small>
                                                
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->

                                        <hr class="invis">

                                                <?php
                                            }
                                            
                                            }

                                        }
                                        else{

                                            echo "<span class='alert bg-danger' style='color:#fff;'>No Posts Are Available!</span>";

                                        }                                    

                                    }

                                ?>

                            </div>
                        </div>

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
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