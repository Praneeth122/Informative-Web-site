<?php 
include('db.php');
	$sql="SELECT * FROM questions ORDER BY ques_no ;";
$result= mysqli_query($conn,$sql);
$questions= mysqli_fetch_all($result,MYSQLI_ASSOC);

session_start();
//print_r ($questions);
shuffle($questions);
$_SESSION['array']=$questions;
header("location:question.php?n=1");
?>