<?
if(isSet($_POST['registerform'])){
		mysql_connect("localhost", "joep123", "joepmans");
		mysql_select_db("gamu_joep");
		if($_POST['name'] == "")
		{
			echo "<p>Enter a name username please</p>";
		}
		else
		{
			if($_POST['password'] == "")
			{
				echo "<p>Enter a password please</p>";			
			}
			else
			{
				if($_POST['password'] != $_POST['password2'])
				{
					echo "<p>The passwords do not match.</p>";			
				}
					else
					{
						$squery = mysql_query("select * from `accounts` where username ='" . $_POST['name'] . "';");
						if (mysql_num_rows($squery) > 0)
						{
							echo "<p>This username is already in use.</p>";
						}
						else
						{
							
							$input = "INSERT INTO `accounts` (`id`, `username`, `password`) VALUES (NULL, '" . $_POST['name'] . "', '" . $_POST['password'] . "');";
							mysql_query($input);
							echo "YEAH! Get ready to get rich";	
									
						}
					}					
			}		
		}
	}
	


?>
<form id='registerform' method="post">
	<table id="register">
	<tr>
		<td> <input type="text" name="name" placeholder="Desired username">
		</td>
	<tr>
		<td> <input type="password" name="password" placeholder="Password">
		</td>
	</tr>
	<tr>
		<td> <input type="password" name="password2" placeholder="Confirm password">
		</td>
	</tr>
	<tr>
		<td> <input class="button" type="submit" name="registerform" value="Register">
		</td>
	</tr>
	</table>
</form>
