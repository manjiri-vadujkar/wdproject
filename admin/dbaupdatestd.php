<?php
include("database_connection.php");
$id="";
$name="";
$year="";
$mnumber="";
$age="";
$email="";
$password="";
$dept="";
$msg="";
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

        $sql = "INSERT INTO users ( id,fullname, mobile, user_email, user_password, year, age, dept) VALUES(?,?,?,?,?,?,?,?)";
		$stmtinsert = $connect->prepare($sql);
		$result = $stmtinsert->execute([$id, $name, $mnumber, $email, $password, $year, $age, $dept]);
        
        if($result){
			header("location:dbaupdatestd.php");
		}else{
			$msg='There were erros while saving the data.';
        }
    
}
?>

<html>
<head>
    <title></title>
    <link rel="stylesheet" href="dbatable2.css">
    <link rel="stylesheet" href=".\common\html_scripts\style01.css">
</head>
<body>
    <h1>Welcome Admin </h1>
<div class="col-left">
  <div class="container">
      <div class="nav">
        <h2>Navigation</h2>
        <ul>
          <li><a href="dbaupdatestd.php">Insert Student Details</a></li
          <li><a href="dbacompanies.php">Insert Applied Company Details</a></li>
          <li><a href="dbaaccompanies.php">Insert Accepted Company Details</a></li>
          <li><a href="dbarcompanies.php">Insert Rejected Company Details</a></li>
          <li><a href="delete.php">Delete Student Details</a></li>
          <li><a href="dbalogout.php">Logout</a></li>
        </ul>
      </div>
    </div>
</div>

<div align="center">
<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
</div>
<div class="col-right">
<form action="" method="post"> 
    <table class="paleBlueRows" align="center">
        <thead>
        <tr>
            <th>Student</th>
            <th>Details</th>
        </tr>
        </thead>
            <tr>
                <td>Id</td><td><input type="text"  name="Id" required></td>
            </tr>
            <tr>
                <td>Name</td><td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Mobile</td><td><input type="text" name="mnumber" required></td>
            </tr>
            <tr>
                <td>Email_Id</td><td><input type="text" name="email" required></td>
            </tr>
            <tr>
                <td>Password</td><td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Year</td><td><input type="text" name="year" required></td>
            </tr>
            <tr>
                <td>Age</td><td><input type="text" name="age" required></td>
            </tr>
            <tr>
                <td>Department</td><td><input type="text" name="dept" required></td>
            </tr>
            </table>
            <div class="form-group" align="center">
            <input type="submit" name="submit" id="submit" class="submit" value="Submit" />
            </div>
            </form>
</div>
</body>
</html>
