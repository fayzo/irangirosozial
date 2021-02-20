<?php 
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['email_notificationDrpdown']) && !empty($_POST['email_notificationDrpdown'])) {
    $user_id= $_SESSION['key'];
    // $tweet_id= $_POST['showMessage'];
	$Msg= $email_notification->recentEmail($user_id); 
	$MsgUnread= $email_notification->recentEmailUnread($user_id); 
	$notification->emailView($user_id);
	?>
		<!-- email UNREAD IN NOTIFICATION -->
		<li id="responseMess"></li>

		 <?php foreach ($MsgUnread as $Message ) {
			 ?>
					<!--Direct Messages-->
				
				<li class="hovernotication inbox-view more" <?php echo ' data-cv_id="'.$Message['cv_id'].'" data-business="'.$Message['business_id0'].'"'; ?> id="messageID<?php echo $Message['user_id'];?>" > <!-- start message -->
                    <a href="#">
                      <div class="pull-left" style="position:relative;">
						  	<?php if (!empty($Message['profile_img'])) { ?>
        						     <img src="<?php echo BASE_URL_LINK."image/users_profile_cover/".$Message['profile_img'];?>"  class="rounded-circle img"  />
							<?php }else {?>
        						     <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>"  class="rounded-circle img" />
							<?php } ?>

							<?php if ($Message['chat'] == 'on') { ?>
										<img src="<?php echo BASE_URL_LINK ;?>image/color/green.png" width="15px" style="position:absolute;bottom:0px;right:10px;">
							<?php }else {?>
										<img src="<?php echo BASE_URL_LINK ;?>image/color/rose.png" width="15px" style="position:absolute;bottom:0px;right:10px;">
							<?php } ?>
                      </div>
                      <h4>
						<span><?php echo $Message['lastname'];?></span> 
                        <small><i class="fa fa-clock-o"></i> <?php echo $users->timeAgo($Message['created_on0']);?></small>
                      </h4>
                      <p><?php echo $Message['addition_information'];?></p>
                    </a>
				</li> <!-- end message -->

		<?php  } ?>

		<!-- MESSAGE READ IN NOTIFICATION -->

         <?php foreach ($Msg as $Message ) {?>
					<!--Direct Messages-->
				
				<li id="messageID<?php echo $Message['user_id'];?>" class="inbox-view more" <?php echo ' data-cv_id="'.$Message['cv_id'].'" data-business="'.$Message['business_id0'].'"'; ?>  > <!-- start message -->
                    <a href="#">
                      <div class="pull-left" style="position:relative;">
						  	<?php if (!empty($Message['profile_img'])) { ?>
        						     <img src="<?php echo BASE_URL_LINK."image/users_profile_cover/".$Message['profile_img'];?>"  class="rounded-circle img"  />
							<?php }else {?>
        						     <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>"  class="rounded-circle img" />
							<?php } ?>

							<?php if ($Message['chat'] == 'on') { ?>
										<img src="<?php echo BASE_URL_LINK ;?>image/color/green.png" width="15px" style="position:absolute;bottom:0px;right:10px;">
							<?php }else {?>
										<img src="<?php echo BASE_URL_LINK ;?>image/color/rose.png" width="15px" style="position:absolute;bottom:0px;right:10px;">
							<?php } ?>
                      </div>
                      <h4>
						<span> <?php echo $Message['lastname'];?> </span>
                        <small><i class="fa fa-clock-o"></i> <?php echo $users->timeAgo($Message['created_on0']);?></small>
                        <!-- <small><span class="deleteMessage more" data-user="< ?php echo $_SESSION["key"]; ?>" data-message="< ?php echo $Message["user_id"]; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></span> <i class="fa fa-clock-o"></i> < ?php echo $users->timeAgo($Message['message_on']);?></small> -->
                      </h4>
                      <p><?php echo $Message['addition_information'];?></p>
                    </a>
				</li> <!-- end message -->
		<?php  } ?>
   					
<?php }

if (isset($_POST['search']) && !empty($_POST['search'])) {
    $user_id= $_SESSION['key'];
    $search= $users->test_input($_POST['search']);
	$result= $home->search_email_composer($search);
	// echo '<pre>';
	// var_dump($result);
	// echo '<pre>';

	 foreach ($result as $user) {
         if ($user['user_id'] != $user_id) {
			 # code...
			$jsonArrays = array(
        		'email' => array(
						$user['email' ] => $user['email'],
				),
        		'form' => ' <input  type="hidden" id="email-send-to" class="email-send-to" name="email-send-to" value="'.$user['user_id'].'">' ,
			);
           exit(json_encode($jsonArrays));
			// $count= count($search);
			// $strpos_countsTo = strpos($user['email'], $search);
			// $path_replace= substr_replace($email,'', 0,$search);
			// echo $search.$path_replace; 
		} 
	}
	
    // echo '<div id="black" class="nav-right-down-wrap main-active">
	// 		 <ul '.((count($result) > 6 )?'class="large-2" style="height:400px;"':'').' > ';
			 
	// foreach ($result as $user) {
    //      if ($user['user_id'] != $user_id) {
	// 		 # code...
	// 		echo ' <li>
  	//             	<div class="nav-right-down-inner">
	// 					 '.$user['email'].'
	// 				</div> 
	//            	  </li> ';
	// 	} 
	// }

	// echo 	'</ul>
	// 	 </div> ';
		 
}

if (isset($_POST['key']) == 'textarea'){

	$user_id= $_POST['user_id'];
    $email_send_to= $_POST['email_send_to'];
    $datetime= date('Y-m-d H-i-s');

    $emailcomposer = $users->test_input($_POST['emailcomposer']);
    $subjectcomposer = $users->test_input($_POST['subjectcomposer']);
    $textcomposer =  $users->test_input($_POST['textcomposer']);
	// $type_of_email =  'sent';
	// if (!empty($_POST['send'])) {
		# code...
    	$type_of_email = $users->test_input($_POST['send']);
	// }else {
	// 	# code...
    // 	$type_of_email = $users->test_input($_POST['draft']);
	// }

	if (!empty($emailcomposer) ) {

		if (strlen($textcomposer ) > 1000) {
			exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>The text is too long !!!</strong> </div>');
		}

	$users->Postsjobscreates('apply_job',array( 
	'email0'=> $emailcomposer,
	'email_sent_for'=>  $user_id,
	'email_sent_to'=> $email_send_to,
	'subject_composer'=> $subjectcomposer,
	'addition_information'=> $textcomposer,
	'uploadfilecv'=> 'no file', 
	'user_id0'=> $user_id,
	'business_id0'=> $user_id,
	'type_of_email'=> $type_of_email,
	'created_on0'=> $datetime ));
    }

}else if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
    $user_id= $_POST['user_id'];
    $email_send_to= $_POST['email-send-to'];
    $datetime= date('Y-m-d H-i-s');

	$photo= $_FILES['file'];

    $emailcomposer = $users->test_input($_POST['emailcomposer']);
    $subjectcomposer = $users->test_input($_POST['subjectcomposer']);
    $textcomposer =  $users->test_input($_POST['textcomposer']);
	// $type_of_email =  'sent';
	// if (!empty($_POST['send'])) {
		# code...
    	$type_of_email = $users->test_input($_POST['send']);
	// }else {
	// 	# code...
    // 	$type_of_email = $users->test_input($_POST['draft']);
	// }

	if (!empty($emailcomposer) || !empty(array_filter($photo['name'])) ) {
		if (!empty($photo['name'][0])) {
			# code...
			$photo_ = $home->uploadComposerFile($photo);
		}

		if (strlen($textcomposer ) > 1000) {
			exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>The text is too long !!!</strong> </div>');
		}

	$users->Postsjobscreates('apply_job',array( 
	'email0'=> $emailcomposer,
	'email_sent_for'=>  $user_id,
	'email_sent_to'=> $email_send_to,
	'subject_composer'=> $subjectcomposer,
	'addition_information'=> $textcomposer,
	'uploadfilecv'=> $photo_, 
	'user_id0'=> $user_id,
	'business_id0'=> $user_id,
	'type_of_email'=> $type_of_email,
	'created_on0'=> $datetime ));
    }
} 

?> 
