<?php
require_once 'includes/header.php';
require_once 'registration.php';
session_start();
if(isset($_SESSION['loggedUser'])){
	header("Location: user_home.php");
}
?>

<section>
	<div class="container col-lg-4">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="testform" method="POST">
			<div class="form-group">
				<label for="">Email</label>
				<input type="email" class="form-control" name="email" />

				<label for="">Password</label>
				<input type="password" class="form-control" name="password" />
			</div>

			<button type="submit" name="signup" class="btn btn-success">Sign UP</button>
			<button type="submit" name="signin" class="btn btn-success">Sign IN</button>
		</form>
	</div>
</section>


<?php
require_once 'includes/footer.php';

	$register = new Registration;

	if(isset($_POST['email']) AND isset($_POST['password']))
	{
		if(isset($_POST['signup'])){
			if(trim($_POST['email']) == "" || trim($_POST['password']) == ""){
				echo "Fill both values";
			}else{
				$email 	= $_POST['email'];
				$pass 	= $_POST['password'];
				$register->setEmail($email);
				$register->setPassword($pass);
				$register->signUp();
			}
		}

		if(isset($_POST['signin'])){
			if(trim($_POST['email']) == "" || trim($_POST['password']) == ""){
				echo "Fill both values";
			}else{
				$email 	= $_POST['email'];
				$register->setEmail($email);

				$pass 	= $_POST['password'];
				$register->setPassword($pass);

				$_SESSION['loggedUser'] = $register->signIn();
				header("Location: user_home.php");
			}
		}
	}
?>
