
<?php

    include "inc/header.php";
    include "inc/menubar.php";

    //Login user
    $current_user = $_SESSION['u_id'];

?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Post Page</h4>
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
                      <h3 class="box-title">All Post List</h3>
                      <div class="mt-3">
                          <div class="row">
                              <div class="col-sm-12">
                                  <div class="white-box">
                                      <div class="table-responsive">
                                          <table class="table">
                                              <thead>
                                                  <tr>
                                                      <th class="border-top-0">#</th>
                                                      <th class="border-top-0">Date</th>
                                                      <th class="border-top-0">Thumbnail</th>
                                                      <th class="border-top-0">Title</th>
                                                      <th class="border-top-0">Description</th>
                                                      <th class="border-top-0">Category</th>
                                                      <th class="border-top-0">Author</th>
                                                      <!-- <th class="border-top-0">Biodata</th>
                                                      <th class="border-top-0">Education</th> -->
                                                      <th class="border-top-0">Status</th>
                                                      <th class="border-top-0">Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                 
                                                 <!-- Read all posts -->
                                                 <?php

                                                 $query = "SELECT * FROM posts";
                                                 $all_posts = mysqli_query($db, $query);

                                                 $count=0;

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

                                                     $count++;
                                                     ?>

                                                     <tr>
                                                     <td><?php echo $count;?></td>
                                                     <td><?php echo $p_date;?></td>
                                                     <td>
                                                         <img src="image/posts/<?php echo $p_image;?>" width="100">
                                                     </td>
                                                     <td style="width: 200px;"><?php echo $p_title;?></td>
                                                     <td style="width: 300px;"><?php echo substr($p_description, 0, 150)." .....";?></td>
                                                     <td><?php 

                                                        $cat_name = "SELECT c_name FROM category WHERE c_id = '$p_category'";
                                                        $c_res = mysqli_query($db, $cat_name);

                                                        while ($row = mysqli_fetch_assoc($c_res)) {
                                                            $c_name = $row['c_name'];
                                                        }

                                                        echo $c_name;

                                                     ?></td>
                                                     <td><?php

                                                        $user_name = "SELECT u_name FROM users WHERE u_id  = '$p_author'";
                                                        $u_res = mysqli_query($db, $user_name);

                                                        while ($row = mysqli_fetch_assoc($u_res)) {
                                                            $u_name = $row['u_name'];
                                                        }

                                                        echo $u_name;

                                                     ?></td>
                                                     <td><?php 

                                                     if($p_status == 0){
                                                              echo "<span class='badge bg-danger'>Inactive</span>";
                                                          }
                                                          else if($p_status == 1){
                                                              echo "<span class='badge bg-success'>Active</span>";
                                                          }

                                                     ?></td>
                                                     <td>

                                                         <a href="posts.php?do=edit&edit_id=<?php echo $p_id;?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                              <i class="fas fa-edit"></i>
                                                          </a>
                                                          <a href="" data-bs-toggle="modal" data-bs-target="#delete<?php echo $p_id;?>" data-bs-placement="top" title="Delete">
                                                              <i class="fas fa-trash-alt text-danger"></i>
                                                          </a>

                                                          <!-- Delete modal -->
                                          <div class="modal fade" id="delete<?php echo $p_id;?>" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
                                              <div class="modal-dialog modal-sm">
                                                  <div class="modal-content modal-filled bg-warning">
                                                      <div class="modal-body p-4">
                                                          <div class="text-center text-light">
                                                              <i data-feather="x-octagon" class="fill-white feather-lg"></i>
                                                              <h4 class="mt-2">Are you sure?</h4>
                                                              <a type="button" class="btn btn-light my-2"
                                                                  data-bs-dismiss="modal">Cancel</a>
                                                              <a href="posts.php?do=delete&delete_id=<?php echo $p_id;?>" type="button" class="btn my-2 bg-danger text-light">Confirm</a>
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
        else if($do == 'add'){
            ?>

            <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Add New Post</h3>
                    <div class="mt-3">
                        <form method="POST" enctype="multipart/form-data">
                          <div class="row">
                              <div class="col-md-6">
                                <div class="mb-3">
                                  <label for="exampleInputName" class="form-label">Title*</label>
                                  <input type="text" class="form-control" id="exampleInputName" aria-describedby="title" name="title" required="required">
                                </div>
                                    
                                <div class="mb-3">
                                    <label for="exampleInputEducation" class="form-label">Description</label>
                                    <textarea rows="6" class="form-control" id="exampleInputEducation" name="description" required="required"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Select Category</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="category" required="required">
                                    <option value="99999" selected="selected">Uncategorized</option>
                                    <?php

                                    $sql2 = "SELECT * FROM category";
                                    $all_category = mysqli_query($db, $sql2);

                                    $count=0;

                                    while ($row = mysqli_fetch_assoc($all_category)) {
                                        $c_id       = $row['c_id'];
                                        $c_name     = $row['c_name'];
                                        $c_desc     = $row['c_desc'];
                                        $c_status   = $row['c_status'];
                                        ?>

                                        <option value="<?php echo $c_id;?>"><?php echo $c_name;?></option>

                                        <?php

                                    }

                                    ?>
                                    
                                    </select>
                                </div>

                              </div>
                              <div class="col-md-6">
                                
                                    <div class="form-group">
                                        <label for="ExampleInputFile">Post Thumbnail</label><br/>
                                        <input type="file" class="form-control-file" id="ExampleInputFile" name="image" aria-describedby="fileHelp" required="required"><br/>
                                        <small id="fileHelp" class="form-text text-muted">Select photo only. Don't upload a photo more than 1mb file size. Also try to uplaod a jpeg, jpg, png format.</small>
                                    </div>
                                      <div class="mb-3">
                                        <label for="exampleFormControlSelect1">Status</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="post_status" required="required">
                                          <option>Select Status</option>
                                          <option value = 1>Active</option>
                                          <option value = 0>Inactive</option>
                                        </select>
                                      </div>
                                  <button type="submit" class="btn btn-primary" name="post_submit">Add New Post</button>
                              </div>
                          </div>
                        </form>

                        <!-- Insert php code  -->
                        <?php

                        if(isset($_POST['post_submit'])){

                            $title          = $_POST['title'];
                            $description    = $_POST['description'];
                            $category       = $_POST['category'];
                            $post_status    = $_POST['post_status'];
                            $image_name     = $_FILES['image']['name'];
                            $tmp_name       = $_FILES['image']['tmp_name'];
                            //$image_size     = $_FILES['image']['size'];

                            

                            if(empty($title) || empty($description) || empty($category) || empty($image_name)){

                              echo "<span class='alert bg-danger text-light'>Please Fill All the Required field.</span>";

                            }
                            else{

                              //split file
                              $split = explode('.', $_FILES['image']['name']);
                              //take the last part
                              $extn = strtolower(end($split));

                              //store some extension to compare
                              $extension = array('jpeg','jpg','png');
                              //check the file type
                              if(in_array($extn, $extension) === true){

                                $random = rand();
                                $updated_name = $random.$image_name;
                                move_uploaded_file($tmp_name, 'image/posts/'.$updated_name);

                                //To ignore error due to ' in string 
                                //str_replace(search, replace, subject)

                                $title = str_replace("'", "\'", $title);

                                $description = str_replace("'", "\'", $description);


                                $sql1 = "INSERT INTO posts (p_title, p_image, p_author, p_description, p_date, p_category, p_comment, p_status) VALUES ('$title', '$updated_name', '$current_user', '$description', now(), '$category', '', '$post_status')";
                                $add_post = mysqli_query($db, $sql1);
                                
                                if($add_post){
                                    header('Location: posts.php');
                                }
                                else{
                                    die("Post Insertion Error!".mysqli_error($db));
                                }

                              }
                            else{
                              echo "<span class='alert bg-danger text-light'>File type is not an image.</span>";
                            }

                            }

                        }

                        ?>




                    </div>
                </div>
            </div>
        </div>

            <?php
        }
        else if($do == 'edit'){

            if(isset($_GET['edit_id'])){

              $post_id = $_GET['edit_id'];

              //Read all info about user from database
              $pSql = "SELECT * FROM posts WHERE p_id = '$post_id'";
              $editPost = mysqli_query($db, $pSql);
              while ($row = mysqli_fetch_assoc($editPost)) {

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

              <div class="row justify-content-center">
                  <div class="col-lg-12 col-md-12">
                      <div class="white-box analytics-info">
                          <h3 class="box-title">Edit Existing Post</h3>
                          <div class="mt-3">
                              <form action="posts.php?do=update" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="mb-3">
                                        <label for="exampleInputName" class="form-label">Title*</label>
                                        <input type="text" class="form-control" id="exampleInputName" aria-describedby="title" name="title" value="<?php echo $p_title;?>">
                                      </div>
                                          
                                      <div class="mb-3">
                                          <label for="exampleInputEducation" class="form-label">Description</label>
                                          <textarea rows="6" class="form-control" id="exampleInputEducation" name="description"><?php echo $p_description;?></textarea>
                                      </div>

                                      <div class="mb-3">
                                          <label for="exampleFormControlSelect1">Select Category</label>
                                          <select class="form-control" id="exampleFormControlSelect1" name="category" value="<?php echo $p_category;?>">
                                          <option value="99999">Uncategorized</option>
                                          <?php

                                          $sql2 = "SELECT * FROM category";
                                          $all_category = mysqli_query($db, $sql2);

                                          $count=0;

                                          while ($row = mysqli_fetch_assoc($all_category)) {
                                              $c_id       = $row['c_id'];
                                              $c_name     = $row['c_name'];
                                              $c_desc     = $row['c_desc'];
                                              $c_status   = $row['c_status'];
                                              ?>

                                              <option value="<?php echo $c_id;?>" <?php 

                                              if($c_id == $p_category)
                                                  echo "selected";

                                              ?>><?php echo $c_name;?></option>

                                              <?php

                                          }

                                          ?>
                                          
                                          </select>
                                      </div>

                                    </div>
                                    <div class="col-md-6">
                                      
                                          <div class="form-group">

                                              <img src="image/posts/<?php echo $p_image;?>" width="150"><br/>

                                              <label for="ExampleInputFile">Post Thumbnail</label><br/>
                                              <input type="file" class="form-control-file" id="ExampleInputFile" name="image" aria-describedby="fileHelp"><br/>
                                              <small id="fileHelp" class="form-text text-muted">Select photo only. Don't upload a photo more than 1mb file size. Also try to uplaod a jpeg, jpg, png format.</small>
                                          </div>
                                            <div class="mb-3">
                                              <label for="exampleFormControlSelect1">Status</label>
                                              <select class="form-control" id="exampleFormControlSelect1" name="post_status">
                                                <option>Select Status</option>
                                                <option value = 1 <?php if($p_status == 1) echo "selected";?>>Active</option>
                                                <option value = 0 <?php if($p_status == 0) echo "selected";?>>Inactive</option>
                                              </select>
                                            </div>
                                            <input type="hidden" name="post_update_id" value="<?php echo $post_id;?>">
                                        <button type="submit" class="btn btn-primary" name="post_submit">Update Post</button>
                                    </div>
                                </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>

              <?php
          }

        }
        else if($do == 'update'){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $u_post_id      = $_POST['post_update_id'];

                $title          = $_POST['title'];
                $description    = $_POST['description'];
                $category       = $_POST['category'];
                $post_status    = $_POST['post_status'];
                $image_name     = $_FILES['image']['name'];
                $tmp_name       = $_FILES['image']['tmp_name'];


              //update work

              //img (no update)
                if(empty($image_name)){

                    //To ignore error due to ' in string 
                    //str_replace(search, replace, subject)

                    $title = str_replace("'", "\'", $title);

                    $description = str_replace("'", "\'", $description);

                    $updateSql = "UPDATE posts SET p_title='$title', p_description='$description', p_category='$category', p_status='$post_status' WHERE p_id ='$u_post_id'";
                    $updateResult = mysqli_query($db, $updateSql);

                    if($updateResult){
                        header('Location: posts.php');
                    }
                    else{
                        die("Post Update Error!".mysqli_error($db));
                    }

                }


                  //update all
                else{

                    //split file
                  $split = explode('.', $_FILES['image']['name']);
                  //take the last part
                  $extn = strtolower(end($split));

                  //store some extension to compare
                  $extension = array('jpeg','jpg','png');
                  //check the file type
                  if(in_array($extn, $extension) === true){

                    $random = rand();
                    $updated_name = $random.$image_name;
                    move_uploaded_file($tmp_name, 'image/posts/'.$updated_name);


                    //find the file name
                    $image_name = "SELECT p_image FROM posts WHERE p_id='$u_post_id'";
                    $result = mysqli_query($db, $image_name);

                    while ($row = mysqli_fetch_assoc($result)) {
                      $img_name = $row['p_image'];
                    }

                    //delete the file form project folder
                    unlink('image/posts/'.$img_name);

                    //To ignore error due to ' in string 
                    //str_replace(search, replace, subject)

                    $title = str_replace("'", "\'", $title);

                    $description = str_replace("'", "\'", $description);

                    $sql6 = "UPDATE posts SET p_title='$title', p_image='$updated_name', p_description='$description', p_category='$category', p_status='$post_status' WHERE p_id ='$u_post_id'";
                    $update_post6 = mysqli_query($db, $sql6);
                    
                    if($update_post6){
                        header('Location: posts.php');
                    }
                    else{
                        die("Post Update Error!".mysqli_error($db));
                    }

                  }
                  else{
                    echo "<span class='alert bg-danger text-light'>File type is not an image.</span>";
                  }

                }
            }

        }
        else if($do == 'delete'){

            if(isset($_GET['delete_id'])){  
                $del_id = $_GET['delete_id'];

                //find the file name
                  $image_name = "SELECT p_image FROM posts WHERE p_id='$del_id'";
                  $result = mysqli_query($db, $image_name);
                  while ($row = mysqli_fetch_assoc($result)) {
                    $img_name = $row['p_image'];
                  }

                  //delete the file form project folder
                  unlink('image/posts/'.$img_name);


                $table = 'posts';
                $p_key = 'p_id';
                $url = 'posts.php';

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