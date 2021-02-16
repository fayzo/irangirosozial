<div class="container-fuild mt-4 mb-4">

    <div class="row">
        <div class="col-sm-12 col-md-8 offset-md-2">
            <!-- Widget: user widget style 1 -->
            <div class="card card-follow user-follow">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                 <?php if (!empty($user['cover_img'])) {?>
                <div class="user-header-follow-logout text-white" style="background: url('<?php echo BASE_URL_LINK ;?>image/users_cover_profile/<?php echo $user['cover_img'] ;?>') center center;background-size: cover; overflow: hidden; width: 100%;">
                 <?php  }else{ ?>
                <div class="user-header-follow-logout text-white" style="background: url('<?php echo BASE_URL_LINK.NO_COVER_IMAGE_URL ;?>') center center;background-size: cover; overflow: hidden; width: 100%;">
                 <?php } ?>

                    <div class="text-center">
                        <h3 class="widget-user-usernames"><?php echo $user['username'];?></h3>
                        <h5 class="widget-user-desc">Member since <?php echo $users->timeAgo($user['date_registry']); ?></h5>
                    </div>
                </div>
                <div class="user-image-follow">

                  <?php if (!empty($user['profile_img'])) {?>
                    <img class="rounded-circle elevation-2" src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $user['profile_img'] ;?>">
                 <?php  }else{ ?>
                    <img class="rounded-circle elevation-2" src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" >
                 <?php } ?>

                </div>
               
                <div class="logout">
                    <h5 class="user-username-follow"><?php echo $user['username'] ;?></h5>
                    <h5 class="user-username-follow"><small><?php echo $user['career'] ;?></small></h5>
                    <button  type="button" class="btn btn-md main-active "><a class="text-white" href="<?php echo LOGOUT ;?>">Logout</a></button>
                </div>
                <!-- /.footer -->
            </div>
            <!-- /. card widget-user -->
        </div>
        <!-- col -->
    </div>
    <!-- row -->

</div>
<!-- container -->