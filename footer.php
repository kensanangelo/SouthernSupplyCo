<?php ?>

	<div class="clear"></div>

	</div><?php /* end wrap */ ?>

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
					<div class="row">
						<ul>
							<li><p class="lead white">Corporate</p></li>
							<li><a href="compinfo.php">About Southern Supply Co.</a></li> <!--Can change wording-->
							<li><a href="policies.php">Business Policies</a></li>
						</ul>
					</div>

					<div class="row">
						<ul>
							<li><p class="lead white">Options</p></li>
							<?php
								if($user_access > 1)
									echo '<li><a href="client.php">Account</a></li>';
							?>
							<li><a href="cart.php">Shopping Cart</a></li>
							<?php
								if($user_access > 2)
									echo '<li><a href="admin.php">Admin</a></li>';
							?>
						</ul>
					</div>
						
				</div> <!--Col-->

				<div class="col-md-3 col-sm-3 col-xs-6">
					<div class="row">
						<ul class="white">
							<li><p class="lead">Contact Info</p></li>
							<li>Southern Supply Co.</li>
							<li>1155 Corporate Ave</li>
							<li>Orlando, Fl 32792</li>
						</ul>
					</div>

					<div class="row">
						<ul class="white">
							<li><span class="glyphicon glyphicon-earphone"></span>  <a href="callto:18005552649">1-800-555-2649</a></li>
							<li><span class="glyphicon glyphicon-envelope"></span>  <a href="#">info@ssc.com</a></li>
						</ul>
					</div>
				</div><!--/Col-->

				<div class="col-md-3 col-sm-6">
					<div id="align" class="row social">
						<div class="row">
							<ul>
								<div class="col-xs-4 col-sm-3  col-md-3"><li><a href="https://www.facebook.com/"> <i class="fa fa-facebook-square fa-3x"></i> </a></li></div>
								<div class="col-xs-4 col-sm-3 col-md-3"><li><a href="https://plus.google.com/"> <i class="fa fa-google-plus-square fa-3x"></i></a></li></div>
								<div class="col-xs-4 col-sm-3 col-md-3"><li><a href="http://instagram.com/"> <i class="fa fa-instagram fa-3x"></i></a></li></div>
								<div class="col-xs-4 col-sm-3 col-md-3"><li><a href="https://twitter.com/?lang=en"><i class="fa fa-twitter-square fa-3x"></i></a></li></div>
							</ul>
						</div>
				
					</div>
				</div><!--/Col-->

			</div><!--Row-->
		</div><!--/Container-->
	</div><!--/Footer-->

	<div class="disclaimer-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center disclaimer white">
					<p>This site is not official and is an assignment for a UCF Digital Media course.</p>
					<p>Designed and developed by Group 4 - Southern Supply Co.</p>
				</div>
			</div>
		</div>
	</div>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>


