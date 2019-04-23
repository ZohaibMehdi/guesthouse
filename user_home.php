<?php
require_once 'users.php';
$user = new User;
session_start();
if(!$_SESSION['loggedUser']){
	header("Location: index.php");
}else {
	$logUserEmail = $_SESSION['loggedUser'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/bootstrap.css">
	<title>E-Commerce</title>
</head>
<body>

<header>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Brand</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
	        <li><a href="#">User Management</a></li>
          <li><a href="#">Video Management</a></li>
          <li><a href="#">Module Assignment</a></li>
					<li><a href="logoff.php">Logout</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->

	  </div><!-- /.container-fluid -->
	</nav>
</header>

<section>
  <div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3>Welcome <?php echo $logUserEmail; ?></h3>
			</div>
		</div>
  </div>
</section>


<script src="./js/jquery.js"></script>
<script src="./js/bootstrap.js"></script>
<script src="./js/approve_reject_user.js"></script>

</body>
</html>
