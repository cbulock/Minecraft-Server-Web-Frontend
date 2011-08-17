<?php
require_once('config.private');
require_once('includes/JSONAPI.php');
$api = new JSONAPI(API_HOST, API_POST, API_USER, API_PASS, API_SALT);
$playerCount = $api->call('getPlayerCount'); $playerCount = $playerCount['success'];
$playerLimit = $api->call('getPlayerLimit'); $playerLimit = $playerLimit['success'];
$players = $api->call('getPlayers');
?>
<html>
<title>mc.bulock.com Minecraft Server</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="main.js"></script>
<link rel='stylesheet' type='text/css' href='main.css' />
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/themes/ui-lightness/jquery-ui.css" />
<h1>mc.bulock.com Minecraft Server</h1>

<div id="tabs"> 
 <ul> 
  <li><a href="#info">Info</a></li> 
  <li><a href="#rtmap">Realtime Map</a></li>
  <li><a href="#ovmap">Detailed Map</a></li>
 </ul> 
 <div id="info">
  Current Online Players: (<?php echo $playerCount .'/'.$playerLimit ?>)

  <?php
  foreach ($players['success'] as $player) {
   echo '<p>';
   echo $player['name'];
   if ($player['sleeping']) echo " [sleeping]";
   echo '</p>';
  }
  ?>
 </div>
 <div id='rtmap'>
  <iframe src="http://mc.bulock.com:8123"></iframe>
 </div>
 <div id='ovmap'>
  <iframe src="map"></iframe>
 </div>
</div>
</html>
