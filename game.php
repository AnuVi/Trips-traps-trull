<?php
session_start();
$url = $_SERVER['REQUEST_URI'];
$link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$arr = preg_split('/\?/', $url);
$channel = $arr[1];
$_SESSION['game_room'] = $channel;
$_SESSION['link'] = $link;
$conn = mysql_pconnect('localhost','','');
//Andmebaasi valimine
mysql_select_db('');
$query = "SELECT * FROM games WHERE game_channel = '".$channel."'";
$result = mysql_query($query, $conn);
if(!mysql_num_rows($result)) {
	$query = "INSERT INTO games (game_channel) VALUES ('".$channel."')";
	mysql_query($query);
}

// http://tekxplorer.blogspot.com/2010/08/twitter-oauth-using-php-to-make-your.html

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
<meta charset="utf-8">
<title>Trips-traps-trull</title>
<!-- meta tags -->
<meta name="keywords" content="trips-traps-trull, game, tic-tac-toe">
<meta name="description" content="Vana hea trips-traps-trull">
<!-- stylesheets -->
<link rel="stylesheet" type="text/css" href="gfx/style.css">
<!--javascript-->
<script src="http://platform.twitter.com/anywhere.js?id=luncBP1bH8ae5Qai9hrGjA&amp;v=1"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="http://connect.facebook.net/en_US/all.js"></script>
</head>
<body>
	<div id="wrap" class="clear">
		<div id="loading_screen" class="hidden">
			<div id="login" class="hidden">
				<p id="t_sign_in"><input type="image" src="gfx/twitter.png" alt="Logi Twitter'isse" /></p>
				<p id="t_sign_out"><button type="button">Logi Twitter'ist välja</button></p>
				<div id="fb-root"></div>
				<p id="f_sign_in"><fb:login-button perms="publish_stream">Login with Facebook</fb:login-button></p>
				<p id="f_sign_out"><button type="button">Sign out of Facebook</button></p>
			</div>
			<div id="game_end" class="hidden">
				<p>Oled sisse logitud nii Twitter'isse, kui Facebook'i</p>
				<p>Vali sotsiaalmeedia kasutaja, mida soovid mängu mängimiseks kasutada</p>
				<p id="t_choose"><button type="button">Twitter</button></p>
				<p id="f_choose"><button type="button">Facebook</button></p>
			</div>
			<div id="loader" class="hidden">
				<p>Ühenduse loomine PUBNUB'iga</p>
				<img src="gfx/loader.gif" alt="loader">
			</div>
		</div>
		<div id="header" class="clear">
			<h1>Trips-traps-trull</h1>
			<span><a href="#" id="sign_out" title="Logi Twitter'ist välja" rel="start">Logi välja</a></span>
		</div><!--#header end-->
		<div id="content" class="clear">
			<div id="game_data">
				<div id="game">
					<div id="game_holder" class="clear">
						<ul id="tic_tac_toe" role="list">
							<li>&nbsp;</li>
							<li id="top_middle">&nbsp;</li>
							<li>&nbsp;</li>
							<li id="left_middle"><img src="x1.gif"></li>
							<li id="middle"><img src="o3.gif"></li>
							<li id="right_middle">&nbsp;</li>
							<li>&nbsp;</li>
							<li id="bottom_middle">&nbsp;</li>
							<li>&nbsp;</li>
						</ul><!--#tic_tac_toer end-->
					</div><!--#game_holder-->
				</div><!--#game_end-->
				
				<dl id="p1" class="clear">
					<dt>&nbsp;</dt>
					<dd class="role">X</dd>
					<dt class="image"><img src="http://placekitten.com/48/48"></dt>
					<dd class="name">Player1</dd>
					<dt>Mänge:</dt>
					<dd id="p1_total">0</dd>
					<dt>Võite:</dt>
					<dd id="p1_wins">0</dd>
					<dt class="lost">Kaotusi:</dt>
					<dd id="p1_loses" class="lost">0</dd>
					<dt>Viike:</dt>
					<dd id="p1_draws">0</dd>
				</dl>
				
				<dl id="p2" class="clear">
					<dt>&nbsp;</dt>
					<dd class="role">O</dd>
					<dt class="image"><img src="http://placekitten.com/48/48"></dt>
					<dd class="name">Player2</dd>
					<dt>Mänge:</dt>
					<dd id="p2_total">0</dd>
					<dt>Võite:</dt>
					<dd id="p2_wins">0</dd>
					<dt class="lost">Kaotusi:</dt>
					<dd id="p2_loses" class="lost">0</dd>
					<dt>Viike:</dt>
					<dd id="p2_draws">0</dd>
				</dl> 
			</div><!--#game_data end-->
			<div id="chat">
				<ol id="chat_line">
					<!--<li><p><img src="http://placehold.it/24x24">name</p>
					<p class="text">sdkfjdlkfjlfkls</p></li>-->
					<li><p class="chat_name">name</p>
					<p>kirjutama mõttekat teksti</p></li>
					<li><p class="chat_name">name</p>
					<p>sdkfjdlkfjlfkls  dsdfsfdfd fsdfsdfsdfsd fgfdgfgf dfgfgfgdfgdf fgdfgf</p></li>
					<li><p class="chat_name">name</p>
					<p>kui sellest nüüd abi oleks</p></li>
					<li><p class="chat_name">name</p>
					<p>kui sellest nüüd abi oleks</p></li>
					<li><p class="chat_name">name</p>
					<p>kui sellest nüüd abi oleks</p></li>
					<li><p class="chat_name">name</p>
					<p>kui sellest nüüd abi oleks</p></li>
					<li><p class="chat_name">name</p>
					<p>kui sellest nüüd abi oleks</p></li>
					<li><p class="chat_name">name</p>
					<p>kui sellest nüüd abi oleks</p></li>
					<li><p class="chat_name">name</p>
					<p>kui sellest nüüd abi oleks</p></li>
				</ol>
				
				<textarea id="chat_text" value="kriba-kribi-kribu"></textarea>
				
			</div><!--#chat end-->
		</div><!--#content end-->
		<div id="footer">
			<ul id="info">
				<li><a  rel="next" href="" title="Kes? Mis?">Kes? Mis?</a></li>
				<li><a  rel="next" href="" title="Trips-traps-trull Twitteris"><img alt="Twitter logo" height="16" width="16" src="tw.jpeg"></a></li>
				<li><a  rel="next" href="" title="Trips-traps-trull Facebookis"><img alt="Facebook logo" height="16" width="16" src="fb.jpeg"></a></li>
			</ul><!--#info end-->
		</div><!--#footer end-->
		<iframe id="twitter_msg" src="">
		<html>
			<head>
			<title>Twitter'i sõnum</title>
			</head>
			<body>
			</body>
		</html>
	</iframe>
	</div><!--#wrap end-->
<div pub-key="pub-05c44c62-f1a3-4af8-90de-92738b6e3dcb" sub-key="sub-582e5aab-762b-11e0-a69e-5153cc05bedb" ssl="off" origin="pubsub.pubnub.com" id="pubnub"></div>
<script src="http://cdn.pubnub.com/pubnub-3.1.min.js"></script>
<script>
google.load("jquery", "1.6.0")
google.setOnLoadCallback(function () {
var t_sign_in = $('#t_sign_in');
var t_sign_out = $('#t_sign_out');
var t_choose = $('#t_choose');
var f_sign_in = $('#f_sign_in');
var f_sign_out = $('#f_sign_out');
var f_choose = $('#f_choose');
var loading_screen = $('#loading_screen');
var login = $('#login');
var loader = $('#loader');
var t_g_sign_out = $('#t_g_sing_out');
var f_g_sign_out = $('#f_g_sing_out');
var p1_img = $('#p1 .image img');
var p2_img = $('#p2 .image img');
var p1_name = $('#p1 .name');
var p2_name = $('#p2 .name');
var p1_total = $('#p1_total');
var p1_loses = $('#p1_loses');
var p1_wins = $('#p1_wins');
var p1_draws = $('#p1_draws');
var p2_total = $('#p2_total');
var p2_wins = $('#p2_wins');
var p2_loses = $('#p2_loses');
var p2_draws = $('#p2_draws');
var p1_score;
var p2_score;
var currentUser;
var id;
var name;
var f_login = false;
var t_login = false;
var html_choose = $('#choose');
var gamers = [];
var names = [];
var winner = '';
var xy_pos = [];
var turn = 'x';
var channel = '<?php echo $channel ?>';
var click_on = true;
var link = '<?php echo $link ?>';
var chat_input = $('#chat_text');
var chat_line = $('#chat_line');
FB.init({ 
	appId:'153825388016843',
	cookie:true, 
    status:true,
    xfbml:true
});
	
twttr.anywhere(function(t) {
(function(){
	function set_pos() { 
		$('li', '#tic_tac_toe').each(function() {
			var index = $(this).index();
			var pos_val = xy_pos[index];
			
			if(pos_val == 'x') {
				$(this).addClass('add_x');
			} else if(pos_val == 'y') {
				$(this).addClass('add_y');
			}
		});
		check_win('x');
		if(click_on) {
			check_win('y');
		}
	}

	function check_win(value) {
	var v = value;
			if(	
				(xy_pos[0] == v && xy_pos[1] == v && xy_pos[2] == v) || 
				(xy_pos[3] == v && xy_pos[4] == v && xy_pos[5] == v) ||
				(xy_pos[6] == v && xy_pos[7] == v && xy_pos[8] == v) ||
				(xy_pos[0] == v && xy_pos[3] == v && xy_pos[6] == v) ||
				(xy_pos[1] == v && xy_pos[4] == v && xy_pos[7] == v) ||
				(xy_pos[2] == v && xy_pos[5] == v && xy_pos[8] == v) ||
				(xy_pos[0] == v && xy_pos[4] == v && xy_pos[8] == v) ||
				(xy_pos[2] == v && xy_pos[4] == v && xy_pos[6] == v) ) {
				console.log(winner);
				click_on = false;
				// loading screeni nähtavale toomise funktsioon
			} else if (xy_pos.length == 9) {
				for(var i = 0; i < 9; i++) {
					if(xy_pos[i] == null || xy_pos == undefined) {
						return false;
					}
				}
				// loading screeni nähtavale toomise funktsioon
				
			}
					
	}
	
	function game_end() {
		// Kui mäng lõppeb funktsioon
	}
	function player_data() {
		$.post('functions.php', {a:0, channel:channel}, function(data) {
			var players = $.parseJSON(data);
			
			if(gamers.length == 0) {
				gamers.push(players.player1);
				gamers.push(players.player2);
				names.push(players.name1);
				names.push(players.name2);
			}
		
			if(gamers[0] != '' && gamers[1] != '') {
				
				// Mängija võitude, kaotuste ja viikide andmete küsimine andmebaasist
				$.post('functions.php', {a:4, player1_id:gamers[0], player2_id:gamers[1]}, function(data) {
					var obj = $.parseJSON(data);
					p1_score = obj.player1_score;
					p2_score = obj.player2_score;
					
					PUBNUB.publish({
						channel : channel,
						message : {'a':0, 'gamers':gamers, 'names':names, 'p1_score':p1_score, 'p2_score':p2_score}	
					})
				});	
			} else {
				if(f_login) {
					var game_start = 'Alustasin trips-traps-trulli mängimist.\n\r Tule mängima: ' + location.href;
					FB.api('/me/feed', 'post', { message: game_start }, function(response) {
						console.log('esimene');
						console.log(response);
					});
				} else if(t_login) {
					$('#twitter_msg').attr('src', 'oauth/twitter_login.php?a=0');
				}
			}
		});
		
	}
	
	function choose() {
		f_sign_out.hide();
		t_sign_out.hide();
		html_choose.fadeIn(500);
	}
	
	function add_user_data() {
		$.post('functions.php', {a:1, id:id, channel: channel, name:name}, function(data) {
			player_data();
		});
	}
	
	function f_connection() {
		if(t.isConnected()) {
			t_login = true;
		}
		FB.getLoginStatus(function(response) {
			if(response.session) {
				f_login = true;
				f_sign_in.hide();
				if(!t_login) {
					t_sign_in.hide();
					html_choose.hide();
					id = response.session.uid;
					
					FB.api('/me', function(response) {
						name = response.name;
						add_user_data();
					});
					
					$('p', loader).text('Teise mängija ootamine');
					loader.fadeIn(500);
					f_sign_out.fadeIn(500);
					
				} else {
					choose();
				}
			} else {
				f_sign_out.hide();
				t_connection();
			}	
		});
	}

	function t_connection() {
		if (t.isConnected()) {
			t_login = true;
			t_sign_in.hide();
			if(!f_login) {
				f_sign_in.hide();
				currentUser = t.currentUser;
				id = currentUser.data('id');
				name = currentUser.data('screen_name');
				html_choose.hide();
				add_user_data();
				console.log(currentUser);
				$('p', loader).text('Teise mängija ootamine');
				loader.fadeIn(500);
				t_sign_out.fadeIn(500);
			} else {
				choose();
			}
		} else {
			t_sign_out.hide();
			loader.hide();
			t_sign_in.fadeIn(500);
			f_sign_in.fadeIn(500);
		}
	}
		
    // LISTEN FOR MESSAGES
    PUBNUB.subscribe({
        channel  : channel,      // CONNECT TO THIS CHANNEL.
        error    : function() {        // LOST CONNECTION (auto reconnects)
            console.log("Connection Lost. Will auto-reconnect when Online.")
        },
        callback : function(message) { // RECEIVED A MESSAGE.
            if(message.a == 0) {
				gamers = message.gamers;
				names = message.names;
				
				if(t_login) {
					$('#twitter_msg').attr('src', 'oauth/twitter_login.php?a=1');
				} else if(f_login) {
					var game_ready = 'Trips-traps-trull mäng: '+names[0]+' vs '+names[1]+'\n\r Jälgi: ' + location.href;
					FB.api('/me/feed', 'post', { message: game_ready }, function(response) {
						console.log('teine');
						console.log(response);
					});
				}
				p1_score = message.p1_score;
				p2_score = message.p2_score;
				if(gamers[0].length < 15) {
					p1_img.attr("src", "http://api.twitter.com/1/users/profile_image/"+names[0]+".json?size=normal");
				} else {
					p1_img.attr("src", "http://graph.facebook.com/"+gamers[0]+"/picture?type=square");
				}
				
				if(gamers[1].length < 15) {
					p2_img.attr("src", "http://api.twitter.com/1/users/profile_image/"+names[1]+".json?size=normal");
				} else {
					p2_img.attr("src", "http://graph.facebook.com/"+gamers[1]+"/picture?type=square");
				}
				
				if(p1_score) {
					p1_total.text(p1_score[3]);
					p1_wins.text(p1_score[0]);
					p1_loses.text(p1_score[1]);
					p1_draws.text(p1_score[2]);
				}
				
				if(p2_score) {
					p2_total.text(p2_score[3]);
					p2_wins.text(p2_score[0]);
					p2_loses.text(p2_score[1]);
					p2_draws.text(p2_score[2]);
				}
				p1_name.text(names[0]);
				p2_name.text(names[1]);
				loading_screen.hide();	
			}
			
			// 'a':1, 'turn':turn, 'positions':xy_pos, 'winner':name, 'click_on':true
			if(message.a == 1) {
				winner = message.winner;
				turn = message.turn;
				xy_pos = message.positions;
				if(name != winner) {
					click_on = message.click_on;
				}
				set_pos();
				
			}
			
			if(message.a == 2) {
				var output = '<li><p class="chat_name">'+message.name+'</p><p>'+message.chat_text+'</p></li>';
				console.log(output);
				chat_line.append(output);
			}
        }, 
		
        connect  : function() {        // CONNECTION ESTABLISHED.
				loader.hide();
				f_connection();
		
				/*PUBNUB.history( {
					channel : channel,
					limit   : 1
				}, function(message) {
					turn = message[0].turn;
					winner = message[0].winner;
					//click_on = message[0].click_on;
					xy_pos = message[0].positions;
					set_pos();
				});*/
			
			
        }
    });
	function send_data() {
	
		PUBNUB.publish({
			channel : channel,
			message : {'a':1, 'turn':turn, 'positions':xy_pos, 'winner':name, 'click_on':true}	
		})
	}
			
	$('li', '#tic_tac_toe').click(function() {
		if(!$(this).hasClass('add_x') && !$(this).hasClass('add_y') && click_on && (name == names[0] || name == names[1])) {
			switch(turn) {
				case 'x':
					$(this).addClass('add_x');
					var index = $(this).index();
					xy_pos[index] = 'x';
					turn = 'y';
					check_win('x');
					click_on = false;
					send_data();	
					break;
				case 'y':
					$(this).addClass('add_y');
					var index = $(this).index();
					xy_pos[index] = 'y';
					turn = 'x';
					check_win('y');
					click_on = false;	
					send_data();	
					break;
			}
			
		}
	});
	
	t_sign_in.click(function() {
		t.signIn();
	});
	
	t_sign_out.click(function() {
		twttr.anywhere.signOut();
		//window.location = "http://ikt.khk.ee/chris.kuusmann/ttt/";
	});
	
	t_g_sign_out.click(function() {
		twttr.anywhere.signOut();
		window.location = "http://ikt.khk.ee/chris.kuusmann/ttt/";
	});
	
	t.bind('authComplete', function() {
		f_connection();
	});
	
	t.bind('signOut', function() {
		t_login = false;
		$.post('functions.php', {a:3, id:id, channel: channel}, function(data) {
			player_data();
		});
		t_connection();
	});
		
	f_sign_out.click(function() {
		FB.logout(function(response) {
		});
	});

	FB.Event.subscribe('auth.login', function(response) {  
		f_login = true;
		f_connection();
	}, {perms: 'publish_stream'});
	
	FB.Event.subscribe('auth.logout', function(response) {
		f_login = false;
		$.post('functions.php', {a:3, id:id, channel: channel}, function(data) {
			player_data();
		});
		f_connection();
	});
	
	f_choose.click(function() {
		twttr.anywhere.signOut();
		f_connection();
	});
		
	t_choose.click(function() {
		FB.logout(function(response) {
		
		});
	});
	
	chat_input.keydown(function(event) {
		if((event.keyCode == 13 || event.charCode == 13)) {
			PUBNUB.publish({
				channel: channel,
				message: {'a':2, 'chat_text':chat_input.val(), 'name':name}
			});
			return false;
		} else if(chat_input > 150) {
			//error kui tekst on liiga pikk
		} else if(chat_input == 1) {
			// error kui tekst on liiga lühike
		} else if(chat_input == 0) {
			//error kui teksti ei sisestatud
		}
	});
})();


});
});
</script>	
</body>
</html>