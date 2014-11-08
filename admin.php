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

			if(isset($_POST["users"])){
				$table='users';
				$result=readFromDB('users','*',false);
			}else if(isset($_POST["reviews"])){
				$table='reviews';
				$result=readFromDB('reviews','*',false);
			}else{
				$table='products';
				$result=readFromDB('products','*', false);
			}

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
							<input type="submit" class="btn <?php if($table=='products'){echo 'btn-primary active';}else{echo 'btn-default';}?>" name="products" value="Products"></input>
		  					<input type="submit" class="btn <?php if($table=='users'){echo 'btn-primary active';}else{echo 'btn-default';}?>" name="users" value="Users"></input>
		 					<input type="submit" class="btn <?php if($table=='reviews'){echo 'btn-primary active';}else{echo 'btn-default';}?>" name="reviews" value="Reviews"></input>
						</div>
					</form>
				</div>
				<div>
					<form action="admin.php" method="get" class="marT-20 marB-20 hidden" id="adminForm">
							<?php if($table=='products'){?>
								<ul class='col-md-4'>
									<li><label class='labelFix' for="id">ID: </label><input type='text' size='' name='id' placeholder='productID'></input></li>
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
					</form>
				</div>
				<table class="table table-responsive table-striped table-bordered">
					<thead>
						<tr>
							<?php if($table=='products'){?>
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
					<?php foreach($result as $row){ ?> 
					  		<tr>
					  			<?php if($table=='products'){?>
									<td><input type='radio' name='sel' id="<?php echo $row['productID']; ?>"/></td>
									<td><?php echo $row['productID']; ?></td>
									<td><?php echo $row['productName']; ?></td>
									<td><?php echo $row['description']; ?></td>
									<td><?php echo $row['category']; ?></td>
									<td><?php echo $row['SKU']; ?></td>
									<td><?php echo $row['stock']; ?></td>
									<td><?php echo $row['cost']; ?></td>
									<td><?php echo $row['price']; ?></td>
									<td><?php echo $row['salePrice']; ?></td>
									<td><?php echo $row['productImage']; ?></td>
									<td><?php echo $row['rating']; ?></td>
									<td><?php echo $row['numOfVotes']; ?></td>
							<?php } else if($table=='users'){ ?>
									<td><input type='radio' name='sel' id="<?php echo $row['id']; ?>"/></td>
									<td><?php echo $row['id']; ?></td>
									<td><?php echo $row['username']; ?></td>
									<td><?php echo $row['password']; ?></td>
									<td><?php echo $row['user_access']; ?></td>
									<td><?php echo $row['first_name']; ?></td>
									<td><?php echo $row['last_name']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['address']; ?></td>
							<?php } ?>
								
							</tr>
					<?php } ?>
					
				</table>
				<div class="btn-group">
					<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Add</button>
  					<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
 					<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> Remove</button>
				</div>
			</div>
		</div>
		

		<?php }else{echo "<div class='container marT-20'><a>You are not able to access this feature.</a></div>";}

		include 'footer.php'; ?>
		<script src='js/admin.js'></script>
		
	</body>
</html>