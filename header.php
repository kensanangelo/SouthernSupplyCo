<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

error_reporting(E_ALL & ~E_NOTICE);

if(!isset($_SESSION['user_access'])){
	$_SESSION['user_access'] = 1;
	$user_access = 1;
	$loggedIn = 0;
} else {
	$user_access = isset($_SESSION['user_access']) ? $_SESSION['user_access'] : null;
	$loggedIn = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null;
	$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
}

//	Print everything inside the Session global array
// pre_print_r($_SESSION);
?>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-56829335-1', 'auto');
	  ga('send', 'pageview');

	</script>
</head>
<body>

	<div id="wrap">
	<div id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-2 brand"><a href="home.php"><img class="logo" src="img/logo_ssc.svg" alt="Southern Supply Co. Logo"></a>
				</div>
				<div id="logout-msg">
					<?php if (isset($_SESSION['logout_msg'])) { ?>
						<p><?php echo $_SESSION['logout_msg']; ?></p>
						<?php unset($_SESSION['logout_msg']); ?>
					<?php } ?>
				</div>
				<div class=" login col-md-2 col-md-offset-8">
					
					<?php
						//Puts either Login or Account link depending on user access level
						if($loggedIn == 1){ ?>
							<div id="user-mgmt">
								<a class="user-mgmt-btn" id='account-button' href='client.php?user_id=<?php echo $user_id; ?>'>
									<span class='glyphicon glyphicon-user'></span>
									<span>Account</span>
								</a>
								<form  method="POST" id="logout-form">
									
									<button class="user-mgmt-btn" type="submit" id='logout-button'>
										<span class='glyphicon glyphicon-user'></span>
										<span>Log Out</span>
									</button>

								</form>
								<a class="user-mgmt-btn" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a>

							</div>
					
						
						<?php } else { ?>
							<div id="user-mgmt">
								<a id='login-button' href='login.php'>
									<span class='glyphicon glyphicon-user'></span> 
									<span class='button-txt'>Login</span>
								</a>
								<a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a>

							</div>
						<?php } ?>


				</div>
			</div>	
		</div>
		<div class="navbar" role="navigation">
			<div class="container">	

				<div class="center">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					
					<div class="navbar-collapse collapse">
						<div class="navbar-form navbar-right">
							<form action="search.php" method="post" class="input-group" role="search">
								<input type="text" class="form-control" name="search_term" placeholder="Search">
								<div id="ajax-search-results"></div>
								<div class="input-group-btn">
									<a href="search.php"><button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button></a>
								</div>
							</form>
						</div>       
						<ul class="nav navbar-nav">
							<li class="menuitem"><a href="catalog.php?category=Hardwoods">Hardwoods</a></li>
							<li class="menuitem"><a href="catalog.php?category=Softwood">Softwoods</a></li>
							<li class="menuitem"><a href="catalog.php?category=Plywood">Plywood</a></li>
							<li class="menuitem"><a href="catalog.php?category=Concrete">Concrete</a></li>
							<li class="menuitem"><a href="catalog.php?category=Drywall">Drywall</a></li>
							<li class="menuitem"><a href="catalog.php?category=Roofing">Roofing</a></li>
						</ul>
					</div><!--/.navbar-collapse -->
				</div>
			</div>
		</div>
	</div>
