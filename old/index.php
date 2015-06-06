<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="bigtasty, big, tasty, weg, verdwenen, terug, petitie, mcdonald, mcdonalds, nederland, eten, menu, assortiment, bacon, hamburger, 1955, american, classic, laurens, bruijn"/>
		<meta name="description" content="D&eacute; petitie om de overheerlijke Big Tasty met bacon terug te krijgen op de menukaart van McDonald's Nederland!" />
		<meta name="robots" content="index, follow"/>
		<meta name="revisit-after" content="2 days"/>
		<meta name="author" content="Laurens Bruijn"/>
		<meta name="copyright" content="Laurens Bruijn"/>
		<meta http-equiv="language" content="NL"/>
		<meta property="fb:admins" content="1402261938" />
		<meta name="google" content="notranslate"/>
		<link rel="shortcut icon" href="favicon.ico"/>

		<title>Big Tasty moet terug! - Petitie</title>

		<link rel="stylesheet" href="style.css" type="text/css"/>

		<?php
			if( isset($_SESSION['ERRMSG_NAAM']) && is_array($_SESSION['ERRMSG_NAAM']) && count($_SESSION['ERRMSG_NAAM']) >0 ) {
				foreach($_SESSION['ERRMSG_NAAM'] as $naam) {}
				unset($_SESSION['ERRMSG_NAAM']);
			}
			if( isset($_SESSION['ERRMSG_EMAIL']) && is_array($_SESSION['ERRMSG_EMAIL']) && count($_SESSION['ERRMSG_EMAIL']) >0 ) {
				foreach($_SESSION['ERRMSG_EMAIL'] as $email) {}
				unset($_SESSION['ERRMSG_EMAIL']);
			}

		if($naam!=''){$focus='email';}else{$focus='naam';}
		?>

		<script type="text/javascript">
		var g_fDoFocus = true;
		function setFocus()
		{
			if (g_fDoFocus)
				window.document.petitie.<?php echo $focus;?>.focus();
		}
		</script>
		<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
		  {lang: 'nl'}
		</script>
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-25583341-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
		<script type="text/javascript" src="ajax.js"></script>
	</head>
	<body onload="setFocus()">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) {return;}
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/nl_NL/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<div id="container">
		  <div id="content">
				<div style="text-align: left; float: left; width: 270px; height: 120px; margin-top: 70px;">
					<span class="kop">Huh? Is die dan weg?</span>
					<span class="tekst" style="width: 200px; padding-left: 25px; margin-top: -10px;">Ja! McDonald&rsquo;s Nederland heeft helaas besloten de 						overheerlijke Big Tasty van de menukaart te schrappen.</span>
				</div>

		<div style="text-align: right; float: right; width: 225px; height: 120px; margin-top: 70px;">
		<span class="kop">Waarom?</span>
		<span class="tekst" style="padding-right: 15px; margin-top: -10px;">Onlangs heeft McDonald&rsquo;s de 1955 The American Classic ge&iuml;ntroduceerd welke de Big Tasty met bacon vervangt.</span>
		</div>

		<div style="clear:both;"></div>

		<div style="text-align: left; float: left; width: 225px; height: 190px; margin-left: -5px; margin-top: 87px;">
		<span class="kop">Wat kan ik doen?</span>
		<span class="tekst" style="padding-left: 8px; width: 212px; margin-top: -10px;">Om McDonald&rsquo;s te laten 		weten dat ook jij de Big Tasty terug wilt, kun je hieronder de petitie tekenen.		<br/>
		Stuur deze website naar iedereen door en hopelijk zien we de Big Tasty snel terug!</span>
		</div>

		<div style="text-align: right; float: right; width: 225px; height: 190px; margin-top: 87px;">
		<span class="kop">En nu?</span>
		<span class="tekst" style="padding-right: 15px; margin-top: -10px;">Met deze website willen wij, liefhebbers van de Big Tasty, McDonald&rsquo;s laten weten dat er een grote vraag naar de overheerlijke burger is. We hopen dat McDonald&rsquo;s de burger opnieuw opneemt in haar assortiment.</span>
		</div>

		<div style="clear:both;"></div>

		<div>
		<a href="http://twitter.com/share" class="twitter-share-button" data-url="http://www.bigtastymoetterug.nl" data-count="horizontal" data-via="BigTastyTERUG" data-lang="nl" data-text="Big Tasty met bacon moet terug! #BigTastyTERUG">Tweeten</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
		<div style="margin-top: -35px;" class="fb-like" data-href="http://www.bigtastymoetterug.nl" data-send="false" data-width="450" data-show-faces="true"></div>
		<g:plusone size="medium" href="http://www.bigtastymoetterug.nl"></g:plusone>
		</div>

		  </div>

		<div id="block">
		<div id="block_vak1">



		<?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
				echo '<div id="error">';
				foreach($_SESSION['ERRMSG_ARR'] as $msg) {
					echo '- ',$msg,'<br/>'; 
				}
				echo '</div>';
				unset($_SESSION['ERRMSG_ARR']);
			}



		$send = $_GET['send'];
		$bevestigd = $_GET['bevestigd'];

		if($send==1){echo '

		<div style="background: url(images/succes.png) center left no-repeat; margin: 5px; padding-left: 45px;"><b>Bedankt!</b><br/>
		Je ontvangt nu een mail met een link om <br/>
		je e-mailadres te bevestigen.<span id="terug"><a href="index.php">Terug</a> (<span id="seconds">10</span>)</span></div>
			<script>
			  var seconds = 10;
			  setInterval(
				function(){
				  if (seconds <= 1) {
					window.location = "index.php";
				  }
				  else {
					document.getElementById("seconds").innerHTML = --seconds;
				  }
				},
				1000
			  );
			</script>
		';
		}elseif($bevestigd==1){echo '
		<div style="background: url(images/succes.png) center left no-repeat; margin: 5px; padding-left: 45px;"><b>Bedankt!</b><br/>
		Je e-mailadres is met succes bevestigd!<span id="terug"><a href="index.php">Terug</a> (<span id="seconds">10</span>)</span></div>
			<script type="text/javascript">
			  var seconds = 10;
			  setInterval(
				function(){
				  if (seconds <= 1) {
					window.location = "index.php";
				  }
				  else {
					document.getElementById("seconds").innerHTML = --seconds;
				  }
				},
				1000
			  );
			</script>
		';
		}else{echo '

		<form action="sign.php" method="post" name="petitie" id="petitie">
		<table>

		<tr>
		<td><label for="naam">Naam</label></td>
		<td><input type="text" id="naam" name="naam" value="'.$naam.'" autocomplete="off" tabindex="1"/></td>
		<td rowspan=2><input type="submit" name="submit" class="submit" value="Verstuur" tabindex="3"/></td>
		</tr>
		<tr>
		<td><label for="email">E-mail</label></td>
		<td><input type="text" id="email" name="email" value="'.$email.'" autocomplete="off" tabindex="2"/></td>
		</tr>

		</table>
		</form>

		';}?>

		</div>
		<div id="block_vak2">


		<script type="text/javascript"><!--
		refreshdiv();
		// --></script>
		<div id="counter"></div>

		</div>
		</div>
		<div style="text-align: right; padding-right: 175px;"><font size="1" color="#E8C6C5"><br/>Webdesign en ontwikkeling door <a href="http://www.laurensbruijn.nl" target="_blank" style="color: #D4D0D6;"><b>Laurens Bruijn</b></a></font></div>

		</div>
	</body>
</html>