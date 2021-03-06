<?php
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Southern Supply Co. | Construction Products | Home – Group 4</title>
		<?php 
			include 'includes.php';
			include 'header.php';
		?>

		<div class="container foreground">
			<div class="row">
				<div class="featured-wrapper">
				<div class="col-md-4 col-md-offset-7 featured">
					<h2 class="deal">Daily Deal</h2>
					<?php
						//Gets info for featured product
						$result=mysqli_fetch_assoc(readFromDB("products", "*", "productID=1"));
						$name=$result['productName'];
						$url=$result['productImage'];
						$old=$result['price'];
						$new=$result['salePrice'];

						//Prints featured product page
						echo'<a href="product.php?product=1"><img class="img-responsive" src="'.$url.'" alt="Featured Product Image"></a>
								<div class="row">
									<div class="col-md-9">
										<a class="productLink" href="product.php?product=1"><h4>'.$name.'</h4></a>
										<div class="catStars">';

						print_stars($result['rating'], $result['numOfVotes']);
							

						echo'</div>
									</div>
									<div class="col-md-3 marT-10 text-right">
										<p class="old">$'.$old.'</p>
										<p class="new">$'.$new.'</p>
									</div>
								</div>';
					?>
				</div>
			</div>
			</div>
		</div>
		
		<div class='container categories'>
			<h1 class="marT-20 catg marB-10">Construction Supply Categories</h1>
			<div class="row">
				<div class="col-md-4 col-sm-4 slot">
					<a href="catalog.php?category=Hardwoods">
						<img class='catThumb img-responsive' src="img/hardwood.jpg" alt="Hardwood lumber">
					</a>
					<div class="thumbnail">
						<a href="catalog.php?category=Hardwoods">
							<h2 class="text-center">Hardwoods</h2>
						</a>
						<p>Hardwood is the ultimate versatile material, with applications ranging from <strong>exquisite veneers and furniture</strong>, musical instruments, flooring, construction and boat-building.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 slot">
					<a href="catalog.php?category=Softwood">
						<img class='catThumb img-responsive' src="img/softwood.jpg" alt="Softwood lumber">
					</a>
					<div class="thumbnail">
						<a href="catalog.php?category=Softwood">
							<h2 class="text-center">Softwoods</h2>
						</a>
						<p>Softwood is renowned for its versatility and strength. Softwood can be used across a broad range of internal and external projects - from <strong>furniture and flooring</strong>, to decking, landscaping, external joinery and structural applications.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 slot">
					<a href="catalog.php?category=Plywood">
						<img class='catThumb img-responsive' src="img/plywood.jpg" alt="Plywood">
					</a>
					<div class="thumbnail">
						<a href="catalog.php?category=Plywood">
							<h2 class="text-center">Plywood</h2>
						</a>
						<p>Manufactured from thin sheets of <strong>cross-laminated veneer</strong> and bonded under heat and pressure with strong adhesives, plywood has been one of the most ubiquitous <strong>building products</strong> for decades.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4 slot">
					<a href="catalog.php?category=Concrete">
						<img class='catThumb img-responsive' src="img/concrete.jpg" alt="Concrete">
					</a>
					<div class="thumbnail">
						<a href="catalog.php?category=Concrete">
							<h2 class="text-center">Concrete</h2>
						</a>
						<p>Concrete has been the foundation of many building projects. It is used to create <strong>concrete slabs</strong>, driveways, countertops, bricks, and pavers.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 slot">
					<a href="catalog.php?category=Drywall">
						<img class='catThumb img-responsive' src="img/drywall.jpg" alt="Drywall">
					</a>
					<div class="thumbnail">
						<a href="catalog.php?category=Drywall">
							<h2 class="text-center">Drywall</h2>
						</a>
						<p>Drywall is a panel made of <strong>gypsum plaster</strong> pressed between two thick sheets of paper. It is used to make interior walls and ceilings.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 slot">
					<a href="catalog.php?category=Roofing">
						<img class='catThumb img-responsive' src="img/roofing.jpg" alt="Roofing">
					</a>
					<div class="thumbnail">
						<a href="catalog.php?category=Roofing">
							<h2 class="text-center">Roofing</h2>
						</a>
						<p>Roofing material is the outermost layer on the roof of a building. A building's <strong>roofing material</strong> provides shelter from the natural elements, and insulation against heat and cold.</p>
					</div>
				</div>
			</div>
		</div>

		<?php include 'footer.php'; ?>

	</body>
</html>