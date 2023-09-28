
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

        $user_id =  $_SESSION['u_id'];

        $sql = "SELECT * FROM users WHERE u_id = '$user_id'";
        $result = mysqli_query($db, $sql);

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
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-12">
            <div class="white-box">
                <div class="user-bg"> <img width="100%" alt="user" src="image/users/<?php echo $u_image;?>">
                    <div class="overlay-box">
                        <div class="user-content">
                            <a href="javascript:void(0)"><img src="image/users/<?php echo $u_image;?>"
                                    class="thumb-lg img-circle" alt="img"></a>
                            <h4 class="text-white mt-2"><?php echo $u_name;?></h4>
                            <h5 class="text-white mt-2"><?php echo $u_email;?></h5>
                        </div>
                    </div>
                </div>
                <div class="user-btm-box mt-5 d-md-flex">
                    <div class="col-md-4 col-sm-4 text-center">
                        <h1><?php echo $u_phone;?></h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="profile.php" method="post">
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Full Name</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="<?php echo $u_name;?>" value="<?php echo $u_name;?>"
                                    class="form-control p-0 border-0" name="user_name"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Email</label>
                            <div class="col-md-12 border-bottom p-0">
                            <input type="email" placeholder="<?php echo $u_email;?>" value="<?php echo $u_email;?>"
                                class="form-control p-0 border-0" name="user_mail"
                                id="example-email">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Password</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="password" class="form-control p-0 border-0" value="<?php echo $u_password;?>" name="user_password">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Phone No</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="<?php echo $u_phone;?>" value="<?php echo $u_phone;?>"
                                    class="form-control p-0 border-0" name="user_phone">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Address</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="<?php echo $u_phone;?>" value="<?php echo $u_address;?>"
                                    class="form-control p-0 border-0" name="user_address">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Biodata</label>
                            <div class="col-md-12 border-bottom p-0">
                                <textarea rows="5" class="form-control p-0 border-0" value="<?php echo $u_bio;?>" name="user_biodata"><?php echo $u_bio;?></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Education</label>
                            <div class="col-md-12 border-bottom p-0">
                                <textarea rows="5" class="form-control p-0 border-0" value="<?php echo $u_education;?>" name="user_edu"><?php echo $u_education;?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <img src="image/users/<?php echo $u_image;?>" width="100"><br/>
                            <label for="ExampleInputFile">Profile Picture</label>
                            <input type="file" class="form-control-file" id="ExampleInputFile" name="image" aria-describedby="fileHelp"><br/>
                            <small id="fileHelp" class="form-text text-muted">Select photo only. Don't upload a photo more than 1mb file size. Also try to uplaod a jpeg, jpg, png format.</small>
                        </div>
                        <input type="hidden" name="profile_id" value="<?php echo $user_id;?>">
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

<?php
    
    include "inc/footer.php";

?>