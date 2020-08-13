<?php 
include('db.php');
?>
<?php 
if(isset($_POST['submit']))
{
$question_number=$_POST['quest_no'];
$question=$_POST['text'];
$correct_choice=$_POST['correct_answer'];
$choices=array();
$choices[1]=$_POST['choice1'];
$choices[2]=$_POST['choice2'];
$choices[3]=$_POST['choice3'];
$choices[4]=$_POST['choice4'];
// down here change questions to questions1
$query="INSERT INTO `questions` (ques_no , text) VALUES ('$question_number', '$question');";
$result= mysqli_query($conn,$query);
if($result)
{
foreach($choices as $choice=>$value)
{
	if($value!=''){
		if($correct_choice==$choice)
		{
			$is_correct=1;
		}
		else{
			$is_correct=0;
		}
		// down here change choice to choice1
		$query="INSERT INTO `choice` (ques_no , is_correct, options) VALUES( '$question_number', '$is_correct', '$value');"; 
$result= mysqli_query($conn,$query);		
	}
	    
}	


if($result){
	$msg='your question has been added';
}else{
	echo "error";;
}

}
}
// down here change questions to questions1
$sql="SELECT * FROM questions ;";
$result= mysqli_query($conn,$sql);
$questions= mysqli_fetch_all($result,MYSQLI_ASSOC);
$total=count($questions);
$next=$total+1;
?>
<?php 
include('header.php');
?>
<div class="container">
<form method="POST" action="add.php">
<p>
<h1> Please submit your questions answers and options </h1>
</p><?php if(isset( $msg)){
	echo $msg;
}
?>
<label>Question-no-</label>
<input type="number" value="<?php echo $next;?>" name="quest_no">
<br>
<label> Question-</label>
<input type="text" name="text">
<br>
<label> option:1</label>
<input type="text" name="choice1">
<br>
<label> option-2</label>
<input type="text" name="choice2">
<br>
<label> option-3</label>
<input type="text" name="choice3">
<br>
<label> option-4</label>
<input type="text" name="choice4">
<br>
<label> correct answer-</label>
<input type="number" name="correct_answer">
<input type="submit" name="submit" id="submit">
</form>
</p>
</div>
<?php
include('footer.php');
?>
