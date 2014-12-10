<?
if(isset($_POST['logout']))
{
	echo "<script>".
		"sessionStorage.clear();".
		"</script>";
	if(isset($_SESSION['Account'])){
		unset($_SESSION['Account']);
	}
	unset($_POST['logout']);
}
?>
<form class='Logout' id='logoutform' method="post" width='100px'>
	<table id="logout">
		<tr>
			<td> <input type="submit" name="logout" value="Log-out">
			</td>
		</tr>

	</table>
</form>