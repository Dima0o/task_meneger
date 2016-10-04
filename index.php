<?php
include('config.php');
		session_start();
	# Проверка существования SESSION
	if(isset($_SESSION['auth'])){
		$id = $_SESSION['auth'];
		$pr = $_SESSION['prava'];
		
		# Проверка есть ли act
		if(isset($_GET['act'])){
			$filename = $_GET['act'];
			if(file_exists('page/'.$filename.'.php')) {
				include ('page/'.$filename.'.php');
			}else {
				if($pr==1){include ('page/dashbord.php');}
				else{include ('page/home.php');}
				
			}
		}else{
			if($pr==1){include ('page/dashbord.php');}
			else{include ('page/home.php');}
		}
	# Если SESSION отсутствует
	}else{
		echo "<script>document.location.href = 'scr/exit.php';</script>";
		exit();
	}
?>






