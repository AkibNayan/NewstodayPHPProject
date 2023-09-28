
<?php

    include "inc/header.php";
    include "inc/menubar.php";

?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li><a href="#" class="fw-normal"></a></li>
                </ol>
                <a href="inc/logout.php" target=""
                    class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Logout
                    </a>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!--  main content -->

    <?php

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

        if($do == 'Manage'){
            ?>

            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                  <div class="white-box analytics-info">
                      <h3 class="box-title">All Users Information</h3>
                      <div class="mt-3">
                          <div class="row">
                              <div class="col-sm-12">
                                  <div class="white-box">
                                      <div class="table-responsive">
                                          <table class="table">
                                              <thead>
                                                  <tr>
                                                      <th class="border-top-0">#</th>
                                                      <th class="border-top-0">Author</th>
                                                      <th class="border-top-0">Description</th>
                                                      <th class="border-top-0">Date</th>
                                                      <th class="border-top-0">Post</th>
                                                      <th class="border-top-0">Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <!-- Comment read operation php code -->
                                                <?php

                                                    $sql = "SELECT * FROM comment";
                                                    $result = mysqli_query($db, $sql);

                                                    $count = 0;
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        
                                                        $cmnt_id        = $row['cmnt_id'];
                                                        $cmnt_author    = $row['cmnt_author'];
                                                        $cmnt_desc      = $row['cmnt_desc'];
                                                        $cmnt_date      = $row['cmnt_date'];
                                                        $cmnt_post      = $row['cmnt_post'];

                                                        $count++;

                                                        ?>

                                                        <tr>
                                                            <td><?php echo $count;?></td>
                                                            <td><?php

                                                                $user_name = "SELECT u_name FROM users WHERE u_id  = '$cmnt_author'";
                                                                $u_res = mysqli_query($db, $user_name);

                                                                while ($row = mysqli_fetch_assoc($u_res)) {
                                                                    $u_name = $row['u_name'];
                                                                }

                                                                echo $u_name;

                                                            ?></td>
                                                            <td><?php echo substr($cmnt_desc, 0, 80)."...";?></td>
                                                            <td><?php echo $cmnt_date;?></td>
                                                            <td><?php 

                                                                $post_title = "SELECT p_title FROM posts WHERE p_id  = '$cmnt_post'";
                                                                    $p_res = mysqli_query($db, $post_title);

                                                                    while ($row = mysqli_fetch_assoc($p_res)) {
                                                                        $p_title = $row['p_title'];
                                                                    }

                                                                    echo $p_title;

                                                            ?></td>
                                                            <td>
                                                                <a href="" data-bs-toggle="modal" data-bs-target="#delete<?php echo $cmnt_id;?>" data-bs-placement="top" title="Delete">
                                                                    <i class="fas fa-trash-alt text-danger"></i>
                                                                 </a>
                                                                 <!-- Delete Modal -->

                                        <div class="modal fade" id="delete<?php echo $cmnt_id;?>" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content modal-filled bg-warning">
                                                    <div class="modal-body p-4">
                                                        <div class="text-center text-light">
                                                            <i data-feather="x-octagon" class="fill-white feather-lg"></i>
                                                            <h4 class="mt-2">Are you sure?</h4>
                                                            <a type="button" class="btn btn-light my-2"
                                                              data-bs-dismiss="modal">Cancel</a>
                                                            <a href="comments.php?do=delete&delete_id=<?php echo $cmnt_id;?>" type="button" class="btn my-2 bg-danger text-light">Confirm</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                                            </td>
                                                        </tr>

                                                        <?php

                                                    }

                                                ?>

                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>

            <?php
        }

        else if($do == 'delete'){

            if(isset($_GET['delete_id'])){
                $del_id = $_GET['delete_id'];

                //delete all

                //tablename
                $table = 'comment';
                //primary key
                $p_key = 'cmnt_id ';
                //location
                $url = 'comments.php';
                //delete id

                delete($table, $p_key, $url, $del_id);

            }

        }

    ?>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

<?php
    
    include "inc/footer.php";

?>