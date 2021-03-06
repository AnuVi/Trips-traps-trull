<!DOCTYPE html>
<html lang="et" dir="ltr">
<head>
<meta charset="utf-8">
<title>Trips-traps-trull</title>
<!-- meta tags -->
<meta name="keywords" content="trips-traps-trull, game, tic-tac-toe">
<meta name="description" content="Vana hea trips-traps-trull">
<link rel="canonical" href="index.html">
<link rel="creator" href="about.html">
<!-- stylesheets -->
<link rel="stylesheet" type="text/css" href="gfx/style.css">
<!--javascript-->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript" src="general.js"></script>
</head>
<body>
	<div id="wrap" class="clear">
		<div id="header" class="clear">
			<h1>Trips-traps-trull</h1>
			<button class="own_game" id="start_game" type="button">Alusta oma mängu</button>
			<span id="log_out"><a href="#" title="Logi välja" rel="start">Logi välja</a></span>
		</div><!--#header end-->
		<div id="content" class="clear">
			<div id="loading_screen" class="hidden">
				<div id="login" class="hidden"> 
					<p>Logi sisse:</p>
					<p><a title="Logi sisse Twitteriga"><img alt="Twitter login" src="http://si0.twimg.com/images/dev/buttons/sign-in-with-twitter-d.png"></a> 
					<a title="Logi sisse Facebooki kaudu"><img alt="Facebook login" src="gfx/button-facebook-login.gif"></a></p>
				</div> <!--#login end-->
				<div id="account" class="hidden"> 
					<p>Vali konto:</p>
					<p><a title="Twitter"><img alt="Twitter"  src="gfx/Twitter.png"></a> 
					<a title="Facebook"><img alt="Facebook"  src="gfx/Facebook.png"></a></p>
				</div><!--#account end-->
				<div id="loader" class="hidden">
					<p>Ühendan</p>
					<img src="gfx/loader.gif" alt="loader" alt="profile picture">
				</div><!--#loader end-->
				<ol id="win" class="hidden">
					<li>
						<img src=""  alt="profile picture">
						<p class="name">name gsjfsldkfj slfkjslfkj lfkjsdlf</p>
						
					</li>
					<li id="prize"><img  src="gfx/karikas.png" alt="prize"></li>
					<li>
						<img src="" alt="profile picture">
						<p class="name">name</p>
					</li>
		
				</ol><!--#win end-->
				<div id="game_end" class="hidden">
					<p>
						<a href="#" title="Logi välja">Logi välja</a>
						<button type="button" id="new_game">Mängi uuesti</button>
					</p>
				</div><!--#choose end-->
			</div><!--#loading_screen end-->
			<div id="game_data" class="clear">
				<div id="game">
					<div id="game_holder" class="clear">
						<span id="box">&nbsp;</span>
						<ul id="tic_tac_toe">
  						<li>&nbsp;</li>
  						<li id="top_middle">&nbsp;</li>
  						<li>&nbsp;</li>
  						<li id="left_middle">&nbsp;</li>
  						<li id="middle">&nbsp;</li>
  						<li id="right_middle">&nbsp;</li>
  						<li>&nbsp;</li>
  						<li id="bottom_middle">&nbsp;</li>
  						<li>&nbsp;</li>
						</ul><!--#tic_tac_toer end-->
					</div><!--#game_holder-->
				</div><!--#game_end-->
				<dl id="p1" class="clear">
					<dt class="move"><img alt="arrow" src="gfx/nool.png" ></dt>
					<dd class="role">X</dd>
					<dt class="image"><img src=""  alt="profile picture"></dt>
					<dd class="name">Player1</dd>
					<dt>Mänge:</dt>
					<dd id="p1_total">0</dd>
					<dt>Võite:</dt>
					<dd id="p1_wins">0</dd>
					<dt>Kaotusi:</dt>
					<dd id="p1_loses">0</dd>
					<dt>Viike:</dt>
					<dd id="p1_draws">0</dd>
				</dl>
				<dl id="p2" class="clear">
					<dt class="move"><img alt="arrow" src="gfx/nool.png"></dt>
					<dd class="role">O</dd>
					<dt class="image"><img src="" alt="profile picture"></dt>
					<dd class="name">Player2</dd>
					<dt>Mänge:</dt>
					<dd id="p2_total">0</dd>
					<dt>Võite:</dt>
					<dd id="p2_wins">0</dd>
					<dt id="p2_loses">Kaotusi:</dt>
					<dd>0</dd>
					<dt>Viike:</dt>
					<dd id="p2_draws"> 0</dd>
				</dl> 
				<p id="message">Kutse mängu ning teated mängu algusest ning lõpust saadetakse Sinu Twitteri voogu või Facebooki seinale</p>
			</div><!--#game_data end-->
			<div id="chat">
				<ol id="chat_line">
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
					<li class="last"><p class="chat_name">name</p>
						<p>kui sellest nüüd abi oleks</p></li>
				</ol><!--#chat_line end-->
				<p id="counter">150</p>
				<p id="warning" class="hidden">Seda teksti ei saadeta</p>
				<textarea id="textarea" maxlength="150" placeholder="kriba-kribi-kribu" class="placeholder"></textarea>
				<p id="fans" class="clear">Kaasaelajaid:<span>239487</span></p>
				<button id="send" type="submit" class="clear">Saada</button>
			</div><!--#chat end-->
			<div id="share">
					<p><a href="http://twitter.com/share" class="twitter-share-button" data-count="none" data-via="Tic-tac-toe game">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></p>
					<p><iframe class="like"  src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fikt.khk.ee%2F%7Echris.kuusmann%2Fttt%2Fgame.php&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:65px; height:20px;" allowTransparency="true"></iframe></p>
				</div><!--#share end-->
		</div><!--#content end-->
		<div id="footer">
			<ul id="info">
				<li><a  rel="next" href="" title="Kes? Mis?">Kes? Mis?</a></li>
				<li><a  rel="next" href="" title="Trips-traps-trull Twitteris"><img alt="Twitter logo"  src="gfx/tw.jpeg"></a></li>
				<li><a  rel="next" href="" title="Trips-traps-trull Facebookis"><img alt="Facebook logo"  src="gfx/fb.jpeg"></a></li>
			</ul><!--#info end-->
		</div><!--#footer end-->
	</div><!--#wrap end-->
</body>
</html>