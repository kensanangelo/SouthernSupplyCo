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

					//If they are trying to add a product
					$values=array($_POST['name'], $_POST['desc'], $_POST['cat'], $_POST['SKU'], $_POST['stock'], $_POST['cost'], $_POST['price'], $_POST['sale'], $_POST['url'], $_POST['rating'], $_POST['numVotes']);
					$statusString = addToDB('products', $values);

					// if($resultMessage=="Success")
					// 	$statusString='Product was successfully added!';
					// else
					// 	$statusString='Product failed to be added!';

				}else if($_POST['add-edit-button']=='Edit product'){
					//If they are trying to edit a product
					$returnedId=$_POST['hiddenId'];
					$resultMessage=changeInDB('products', 'productName="'.$_POST['name'].'", description="'.$_POST['desc'].'", category="'.$_POST['cat'].'", SKU="'.$_POST['SKU'].'", stock="'.$_POST['stock'].'", cost="'.$_POST['cost'].'", price="'.$_POST['price'].'", salePrice="'.$_POST['sale'].'", productImage="'.$_POST['url'].'", rating="'.$_POST['rating'].'", numOfVotes="'.$_POST['numVotes'].'"', 'productID="'.$returnedId.'"');
					
					if($resultMessage=="Success")
						$statusString='Product was successfully edited!';
					else
						$statusString='Product failed to be edited!';

				}else if($_POST['add-edit-button']=='Delete product'){
					//If they are trying to delete a product
					$returnedId=$_POST['hiddenId'];

					if($returnedId>=0)
						$resultMessage=removeFromDB('products', 'productID="'.$returnedId.'"');
					else
						$resultMessage='Failure';

					if($resultMessage=="Success")
						$statusString='Product was successfully removed!';
					else
						$statusString='Product failed to be removed!';			
				}else if($_POST['add-edit-button']=='Add user'){
					//If they are trying to add a user
					$values=array($_POST['hiddenId'], $_POST['username'], $_POST['pass'], $_POST['userAccess'], $_POST['first'], $_POST['last'], $_POST['email'], $_POST['address']);
					$resultMessage=addToDB('users', $values);
					if($resultMessage=="Success")
						$statusString='User was successfully added!';
					else
						$statusString='User failed to be added!';
				}else if($_POST['add-edit-button']=='Edit user'){
					//If they are trying to edit a user
					$returnedId=$_POST['hiddenId'];
					$resultMessage=changeInDB('users', 'username="'.$_POST['username'].'", password="'.$_POST['pass'].'", user_access="'.$_POST['userAccess'].'", first_name="'.$_POST['first'].'", last_name="'.$_POST['last'].'", email="'.$_POST['email'].'", address="'.$_POST['address'].'"', 'id="'.$returnedId.'"');
					
					if($resultMessage=="Success")
						$statusString='User was successfully edited!';
					else
						$statusString='User failed to be edited!'.$resultMessage;

				}else if($_POST['add-edit-button']=='Delete user'){
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
				}
			}

			//Figures out which database we are in and pulls the data
			if(isset($_POST["users"])){
				$table='users';
				$result=readFromDB('users','*',false);
			}else if(isset($_POST["orders"])){
				$table='orders';
				$result=readFromDB('orders','*',false);
			}else{
				$table='products';
				$result=readFromDB('products','*', false);
			}

			//Blocks the user if they arent an admin
			if($user_access>2){
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
									<li><label class='labelFix' for="id">ID: </label><input type='text' size='' name='id' placeholder='productID'></input></li>
									*/ ?>
									<li><label class='labelFix' for="name">Product Name: </label><input type='text' size='' name='name' placeholder='productName'></input></li>
									<li><label class='labelFix' for="desc">Description: </label><input type='text' size='' name='desc' placeholder='description'></input></li>
									<li><label class='labelFix' for="cat">Category: </label><input type='text' size='' name='cat' placeholder='category'></input></li>
									<li><label class='labelFix' for="SKU">SKU: </label><input type='text' size='' name='SKU' placeholder='SKU'></input></li>
									<li><label class='labelFix' for="stock">Stock: </label><input type='text' size='' name='stock' placeholder='stock'></input></li>
								</ul>
								<ul class='col-md-4'>
									<li><label class='labelFix' for="cost">Cost: </label><input type='text' size='' name='cost' placeholder='cost'></input></li>
									<li><label class='labelFix' for="price">Price: </label><input type='text' size='' name='price' placeholder='price'></input></li>
									<li><label class='labelFix' for="sale">Sale Price:</label><input type='text' size='' name='sale' placeholder='salePrice'></input></li>
									<li><label class='labelFix' for="url">Image URL: </label><input type='text' size='' name='url' placeholder='productImage'></input></li>
									<li><label class='labelFix' for="rating">Rating: </label><input type='text' size='' name='rating' placeholder='rating'></input></li>
									<li><label class='labelFix' for="numVotes">Number Of Votes: </label><input type='text' size='' name='numVotes' placeholder='numOfVotes'></input></li>
								</ul>
							<?php } else if($table=='users'){ ?>
								<ul class='col-md-4'>
									<li><label class='labelFix' for="id">ID: </label><input type='text' size='' name='id' placeholder='id'></input></li>
									<li><label class='labelFix' for="username">Username: </label><input type='text' size='' name='username' placeholder='username'></input></li>
									<li><label class='labelFix' for="pass">Password: </label><input type='text' size='' name='pass' placeholder='password'></input></li>
									<li><label class='labelFix' for="userAccess">User Access Lvl: </label><input type='text' size='' name='userAccess' placeholder='user_access'></input></li>
								</ul>
								<ul class='col-md-4'>
									<li><label class='labelFix' for="first">First Name: </label><input type='text' size='' name='first' placeholder='first_name'></input></li>
									<li><label class='labelFix' for="last">Last Name: </label><input type='text' size='' name='last' placeholder='last_name'></input></li>
									<li><label class='labelFix' for="email">Email: </label><input type='text' size='' name='email' placeholder='email'></input></li>
									<li><label class='labelFix' for="address">Address: </label><input type='text' size='' name='address' placeholder='address'></input></li>
								</ul>
							<?php } ?>
							<input type='text' class='' name='hiddenId'></input>
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