  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/inventory.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
				<h5 class="card-title"><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#add-item"> <i class="bi bi-plus-square"></i> Add Products </button></h5>
                <div class="col-lg-12 col-md-12 order-1">
				<div class="card">
				<br>
                 <table class="table table-striped table-bordered" id="table_id_products">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Image</th>
                    <th scope="col"  class="text-center">Name</th>
                    <th scope="col"  class="text-center">Price</th>
                    <th scope="col"  class="text-center">Category</th>
                    <th scope="col"  class="text-center">Stocks </th>
                    <th scope="col"  class="text-center">Stock Status </th>
                    <th scope="col"  class="text-center">Manufactured Date </th>
                    <th scope="col"  class="text-center">Expiration Date </th>
                    <th scope="col"  class="text-center">Date Added</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $customer->fetch_object()){ ?>
				  <tr>
                    <td class="text-center"><img src="assets/menu/<?php echo $val->image;?>" width="200"></td>
                    <td class="text-center"><?php echo $val->item_name;?></td>
                    <td class="text-center"> ₱ <?php echo number_format($val->item_price,2);?></td>
                    <td class="text-center"><?php echo $val->category;?></td>
                    <td class="text-center"><?php echo $val->stock;?></td>
                    <td class="text-center"><?php if( $val->is_new == 1){ echo "New Stock"; } else { echo "Old Stock";}?></td>
                    <td class="text-center"><?php echo $val->mdate;?></td>
                    <td class="text-center"><?php echo $val->edate;?></td>
                    <td class="text-center"><?php echo $val->date_added;?></td>
                    <td class="text-center">
						<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-item<?php echo $val->item_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete-item<?php echo $val->item_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
				  
				  
					 <div class="modal fade" id="edit-item<?php echo $val->item_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Product</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" enctype="multipart/form-data" method="post">
						   
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Name: </label>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->item_id;?>" required>
							  <input type="text" class="form-control" name="name" value="<?php echo $val->item_name;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Price: </label>
							  <input type="text" class="form-control" name="price"  value="<?php echo $val->item_price;?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							</div>	
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Stock Quantity: </label>
							  <input type="text" class="form-control" name="stock"  value="<?php echo $val->stock;?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							</div>
							<div class="col-12" id="item-category">
							  <label for="inputNanme4" class="form-label">Item Category: </label>
							  <select class="form-control" name="category"  required>
								<option value=""> - Select Category - </option>
								<?php
									$category = $mysqli->query("SELECT * from pos_item_category");
										while($val2 = $category->fetch_object()){
											if($val->category_id == $val2->category_id){
												echo "<option value=". $val2->category_id ." selected>" .  $val2->name . "</option>";
											} else { 
												echo "<option value=". $val2->category_id .">" .  $val2->name . "</option>";
											}
										}
								?>
							  </select>
							</div>
						
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Description: </label>
							  <textarea type="text" class="form-control" name="description" required><?php echo $val->description;?></textarea>
							</div>
						
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Image: </label>
							  <input type="file" class="form-control" name="image" id="item_price">
							  <input type="hidden" class="form-control" name="image1"  value="<?php echo $val->image;?>" >
							</div>
							<div class="col-12" id="item-category">
							  <label for="inputNanme4" class="form-label"> Stock Status: </label>
							  <select class="form-control" name="is_new"  required>
								<?php if($val->is_new == '1'){?>
									<option value="1" selected> New </option>
									<option value="0"> Old </option>
								<?php } else { ?>
									<option value="1"> New </option>
									<option value="0" selected> Old </option>
								<?php } ?>
							  </select>
							</div>	
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Manufactured Date: </label>
							  <input type="date" class="form-control" name="mdate" value="<?php echo $val->mdate;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Expiration Date: </label>
							  <input type="date" class="form-control" name="edate" value="<?php echo $val->edate;?>" required>
							</div>
							
							</div>
							
								<div class="modal-footer">
								  <button type="submit" class="btn btn-primary" name="update-item">Save </button>
								  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								</div>
								</form>
						</div>
						</div>
						</div>
					</div>
					
					 <div class="modal fade" id="delete-item<?php echo $val->item_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Product</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Product Data?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->item_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-item">Delete </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
					  </div>
					</div>
					</div>
                <?php } ?>
                </tbody>
                </table>
                </div>
                </div>
         
              </div>
            
            </div>
            <!-- / Content -->
		<div class="modal fade" id="add-item" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"> Product Details </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form method="post"  enctype="multipart/form-data">
						<div class="col-12">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Name: </label>
							  <input type="text" class="form-control" name="name" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Price: </label>
							  <input type="text" class="form-control" name="price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Stock Quantity: </label>
							  <input type="text" class="form-control" name="stock"  value="<?php echo $val->stock;?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							</div>
							<div class="col-12" id="item-category">
							  <label for="inputNanme4" class="form-label">Item Category: </label>
							  <select class="form-control" name="category"  required>
								<option value=""> - Select Category - </option>
								<?php
									$category = $mysqli->query("SELECT * from pos_item_category");
										while($val2 = $category->fetch_object()){
											echo "<option value=". $val2->category_id .">" .  $val2->name . "</option>";
										}
								?>
							  </select>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Description: </label>
							  <textarea type="text" class="form-control" name="description" required></textarea>
							</div>

							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Image: </label>
							  <input type="file" class="form-control" name="image" id="item_price"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							</div>
							<div class="col-12" id="item-category">
							  <label for="inputNanme4" class="form-label">New Stock : </label>
							  <select class="form-control" name="is_new"  required>
								<option value=""> - Select  - </option>
								<option value="1"> New </option>
								<option value="0"> Old </option>
							  </select>
							</div>	
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Manufactured Date: </label>
							  <input type="date" class="form-control" name="mdate" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Expiration Date: </label>
							  <input type="date" class="form-control" name="edate" required>
							</div>
						</div>
					
						
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-item">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
    <?php include("footer.php");?>      