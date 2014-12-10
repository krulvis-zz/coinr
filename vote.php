<?
mysql_connect("localhost", "joep123", "joepmans");
mysql_select_db("gamu_joep");
if(isset($_POST['type'])){
	if($_POST['type'] == 'up'){
		$field = $_POST['vote'];
		$id = $_POST['user'];
		$time = time();
		$currid = mysql_fetch_object(mysql_query("select id from currencies where short = '$field';"))->id;
		$lastvote = mysql_fetch_object(mysql_query("select lastvote from accounts where id = '$id';"))->lastvote;
		if($lastvote == null || $lastvote < time()){
			$updatecurr = "UPDATE currencies set up = up + 1 WHERE id = $currid;";
			$addtime = $time + 3600;
			$name = mysql_fetch_object(mysql_query("select name from currencies where id = '$currid';"))->name;
			$updateaccount = "UPDATE accounts set lastvote = ".$addtime." WHERE id = $id;";
			$newvote = "INSERT INTO votes VALUES('$id','$currid', '1', '0');";
			$editvote = "update votes set `up` = `up` + 1 where userid= '$id' AND currid = '$currid';";
			$checkvote = mysql_query("select * from votes where userid = '$id' AND currid = '$currid';");
			mysql_query($updatecurr);
			mysql_query($updateaccount);
			if (mysql_num_rows($checkvote) > 0){
				mysql_query($editvote);
			}else{
				mysql_query($newvote);
			}
			echo "You have updated: ".$name." as user ID: ".$id;
		}else{
			echo "You have already the voted in the past hour.";
		}
	}
	if($_POST['type'] == 'down'){
		$field = $_POST['vote'];
		$id = $_POST['user'];
		$time = time();
		$currid = mysql_fetch_object(mysql_query("select id from currencies where short = '$field';"))->id;
		$lastvote = mysql_fetch_object(mysql_query("select lastvote from accounts where id = '$id';"))->lastvote;
		if($lastvote == null || $lastvote < time()){
			$addtime = $time + 3600;
			$updatecurr = "UPDATE currencies set down = down + 1 WHERE id = $currid;";
			$newvote = "INSERT INTO votes VALUES('$id','$currid', '0', '1');";
			$updateaccount = "UPDATE accounts set lastvote = ".$addtime." WHERE id = $id;";
			$name = mysql_fetch_object(mysql_query("select name from currencies where id = '$currid';"))->name;
			$editvote = "update votes set `down` = `down` + 1 where userid= '$id' AND currid = '$currid';";
			$checkvote = mysql_query("select * from votes where userid = '$id' AND currid = '$currid';");
			mysql_query($updatecurr);
			mysql_query($updateaccount);
			if (mysql_num_rows($checkvote) > 0){
				mysql_query($editvote);
			}else{
				mysql_query($newvote);
			}
			echo "You have updated: ".$name." as user ID: ".$id;
		}else{
			echo "You have already the voted in the past hour.";
		}
	}
}



?>