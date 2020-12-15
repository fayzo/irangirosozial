<?php 
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['sale']) && !empty($_POST['sale'])) {
      if (isset($_SESSION['key'])) {
        # code...
        $user_id= $_SESSION['key'];
    }else {
        # code...
        $username= $users->test_input('jojo');
        $uprofileId= $home->usersNameId($username);
        $profileData= $home->userData($uprofileId['user_id']);
        $user_id= $profileData['user_id'];
    }
    
    $sale_id = $_POST['sale'];
    $user= $gurisha->gurishaReadmore($sale_id);
     ?>
<style>
    	
        .demo .item{
            margin-bottom: 60px;
        }
		.content-slider li{
		    background-color: #ed3020;
		    text-align: center;
		    color: #FFF;
		}
		.content-slider h3 {
		    margin: 0;
		    padding: 70px 0;
		}
		.demo{
			width: 800px;
		}
</style>
<div class="gurisha-popup">
    <div class="wrap6">
        <span class="colose">
        	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap">
        	<div class="img-popup-body">

            <div class="card">
                <div class="card-body">
                 <div class="row reusercolor p-2">

                       <div class="col-md-6">
                         <h2 class='text-center'><?php echo $user['title']; ?></h2>
                            <div class="clearfix" style="max-width:474px;">
                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                <?php 
                                        $file = $user['photo']."=".$user['other_photo'];
                                        $expode = explode("=",$file);
                                        // $splice = array_expode ($expode,0,10);
                                        for ($i=0; $i < count($expode); ++$i) { 
                                            ?>
                                            <li data-thumb="<?php echo BASE_URL_PUBLIC.'uploads/sale-gurisha/'.$expode [$i]; ?>" > 
                                               <img src="<?php echo BASE_URL_PUBLIC.'uploads/sale-gurisha/'.$expode [$i]; ?>" />
                                            </li>
                                      <?php } ?>
                                </ul>
                            </div>  

                            <h4 class="mt-2 text-center"><i>Details of Items</i></h4>
                            <div><span class="font-weight-bold">Condition : </span>
                             <ul>
                                <li>Used </li>
                                <li><?php echo $user['text']; ?></li>
                             </ul></div>
                       </div> <!-- col-md-6  -->
                       <div class="col-md-6">

                            <form action="" method="post" class="retweetcolor">
                            <table class="table table-hover table-inverse" style="background-color:#0000000d;">
                                    <tbody>
                                        <tr>
                                            <td>starting bid: </td>
                                            <td><?php echo number_format($user['price']) ." Frw"; ?><span class="float-right text-primary">[ 0 bids]</span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon2">Frw</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="title" id="title" placeholder="458" style="width: 3px;" >
                                                    <div class="input-group-append">
                                                        <span class="input-group-text btnAddAction ml-0 btn-primary" style="padding: 0px 10px;" id="basic-addon2">Place bid</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Best Offer:</td>
                                            <td><button type="button" class="btn btn-primary float-right" <?php if(isset($_SESSION['key'])){ echo ' onclick="cart_gurisha_add(\'add\',\'form-cartitem'.$user['code'].'add\',\''.$user['code'].'\');" '; }else{ echo 'id="login-please"  data-login="1"'; } ?> >Make Offer</button></td>
                                        </tr>
                                    </tbody>
                            </table>
                            </form>

                            <div>
                                <span class="font-weight-bold"> Shipping:</span> 
                            <ul>
                                <li>it depend your location mininmun shipping 3000 Frw only in Rwanda</li> 
                             </ul></div>
                            <div><span class="font-weight-bold">By pick your items by yoursef in our location :</span>
                             <ul>
                                <li> Gasabo districts</li>
                             </ul></div>
                            <div><span class="font-weight-bold">Payments:</span> 
                             <ul>
                                <li>Visa Card | Mtn money | Airtel money | Pesa money</li>
                             </ul></div>
                            <div><span class="font-weight-bold">Returns:</span> Sellers does not accept returns items</div>
                            

                       </div><!-- /.col -->
            <?php 
            $file = $user['photo']."=".$user['other_photo'];
            $expodefile = explode("=",$file); 
            $fileActualExt= array();
                for ($i=0; $i < count($expodefile); ++$i) { 
                    $fileActualExt[]= strtolower(substr($expodefile[$i],-3));
                }
                $allower_ext = array('jpeg','peg', 'jpg', 'png', 'gif'); // valid extensions
                
             if (array_diff($fileActualExt,$allower_ext) == false) {

                        $file = $user['photo']."=".$user['other_photo'];
                        $expode = explode("=",$file);  
                        $count = count($expode); 
                        $rowCount = 0;

                switch ($count) {
                    case 1:
                            $numOfCols = 1; ?>
                            <div class="row">
                            <?php $expode = explode("=",$file);
                            // $splice= array_splice($expode,0,2);
                            $splice= $expode;
                            $title= $user['photo_Title_main']."=".$user["photo_Title"];
                            $photo_title=  explode("=",$title);
                            for ($i=0; $i < count($splice); ++$i) { 
                            ?>
                        <div class="col-md-<?php echo 12/$numOfCols; ?>">
                             <div class="imagesaleViewPopup more"  data-sale="<?php echo $user["sale_id"] ;?>">
                                <img src="<?php echo BASE_URL_PUBLIC."uploads/sale-gurisha/".$splice[$i] ;?>"
                                    alt="Photo" height="250px">
                                </div>
                            <div class="h5"><i><?php echo $photo_title[$i]; ?></i></div>
                        </div><!-- col -->
                    <?php
                        $rowCount++;
                        if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
                    } ?>
                    </div> 
                    <?php 
                    break;
                default:
                        # code...
                            $numOfCols = 2; ?>
                            <div class="row">
                            <?php $expode = explode("=",$file);
                            // $splice= array_splice($expode,0,2);
                            $splice= $expode;
                            $title= $user['photo_Title_main']."=".$user["photo_Title"];
                            $photo_title=  explode("=",$title);
                            for ($i=0; $i < count($splice); ++$i) { 
                            ?>
                        <div class="col-md-<?php echo 12/$numOfCols; ?>">
                            <div class="imagesaleViewPopup more"  data-sale="<?php echo $user["sale_id"] ;?>">
                                <img src="<?php echo BASE_URL_PUBLIC."uploads/sale-gurisha/".$splice[$i] ;?>"
                                    alt="Photo" height="250px" >
                                </div>
                            <div class="h5"><i><?php echo $photo_title[$i]; ?></i></div>
                        </div><!-- col -->
                    <?php
                        $rowCount++;
                        if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
                    }
                    ?>
                    </div> <?php
                        break;
                    } } ?>

                </div><!-- card-body -->
                <div class="card-footer text-center">
                      <p class="mb-1"><?php echo $users->copyright(2018); ?></p>
                </div>
            </div>

           </div><!-- img-popup-body -->
        </div><!-- user-show-popup-box -->
    </div> <!-- Wrp4 -->
</div> <!-- apply-popup" -->

  <script>
    	 $(document).ready(function() {
			$("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
		});
    </script>
<?php } 