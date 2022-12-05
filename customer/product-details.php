	<?php include("header.php");?>

    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
	
			<?php 
				$id         = $_GET['id'];
				$products   = $mysqli->query("SELECT * from pos_items where item_id='$id'");
				while($valp = $products->fetch_object()){	
			?>
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="../admin/assets/menu/<?php echo $valp->image;?>" alt="Image">
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-7 pb-5">
				<?php if(isset($_GET['added'])){?>
				<div class="alert alert-info alert-dismissable">
					<strong>Order Added!</strong> Please see your cart!
				</div>
				<?php } ?>
				<form method="post">
                <h3 class="font-weight-semi-bold"><?php echo $valp->item_name;?></h3>

                <h3 class="font-weight-semi-bold mb-4"> ₱ <?php echo number_format($valp->item_price,2);?></h3>
                <p class="mb-4"><b>Description :</b> <br> <?php echo $valp->description;?></p>
				<p class="mb-4"><b>Manufacturing Date :</b> <br> <?php echo $valp->mdate;?></p>
                <p class="mb-4"><b>Expiration Date :</b> <br> <?php echo $valp->edate;?></p>
                <p class="mb-4"><b>Stock Status :</b> <br> <?php if( $valp->is_new == 1){ echo "New Stock"; } else { echo "Old Stock";}?></p>
				<hr>
                
                <div class="d-flex align-items-center mb-4 pt-2">
					<input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
					<input type="hidden" value="<?php echo $valp->item_id;?>" name="item_id">
					<input type="hidden" value="<?php echo $_SESSION['id'];?>" name="customer_id">
					<?php $d  = $s + $m + $l + $xl + $xxl + $xxxl;
						  if($d == 6){
					?>
						<button type="button" class="btn btn-danger px-3"  name="add-order"><i class="fa fa-shopping-cart mr-1" ></i> Out of Stock</button>
					<?php } else { ?>
						<button type="submit" class="btn btn-primary px-3"  name="add-order"><i class="fa fa-shopping-cart mr-1" ></i> Add To Cart</button>
					<?php } ?>
                </div>
				</form>
               
            </div>
        </div>
     
	<?php } ?>
    </div>
    <!-- Shop Detail End -->

	<?php include("footer.php");?>