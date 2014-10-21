<?php
//Hard coded user access level (Temporary)
$user_access="1"; ?>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="img/favicon.png">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-2 brand"><a href="home.php"><img class="logo" src="img/logo.png" alt="Southern Supply Co. Logo"></a>
			</div>
			<div class=" login col-md-2 col-md-offset-8">
				<?php
					//Puts either Login or Account link depending on user access level
					if($user_access>=1)
						echo "<a href='client.php'><span class='glyphicon glyphicon-user'></span> Account</a>";
					else
						echo "<a href='login.php'><span class='glyphicon glyphicon-user'></span> Login</a>";
				?> | <a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a>
			</div>
		</div>	
	</div>
	<div class="navbar" role="navigation">
		<div class="container">	
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
							<a class="btn btn-default" href="search.php"><button type="submit"><span class="glyphicon glyphicon-search"></span></button></a>
						</div>
					</form>
				</div>       
				<ul class="nav navbar-nav">
					<li class="menuitem"><a href="catalog.php">Hardwoods</a></li>
					<li class="menuitem"><a href="catalog.php">Softwoods</a></li>
					<li class="menuitem"><a href="catalog.php">Plywood</a></li>
					<li class="menuitem"><a href="catalog.php">Concrete</a></li>
					<li class="menuitem"><a href="catalog.php">Drywall</a></li>
					<li class="menuitem"><a href="catalog.php">Roofing</a></li>
				</ul>
			</div><!--/.navbar-collapse -->
		</div>
	</div>
