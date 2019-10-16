<?php
include("database_connection.php");
include("common/php_scripts/check_cookie.php");
$Id="";
$msg="";
if(isset($_POST['submit']))
{

    if(isset($_POST['Id']))
    {
        $Id = $_POST['Id'];
    }

    $sql1 = "DELETE FROM users WHERE id=$Id";
    $sql2 = "DELETE FROM a_company WHERE id=$Id";
    $sql3 = "DELETE FROM ac_company WHERE id=$Id";
    $sql4 = "DELETE FROM r_company WHERE id=$Id";
    $stmtinsert1 = $connect->prepare($sql1);
    $result1 = $stmtinsert1->execute();
    $stmtinsert2 = $connect->prepare($sql2);
    $result2 = $stmtinsert2->execute();
    $stmtinsert3 = $connect->prepare($sql3);
    $result3 = $stmtinsert3->execute();
    $stmtinsert4 = $connect->prepare($sql4);
		$result4 = $stmtinsert4->execute();
    if($result1)
    {
      if($result2)
      {
        if($result3)
        {
          if($result4)
          {
            $msg="Deleted";
          }
        }
      }
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
          <li><a href="dbaupdatestd.php">Insert Student Details</a></li>
          <li><a href="dbacompanies.php">Insert Applied Company Details</a></li>
          <li><a href="dbaaccompanies.php">Insert Accepted Company Details</a></li>
          <li><a href="dbarcompanies.php">Insert Rejected Company Details</a></li>
          <li><a href="dbaaccompanies.php">Delete Student Details</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
</div>
<div class="col-right">
<div align="center">
<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
</div>
<form action="" method="post">
    <label>Id</label>
    <input type=text name="Id" />
    <input type="submit" name="submit" id="submit" class="submit" value="Submit" />
</form>
</div>
</body>
</html>