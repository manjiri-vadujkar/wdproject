<?php
if(isset($_COOKIE["user_id"]) && isset($_COOKIE["user_name"]))
{
setcookie("user_id", "", time()-3600);
setcookie("user_name", "", time()-3600);

header("location:dbalogin.php");
}

?>

