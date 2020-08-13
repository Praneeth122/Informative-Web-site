<?php include('db.php');?>
<?php
session_start();
//$number=(int)$_GET['n'];
?>

<?php 
if(!isset($_SESSION['score'])){
	$_SESSION['score']=0;
}

//print_r($_SESSION);
//print_r($_POST);

if(isset($_POST['submit']))
{
	$number=$_POST['number'];
	//echo $number; 
}
print_r($_POST);
	$selected_choice=$_POST['choice'];
	
	//echo $selected_choice;
	$next=$number+1;
	$ro=$number-1;
	$tutsa=$_SESSION['array'][$ro]['ques_no'];
// down here change choice to choice1
$sql="SELECT * FROM choice WHERE ques_no=$tutsa AND is_correct=1;";
	// down here change choice to choice1

$result= mysqli_query($conn,$sql);
$option= mysqli_fetch_all($result,MYSQLI_ASSOC);
$correct_choice=$option[0]['options'];
echo $selected_choice;
echo $correct_choice;
if($selected_choice==$correct_choice)
{
	$_SESSION['score']++ ;
}
// if you want more questions change 5 to your desired value
if($number==5){
	header("location:final.php");
}
else
{
	header("location: question.php?n=$next");
}

?>
