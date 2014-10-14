<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Southern Supply Co. Home – Group 4</title>

		<?php 
			include 'header.php';
			include 'includes.php';
		?>

		<div class="container foreground">
			<div class="row">
				
				<div class="col-md-4 col-md-offset-7 featured">
					<h2>Daily Deal</h2>
					<?php
						//Gets info for featured product
						$result=mysqli_fetch_assoc(mysqli_query($connection,"SELECT productName FROM products WHERE productID=1"));
						$name=$result['productName'];

						$result=mysqli_fetch_assoc(mysqli_query($connection,"SELECT productImage FROM products WHERE productID=1"));
						$url=$result['productImage'];

						$result=mysqli_fetch_assoc(mysqli_query($connection,"SELECT rating FROM products WHERE productID=1"));
						$stars=$result['rating'];

						$result=mysqli_fetch_assoc(mysqli_query($connection,"SELECT price FROM products WHERE productID=1"));
						$old=$result['price'];

						$result=mysqli_fetch_assoc(mysqli_query($connection,"SELECT salePrice FROM products WHERE productID=1"));
						$new=$result['salePrice'];

						//Prints featured product page
						echo'<a href="product.php"><img class="img-responsive" src="'.$url.'" alt="Featured Product Image"></a>
								<div class="row">
									<div class="col-md-9">
										<a class="productLink" href="product.php"><h4>'.$name.'</h4></a>
										<div class="catStars">';

						//Determines how many stars the product has
						// for($i=0;$i<5;$i++){
						// 	if($i<$stars){
						// 		echo'<span class="glyphicon glyphicon-star"></span>';
						// 	}else{
						// 		echo'<span class="glyphicon glyphicon-star-empty"></span>';
						// 	}
						// }
						print_stars($stars);
							

						echo'</div>
									</div>
									<div class="col-md-3 marT-10 text-right">
										<p class="old">$'.$old.'</p>
										<p class="new">$'.$new.'</p>
									</div>
								</div>';

						mysqli_close($connection);
					?>
				</div>
			</div>
		</div>
		<div class='container categories'>
			<h1 class="marT-20">Categories</h1>
			<div class="row">
				<div class="col-md-4 col-sm-4 slot">
					<a href="catalog.php">
						<img class='catThumb img-responsive' src="img/hardwood.jpg" alt="Hardwood lumber">
					</a>
					<div class="thumbnail">
						<a href="catalog.php">
							<h2 class="text-center">Hardwoods</h2>
						</a>
						<p>Hardwood is the ultimate versatile material, with applications ranging from exquisite veneers and furniture, musical instruments, flooring, construction and boat-building.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 slot">
					<a href="catalog.php">
						<img class='catThumb img-responsive' src="img/softwood.jpg" alt="Softwood lumber">
					</a>
					<div class="thumbnail">
						<a href="catalog.php">
							<h2 class="text-center">Softwoods</h2>
						</a>
						<p>Softwood is renowned for its versatility and strength. Softwood can be used across a broad range of internal and external projects - from furniture and flooring, to decking, landscaping, external joinery and structural applications.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 slot">
					<a href="catalog.php">
						<img class='catThumb img-responsive' src="img/plywood.jpg" alt="Plywood">
					</a>
					<div class="thumbnail">
						<a href="catalog.php">
							<h2 class="text-center">Plywood</h2>
						</a>
						<p>Manufactured from thin sheets of cross-laminated veneer and bonded under heat and pressure with strong adhesives, plywood has been one of the most ubiquitous building products for decades.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4 slot">
					<a href="catalog.php">
						<img class='catThumb img-responsive' src="img/concrete.jpg" alt="Concrete">
					</a>
					<div class="thumbnail">
						<a href="catalog.php">
							<h2 class="text-center">Concrete</h2>
						</a>
						<p>Concrete has been the foundation of many building projects. It is used to create concrete slabs, driveways countertops, bricks, and pavers.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 slot">
					<a href="catalog.php">
						<img class='catThumb img-responsive' src="img/drywall.jpg" alt="Drywall">
					</a>
					<div class="thumbnail">
						<a href="catalog.php">
							<h2 class="text-center">Drywall</h2>
						</a>
						<p>Drywall is a panel made of gypsum plaster pressed between two thick sheets of paper. It is used to make interior walls and ceilings.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 slot">
					<a href="catalog.php">
						<img class='catThumb img-responsive' src="img/roofing.jpg" alt="Roofing">
					</a>
					<div class="thumbnail">
						<a href="catalog.php">
							<h2 class="text-center">Roofing</h2>
						</a>
						<p>Roofing material is the outermost layer on the roof of a building. A building's roofing material provides shelter from the natural elements, and insulation against heat and cold.</p>
					</div>
				</div>
			</div>
		</div>

		<?php include 'footer.php'; ?>

				<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
				<!-- Include all compiled plugins (below), or include individual files as needed -->
				<script src="js/bootstrap.min.js"></script>
	</body>
</html>