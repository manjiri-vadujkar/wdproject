<?php
include("database_connection.php");
include("common/php_scripts/check_cookie.php");
$Id="";
$user_name="";
$user_email="";
$user_password="";
$msg="";
$sql0="";
if(isset($_POST['submit0'])){

    if(isset($_POST['Id'])){
        $Id = $_POST['Id'];
    }
    
    if(isset($_POST['user_name'])){
        $user_name = $_POST['user_name'];
    }

    if(isset($_POST['user_email'])){
        $user_email = $_POST['user_email'];
    }

    if(isset($_POST['user_password'])){
        $user_password = $_POST['user_password'];
    }

$sql0 = "INSERT INTO user_details (user_id,user_name, user_email, user_password)
        VALUES ('$Id','$user_name','$user_email, $user_password');";

$connect->exec($sql0);

if ($sql0) {
    $msg="Student details have been inserted succeesfully.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
}
?>

<html>
<head>
    <title></title>
    <link rel="stylesheet" href="dbatable02.css">
    <link rel="stylesheet" href=".\common\html_scripts\style1.css">
</head>
<body>
    <h1>Welcome Admin </h1>
<div class="col-left">
  <div class="container">
      <div class="nav">
        <h2>Navigation</h2>
        <ul>
          <li><a href="dbaupdatestd.php">Insert Student Details</a></li>
          <li><a href="dbauser.php">Insert Login Credentials</a></li>
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
        <b><tr class="highlight">
            <td>User Login</td><td>Details</td>
        </tr></b>
        <tr>
                <td>Id</td><td><input type="text" name="Id" id="Id"></td>
        </tr>
        <tr>
            <td>User Name</td><td><input type="text" name="user_name" id="user_name" ></td>
        </tr>
        <tr>
            <td>User Email</td><td><input type="text" name="user_email" id="user_email" ></td>
        </tr>
        <tr>
            <td>User Password</td><td><input type="text" name="user_password" id="user_password" ></td>
        </tr>
        
    </table>
    <div class="form-group" align="center">
        <input type="submit" name="submit0" id="submit0" class="submit0" value="Submit" />
    </div>
</form>
</div>
</body>
</html>
            
