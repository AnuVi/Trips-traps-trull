<?php
function generate_nr() {
	$loop = true;
		while($loop) {
		$r_nr = rand(0,1000000);
		$query = "SELECT * FROM games WHERE game_channel = 'game_room".$r_nr."'";
		$result = mysql_query($query);
		$num_rows = mysql_num_rows($result);
		if(!$num_rows) {
			$loop = false;
		}
	}
	return $r_nr;
}


$conn = mysql_pconnect('localhost','chriskuusmann','hahched2');
mysql_select_db('chriskuusmann_DB');
$move_on = true;

if(isset($_POST['a'])) {

	switch($_POST['a'])
	{
	case 0:
		$channel = $_POST['channel'];
		$query = "SELECT player1, player2, name1, name2 FROM games WHERE game_channel = '".$channel."'";
		$result = mysql_query($query, $conn);
		while($row = mysql_fetch_array($result)) {
			echo json_encode(array('player1' => $row['player1'], 'player2' => $row['player2'], 'name1' => $row['name1'], 'name2' => $row['name2']));
		}
		break;
	case 1:
		$query = "SELECT * FROM player_score WHERE user_id = '".$_POST['id']."'";
		$result = mysql_query($query, $conn); 
		
		if(!mysql_num_rows($result)) {
			$query = "INSERT INTO player_score (user_id) VALUES ('".$_POST['id']."')";
			mysql_query($query, $conn);
		}
		
		$channel = $_POST['channel'];
		$query = "SELECT player1, player2 FROM games WHERE game_channel = '".$channel."'";
		$result = mysql_query($query, $conn);
		while($row = mysql_fetch_array($result)) {
			
			if($row[0] == '') {
				$query = "UPDATE games SET player1 = '".$_POST['id']."', name1 = '".$_POST['name']."' WHERE game_channel = '".$channel."'";
				mysql_query($query, $conn);
				$move_on = false;
			} else if($row[1] == '' && $move_on) {
				$query = "UPDATE games SET player2 = '".$_POST['id']."', name2 = '".$_POST['name']."' WHERE game_channel = '".$channel."'";
				mysql_query($query, $conn);
			} 
		}
		break;
	case 2:
		echo generate_nr();
		break;
	case 3:
		$channel = $_POST['channel'];
		$id = $_POST['id'];
		$query = "SELECT player1, player2 FROM games WHERE game_channel = '".$channel."'";
		$result = mysql_query($query, $conn);
		while($row = mysql_fetch_array($result)) {
			
			if($row[0] == $id) {
				$query = "UPDATE games SET player1 = '', name1 = '' WHERE game_channel = '".$channel."'";
				mysql_query($query, $conn);
				$move_on = false;
			} else if($row[1] == $id && $move_on) {
				$query = "UPDATE games SET player2 = '', name2 = '' WHERE game_channel = '".$channel."'";
				mysql_query($query, $conn);
			} 
		}
		break;
	case 4:
		$id1 = $_POST['player1_id'];
		$id2 = $_POST['player2_id'];
		$query = "SELECT wins, loses, draws FROM player_score WHERE user_id = ".$id1;
		$result = mysql_query($query, $conn);
		
		while($row = mysql_fetch_array($result)) {
			if($row[0] == 0 && $row[1] == 0 && $row[2] == 0) {
				$player1_score = false;
			} else {
				$total = $row[0] + $row[1] + $row[2];
				$player1_score = array($row[0], $row[1], $row[2], $total);
			}
		}
		
		$query = "SELECT wins, loses, draws FROM player_score WHERE user_id = ".$id2;
		$result = mysql_query($query, $conn);
		while($row = mysql_fetch_array($result)) {
			if($row[0] == 0 && $row[1] == 0 && $row[2] == 0) {
				$player2_score = false;
			} else {
				$total = $row[0] + $row[1] + $row[2];
				$player2_score = array($row[0], $row[1], $row[2], $total);
			}
		}
		
		$player_score = array("player1_score"=>$player1_score, "player2_score"=>$player2_score);
		echo json_encode($player_score);
		break;
	case 5:
		$id = $_POST['id'];
		$query = "SELECT * FROM player_score WHERE user_id = '".$_POST['id']."'";
		$result = mysql_query($query, $conn); 
		
		if(!mysql_num_rows($result)) {
			$query = "INSERT INTO player_score (user_id) VALUES ('".$_POST['id']."')";
			mysql_query($query, $conn);
		}
		
		$query = "SELECT wins, loses, draws FROM player_score WHERE user_id = ".$id;
		$result = mysql_query($query, $conn);
		
		while($row = mysql_fetch_array($result)) {
			if($row[0] == 0 && $row[1] == 0 && $row[2] == 0) {
				$player_score = false;
			} else {
				$total = $row[0] + $row[1] + $row[2];
				$player_score = array($row[0], $row[1], $row[2], $total);
			}
		}
		
		$player_score = array("player_score"=>$player_score);
		echo json_encode($player_score);
		break;
	}
}
?>