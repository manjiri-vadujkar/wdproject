<?php include("common/php_scripts/check_cookie.php"); 
$name="";
$Id="";
$subject="";
$msg="";

if(isset($_POST['submit']))
{
  if(isset($_POST['Id'])){
    $Id = $_POST['Id'];
  }
  if(isset($_POST['name'])){
    $name = $_POST['name'];
  } 
  if(isset($_POST['subject'])){
    $subject = $_POST['subject'];
  }

    $sql = "INSERT INTO enquiry ( id,name, subject) VALUES (?,?,?)";
		$stmtinsert = $connect->prepare($sql);
		$result = $stmtinsert->execute([$Id, $name, $subject]);
		if($result){
			header("location:index.php");
		}else{
			$msg='There were errors while saving the data.';
    }
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
 <head>
  <title>College Placement</title>
  <link rel="stylesheet" href=".\common\html_partials\hstyle.css">
  <link rel="stylesheet" href=".\common\html_partials\style02.css">
  <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  padding: 20px;
}
</style>
 </head>
 <body>
  <div class="container">
   <?php include("./common/html_partials/header.html"); ?>
   <br>
   <h2 align="center">Contact Us</h2>
  </div>
  <div class="container">
   		<div class="column-center">
        <h1>Contact Info</h1>
        <h2>Phone No:- 02512734788<br>
            Email_Id:- ssjcoe@gmail.com
            Address:- Shivajirao S Jondhale College,<br>
            Sonar Pada, Dombivli East.</h2>
      </div>
   	 <div class="column-left">
       <h1>Enquiry</h1>
       <div class="container">
  <form action="/action_page.php">
    <label for="fname">Name</label>
    <input type="text" id="name" name="name" placeholder="Your name..">

    <label for="lname">Id</label>
    <input type="text" id="Id" name="Id" placeholder="Your Id">

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" id="submit"  name="submit">
  </form>
</div>
      </div>
    </div>
    <br><br>
    <div>
      <?php include("./common/html_partials/footer.html"); ?>
  </div>  
 </body>
</html>
