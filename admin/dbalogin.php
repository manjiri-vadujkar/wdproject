<?php
//login.php
include("database_connection.php");
$message = '';
// this code runs when login form is submitted
if(isset($_POST["login"]))
{
 // go ahead if user email and password not empty
 if(empty($_POST["user_email"]) || empty($_POST["user_password"]))
 {
  $message = "<div class='alert alert-danger'>Both Fields are required</div>";
 }
 else
 {
  // query user details table to get the user details
  $query = "
  SELECT * FROM dbalogin
  WHERE user_email = :user_email
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    'user_email' => $_POST["user_email"]
   )
  );
  $count = $statement->rowCount();
  if($count > 0)
  {
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
    // if password verified, set cookie for 60 mins and go to index.php
    if(($_POST["user_password"]=$row["user_password"]))
    {
     setcookie("user_name", $row["user_name"], time()+3600);
     setcookie("user_id", $row["user_id"], time()+3600);
     header("location:dbaupdatestd.php");
    }
    else
    {
     // else show wrong password error
     $message = '<div class="alert alert-danger">Wrong Password</div>';
    }
   }
  }
  else
  {
   // show wrong email error if user not found
   $message = "<div class='alert alert-danger'>Wrong Email Address</div>";
  }
 }
}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Login</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Welcome to Admin</h2>
   <br />
   <div class="panel panel-default">

    <div class="panel-heading">Login</div>
    <div class="panel-body">
     <span><?php echo $message; ?></span>
     <form method="post">
      <div class="form-group">
       <label>User Email</label>
       <input type="text" name="user_email" id="user_email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Password</label>
       <input type="password" name="user_password" id="user_password" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="login" id="login" class="btn btn-info" value="Login" />
      </div>
     </form>
    </div>
   </div>
  </div>
 </body>
</html> 