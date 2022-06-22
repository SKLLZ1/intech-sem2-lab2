<?php
require_once "Football.php";
$football = new Football();
?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LB2</title>
    <script src="localStorage.js">
    </script>
</head>

<form method="get" action="">
League List: <select name="league">
            <?php
            $football->league();
            ?>
    </select>
    <input type="submit" value="Submit" onclick="leagueFunction()">
</form>

<form method="get" action="">
<p>Team List By Team <select name="player">
            <?php
            $football->teams();
            ?>
    </select>
    <input type="submit" value="Submit" onclick="playerFunction()"></p>
</form>
<form method="get" action="">
<p>Game List By Team <select name="team">
            <?php
            $football->teams();
            ?>
    </select>
    <input type="submit" value="Submit" onclick="teamFunction()"></p>
</form>
<div id="res"></div>
<input type="button" value="Show" onclick="show()">
<hr>
<?php
if(isset($_REQUEST["league"])) {
    $football->findLeague($_REQUEST["league"]);
} elseif(isset($_REQUEST["player"])) {
    $football->findPlayers($_REQUEST["player"]);
} elseif(isset($_REQUEST["team"])) {
    $football->findGames($_REQUEST["team"]);
}
?>
</body>

</html>