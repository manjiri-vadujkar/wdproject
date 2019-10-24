<?php
//index.php


// if cookie not set, go to login page.
if(!isset($_COOKIE["user_name"]) && !isset($_COOKIE["user_id"]))
{
 header("location:dbalogin.php");
}

?>
