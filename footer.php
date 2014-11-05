<?php ?>
		<div class="footer">
			<div class="container footer-space">
				<div class="row">
					<div class="col-md-3 col-sm-3 col-xs-6">
						<ul>
							<li><p class="lead white">Categories</p></li>
							<li><a href="catalog.php?category=Hardwoods">Hardwoods</a></li>
							<li><a href="catalog.php?category=Softwood">Softwoods</a></li>
							<li><a href="catalog.php?category=Plywood">Plywood</a></li>
							<li><a href="catalog.php?category=Concrete">Concrete</a></li>
							<li><a href="catalog.php?category=Drywall">Drywall</a></li>
							<li><a href="catalog.php?category=Roofing">Roofing</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-6">
						<ul>
							<li><p class="lead white">Corporate</p></li>
							<li><a href="#">About Southern Supply Co.</a></li> <!--Can change wording-->
							<li><a href="#">Business Policies</a></li>
							<p></p>
							<li><p class="lead white">Options</p></li>
							<li><a href="client.php">Account</a></li>
							<li><a href="cart.php">Shopping Cart</a></li>
							<?php
								if($user_access==3)
									echo '<li><a href="admin.php">Admin</a></li>';
							?>
						</ul>
					</div>
					<div class="col-md-3 col-sm-3  col-xs-6">
						<ul class="white">
							<li>1155 Corporate Ave</li>
							<li>Orlando, Fl 32792</li>
							<li>&nbsp;</li>
							<li>1-800-555-2649</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-6">
						<div class="row social">
							<div class="col-md-3 col-sm-6 col-xs-6">
								<a href="https://www.facebook.com/"><img src="img/facebook.png" alt="" class="img-responsive"></a>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6">
								<a href="https://plus.google.com/"><img src="img/googleplus.png" alt="" class="img-responsive"></a>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6">
								<a href="http://instagram.com/"><img src="img/instagram.png" alt="" class="img-responsive"></a>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6">
								<a href="https://twitter.com/?lang=en"><img src="img/twitter.png" alt="" class="img-responsive"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="disclaimer-wrapper">
			<div class="row">
				<div class="col-md-12 text-center disclaimer white">
					<p>This site is not official and is an assignment for a UCF Digital Media course.</p>
					<p>Designed and developed by Group 4 - Southern Supply Co.</p>
				</div>
			</div>
		</div>


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>



