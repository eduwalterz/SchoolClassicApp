<html>
<head>
		<title> User Registration </title>
		<link rel="stylesheet" type="text/css" href="match.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color:grey;">

<div class="container">
	<div class="login-box">
	<div class="row">
	
	
	<div class="col-md-6 login-right">
		<h2> Register Here </h2>
		<form action="kabarak.php" method="post">
		<div class="form-group">
		  <label>Username</label>
		  <input type="text" name="user" class="form-contral" required>
		  </div>
		  <div class="form-group">
		  <label>ID Number</label>
		  <input type="text" name="idnumber" class="form-contral" required>
		  </div>
		<div class="form-group">
		  <label>Date of Birth</label>
		  <input type="text" name="date" class="form-contral" required>
		  </div>
		<div class="form-group">
		<label> Password</label>
		<input type="password" name="password" class="form-contral" required>
		</div>
		<button type="submit" class="btn btn-primary"> Register </button>
	</form>
	</div>
	
	
	
	
	</div>
	<br>
		<B><p> If Already A Member,<a  href="mkubwa.php">Login Here </a> </p></B>
	</div>
	
</div>
<a class="float-right" href="mkubwa.php"> Login Here </a>
</body>
</html>