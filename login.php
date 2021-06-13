<?php
require_once 'dbconnect.php';

$conn = connectDB();

session_start();
//check condition admin login  not direct back to dashboard.php page
if(isset($_SESSION["admin_login"])){
	header("location: dashboard.php");
}
//check condition user login  not direct back to index.php page
if(isset($_SESSION["user_login"])){
	header("location: index.php");
}
//login button name is 'btn_login' and set
if(isset($_REQUEST['btn_login']))
{
	//textbox name "..."
	$username = $_REQUEST["username"];
	$password = $_REQUEST["password"];
	$role = $_REQUEST["role"];

	//check username, password textbox not null
	if(empty($username)){
		$errormes[]="please enter username";
	}
	else if(empty($password)){
		$errormes[]="please enter password";
	}
	//check select optiion not null
	else if(empty($role)){
		$errormes[]="please select role";
	}
	else if($username AND $password AND $role){
		try{
			//sql selectg query
			$select_data=$db->prepare("SELECT username,password,user_type FROM account WHERE username=:UserName AND password=:Password AND user_type=:utype");
			$select_data ->bindParam(":UserName",$username);
			//bind all parameter
			$select_data ->bindParam(":Password",$password);
			$select_data ->bindParam(":utype",$role);
			//execute query
			$select_data ->execute();

			//fetch record from MySQL database
			while($row=$select_data->fetch(PDO::FETCH_ASSOC)){
				// fetchable record store new variable they are $dbusername, $dbpassword and $dbrole
				$dbusername = $row["username"];
				$dbpassword = $row["password"];
				$dbrole = $row["user_type"];
			}
			//check taken fields not null
			if($username!=null AND $password!=null AND $role!=null){
				//check row grteater than "0"
				if($select_data->rowCount()>0){
					// check type textbox
					if($username==$dbusername AND $password==$dbpassword AND $role==$dbrole){
						//role base user login start
						switch($dbrole){
							case "admin";
							//session name is "admin_login" and store in %username variable
							$_SESSION["admin_login"]=$username;
							//admin login success
							$loginMes="Amin....Login Success...";
							//refresh and redirect to dashboard.php
							header("refresh:3;dashboard.php");
							break;

							case "user";
							//session name is "user_login" and store in %username variable
							$_SESSION["user_login"]=$username;
							//user login success
							$loginMes="User....Login Success...";
							//refresh and redirect to index.php
							header("refresh:3;index.php");
							break;

							default;
							$errormes[]="wrong email or password or role";
						}
					}
					else{
						$errormes[]="wrong email or password or role";
					}
				}
				else{
					$errormes[]="wrong email or password or role";
				}
			}
			else{
				$errormes[]="wrong email or password or role";
			}
		}
		catch(PDOException $e){
		$e->getMessage();
		}
	}
	else{
		$errormes[]="wrong email or password or role";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  
  <style>
	  body,
    html {
        height: 100vh;
    background-image: linear-gradient(
        45deg,
        rgba(125, 173, 163, 0.1) 0%,
        rgba(229, 227, 223, 0.3) 46%,
        rgba(255, 186, 178, 1) 100%
	  ),
	  url("img/background.jpg");
    background-size: 100%;
    background-position: center;
    background-repeat: no-repeat;
    overflow-x: hidden;
    }
  </style>
  <script src="js/index.js"></script>
</head>

<body>
  <div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="groupbox">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="img/picture.png" class="logo" alt="Logo">
						<img src="img/logo.png" class="logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
				<!-- form login -->
					<form method="post">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="email" name="username" class="form-control input_user" placeholder="Email" required>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" placeholder="password" required>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-critical-role"></i></span>
							</div>
							<select name="role" class="form-control">
							<option value="" selected="selected">- slect role -</option>
							<option value="admin">Admin</option>
							<option value="user">User</option>
							</select>
						</div>
						
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="btn_login" value="Login" class="btn login_btn">Login</button>
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
          <div class="d-flex justify-content-center links">
            <a href="index.php">Back to Home</a></div>
				</div>

				<!-- Signup -->
				<div class="d-flex justify-content-center links">
					Don't have an account? <a href="#" class="ml-2" data-toggle="modal" data-target="#myModal">Sign Up</a>
				</div>

				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <h4 class="modal-title" id="myModalLabel">Sign up account!</h4>
						</div>
						<div class="modal-body">

						<?php

$id = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} 
$AccountID= 'int';
$username="";
$password="";
$role="";
if ($id !="") {
    $sql = "select * from account where AccountID = $id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        $AccountID = $row['AccountID'];
        $Email = $row['username'];
        $password = $row['password'];
        $role = $row['user_type'];
    }
}
?>
						<!-- form register -->
						<form action="signup.php" method="POST">

						<div class="form-group">
						<input type="hidden" id="id" name="id" value="<?php echo $AccountID?>" placeholder="Account id..">
						  </div>
					<div class="form-group">
					  <label class="label-register" >E-mail</label>
					  <input type="email" class="form-control" value="<?php echo $username?>" name="username" placeholder="Email" required>
					</div>
					<div class="form-group">
					  <label class="label-register">Password</label>
					  <input type="password" class="form-control" value="<?php echo $password?>" name="password" placeholder="*****" required>
					</div>

					<div class="form-group">
					  <input type="hidden" class="form-control" value="user" name="role" placeholder="">
					</div>
					
					<div class="modal-footer">
						  <div class="pull-left">
							 <button type="submit" class="btn btn-primary">Complete</button>
							
						  <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
						 
							</div>
						</div>
				  </form>
						</div>
						
					  </div>
					</div>
				  </div>

			</div>
		</div>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>
<?php
    mysqli_close($conn);
?>