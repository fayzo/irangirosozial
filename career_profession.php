
<!-- < ?php include "header_navbar_footer/header_if_login.php"?> -->
<?php include "header_navbar_footer/Get_usernameProfile.php"?>
<title>Fundraising</title>
<?php include "header_navbar_footer/header.php"?>

<!-- container-fuild -->
      <header class="blog-header py-2 bg-light">
        <div class="row flex-nowrap justify-content-between align-items-center border-navbar">
          <div class="col-12 text-center">
           <?php echo $home->links(); ?>
          </div>
        </div>
           <!-- <div> 
           <img style="height:60px;" src="<?php echo BASE_URL_LINK;?>image/image_default/border-bottom.png" />
          </div> -->
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 ">
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Professional</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
          </div>
        </div>
      </header>

<div class="container mb-5 mt-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i>Professional</i></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo HOME ;?>">Home</a></li>
                      <?php if (isset($_SESSION['key'])){ ?>
                      <?php if ($user['user_id'] === $_SESSION['key']) { ?>
                    <li class="breadcrumb-item"><span id="messagePopup" class="more" data-user="<?php echo $user['user_id'];?>"><a href="javascript:void(0);" ><i class="fa fa-envelope-o"></i> Message </a></span></li>
                    <?php } } ?>
                    <li class="breadcrumb-item active"><i><a href="<?php echo PROFILE ;?>"> User Profile</a></i></li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
   <?php if (isset($_SESSION['key'])){ ?>
            <div class="col-md-3 mb-3">
                <!-- Profile Image -->
                <?php echo $home->userProfile($user_id); ?>
                <!-- hastTag Me Box -->
                 <?php echo $trending->trends(); ?>
            </div>
            <!-- /.col -->
<?php }else{ ?>
    <div class="col-md-3 mb-3">
          <?php echo $home->jobsfetch() ;?>
    </div>
<?php } ?>
            <div class="col-md-6">
                <div class="row">

                    <div class="col-md-12 mb-4"  id="jobs-hides">
                        <!-- jobs -->
                               <?php echo $unemployment->unemplyomentfetchALL('Featured',1) ;?>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.col-md-6 -->

            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 mb-3">
                       <?php echo $follow->whoTofollow($user_id,$user_id) ;?>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-12 mb-3">
                       <?php echo $home->options(); ?>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "header_navbar_footer/footer.php"?>
