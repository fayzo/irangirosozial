
<!-- < ?php include "header_navbar_footer/header_if_login.php"?> -->
<?php include "header_navbar_footer/Get_usernameProfile.php"?>
<title>Jobs</title>
<?php include "header_navbar_footer/header.php"?>
      <header class="blog-header py-2 bg-light">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-12 text-center">
           <?php echo $home->links(); ?>
          </div>
        </div>
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
          <?php if (isset($_SESSION['key'])) { ?>
            <button type="button" class="btn btn-light" id="add_food" data-food="<?php echo $_SESSION['key']; ?>" > + Add food </button>
           <?php } ?>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Job</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">

          </div>
        </div>
      </header>
    <section class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <h1><i>Jobs</i></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo HOME ;?>">Home</a></li>
                    <?php if (isset($_SESSION['key'])){ ?>
                    <?php if ($user['user_id'] === $_SESSION['key']) { ?>
                    <li class="breadcrumb-item"><span id="messagePopup" class="more" data-user="<?php echo $user['user_id'];?>"><a href="javascript:void(0);" ><i class="fa fa-envelope-o"></i> Message </a></span></li>
                    <?php } } ?>
                    <li class="breadcrumb-item active"><i><a href="javascript:void(0);" onclick="location.href='<?php echo BASE_URL_PUBLIC.$user['username'] ;?>'"> User Profile</a></i></li>
                    <li class="breadcrumb-item active"><i><a href="javascript:void(0);" class="post_as" data-post_as="1"> Post a jobs</a></i></li>
                    <!-- <li class="breadcrumb-item active"><i><a href="javascript:void(0);" class="price-jobs" data-pricejob="1"> Post a jobs</a></i></li> -->
                </ol>
            </div>
        </div>
    </section>
      <!-- Main content -->
      <section class="content">

        <div class="row">
          <div class="col-md-3 mb-3 d-none d-md-block">

            <?php echo $home->userProfile($user_id); ?>
            <?php echo $trending->trends(); ?>
            <!-- Profile Image -->

          </div>
          <div class="col-md-6 mb-4">
                <div class="row">
                    <div class="col-md-12 mb-4"  id="jobs-hides">
                        <!-- jobs -->
                            <?php echo $home->jobsfetchALL('Featured',1) ;?>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
          </div>
          <!-- col -->

          <div class="col-md-3 d-none d-md-block">
            <!-- whoTofollow: user whoTofollow style 1 -->
            <?php echo $follow->whoTofollow($user_id,$user_id) ;?>

            <div class="sticky-tops" style="top: 52px;z-index:1000;">
               <?php echo $home->options(); ?>
            </div>
          
          </div>
          <!-- col -->
        </div>
        <!-- row -->

      </section>
      <!-- /.content -->


<?php include "header_navbar_footer/footer.php"?>
