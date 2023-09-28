<div class="sidebar">
    <div class="widget">
        <h2 class="widget-title">Recent Posts</h2>
        <div class="blog-list-widget">
            <div class="list-group">

                <!-- Post Read operation in php -->
                <?php

                    $query = "SELECT * FROM posts ORDER BY p_id DESC LIMIT 3";
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

                        ?>

                        <a href="" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="w-100 justify-content-between">
                                <img src="admin/image/posts/<?php echo $p_image;?>" alt="" class="img-fluid float-left">
                                <h5 class="mb-1">
                                    <a href="single-post.php?post_id=<?php echo $p_id;?>&cat_id=<?php echo $category_id;?>"><?php echo $p_title;?></a>
                                    </h5>
                                <small><?php echo $p_date;?></small>
                            </div>
                        </a>

                        <?php

                    }

                ?>


                
            </div>
        </div><!-- end blog-list -->
    </div><!-- end widget -->

    <div class="widget">
        <h2 class="widget-title">Popular Categories</h2>
        <div class="link-widget">
            <ul>
                <!-- Category Read operation php code -->
                <?php

                    $sql2 = "SELECT * FROM category";
                    $result = mysqli_query($db, $sql2);
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $c_id       = $row['c_id'];
                        $c_name     = $row['c_name'];
                        $c_desc     = $row['c_desc'];
                        $c_status   = $row['c_status'];

                        //post read operation to specific category
                        $sql3 = "SELECT * FROM posts WHERE p_category = '$c_id'";
                        $result3 = mysqli_query($db, $sql3);

                        $postCount = mysqli_num_rows($result3);


                        if($c_status == 1){
                            ?>

                            <li><a href="archive.php?cat_id=<?php echo $c_id;?>"><?php echo $c_name;?> <span>(<?php echo $postCount;?>)</span></a></li>

                            <?php
                        }

                    }

                ?>
                
            </ul>
        </div><!-- end link-widget -->
    </div><!-- end widget -->
</div><!-- end sidebar -->