<?php 

	if(isSet($_POST['loginform']))
	{ 
		mysql_connect("localhost", "joep123", "joepmans");
		mysql_select_db("gamu_joep");
		if($_POST['login'] == ""){
			echo "<script language='javascript'>window.alert('Enter a username please.'); window.location = window.location;</script>";
		}
		else
		{
			if($_POST['password'] == ""){
				echo "<script language='javascript'>window.alert('Fill in an password.'); window.location = window.location;</script>";			
			}
			else
			{
				$query = mysql_query("Select * from accounts where username ='" . $_POST['login'] . "' and password ='" . $_POST['password'] . "';");
				$aantal = mysql_num_rows($query);
				if($aantal == 1){
					$_SESSION['Account'] = mysql_fetch_object($query);
					$id = $_SESSION['Account']->id;
					$name = $_SESSION['Account']->username;
					echo "<script>".
						"var id = $id;".
						"var name = '$name';".
						"sessionStorage['userid'] = id;".
						"sessionStorage['username'] = name;".
						"id = sessionStorage['userid'];".
						"name = sessionStorage['username'];".
						"</script>";
				}
				else
				{
					echo "<script language='javascript'>window.alert('Account or password not found.'); window.location = window.location;</script>";
				}
			}			
		}
	}
?>
<form id='loginform' class='loginForm' method="post" width='100px'>
	<table id="login">
		<tr>
			<td> <input type="text" name="login" placeholder="Username">
			</td>
		</tr>
		<tr>
			<td> <input type="password" name="password" placeholder="Password">
			</td>
		</tr>
		<tr>
			<td> <input type="submit" name="loginform" value="Login">
			</td>
		</tr>

	</table>
</form>
	
