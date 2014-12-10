
<script>



function createData(){
var pieData = new Array();
document.getElementById("legend").innerHTML = "";
<?
mysql_connect("localhost", "joep123", "joepmans");
mysql_select_db("gamu_joep");
$result = mysql_query("SELECT * FROM currencies ORDER BY id;");
   while($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{	
		echo "var piece = new Object();";
		echo "var color = document.getElementById('color".($row['id']-1)."').value;"; 
		echo "var piece ={ ".
		"value : ".$row['up'].",".
		"color : color,".
		"title : '{$row['name']}',".
		"votes : '{$row['up']}'".
		"};";
		echo "pieData.push(piece);";
	}




?>
document.getElementById('graphtitle').innerHTML = 'Crypto Currencies - Total votes';
legend(document.getElementById("legend"), pieData);
new Chart(ctx).Pie(pieData,defaults);
}

var ctx = $("#myChart").get(0).getContext("2d");
var defaults = {
	//Boolean - Whether we should show a stroke on each segment
	segmentShowStroke : true,
	
	//String - The colour of each segment stroke
	segmentStrokeColor : "#fff",
	
	//Number - The width of each segment stroke
	segmentStrokeWidth : 2,
	
	//Boolean - Whether we should animate the chart	
	animation : true,
	
	//Number - Amount of animation steps
	animationSteps : 100,
	
	//String - Animation easing effect
	animationEasing : "easeOutBounce",
	
	//Boolean - Whether we animate the rotation of the Pie
	animateRotate : true,

	//Boolean - Whether we animate scaling the Pie from the centre
	animateScale : false,
	
	//Function - Will fire on animation completion.
	onAnimationComplete : null
}
createData();
</script>