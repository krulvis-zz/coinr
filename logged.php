<?
if(isset($_SESSION['Account'])){
	$user = $_SESSION['Account']->username;
	$id = $_SESSION['Account']->id;
	echo"<script>$('.up').show();$('.down').show();$('#logged-button').show();$('#logged-button').text('$user');$('#register-button').text('Log out');</script>";
   echo "<td>Name: ".$user." : ".$id."</td>";
   $result = mysql_query("SELECT currencies.name, votes.up, votes.down FROM votes INNER JOIN currencies ON currencies.id = votes.currid where votes.userid = '$id' ORDER BY votes.currid;");
   echo"<table>";
   while($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{	
		echo "<tr><td>{$row['name']}:</td><td> UP: {$row['up']}</td><td> DOWN: {$row['down']}</td></tr>";
	}
	echo"</table>";
} else {
	echo"<script>$('.up').hide();$('.down').hide();$('#logged-button').hide();$('#register-button').show();</script>";
   echo "You are currently not logged in";
}
?>

