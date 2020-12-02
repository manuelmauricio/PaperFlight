<?php
	$action = $_POST['action'];

	if ($action == "addScore") 
		addScore();
	else if ($action == "getScores")
		getScores();
		else if ($action == "getScoresDos")
		getScoresDos();

	function connect() {
		$databasehost = "localhost";
		$databasename = "paperflightdb";
		$databaseuser = "root";
		$databasepass = "password";

		$mysqli = new mysqli($databasehost, $databaseuser, $databasepass, $databasename);
		if ($mysqli->connect_errno) {
			echo "Problema con la conexion a la base de datos";
		}
		return $mysqli;
	}

	function addScore() {
		$db_score = $_POST["db_score"];
		$db_name = $_POST["db_name"];
		$db_level = $_POST["db_level"];

		$mysqli = connect();
		
		$result = $mysqli->query("INSERT INTO scoretable(score_total, player_name, level_number) values(".$db_score.",'".$db_name."', ".$db_level.")");
		
		if (!$result) {
			echo "Problema al hacer un query: " . $mysqli->error;								
		} else {
			echo "Se envio tu puntucion correctamente";		
		}
		
		mysqli_close($mysqli);
	}

	function getScores() {
		$mysqli = connect();

		$result = $mysqli->query("SELECT * FROM scoretable ORDER BY score_total DESC LIMIT 10");	
		
		if (!$result) {
			echo "Problema al hacer un query: " . $mysqli->error;								
		} else {
			// Recorremos los resultados devueltos
			$rows = array();
			while( $r = $result->fetch_assoc()) {
				$rows[] = $r;
			}			
			// Codificamos los resultados a formato JSON y lo enviamos al HTML (Client-Side)
			echo json_encode($rows);
		}
		
		mysqli_close($mysqli);
	}


	function getScoresDos() {
		$mysqli = connect();

		$result = $mysqli->query("SELECT * FROM scoretable ORDER BY score_total");	
		
		if (!$result) {
			echo "Problema al hacer un query: " . $mysqli->error;								
		} else {
			// Recorremos los resultados devueltos
			$rows = array();
			while( $r = $result->fetch_assoc()) {
				$rows[] = $r;
			}			
			// Codificamos los resultados a formato JSON y lo enviamos al HTML (Client-Side)
			echo json_encode($rows);
		}
		
		mysqli_close($mysqli);
	}



?>