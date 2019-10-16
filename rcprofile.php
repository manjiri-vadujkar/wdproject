<?php
include("database_connection.php");
include("common/php_scripts/check_cookie.php");
$user=$_COOKIE["user_id"];
$sql="SELECT *
FROM r_company
where Id = $user";
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
$len=count($result);
?>
<?php include("common/php_scripts/check_cookie.php"); ?>
<!DOCTYPE html>
<html>
 <head>
  <title>College Placement</title>
  <link rel="stylesheet" href=".\common\html_partials\hstyle.css">
  <link rel="stylesheet" href=".\common\html_partials\table1.css">
 </head>
 <body>
  <div class="container">
   <?php include("./common/html_partials/header.html"); ?>
   <br>
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
      <h2 align="left">Rejected Companies</h2>
      <br>
      <table class="paleBlueRows1" align="center">
      <thead>
         <font color:black>
         <tr>
            <th>Company Name</th>
            <th>Designation</th>
            <th>Company address </th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td><?php 
                 for ($row = 0; $row < $len; $row++) {
                     echo $result[$row]['r_name']."<br><br>";
                 }   
            ?></td>
            <td><?php 
                 for ($row = 0; $row < $len; $row++) {
                     echo $result[$row]['r_pos']."<br><br>";
                  }   
            ?></td>
            <td><?php 
                 for ($row = 0; $row < $len; $row++) {
                     echo $result[$row]['r_address']."<br><br>";
                  }   
            ?></td>
         </tr>
      </tbody>
      </table>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<div>
      <?php include("./common/html_partials/footer.html"); ?>
    </div>
</body>
</html>
