
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
            <h4 class="page-title">Category Page</h4>
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
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-12">
            <!-- add category -->
            <div class="white-box analytics-info">
                <h3 class="box-title">Add New Category</h3>
                <div class="mt-3">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cat_name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Category Description</label>
                            <textarea rows="3" class="form-control" id="exampleInputPassword1" name="cat_desc"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="cat_submit">Submit</button>
                    </form>
                    <!-- Category insert php code -->
                    <?php

                        if(isset($_POST['cat_submit'])){
                            $cat_name = $_POST['cat_name'];
                            $cat_desc = $_POST['cat_desc'];

                            $sql = "INSERT INTO category (c_name, c_desc, c_status) VALUES('$cat_name', '$cat_desc', 0)";
                            $result = mysqli_query($db, $sql);

                            if($result){
                                header('Location: category.php');
                            }
                            else{
                                die("Category insert error!".mysqli_error($db));
                            }


                        }

                    ?>


                </div>
            </div>

            <!-- edit category -->
            <?php

            if(isset($_GET['edit_id'])){
                $edit_id = $_GET['edit_id'];

                //Read all info for $edit_id
                $sql4 = "SELECT * FROM category WHERE c_id = '$edit_id'";
                $edit_cat = mysqli_query($db, $sql4);
                $count = 0;
                while ($row = mysqli_fetch_assoc($edit_cat)) {
                    $c_id       = $row['c_id'];
                    $c_name     = $row['c_name'];
                    $c_desc     = $row['c_desc'];
                    $c_status   = $row['c_status'];

                    $count++;
                }
                                                

                ?>

                <div class="white-box analytics-info">
                    <h3 class="box-title">Edit Category</h3>
                    <div class="mt-3">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cat_name" value="<?php echo $c_name;?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Category Description</label>
                                <textarea rows="3" class="form-control" id="exampleInputPassword1" name="cat_desc"><?php echo $c_desc;?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Category Status</label>
                                <select class="form-select" aria-label="Default select example" name="cat_status">
                                    <option value="1" <?php if($c_status == 1) echo "selected";?>>Active</option>
                                    <option value="0" <?php if($c_status == 0) echo "selected";?>>Inactive</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-primary" name="cat_update">Update Category</button>
                        </form>
                        <!-- update operation php code -->
                        <?php

                            if(isset($_POST['cat_update'])){

                                $cat_name = $_POST['cat_name'];
                                $cat_desc = $_POST['cat_desc'];
                                $cat_status = $_POST['cat_status'];

                                $sql5 = "UPDATE category SET c_name = '$cat_name', c_desc = '$cat_desc', c_status = '$cat_status' WHERE c_id  = '$edit_id'";
                                $update_res = mysqli_query($db, $sql5);
                                if($update_res){
                                    header('Location: category.php');
                                }
                                else{
                                    die("Category update error!".mysqli_error($db));
                                }

                            }

                        ?>


                    </div>
                </div>

                <?php
            }

            ?>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">All Categories List</h3>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Category Name</th>
                                            <th class="border-top-0">Description</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Category Read operation php -->
                                        <?php

                                            $sql2 = "SELECT * FROM category";
                                            $result = mysqli_query($db, $sql2);
                                            $count = 0;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $c_id       = $row['c_id'];
                                                $c_name     = $row['c_name'];
                                                $c_desc     = $row['c_desc'];
                                                $c_status   = $row['c_status'];

                                                $count++;
                                                ?>

                                                <tr>
                                                    <td><?php echo $count;?></td>
                                                    <td><?php echo $c_name;?></td>
                                                    <td><?php echo $c_desc;?></td>
                                                    <td><?php 

                                                    if($c_status == 1){
                                                        echo "<span class='badge bg-success'>Active</span>";
                                                    }
                                                    else{
                                                        echo "<span class='badge bg-danger'>Inactive</span>";
                                                    }

                                                    ?></td>
                                                    <td>
                                                        <a href="category.php?edit_id=<?php echo $c_id;?>"><i class="fas fa-edit"></i></a>
                                                        <a href="" data-bs-toggle="modal" data-bs-target="#delete<?php echo $c_id;?>"><i class="fas fa-trash-alt text-danger"></i></a>

                                        <!-- delete modal -->
                                        <div class="modal fade" id="delete<?php echo $c_id;?>" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content modal-filled bg-warning">
                                                    <div class="modal-body p-4">
                                                        <div class="text-center text-light">
                                                            <i data-feather="x-octagon" class="fill-white feather-lg"></i>
                                                            <h2 class="mt-2">Are You Sure!</h2>
                                                            <a type="button" class="btn btn-light my-2"
                                                                data-bs-dismiss="modal">Cancel</a>
                                                            <a href="category.php?delete_id=<?php echo $c_id;?>" type="button" style="border: none;" class="btn btn-light my-2 bg-danger text-light">Confirm!</a>
                                                        </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div>
                                        </div>
                                                    </td>
                                                </tr>

                                                <?php
                                            }

                                        ?>

                                        <!-- Delete operation php code -->
                                        <?php

                                            if(isset($_GET['delete_id'])){

                                                $del_id = $_GET['delete_id'];

                                                $sql3 = "DELETE FROM category WHERE c_id = '$del_id'";
                                                $delete_result = mysqli_query($db, $sql3);
                                                if($delete_result){
                                                    header('Location: category.php');
                                                }
                                                else{
                                                    die("Category delete error!".mysqli_error($db));
                                                }

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
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

<?php
    
    include "inc/footer.php";

?>