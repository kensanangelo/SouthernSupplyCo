<?php

?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Southern Supply Co. Admin Panel - Group 4</title>

		<?php 
			include 'includes.php';
			include 'header.php';

			//Checks which state the button was in
			if(isset($_POST['add-edit-button'])){

				$actionHappened=true;

				if($_POST['add-edit-button']=='Add product'){

					$setTable = 'products';

					//If they are trying to add a product
					$values = array($_POST['name'], $_POST['desc'], $_POST['cat'], $_POST['SKU'], $_POST['stock'], $_POST['cost'], $_POST['price'], $_POST['sale'], $_POST['url'], $_POST['rating'], $_POST['numVotes']);
					$resultMessage = addToDB('products', $values);

					if($resultMessage == "Success"){
						$statusString = 'Product was successfully added!';
					} else {
						$statusString = 'Product failed to be added! '.$resultMessage;
					}

				}else if($_POST['add-edit-button']=='Edit product'){

					$setTable = 'products';

					//If they are trying to edit a product
					$returnedId = $_POST['hiddenId'];
					$resultMessage = changeInDB('products', 'productName="'.$_POST['name'].'", description="'.$_POST['desc'].'", category="'.$_POST['cat'].'", SKU="'.$_POST['SKU'].'", stock="'.$_POST['stock'].'", cost="'.$_POST['cost'].'", price="'.$_POST['price'].'", salePrice="'.$_POST['sale'].'", productImage="'.$_POST['url'].'", rating="'.$_POST['rating'].'", numOfVotes="'.$_POST['numVotes'].'"', 'productID="'.$returnedId.'"');
					
					if($resultMessage=="Success"){
						$statusString='Product was successfully edited!';
					} else {
						$statusString='Product failed to be edited!';
					}

				}else if($_POST['add-edit-button']=='Delete product'){

					$setTable = 'products';

					//If they are trying to delete a product
					$returnedId=$_POST['hiddenId'];

					if($returnedId>=0)
						$resultMessage=removeFromDB('products', 'productID="'.$returnedId.'"');
					else
						$resultMessage='Failure';

					if($resultMessage=="Success"){
						$statusString='Product was successfully removed!';
					} else {
						$statusString='Product failed to be removed!';			
					}

				}else if($_POST['add-edit-button']=='Add user'){
					
					$setTable = 'users';

					//If they are trying to add a user
					$values=array($_POST['username'], $_POST['pass'], $_POST['userAccess'], $_POST['first'], $_POST['last'], $_POST['email'], $_POST['address']);
					$resultMessage=addToDB('users', $values);
					if($resultMessage=="Success")
						$statusString='User was successfully added!';
					else
						$statusString='User failed to be added!';
				}else if($_POST['add-edit-button']=='Edit user'){
					
					$setTable = 'users';

					//If they are trying to edit a user
					$returnedId=$_POST['hiddenId'];
					$resultMessage=changeInDB('users', 'username="'.$_POST['username'].'", password="'.$_POST['pass'].'", user_access="'.$_POST['userAccess'].'", first_name="'.$_POST['first'].'", last_name="'.$_POST['last'].'", email="'.$_POST['email'].'", address="'.$_POST['address'].'"', 'id="'.$returnedId.'"');
					
					if($resultMessage=="Success")
						$statusString='User was successfully edited!';
					else
						$statusString='User failed to be edited!'.$resultMessage;

				}else if($_POST['add-edit-button']=='Delete user'){
					
					$setTable = 'users';

					//If they are trying to delete a user
					$returnedId=$_POST['hiddenId'];

					if($returnedId>=0)
						$resultMessage=removeFromDB('users', 'id="'.$returnedId.'"');
					else
						$resultMessage='Failure';

					if($resultMessage=="Success")
						$statusString='User was successfully removed!';
					else
						$statusString='User failed to be removed!';			
				}else if($_POST['add-edit-button']=='Add order'){
					
					$setTable = 'orders';

					//If they are trying to add an order
					$values=array($_POST['userId'], $_POST['cart'], $_POST['orderTotal'], $_POST['purchaseDate'], $_POST['fullName'], $_POST['phone'], $_POST['email'], $_POST['address1'], $_POST['address2'], $_POST['city'], $_POST['state'], $_POST['zip']);
					$resultMessage=addToDB('orders', $values);
					if($resultMessage=="Success")
						$statusString='Order was successfully added!';
					else
						$statusString='Order failed to be added!';
				}else if($_POST['add-edit-button']=='Edit order'){
					
					$setTable = 'orders';

					//If they are trying to edit an order
					$returnedId=$_POST['hiddenId'];
					$resultMessage=changeInDB('orders', 'user_id="'.$_POST['userId'].'", cart="'.$_POST['cart'].'", order_total="'.$_POST['orderTotal'].'", purchase_date="'.$_POST['purchaseDate'].'", full_name="'.$_POST['fullName'].'", customer_phone="'.$_POST['phone'].'", customer_email="'.$_POST['email'].'", address_line1="'.$_POST['address1'].'", address_line2="'.$_POST['address2'].'", address_city="'.$_POST['city'].'", address_state="'.$_POST['state'].'", address_zip="'.$_POST['zip'].'"', 'id="'.$returnedId.'"');
					
					if($resultMessage=="Success")
						$statusString='Order was successfully edited!';
					else
						$statusString='Order failed to be edited!'.$resultMessage;

				}else if($_POST['add-edit-button']=='Delete order'){
					
					$setTable = 'orders';

					//If they are trying to delete an order
					$returnedId=$_POST['hiddenId'];

					if($returnedId>=0)
						$resultMessage=removeFromDB('orders', 'id="'.$returnedId.'"');
					else
						$resultMessage='Failure';

					if($resultMessage=="Success")
						$statusString='Order was successfully removed!';
					else
						$statusString='Order failed to be removed!';			
				}
			}

			//Figures out which database we are in and pulls the data
			if(isset($_POST["users"]) || $setTable=='users'){

				$table = 'users';
				$query_object = readFromDB('users','*',false);
				while($results = $query_object->fetch_array()) {
				    $result[] = $results;
				}

			} else if (isset($_POST["orders"]) || $setTable=='orders'){

				$table = 'orders';
				$query_object = readFromDB('orders','*',false);
				while($results = $query_object->fetch_array()) {
				    $result[] = $results;
				}

			} else {

				$table = 'products';
				$query_object = readFromDB('products','*', false);
				while($results = $query_object->fetch_array()) {
				    $result[] = $results;
				}

			}

			//Blocks the user if they arent an admin
			if($user_access > 2){
		?>
		<div class="container">
			<div class="marT-20 marB-20">
					<h1>Admin Panel</h1>
			</div>
			<div class="option">
				<div class="btn-group marB-20">
					<button type="button" class="btn btn-default" id="adminAdd"><span class="glyphicon glyphicon-plus"></span> Add</button>
  					<button type="button" class="btn btn-default" id="adminEdit"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
 					<button type="button" class="btn btn-default" id="adminRemove"><span class="glyphicon glyphicon-remove"></span> Remove</button>
				</div>
				<div class="marB-20 pull-right">
					<form action="admin.php" method="POST">
						<div class="btn-group">
							<input type="submit" class="btn <?php if($table=='products'){echo 'btn-info active';}else{echo 'btn-default';}?>" name="products" id='adminProducts' value="Products"></input>
		  					<input type="submit" class="btn <?php if($table=='users'){echo 'btn-info active';}else{echo 'btn-default';}?>" name="users" id='adminUsers' value="Users"></input>
		 					<input type="submit" class="btn <?php if($table=='orders'){echo 'btn-info active';}else{echo 'btn-default';}?>" name="orders" id='adminOrders' value="Orders"></input>
						</div>
					</form>
				</div>
				<?php if(isset($actionHappened) && $actionHappened==true){?>
					<p id='status area' class="<?php if($resultMessage=='Success'){echo 'bg-success';}else {echo 'bg-danger';} ?>"><?php echo $statusString ?></p>
				<?php } ?>
				<div>
					<form action="admin.php" method="POST" class="marT-20 hidden" id="adminForm">
							<?php 
							//Generates admin for based on which DB it is
							if($table=='products'){?>
								<ul class='col-md-4'>
									<?php /* Commented out because the product id should auto-increment, therefore we do not need to pass it a value
									<li><label class='labelFix' for="id">ID: </label><input type='text'   name='id' placeholder='productID'></input></li>
									*/ ?>
									<li><label class='labelFix' for="name">Product Name: </label><input type='text'   name='name' placeholder='productName'></input></li>
									<li><label class='labelFix' for="desc">Description: </label><input type='text'   name='desc' placeholder='description'></input></li>
									<li><label class='labelFix' for="cat">Category: </label><input type='text'   name='cat' placeholder='category'></input></li>
									<li><label class='labelFix' for="SKU">SKU: </label><input type='text'   name='SKU' placeholder='SKU'></input></li>
									<li><label class='labelFix' for="stock">Stock: </label><input type='text'   name='stock' placeholder='stock'></input></li>
								</ul>
								<ul class='col-md-4'>
									<li><label class='labelFix' for="cost">Cost: </label><input type='text'   name='cost' placeholder='cost'></input></li>
									<li><label class='labelFix' for="price">Price: </label><input type='text'   name='price' placeholder='price'></input></li>
									<li><label class='labelFix' for="sale">Sale Price:</label><input type='text'   name='sale' placeholder='salePrice'></input></li>
									<li><label class='labelFix' for="url">Image URL: </label><input type='text'   name='url' placeholder='productImage'></input></li>
									<li><label class='labelFix' for="rating">Rating: </label><input type='text'   name='rating' placeholder='rating'></input></li>
									<li><label class='labelFix' for="numVotes">Number Of Votes: </label><input type='text'   name='numVotes' placeholder='numOfVotes'></input></li>
								</ul>
							<?php } else if($table=='users'){ ?>
								<ul class='col-md-4'>
									<li><label class='labelFix' for="id">ID: </label><input type='text'   name='id' placeholder='id'></input></li>
									<li><label class='labelFix' for="username">Username: </label><input type='text'   name='username' placeholder='username'></input></li>
									<li><label class='labelFix' for="pass">Password: </label><input type='text'   name='pass' placeholder='password'></input></li>
									<li><label class='labelFix' for="userAccess">User Access Lvl: </label><input type='text'   name='userAccess' placeholder='user_access'></input></li>
								</ul>
								<ul class='col-md-4'>
									<li><label class='labelFix' for="first">First Name: </label><input type='text'   name='first' placeholder='first_name'></input></li>
									<li><label class='labelFix' for="last">Last Name: </label><input type='text'   name='last' placeholder='last_name'></input></li>
									<li><label class='labelFix' for="email">Email: </label><input type='text'   name='email' placeholder='email'></input></li>
									<li><label class='labelFix' for="address">Address: </label><input type='text'   name='address' placeholder='address'></input></li>
								</ul>
							<?php } else if($table=='orders'){ ?>
								<ul class='col-md-4'>
									<li><label class='labelFix' for="id">ID: </label><input type='text'   name='id' placeholder='id'></input></li>
									<li><label class='labelFix' for="userId">User ID: </label><input type='text'   name='userId' placeholder='userId'></input></li>
									<li><label class='labelFix' for="cart">Cart: </label><input type='text'   name='cart' placeholder='cart'></input></li>
									<li><label class='labelFix' for="orderTotal">Order Total: </label><input type='text'   name='orderTotal' placeholder='orderTotal'></input></li>
									<li><label class='labelFix' for="purchaseDate">Purchase Date: </label><input type='text'   name='purchaseDate' placeholder='purchaseDate'></input></li>
									<li><label class='labelFix' for="fullName">Full Name: </label><input type='text'   name='fullName' placeholder='fullName'></input></li>
									<li><label class='labelFix' for="phone">Phone #: </label><input type='text'   name='phone' placeholder='phone'></input></li>
								</ul>
								<ul class='col-md-4'>
									<li><label class='labelFix' for="email">Email: </label><input type='text'   name='email' placeholder='email'></input></li>
									<li><label class='labelFix' for="address1">Address 1: </label><input type='text'   name='address1' placeholder='address1'></input></li>
									<li><label class='labelFix' for="address2">Address 2: </label><input type='text'   name='address2' placeholder='address2'></input></li>
									<li><label class='labelFix' for="city">City: </label><input type='text'   name='city' placeholder='city'></input></li>
									<li><label class='labelFix' for="state">State: </label><input type='text'   name='state' placeholder='state'></input></li>
									<li><label class='labelFix' for="zip">Zip: </label><input type='text'   name='zip' placeholder='zip'></input></li>
								</ul>
							<?php } ?>
							<input type='text' class='hidden' name='hiddenId'></input>
							<div class="col-md-8 marB-20">
								<input type="submit" class="center-block btn" id="add-edit-button" name="add-edit-button" value="Add product"/>
								<!--<p><strong>Are you sure?</strong>
									<div class="btn-group">
										<input type="submit" class="btn btn-success" id="confirm" value="Yes">
										<input type="submit" class="btn btn-danger" id="confirm" value="No">
									</div>
								</p>-->
							</div>
					</form>
				</div>
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<?php 
								//Prints the table labels based on which DB
								if($table=='products'){?>
									<th>Sel</th>
									<th>ID</th>
									<th>Product Name</th>
									<th>Description</th>
									<th>Category</th>
									<th>SKU</th>
									<th>Stock</th>
									<th>Cost</th>
									<th>Price</th>
									<th>Sale Price</th>
									<th>Product Image URL</th>
									<th>Rating</th>
									<th>Number of Votes</th>
								<?php } else if($table=='users'){ ?>
									<th>Sel</th>
									<th>ID</th>
									<th>Username</th>
									<th>Password (Hashed)</th>
									<th>User Access</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Email</th>
									<th>Address</th>
								<?php } else if($table == 'orders'){ ?>
									<th>Sel</th>
									<th>Order ID</th>
									<th>User ID</th>
									<th>Cart</th>
									<th>Order Total</th>
									<th>Purchase Date</th>
									<th>Full Name</th>
									<th>Phone</th>
									<th>Email</th>
									<th>Address Line 1</th>
									<th>Address Line 2</th>
									<th>Address City</th>
									<th>Address State</th>
									<th>Address Zip</th>
								<?php } ?>
							</tr>
						</thead>
						<?php 
						//Prints each items info from DB
						foreach($result as $row){ ?> 
						  		<tr>
						  			<?php if($table=='products'){?>
										<td><input type='radio' name='sel' value="<?php echo $row['productID']; ?>"/></td>
										<td id="<?php echo $row['productID']; ?>-productID"><?php echo $row['productID']; ?></td>
										<td id="<?php echo $row['productID']; ?>-productName"><?php echo $row['productName']; ?></td>
										<td id="<?php echo $row['productID']; ?>-description"><?php echo $row['description']; ?></td>
										<td id="<?php echo $row['productID']; ?>-category"><?php echo $row['category']; ?></td>
										<td id="<?php echo $row['productID']; ?>-SKU"><?php echo $row['SKU']; ?></td>
										<td id="<?php echo $row['productID']; ?>-stock"><?php echo $row['stock']; ?></td>
										<td id="<?php echo $row['productID']; ?>-cost"><?php echo $row['cost']; ?></td>
										<td id="<?php echo $row['productID']; ?>-price"><?php echo $row['price']; ?></td>
										<td id="<?php echo $row['productID']; ?>-salePrice"><?php echo $row['salePrice']; ?></td>
										<td id="<?php echo $row['productID']; ?>-productImage"><?php echo $row['productImage']; ?></td>
										<td id="<?php echo $row['productID']; ?>-rating"><?php echo $row['rating']; ?></td>
										<td id="<?php echo $row['productID']; ?>-numOfVotes"><?php echo $row['numOfVotes']; ?></td>
								<?php } else if($table=='users'){ ?>
										<td><input type='radio' name='sel' value="<?php echo $row['id']; ?>"/></td>
										<td id="<?php echo $row['id']; ?>-id"><?php echo $row['id']; ?></td>
										<td id="<?php echo $row['id']; ?>-username"><?php echo $row['username']; ?></td>
										<td id="<?php echo $row['id']; ?>-password"><?php echo $row['password']; ?></td>
										<td id="<?php echo $row['id']; ?>-user_access"><?php echo $row['user_access']; ?></td>
										<td id="<?php echo $row['id']; ?>-first_name"><?php echo $row['first_name']; ?></td>
										<td id="<?php echo $row['id']; ?>-last_name"><?php echo $row['last_name']; ?></td>
										<td id="<?php echo $row['id']; ?>-email"><?php echo $row['email']; ?></td>
										<td id="<?php echo $row['id']; ?>-address"><?php echo $row['address']; ?></td>
								<?php } else if($table=='orders'){ ?>
										<td><input type='radio' name='sel' value="<?php echo $row['id']; ?>"/></td>
										<td id="<?php echo $row['id']; ?>-id"><?php echo $row['id']; ?></td>
										<td id="<?php echo $row['id']; ?>-user_id"><?php echo $row['user_id']; ?></td>
										<td id="<?php echo $row['id']; ?>-cart"><?php echo $row['cart']; ?></td>
										<td id="<?php echo $row['id']; ?>-order_total"><?php echo $row['order_total']; ?></td>
										<td id="<?php echo $row['id']; ?>-purchase_date"><?php echo $row['purchase_date']; ?></td>
										<td id="<?php echo $row['id']; ?>-full_name"><?php echo $row['full_name']; ?></td>
										<td id="<?php echo $row['id']; ?>-customer_phone"><?php echo $row['customer_phone']; ?></td>
										<td id="<?php echo $row['id']; ?>-customer_email"><?php echo $row['customer_email']; ?></td>
										<td id="<?php echo $row['id']; ?>-address_line1"><?php echo $row['address_line1']; ?></td>
										<td id="<?php echo $row['id']; ?>-address_line2"><?php echo $row['address_line2']; ?></td>
										<td id="<?php echo $row['id']; ?>-address_city"><?php echo $row['address_city']; ?></td>
										<td id="<?php echo $row['id']; ?>-address_state"><?php echo $row['address_state']; ?></td>
										<td id="<?php echo $row['id']; ?>-address_zip"><?php echo $row['address_zip']; ?></td>
								<?php } ?>
									
								</tr>
						<?php } ?>
						
					</table>
				</div>
			</div>
		</div>
		

		<?php 
		//Tells the user to turn back if they arent an admin
		}else{echo "<div class='container marT-20'><a>You are not able to access this feature.</a></div>";}

		include 'footer.php'; ?>
		<script src='js/admin.js'></script>
		
	</body>
</html>