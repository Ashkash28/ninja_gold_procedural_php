<?php
 session_start();

	if(isset($_POST['building']) && $_POST['building'] == 'farm')
	{
		$gold = rand(10, 20);
	}
	elseif(isset($_POST['building']) && $_POST['building'] == 'cave')
	{
		$gold = rand(5, 10);
	}
	elseif(isset($_POST['building']) && $_POST['building'] == 'house')
	{
		$gold = rand(2, 5);
	}
	elseif(isset($_POST['building']) && $_POST['building'] == 'casino')
	{
		//BONUS CHANCE OF GAINING IS 70
		$chance = rand(1, 10);
		if($chance > 7)
		{
			$gold = rand(-1, -50);
		}
		else
		{
			$gold = rand(0, 50);
		}
	}

	if(isset($gold))
	{
		$_SESSION['gold'] += $gold;
	}

	if(!isset($_SESSION['activities']))
	{
		$_SESSION['activities'] = array();
	}

	if(isset($_POST['action']) && $_POST['action'] == 'delete')
	{
		session_destroy();
		header("location: index.php");
		die();
	}

	if($gold >= 0)
	{
		$_SESSION['activities'][] = "<p class='gain'>Bob went to the ". $_POST['building']. " and gained ". $gold. " gold</p>";
	}
	else{
		$_SESSION['activities'][] = "<p class='lost'>Bob went to the ". $_POST['building']. " and lost ". $gold. " gold</p>";
	}

	header("location: index.php");