<?php
include("database_connection.php");
$id="";
$name="";
$year="";
$mnumber="";
$age="";
$email="";
$password="";
if(isset($_POST['submit'])){

	if(isset($_POST['Id'])){
		$id = $_POST['Id'];
	}
	if(isset($_POST['name'])){
		$name = $_POST['name'];
	}
	if(isset($_POST['year'])){
		$year = $_POST['year'];
	}
	if(isset($_POST['mnumber'])){
		$mnumber= $_POST['mnumber'];
	}
	if(isset($_POST['age'])){
		$age = $_POST['age'];
	}  
	if(isset($_POST['email'])){
		$email = $_POST['email'];
	}
	if(isset($_POST['password'])){
		$password = $_POST['password'];
	}
	if(isset($_POST['dept'])){
		$dept = $_POST['dept'];
	} 

	$sql = "INSERT INTO users ( user_id, user_name, mobile, user_email, user_password, year, age, dept) VALUES(?,?,?,?,?,?,?,?)";
	$stmtinsert = $connect->prepare($sql);
	$result = $stmtinsert->execute([$id, $name, $mnumber, $email, $password, $year, $age, $dept]);
		if($result){
			header("location:login.php");
		}else{
			echo 'There were erros while saving the data.';
		}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration | PHP</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    body{
		background-image: url("bg.jpg")
	}
        .signin {
    background-color: #f1f1f1;
    text-align: center;
    }
  </style>
</head>
<body>

<div>
	<?php
	
	?>	
</div>

<div class="panel panel-default">

    <div class="panel-heading">Register</div>
	<form action="register.php" method="post">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="panel-body">
					<p>Fill up the form with correct values.</p>
					<hr class="mb-3">

					<label for="Id"><b>Id</b></label>
    				<input type="text"  name="Id" required class="form-control">
					
    				<label for="name"><b>Name</b></label>
    				<input type="text" name="name" required class="form-control">
					
    				<label for="mnumber"><b>Mobile</b></label>
    				<input type="text" name="mnumber" required class="form-control">

    				<label for="email"><b>User Email</b></label>
    				<input type="text" name="email" required class="form-control">

    				<label for="password"><b>Password</b></label>
    				<input type="password" name="password" required class="form-control">

    				<label for="year"><b>Year</b></label>
    				<input type="text" name="year" required class="form-control">

    				<label for="age"><b>Age</b></label>
    				<input type="text" name="age" required class="form-control">

					<label for dept><b>Department</b></label>
            		<input type="text" name="dept" required class="form-control">

					<hr class="mb-3">

					<input class="btn btn-primary" type="submit" id="submit" name="submit" value="Sign Up">
					<div>
				</div>
			</div>
		</div>
	</form>
</div>
</div>
</body>
</html>