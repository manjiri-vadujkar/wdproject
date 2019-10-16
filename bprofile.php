<?php
include("database_connection.php");
include("common/php_scripts/check_cookie.php");
$user=$_COOKIE["user_id"];
$sql="select * from users where user_id=$user";
$statement = $connect->prepare($sql);
$statement->execute(
   array(
    'id' => $user
   ));
$count = $statement->rowCount();
if($count > 0)
{
 $result = $statement->fetchAll();
}
?>
<?php include("common/php_scripts/check_cookie.php"); ?>
<!DOCTYPE html>
<html>
 <head>
  <title>College Placement</title>
  <link rel="stylesheet" href=".\common\html_partials\hstyle.css">
  <link rel="stylesheet" href=".\common\html_partials\ptable.css">
 </head>
 <body>
  <div class="container">
   <?php include("./common/html_partials/header.html"); ?>
   <br>
   <?php include("./common/php_scripts/welcome.php"); ?>
   <br>
  </div>
  <div class="container">
   	<div class="column-left">
      <table class="paleBlueRows0">
         <tbody>
            <tr>
               <td><a href="bprofile.php">Basic Profile</a></td>
            </tr>
            <tr>
               <td><a href="aprofile.php">Applied Companies</a></td>
            </tr>
            <tr>
               <td><a href="acprofile.php">Accepted Companies</a></td>
            </tr>
            <tr>
               <td><a href="rcprofile.php">Rejected Companies</a></td>
            </tr>
         </tbody>
      </table>  
      </div>
   	<div class="column-right">
        <table align="center" class="paleBlueRows1">
         <tr>
            <td>ID</td>
            <td><?php echo $result[0]['user_id'] ?></td>
         </tr>
         <tr>
            <td>Name</td>
            <td><?php echo $result[0]["user_name"] ?></td>
         </tr>
         <tr>
            <td>Mobile</td>
            <td><?php echo $result[0]["mobile"] ?></td>
         </tr>
         <tr>
            <td>Email</td>
            <td><?php echo $result[0]["user_email"] ?></td>
         </tr>
         <tr>
            <td>Year</td>
            <td><?php echo $result[0]["year"] ?></td>
         </tr>
         <tr>
            <td>Age</td>
            <td><?php echo $result[0]["age"] ?></td>
         </tr>
         <tr>
            <td>Department</td>
            <td><?php echo $result[0]["dept"] ?></td>
         </tr>
      </table>
    </div>
</div>
<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br>
<div>
      <?php include("./common/html_partials/footer.html"); ?>
  </div>
</body>
</html>
