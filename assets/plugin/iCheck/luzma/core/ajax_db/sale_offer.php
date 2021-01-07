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
    $user= $sale->saleReadmore($sale_id);
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
<div class="sale-popup">
    <div class="wrap6" id="disabler">
        <span class="colose">
        	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="wrap6Pophide" onclick="togglePopup( )"></div>
           <div class="img-popup-wrap"  id="popupEnd">

        	<div class="img-popup-body">

            <div class="card">
                <div class="card-header">
                   <button class="btn btn-success btn-sm  float-right d-md-block d-lg-none"  onclick="togglePopup ( )">close</button>
                </div>
                <div class="card-body">
                 <div class="row reusercolor p-2 mb-2">

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
                                            <li data-thumb="<?php echo BASE_URL_PUBLIC.'uploads/sale/'.$expode [$i]; ?>" > 
                                               <img src="<?php echo BASE_URL_PUBLIC.'uploads/sale/'.$expode [$i]; ?>" />
                                            </li>
                                      <?php } ?>
                                </ul>
                            </div>  
                       </div> <!-- col-md-6  -->
                       <div class="col-md-6">
                            <h4 class="mt-2 text-center"><i>Details of Items</i></h4>
                             
                            <div><span class="font-weight-bold">Condition : </span>
                             <ul>
                                <li>New</li>
                                <li><?php echo $user['text']; ?></li>
                             </ul></div>

                            <form action="" method="post" class="retweetcolor">
                            <table class="table table-hover table-inverse" style="background-color:#0000000d;">
                                    <tbody>
                                        <tr>
                                            <td>Price: </td>
                                            <td class="float-right">  <?php if($user['price_discount'] != 0){ ?><span class="text-danger " style="text-decoration: line-through;"><?php echo number_format($user['price_discount']); ?> Frw</span> <?php } ?> <span class="ml-3 text-primary"><?php echo number_format($user['price']) ." Frw"; ?></span></td>
                                        </tr>
                                       
                                        <tr>
                                            <td>Best Price:</td>
                                            <td><button type="button" class="btn btn-primary float-right" <?php if(isset($_SESSION['key'])){ echo ' onclick="cart_add(\'add\',\'form-cartitem'.$user['code'].'add\',\''.$user['code'].'\');" '; }else{ echo 'id="login-please"  data-login="1"'; } ?> >add to cart</button></td>
                                        </tr>
                                    </tbody>
                            </table>
                            </form>

                            <div><span class="font-weight-bold"> Shipping:</span> 
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
                            <div><span class="font-weight-bold">Returns:</span> Sellers accept returns items if it has problem within 3 days used</div>
                            

                       </div><!-- /.col -->
            <?php 
            $file = $user['photo']."=".$user['other_photo'];
            $expodefile = explode("=",$file); 
            $fileActualExt= array();
                for ($i=0; $i < count($expodefile); ++$i) { 
                    $fileActualExt[]= strtolower(substr($expodefile[$i],-3));
                }
                $allower_ext = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                
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
                                <img src="<?php echo BASE_URL_PUBLIC."uploads/sale/".$splice[$i] ;?>"
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
                                <img src="<?php echo BASE_URL_PUBLIC."uploads/sale/".$splice[$i] ;?>"
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

if (!empty($_REQUEST['checkout'])) {
     $get_province = mysqli_query($db,"SELECT * FROM provinces");   
    ?>
    <div class="container bg-light">
        <div class="row mb-3 pt-3">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="firstname">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="lastname">
            </div>
        </div>
        <div class="row mb-2 pb-3">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="address">
            </div>
            <div class="col-md-6">
                <input type="number" class="form-control" placeholder="phone">
            </div>
        </div>
        <div class="row mb-2 pb-3">

            <div class="col-md-12">
                <label for="" class="text-dark">Province</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select name="provincecode"  id="provincecode" onchange="showResult();" class="form-control provincecode">
                        <option value="">----Select province----</option>
                        <?php while($show_province = mysqli_fetch_array($get_province)) { ?>
                        <option value="<?php echo $show_province['provincecode'] ?>"><?php echo $show_province['provincename'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <label for="" class="text-dark"> District</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select class="form-control districtcode" name="districtcode" id="districtcode" onchange="showResult2();" >
                        <option></option>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <label for="Sector" class="text-dark">Sector</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select class="form-control sectorcode" name="sectorcode" id="sectorcode"  onchange="showResult3();">
                        <option></option>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <label for="Cell" class="text-dark">Cell</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select name="codecell" id="codecell" class="form-control codecell" onchange="showResult4();">
                        <option></option>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <label for="Village">Village</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                        <select name="CodeVillage" id="CodeVillage" class="form-control CodeVillage">
                            <option> </option>
                        </select>
                </div>
            </div>
        </div>

        <button type="button" name="proceed-of-payment" onclick="paymentSale('payment');" class="btnRemoveAction btn-primary float-right">proceed of payment</button>
    </div>
<?php } 

if (!empty($_REQUEST['payment'])) {
    ?>
    <div class="container bg-light">
    <h4 class="mb-3" style="text-decoration: underline;">Billing address</h4>
    <form class="needs-validation" novalidate>

        <div class="d-block my-3">
            <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Credit card</label>
            </div>
            <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Debit card</label>
            </div>
            <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="paypal">PayPal</label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                Name on card is required
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                Credit card number is required
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                Expiration date required
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                Security code required
                </div>
            </div>
        </div>
    </form>
        <hr class="mb-2">
        <div class="row mb-2 p-3">

            <label for="lastname">Send Mobile money to This number :</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-money"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="number" id="number"
                    aria-describedby="helpId" value="MTN:(+250) 0783566367" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-money"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="number" id="number"
                    aria-describedby="helpId" value="TIGO:(+250) 074925262672" readonly>
            </div>

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
            <div><span class="font-weight-bold">Returns:</span> Sellers accept returns items within 3 days only </div>

        </div>
        <button type="button" name="submit-of-payment" id="submit-of-payment" class="btnRemoveAction btn-primary float-right">submit of payment</button>
    </div>
<?php } 