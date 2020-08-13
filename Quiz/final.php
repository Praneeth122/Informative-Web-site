<?php 
include('db.php');
?>
<?php
session_start();?>
<?php
$response=['You should improve ','You can improve','You can do better','Good','Very Good','Excellent'];
// if you like add responses as you like for the number of questions


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
    	<meta http-equiv="refresh" content="120; URL=home.php">
    	<title>Congrats!</title>
    	<link rel="stylesheet" href="quiz.css" />
	</head>
	<body>
		<h1 class="container" id="heading">
			Your Score: <?php echo $_SESSION['score'];?>/5
		</h1>
		<div class="container">
			<div id="end" class="flex-center flex-column">
				<h1><?php echo $response[ $_SESSION['score']] ;
				unset($_SESSION['score']);?>
				</h1>
				<ul id="highscoreslist">
				<?php// if you want more questions change 5 to your desired value?>

				<?php for($i=0;$i<5;$i++):?>

				<h5 class="highscores"><?php $a=$i+1;?>
				<?php echo $a;
					$tea=$_SESSION['array'][$i]['ques_no'];
					echo ". ";
					echo $_SESSION['array'][$i]['text']; ?>
				<br>
					<?php echo "answers-"?>
				<br>
				</h5>
				<h4>
					<?php $sql="SELECT * FROM choice WHERE is_correct AND ques_no=$tea;";
					$result= mysqli_query($conn,$sql);
					$choices= mysqli_fetch_all($result,MYSQLI_ASSOC);
					echo $choices[0]['options'];   ?>
					<?php endfor ?>
				<br>
				</h4>
				</ul>
				<a class="btn" href="home.php">Play Again</a>
        		<a class="btn" href="../index.php">Go Home</a>
        	</div>
		</div>
	</body>	
</html>