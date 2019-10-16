<?php
include("database_connection.php");
include("common/php_scripts/check_cookie.php");
$Id="";
$rname="";
$rpos="";
$raddress="";
$msg="";
$sql4="";
if(isset($_POST['submit'])){

    if(isset($_POST['Id'])){
        $Id = $_POST['Id'];
    }
    
    if(isset($_POST['rname'])){
        $rname = $_POST['rname'];
    }

    if(isset($_POST['rpos'])){
        $rpos = $_POST['rpos'];
    }

    if(isset($_POST['raddress'])){
        $raddress = $_POST['raddress'];
    }

    $sql = "INSERT INTO r_company (id,r_name, r_pos, r_address)
    VALUES (?,?,?,?);";

$stmtinsert = $connect->prepare($sql);
    $result = $stmtinsert->execute([$Id, $rname, $rpos, $raddress]);
    if($result){
        header("location:dbarcompanies.php");
    }else{
        echo 'There were erros while saving the data.';
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
            <td>Rejected Companies</td><td>Details</td>
        </tr></b>
        <tr>
                <td>Id</td><td><input type="text" name="Id" id="Id"></td>
        </tr>
        <tr>
            <td>Company Name</td><td><input type="text" name="rname" id="year" ></td>
        </tr>
        <tr>
            <td>Designation</td><td><input type="text" name="rpos" id="mobile" ></td>
        </tr>
        <tr>
            <td>Company City</td><td><input type="text" name="raddress" id="email" ></td>
        </tr>
    </table>
    <div class="form-group" align="center">
       <input type="submit" name="submit" id="submit" class="submit" value="Submit" />
    </div>
</form>