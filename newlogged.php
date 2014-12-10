<script>
   if(typeof sessionStorage['userid'] !== 'undefined'){
   var user = sessionStorage['username'];
		$('.up').show();
		$('.down').show();
		$('#logged-button').show();
		$('#logged-button').text(user);
		$('#register-button').text('Log out');
	}
	else{
		$('.up').hide();
		$('.down').hide();
		$('#logged-button').hide();
		$('#register-button').show();
	}
 </script>
 <?
 if(isset($_SESSION['Account'])){
	mysql_connect("localhost", "joep123", "joepmans");
	mysql_select_db("gamu_joep");
	$user = $_SESSION['Account']->username;
	$id = $_SESSION['Account']->id;
   echo "<td>Name: ".$user." : ".$id."</td>";
   $result = mysql_query("SELECT currencies.name, votes.up, votes.down FROM votes INNER JOIN currencies ON currencies.id = votes.currid where votes.userid = '$id' ORDER BY votes.currid;");
   echo"<table>";
   while($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{	
		echo "<tr><td>{$row['name']}:</td><td> UP: {$row['up']}</td><td> DOWN: {$row['down']}</td></tr>";
	}
	echo"</table>";
}
 ?>