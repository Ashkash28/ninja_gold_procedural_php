<?php
 session_start();
 // session_destroy();

 if(!isset($_SESSION['gold'])){
 	$_SESSION['gold'] = 0;
 }
?>
<html>
	<head>
		<title>Ninja Gold</title>
		<style>
		.buildings{
			border: 1px solid black;
			width: 200px;
			height: 200px;
			display: inline-block;
		}
		.activities{
			width: 400px;
			height: 250px;
			border: 1px solid black;
			overflow: auto;
		}
		input{
			margin-left: 50px
		}
		.gain{
			color: green;
		}
		.lost{
			color: red;
		}
		</style>
	</head>
	<body>
		<div class="gold">
			<h2>Gold</h2>
			<h3><?= $_SESSION['gold']?></h3>
		</div>
		<div class="buildings">
			<h2>Farm</h2>
			<h3>Receive 10-20 Gold</h3>
			<form action="process.php" method="post">
				<input type="hidden" name="building" value="farm">
				<input type="submit" value="Get Gold">
			</form>
		</div>
		<div class="buildings">
			<h2>Cave</h2>
			<h3>Receive 5-10 Gold</h3>
			<form action="process.php" method="post">
				<input type="hidden" name="building" value="cave">
				<input type="submit" value="Get Gold">
			</form>
		</div>
		<div class="buildings">
			<h2>House</h2>
			<h3>Receive 2-5 Gold</h3>
			<form action="process.php" method="post">
				<input type="hidden" name="building" value="house">
				<input type="submit" value="Get Gold">
			</form>
		</div>
		<div class="buildings">
			<h2>Casino</h2>
			<h3>Receive or Lose 0-50 Gold</h3>
			<form action="process.php" method="post">
				<input type="hidden" name="building" value="casino">
				<input type="submit" value="Get Gold">
			</form>
		</div>
		<form action="process.php" method="post">
			<input type="hidden" name="action" value="delete">
			<input type="submit" value="Restart">
		</form>


		<div class="activities">
			<h2>Activities</h2>
			<?php
				 if(isset($_SESSION['activities']))
				 {
				 	$array = array_reverse($_SESSION['activities']);
				 	foreach($array as $activity)
				 	{
				 		echo $activity;
				 	}
				 }
			?>
			<!-- <p class="gain">Bob went to the house and gained 2 gold</p>
			<p class="gain">Bob went to the farm and gained 2 gold</p>
			<p class="gain">Bob went to the cave and gained 2 gold</p>
			<p class="lost">Bob went to the casino and lost 2 gold</p> -->
		</div>
	</body>
</html>