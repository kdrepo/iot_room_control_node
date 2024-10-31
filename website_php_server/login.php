<?php
	session_start();
	
	if(isset($_POST['login'])) {
		include_once("db.php");

		
		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);
		
		//$username = mysqli_real_escape_string($db, $username);
		//$password = mysqli_real_escape_string($db, $password);
		
		$sql = "SELECT * FROM logintable WHERE username='$username'";
		$query = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($query);
		//print_r($row);
		
		$id = $row['id'];
		$name = $row['name'];
		$db_password = $row['password'];
		
		if($password==$db_password){
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $id;
			$_SESSION['name'] = $name;
			header("Location: index.php");
		} else {
			echo "<h4>Your Username or Password is wrong nigga</h4>";
		}
	}

?>



<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Login To Access Controls</h2>
  <br>
  <form action="login.php" method="post"">
    <div class="form-group">
      <label for="email">Username:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter username" name="username" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
    </div>
    <!-- <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div> -->
    <button type="submit" class="btn btn-default" name="login">Submit</button>
  </form>
</div>

<div class="container">
</div>

</body>
</html>
