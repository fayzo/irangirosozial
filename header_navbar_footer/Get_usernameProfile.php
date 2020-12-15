<?php 
include "core/init.php";

if (isset($_GET['username']) == true && empty($_GET['username']) == false) {
    # code...
    $username= $users->test_input($_GET['username']);
    $uprofileId= $home->usersNameId($username);
	$profileData= $home->userData($uprofileId['user_id']);

   	if ($users->loggedin() == true) {
        $user_id= $_SESSION['key'];
        // $jobs= $home->jobsData($_SESSION['key']);
        // $fundraisingV= $home->fundraisingData($_SESSION['key']);
        // $eventV= $home->eventsData($_SESSION['key']);
        // $saleV= $home->saleData($_SESSION['key']);

		$notific= $notification->getNotificationCount($user_id);
		$notification->notificationsView($user_id);
	}else{
        $user_id= $profileData['user_id'];
        // $jobs= $home->jobsData($user_id);

	}

	$user= $home->userData($user_id);
	
    if (!isset($profileData['user_id'])) {
        # code...
        header('Location: '.LOGIN.'');
    }

}

else{

        # code...
        $username= $users->test_input('irangiro');
        $uprofileId= $home->usersNameId($username);
        $profileData= $home->userData($uprofileId['user_id']);

        if ($users->loggedin() == true) {
            $user_id= $_SESSION['key'];

//             $jobs= $home->jobsData($_SESSION['key']);
//             $fundraisingV= $home->fundraisingData($_SESSION['key']);
//             $eventV= $home->eventsData($_SESSION['key']);
//             $blogV= $home->blogData($_SESSION['key']);
//             $saleV= $home->saleData($_SESSION['key']);

            $notific= $notification->getNotificationCount($user_id);
            $notification->notificationsView($user_id);
        }else{
            $user_id= $profileData['user_id'];
        }

        $_SESSION['irangiro_key'] = 1;

        $user= $home->userData($user_id);
        
        if (!isset($profileData['user_id'])) {
            # code...
            header('Location: '.LOGIN.'');
        }

}

echo $sale->cart_item(); 

echo $food->Foodcart_item(); 


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    