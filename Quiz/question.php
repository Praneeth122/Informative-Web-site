<?php
session_start();?>
<?php
 $number=(int)$_GET['n'];
 // down here change electronics and communication to your database name
$conn=mysqli_connect('localhost','root','','tnstc');
// down here change questions to questions1

$questions=$_SESSION['array'];

$ro=$number-1;
$tuts=$questions[$ro]['ques_no'];
// down here change choice to choice1
$sql="SELECT * FROM choice WHERE ques_no=$tuts;";
$result= mysqli_query($conn,$sql);
$choices= mysqli_fetch_all($result,MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Quiz</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link rel="stylesheet" type="text/css" href="quiz.css">
	</head>
	<body>
		<div class="container">
			<div id="game">
				<h2 id="question"><?php echo $number?>. <?php echo$questions[$ro]['text']; ?></h2>
				<br>
					<form action="process.php"method="POST" >
					<input type="hidden" name="number" value="<?php echo $number ?>">
					<?php for($i=0;$i<4;$i++) :?>	
					<label class="choice-container">
						<input type="radio" name="choice" required id="option<?php echo $i ?>" value="<?php echo $choices[$i]['options'];?>">
						<p class="choice-prefix"><?php echo chr($i+65)?></p>
						<p class="choice-text"><?php echo $choices[$i]['options'];?></p>
					</label>
					<?php endfor?>
					<input type="submit" name="submit" id="submit" class="btn btn-outlinewarning" >
					</form>
			</div>
		</div>
	</body>
</html>
