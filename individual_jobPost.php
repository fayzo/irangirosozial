<?php 
include "core/init.php";

if ($users->jobloggedin() == 'individual' && $users->loggedin() == true) {
    $user= $home->userData($_SESSION['key']);
    // $jobs= $home->jobsData($_SESSION['key']);
    // $fundraisingV= $home->fundraisingData($_SESSION['key']);
    // $eventV= $home->eventsData($_SESSION['key']);
    // $blogV= $home->blogData($_SESSION['key']);
    // $saleV= $home->saleData($_SESSION['key']);
    $user_id= $_SESSION['key'];
    $notific= $notification->getNotificationCount($user_id);
    $notification->notificationsView($user_id);
}else {
    header('location: jobs.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Job Posted by <?php echo $_SESSION['job_user']; ?></title>
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

      <!-- Main content -->
    <div class="container-fluid mb-5">
      <?php include "header_navbar_footer/siderbar_jobs.php"?>
    </div>


<?php include "header_navbar_footer/footer.php"?>
