
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
            <h4 class="page-title">All Users Information</h4>
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

        //View All 
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
                                                      <th class="border-top-0">Thumbnail</th>
                                                      <th class="border-top-0">Name</th>
                                                      <th class="border-top-0">Gender</th>
                                                      <th class="border-top-0">Email</th>
                                                      <th class="border-top-0">Address</th>
                                                      <th class="border-top-0">Phone</th>
                                                      <th class="border-top-0">DOB</th>
                                                      <!-- <th class="border-top-0">Biodata</th>
                                                      <th class="border-top-0">Education</th> -->
                                                      <th class="border-top-0">Role</th>
                                                      <th class="border-top-0">Status</th>
                                                      <th class="border-top-0">Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>

                                                <?php

                                                    $sql = "SELECT * FROM users";
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

                                                         $count++;
                                                         ?>

                                                         <tr>
                                                             <td><?php echo $count;?></td>
                                                             <td>
                                                                 <img src="image/users/<?php echo $u_image;?>" width="100px">
                                                             </td>
                                                             <td><?php echo $u_name;?></td>
                                                             <td><?php echo $u_gender;?></td>
                                                             <td><?php echo $u_email;?></td>
                                                             <td><?php echo $u_address;?></td>
                                                             <td><?php echo $u_phone;?></td>
                                                             <td><?php echo $u_dob;?></td>
                                                             <td><?php 

                                                             if($u_role == 0){
                                                                echo "<span class='badge bg-success'>Subscriber</span>";
                                                             }
                                                             else if($u_role == 1){
                                                                echo "<span class='badge bg-primary'>Editor</span>";
                                                             }
                                                             else if($u_role == 2){
                                                                echo "<span class='badge bg-danger'>Admin</span>";
                                                             }

                                                             ?></td>
                                                             <td><?php 

                                                             if($u_status == 0){
                                                                echo "<span class='badge bg-danger'>Inactive</span>";
                                                             }
                                                             else if($u_status == 1){
                                                                echo "<span class='badge bg-success'>Active</span>";
                                                             }

                                                             ?></td>
                                                             <td>
                                                                 <a href="" data-bs-toggle="modal" data-bs-target="#profile<?php echo $u_id;?>" data-bs-placement="top" title="Profile"><i class="fas fa-eye text-warning"></i></a>
                                                                 <!-- User profile -->


                                                    <!-- Modal -->
                                                  <div class="modal fade" id="profile<?php echo $u_id;?>" tabindex="-1" role="dialog">
                                                      <div class="modal-dialog" role="document">
                                                          <div class="modal-content">
                                                              <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                              </button> -->
                                                              <div class="modal-body">
                                                                <h3><b>User Details</b></h3>
                                                                <table class="table table-border">
                                                                  <tr>
                                                                    <td>Name</td>
                                                                    <td><?php echo $u_name;?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>Email</td>
                                                                    <td><?php echo $u_email;?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>Address</td>
                                                                    <td><?php echo $u_address;?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>Phone</td>
                                                                    <td><?php echo $u_phone;?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>Date of Birth</td>
                                                                    <td><?php echo $u_dob;?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>Gender</td>
                                                                    <td><?php echo $u_gender;?></td>
                                                                  </tr>
                                                                  
                                                                </table>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <!-- /Modal -->

                                                                 <a href="users.php?do=edit&edit_id=<?php echo $u_id;?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i></a>

                                                                 <a href="" data-bs-toggle="modal" data-bs-target="#delete<?php echo $u_id;?>" data-bs-placement="top" title="Delete">
                                                                    <i class="fas fa-trash-alt text-danger"></i>
                                                                 </a>

                                        <div class="modal fade" id="delete<?php echo $u_id;?>" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content modal-filled bg-warning">
                                                    <div class="modal-body p-4">
                                                        <div class="text-center text-light">
                                                            <i data-feather="x-octagon" class="fill-white feather-lg"></i>
                                                            <h4 class="mt-2">Are you sure?</h4>
                                                            <a type="button" class="btn btn-light my-2"
                                                              data-bs-dismiss="modal">Cancel</a>
                                                            <a href="users.php?do=delete&delete_id=<?php echo $u_id;?>" type="button" class="btn my-2 bg-danger text-light">Confirm</a>
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
        //Add User
        else if($do == 'add'){
            ?>

            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Add New User</h3>
                        <div class="mt-3">
                            <form method="POST" enctype="multipart/form-data">
                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="mb-3">
                                      <label for="exampleInputName" class="form-label">User Name*</label>
                                      <input type="text" class="form-control" id="exampleInputName" aria-describedby="userName" name="user_name" required="required">
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputEmail" class="form-label">User Email*</label>
                                      <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="user_mail" required="required">
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputPassword" class="form-label">Password*</label>
                                      <input type="password" class="form-control" id="exampleInputPassword" name="user_password" required="required">
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputAddress" class="form-label">Address</label>
                                      <input type="text" class="form-control" id="exampleInputAddress" name="user_address">
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputPhone" class="form-label">Phone</label>
                                      <input type="number" class="form-control" id="exampleInputPhone" name="user_phone">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-date-input" class="col-2 col-form-label">DOB</label>
                                        <div class="col-12">
                                            <input type="date" class="form-control" id="example-date-input" value="1999-08-19" name="user_dob">
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="mb-3">
                                      <label for="exampleFormControlSelect1">Select Your Gender</label>
                                      <select class="form-control" id="exampleFormControlSelect1" name="user_gender">
                                        <option>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                      </select>
                                    </div>
                                      <div class="mb-3">
                                          <label for="exampleInputBiodata" class="form-label">Biodata</label>
                                          <textarea rows="5" class="form-control" id="exampleInputBiodata" name="user_biodata"></textarea>
                                      </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEducation" class="form-label">Education</label>
                                            <textarea rows="3" class="form-control" id="exampleInputEducation" name="user_edu"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="ExampleInputFile">Profile Picture</label>
                                            <input type="file" class="form-control-file" id="ExampleInputFile" name="image" aria-describedby="fileHelp"><br/>
                                            <small id="fileHelp" class="form-text text-muted">Select photo only. Don't upload a photo more than 1mb file size. Also try to uplaod a jpeg, jpg, png format.</small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1">User Role</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="user_role">
                                              <option>Select Role</option>
                                              <option value = 2>Admin</option>
                                              <option value = 1>Editor</option>
                                              <option value = 0>Subscriber</option>
                                            </select>
                                          </div>
                                          <div class="mb-3">
                                            <label for="exampleFormControlSelect1">User Status</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="user_status">
                                              <option>Select Status</option>
                                              <option value = 1>Active</option>
                                              <option value = 0>Inactive</option>
                                            </select>
                                          </div>
                                      <button type="submit" class="btn btn-primary" name="user_submit">Add New User</button>
                                  </div>
                              </div>
                            </form>

                            <?php

                                if(isset($_POST['user_submit'])){

                                    $user_name      = $_POST['user_name'];
                                    $user_mail      = $_POST['user_mail'];
                                    $user_password  = $_POST['user_password'];
                                    $user_address   = $_POST['user_address'];
                                    $user_phone     = $_POST['user_phone'];
                                    $user_dob       = $_POST['user_dob'];
                                    $user_gender    = $_POST['user_gender'];
                                    $user_biodata   = $_POST['user_biodata'];
                                    $user_edu       = $_POST['user_edu'];
                                    $user_role      = $_POST['user_role'];
                                    $user_status    = $_POST['user_status'];
                                    $image_name     = $_FILES['image']['name'];
                                    $tmp_name       = $_FILES['image']['tmp_name'];
                                    //$image_size     = $_FILES['image']['size'];

                                    

                                    if(empty($user_name) && empty($user_mail) && empty($user_password) && empty($image_name)){

                                        echo "<span class='alert alert-danger' role='alert'>Please Fill Up All Required Field!</span>";

                                    }
                                    else{

                                        //split file
                                        $split = explode('.', $_FILES['image']['name']);
                                        //Take the extension
                                        $extn = strtolower(end($split));
                                        //Take an array in image
                                        $extension = array('jpg', 'jpeg', 'png');
                                        //Check the file type
                                        if(in_array($extn, $extension) === true){
                                            
                                            $random = rand();
                                            $updated_name = $random.$image_name;
                                            move_uploaded_file($tmp_name, 'image/users/'.$updated_name);

                                            //To ignore error due to ' when user input a string
                                            //str_replace(search, replace, subject)

                                            $user_address = str_replace("'", "\'", $user_address);
                                            $user_biodata = str_replace("'", "\'", $user_biodata);
                                            $user_edu = str_replace("'", "\'", $user_edu);

                                            $encypt_pass = sha1($user_password);

                                            $addSql = "INSERT INTO users (u_name, u_image, u_email, u_password, u_address, u_phone, u_dob, u_gender, u_bio, u_education, u_role, u_status) VALUES ('$user_name', '$updated_name', '$user_mail', '$encypt_pass', '$user_address', '$user_phone', '$user_dob', '$user_gender', '$user_biodata', '$user_edu', '$user_role', '$user_status')";

                                            $addResult = mysqli_query($db, $addSql);

                                            if($addResult){
                                                header('Location: users.php');
                                            }
                                            else{
                                                die("New User Insert!".mysqli_error($db));
                                            }

                                        }
                                        else{
                                            echo "<span class='alert bg-danger text-light' role='alert'>File type is not an image</span>";
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
        //Edit User
        else if($do == 'edit'){

          if(isset($_GET['edit_id'])){

            $user_id = $_GET['edit_id'];

            //Read All the information about user
            $sql2 = "SELECT * FROM users WHERE u_id = $user_id";
            $result2 = mysqli_query($db, $sql2);
            
            while ($row = mysqli_fetch_assoc($result2)) {

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

             <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Edit Existing User</h3>
                        <div class="mt-3">
                            <form action="users.php?do=update" method="POST" enctype="multipart/form-data">
                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="mb-3">
                                      <label for="exampleInputName" class="form-label">User Name*</label>
                                      <input type="text" class="form-control" id="exampleInputName" aria-describedby="userName" name="user_name" required="required" value="<?php echo $u_name;?>">
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputEmail" class="form-label">User Email*</label>
                                      <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="user_mail" required="required" value="<?php echo $u_email;?>">
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputPassword" class="form-label">Password*</label>
                                      <input type="password" class="form-control" id="exampleInputPassword" name="user_password">
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputAddress" class="form-label">Address</label>
                                      <input type="text" class="form-control" id="exampleInputAddress" name="user_address" value="<?php echo $u_address;?>">
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputPhone" class="form-label">Phone</label>
                                      <input type="number" class="form-control" id="exampleInputPhone" name="user_phone" value="<?php echo $u_phone;?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-date-input" class="col-2 col-form-label">DOB</label>
                                        <div class="col-12">
                                            <input type="date" class="form-control" id="example-date-input" name="user_dob" value="<?php echo $u_dob;?>">
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="mb-3">
                                      <label for="exampleFormControlSelect1">Select Your Gender</label>
                                      <select class="form-control" id="exampleFormControlSelect1" name="user_gender">
                                        <option>Select Gender</option>
                                        <option value="Male" <?php if($u_gender == 'Male') echo "selected";?>>Male</option>
                                        <option value="Female" <?php if($u_gender == 'Female') echo "selected";?>>Female</option>
                                        <option value="Others" <?php if($u_gender == 'Others') echo "selected";?>>Others</option>
                                      </select>
                                    </div>
                                      <div class="mb-3">
                                          <label for="exampleInputBiodata" class="form-label">Biodata</label>
                                          <textarea rows="5" class="form-control" id="exampleInputBiodata" name="user_biodata"><?php echo $u_bio;?></textarea>
                                      </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEducation" class="form-label">Education</label>
                                            <textarea rows="3" class="form-control" id="exampleInputEducation" name="user_edu"><?php echo $u_education;?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <img src="image/users/<?php echo $u_image;?>" width="100"><br/>
                                            <label for="ExampleInputFile">Profile Picture</label>
                                            <input type="file" class="form-control-file" id="ExampleInputFile" name="image" aria-describedby="fileHelp"><br/>
                                            <small id="fileHelp" class="form-text text-muted">Select photo only. Don't upload a photo more than 1mb file size. Also try to uplaod a jpeg, jpg, png format.</small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1">User Role</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="user_role">
                                              <option>Select Role</option>
                                              <option value = 2 <?php if($u_role == 2) echo "selected";?>>Admin</option>
                                              <option value = 1 <?php if($u_role == 1) echo "selected";?>>Editor</option>
                                              <option value = 0 <?php if($u_role == 0) echo "selected";?>>Subscriber</option>
                                            </select>
                                          </div>
                                          <div class="mb-3">
                                            <label for="exampleFormControlSelect1">User Status</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="user_status">
                                              <option>Select Status</option>
                                              <option value = 1 <?php if($u_status == 1) echo "selected";?>>Active</option>
                                              <option value = 0 <?php if($u_status == 0) echo "selected";?>>Inactive</option>
                                            </select>
                                          </div>
                                          <input type="hidden" name="updateUserId" value="<?php echo $user_id;?>">
                                      <input type="submit" class="btn btn-primary" value="Update User Info">
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

        //Update User
        else if($do == 'update'){

          if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $update_user    = $_POST['updateUserId'];

            $user_name      = $_POST['user_name'];
            $user_mail      = $_POST['user_mail'];
            $user_password  = $_POST['user_password'];
            $user_address   = $_POST['user_address'];
            $user_phone     = $_POST['user_phone'];
            $user_dob       = $_POST['user_dob'];
            $user_gender    = $_POST['user_gender'];
            $user_biodata   = $_POST['user_biodata'];
            $user_edu       = $_POST['user_edu'];
            $user_role      = $_POST['user_role'];
            $user_status    = $_POST['user_status'];
            $image_name     = $_FILES['image']['name'];
            $tmp_name       = $_FILES['image']['tmp_name'];

            //Update Work

            //img, password(no update)
            if(empty($user_password) && empty($image_name)){

              //To ignore error due to ' when user input a string
              //str_replace(search, replace, subject)

              $user_address = str_replace("'", "\'", $user_address);
              $user_biodata = str_replace("'", "\'", $user_biodata);
              $user_edu = str_replace("'", "\'", $user_edu);

              $update_sql = "UPDATE users SET u_name = '$user_name', u_email = '$user_mail', u_address = '$user_address', u_phone = '$user_phone', u_dob = '$user_dob', u_gender = '$user_gender', u_bio = '$user_biodata', u_education = '$user_edu', u_role = '$user_role', u_status = '$user_status' WHERE u_id = '$update_user'";
              $update_res = mysqli_query($db, $update_sql);

              if($update_res){
                header('Location: users.php');
              }
              else{
                die("Users Update Error!".mysqli_error($db));
              }

            }

            //img update (no password)
            else if(empty($user_password) && !empty($image_name)){
              
              //split file
              $split = explode('.', $_FILES['image']['name']);
              //Take the extension
              $extn = strtolower(end($split));
              //Take an array in image
              $extension = array('jpg', 'jpeg', 'png');
              //Check the file type
              if(in_array($extn, $extension) === true){
                  
                  $random = rand();
                  $updated_name = $random.$image_name;
                  move_uploaded_file($tmp_name, 'image/users/'.$updated_name);

                  //First delete the image from project folder
                  $unlink_sql = "SELECT u_image FROM users WHERE u_id = '$update_user'";
                  $unlink_res = mysqli_query($db, $unlink_sql);
                  while ($row = mysqli_fetch_assoc($unlink_res)) {
                    $img_name = $row['u_image'];
                  }
                  //delete the file from project folder
                  unlink('image/users/'.$img_name);
 
                  //To ignore error due to ' when user input a string
                  //str_replace(search, replace, subject)

                  $user_address = str_replace("'", "\'", $user_address);
                  $user_biodata = str_replace("'", "\'", $user_biodata);
                  $user_edu = str_replace("'", "\'", $user_edu);

                  $update_sql2 = "UPDATE users SET u_name = '$user_name', u_image = '$updated_name', u_email = '$user_mail', u_address = '$user_address', u_phone = '$user_phone', u_dob = '$user_dob', u_gender = '$user_gender', u_bio = '$user_biodata', u_education = '$user_edu', u_role = '$user_role', u_status = '$user_status' WHERE u_id = '$update_user'";

                  $update_res2 = mysqli_query($db, $update_sql2);

                  if($update_res2){
                      header('Location: users.php');
                  }
                  else{
                      die("User Update Error!".mysqli_error($db));
                  }

              }
              else{
                  echo "<span class='alert bg-danger text-light' role='alert'>File type is not an image</span>";
              }

            }

            //password update(no img)
            else if(!empty($user_password) && empty($image_name)){
                
              $encrypt_pass = sha1($user_password);

              //To ignore error due to ' when user input a string
              //str_replace(search, replace, subject)

              $user_address = str_replace("'", "\'", $user_address);
              $user_biodata = str_replace("'", "\'", $user_biodata);
              $user_edu = str_replace("'", "\'", $user_edu);

              $update_sql3 = "UPDATE users SET u_name = '$user_name', u_email = '$user_mail', u_password = '$encrypt_pass', u_address = '$user_address', u_phone = '$user_phone', u_dob = '$user_dob', u_gender = '$user_gender', u_bio = '$user_biodata', u_education = '$user_edu', u_role = '$user_role', u_status = '$user_status' WHERE u_id = '$update_user'";
              $update_res3 = mysqli_query($db, $update_sql3);

              if($update_res3){
                header('Location: users.php');
              }
              else{
                die("Users Update Error!".mysqli_error($db));
              }

            }

            //update all
            else{

              //split file
              $split = explode('.', $_FILES['image']['name']);
              //Take the extension
              $extn = strtolower(end($split));
              //Take an array in image
              $extension = array('jpg', 'jpeg', 'png');
              //Check the file type
              if(in_array($extn, $extension) === true){
                  
                  $random = rand();
                  $updated_name = $random.$image_name;
                  move_uploaded_file($tmp_name, 'image/users/'.$updated_name);

                  //First delete the image from project folder
                  $unlink_sql2 = "SELECT u_image FROM users WHERE u_id = '$update_user'";
                  $unlink_res2 = mysqli_query($db, $unlink_sql2);
                  while ($row = mysqli_fetch_assoc($unlink_res2)) {
                    $img_name = $row['u_image'];
                  }
                  //delete the file from project folder
                  unlink('image/users/'.$img_name);

                  $encrypt_pass = sha1($user_password);
 
                  //To ignore error due to ' when user input a string
                  //str_replace(search, replace, subject)

                  $user_address = str_replace("'", "\'", $user_address);
                  $user_biodata = str_replace("'", "\'", $user_biodata);
                  $user_edu = str_replace("'", "\'", $user_edu);

                  $update_sql4 = "UPDATE users SET u_name = '$user_name', u_image = '$updated_name', u_email = '$user_mail', u_password = '$encrypt_pass', u_address = '$user_address', u_phone = '$user_phone', u_dob = '$user_dob', u_gender = '$user_gender', u_bio = '$user_biodata', u_education = '$user_edu', u_role = '$user_role', u_status = '$user_status' WHERE u_id = '$update_user'";

                  $update_res4 = mysqli_query($db, $update_sql4);

                  if($update_res4){
                      header('Location: users.php');
                  }
                  else{
                      die("User Update Error!".mysqli_error($db));
                  }

              }
              else{
                  echo "<span class='alert bg-danger text-light' role='alert'>File type is not an image</span>";
              }

            }


          }

        }

        //Delete User
        else if($do == 'delete'){

            if(isset($_GET['delete_id'])){
            $del_id = $_GET['delete_id'];

            //find the file name
            $image_name = "SELECT u_image FROM users WHERE u_id='$del_id'";
            $result = mysqli_query($db, $image_name);
            while ($row = mysqli_fetch_assoc($result)) {
              $img_name = $row['u_image'];
            }

            //delete the file form project folder
            unlink('image/users/'.$img_name);

            //delete all

            //tablename
            $table = 'users';
            //primary key
            $p_key = 'u_id';
            //location
            $url = 'users.php';
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