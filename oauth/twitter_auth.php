<?php 
require("twitteroauth.php"); 
session_start();
	if(!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])){  
        
    } else {  
        // Something's missing, go back to square 1  
        //header('Location: twitter_login.php');  
    }  
	
	    // TwitterOAuth instance, with two new parameters we got in twitter_login.php  
    $twitteroauth = new TwitterOAuth('luncBP1bH8ae5Qai9hrGjA', '9iNNPSU9KIlr1DvcGY57htlRGKfMWmP2WAdpaD27c9M', $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);  
    // Let's request the access token  
    $access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']); 
    // Save it in a session var 
    $_SESSION['access_token'] = $access_token; 
    // Let's get the user's info 
    //$user_info = $twitteroauth->get('account/verify_credentials'); 
    // Print user's info  
    //print_r($user_info);  
	
	switch($_SESSION['action']) {
		case 0:
			$twitteroauth->post('statuses/update', array('status' => 'Alustasin trips-traps-trulli mängimist1 || Tule mängima: '.$_SESSION['link']));  
			break;
		case 1:
			$conn = mysql_pconnect('localhost','chriskuusmann','hahched2');
			mysql_select_db('chriskuusmann_DB');
			
			$query = "SELECT name1, name2 FROM games WHERE game_channel = '".$_SESSION['game_room']."'";
			$result = mysql_query($query, $conn);
			
				while($row = mysql_fetch_array($result)) {
					$name1 = $row['name1'];
					$name2 = $row['name2'];
					
				} 
			$twitteroauth->post('statuses/update', array('status' => 'Trips-traps-trull: '.$name1.' vs '.$name2.' || Jälgi: '.$_SESSION['link']));
			break;
		/*case 2:
			$twitteroauth->post('statuses/update', array('status' => 'Trips-traps-trull: '.$_SESSION['name1'].' vs '.$_SESSION['name2'].'\n\rVõitis nimi'));
			break;*/
	}
	
	
?>