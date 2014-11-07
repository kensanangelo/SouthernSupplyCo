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

			$result=readFromDB("products", "*", false);
		?>
		<div class="container">
			<div class="marT-20 marB-20">
					<h1>Admin Panel</h1>
			</div>
			<div class="option">
				<div class="btn-group marB-20">
					<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Add</button>
  					<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
 					<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> Remove</button>
				</div>
				<table class="table table-responsive table-striped table-bordered">
					<thead>
						<tr>
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
						</tr>
					</thead>
					<?php foreach($result as $row){ ?> 
					  		<tr>
								<td><input type='radio' name='sel' id='sel1'/></td>
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
		

		<?php include 'footer.php'; ?>
		
	</body>
</html>