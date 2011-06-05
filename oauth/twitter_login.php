<?php 
// http://blog.abrah.am/2010/09/using-twitter-anywhere-bridge-codes.html
require("twitteroauth.php");  
session_start();

$url = $_SERVER['REQUEST_URI'];
$arr = preg_split('/\?/', $url);
$url_info = preg_split('/\&/', $arr[1]);
$action = preg_split('/\=/', $url_info[0]);
$_SESSION['action'] = $action[1];

    // The TwitterOAuth instance  
    $twitteroauth = new TwitterOAuth('luncBP1bH8ae5Qai9hrGjA', '9iNNPSU9KIlr1DvcGY57htlRGKfMWmP2WAdpaD27c9M');  
    // Requesting authentication tokens, the parameter is the URL we will be redirected to  
    $request_token = $twitteroauth->getRequestToken('http://ikt.khk.ee/~chris.kuusmann/ttt/oauth/twitter_auth.php');  

    // Saving them into the session  
    $_SESSION['oauth_token'] = $request_token['oauth_token'];  
    $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];  

    // If everything goes well..  
    if($twitteroauth->http_code==200){  
        // Let's generate the URL and redirect  
        $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
		header('Location: '. $url); 
    } else { 
        // It's a bad idea to kill the script, but we've got to know when there's an error.  
        die('Something wrong happened.');  
    }

?>