<?php
	/* Script to retrieve current market cap from http://coinmarketcap.com/
	 * Data is stored as (valuta-short => current market cap) into $output.
	 */ 
	$usd = array();
	$coin = array();
	$raw_data = file_get_contents('http://coinmarketcap.com/');
	$raw_data = explode("\n", $raw_data);
	foreach ($raw_data as $r){
		if(strrpos($r, "market-cap\" data-usd=\"") != FALSE) {
			$begin = strpos($r, "market-cap\" data-usd=\"") + 22;
			$end = strpos($r, "\" data-btc") - 1;
			if (strpos($r, "no-wrap") == FALSE){
				$val = "$ ?";
			} else {
				$val = "$ " . substr($r, $begin, $end - $begin);
			}
			array_push($usd, $val);
		}
	}
	foreach ($raw_data as $r){
		if(strrpos($r, "<tr id=\"") != FALSE) {
			$begin = strpos($r, "<tr id=\"") + 8;
			$end = strpos($r, "\">");
			array_push($coin, substr($r, $begin, $end - $begin));
		}
	}
	
	// Combined output coin => usd 
	$output = array_combine($coin, $usd);
	
?>
	<script>
   //Get context with jQuery - using jQuery's .get() method.
   var ctx = $("#myChart").get(0).getContext("2d");
    var btc = new Object();
		btc = {
					fillColor : "rgba(55, 171, 200, 1)",
					strokeColor : document.getElementById('color'+0).value,
					pointColor : "rgba(55, 171, 200, 1)",
					data : [<?getArray("btc_30") ?>],
					title : "Bitcoin",
					votes : "<? print $output['btc'] ?>"
				};
	var xrp = new Object();
		xrp = {
					fillColor : "rgba(55, 171, 200, 1)",
					strokeColor : document.getElementById('color'+1).value,
					pointColor : "rgba(55, 171, 200, 1)",
					data : [<?getArray("xrp_30") ?>],
					title : "Ripples",
					votes : "<? print $output['xrp'] ?>"
				};
	var ltc = new Object();
		ltc = {
					fillColor : "rgba(55, 171, 200, 1)",
					strokeColor : document.getElementById('color'+2).value,
					pointColor : "rgba(55, 171, 200, 1)",
					data : [<?getArray("ltc_30") ?>],
					title : "Litecoin",
					votes : "<? print $output['ltc'] ?>"
				};
	var ppc = new Object();
		ppc = {
					fillColor : "rgba(55, 171, 200, 1)",
					strokeColor : document.getElementById('color'+3).value,
					pointColor : "rgba(55, 171, 200, 1)",
					data : [<?getArray("ppc_30") ?>],
					title : "Peercoin",
					votes : "<? print $output['ppc'] ?>"
				};
	var nmc = new Object();
		nmc = {
					fillColor : "rgba(55, 171, 200, 1)",
					strokeColor : document.getElementById('color'+4).value,
					pointColor : "rgba(55, 171, 200, 1)",
					data : [<? getArray("nmc_30"); ?>],
					title : "Namecoin",
					votes : "<? print $output['nmc'] ?>"
				};
	var msc = new Object();
		msc = {
					fillColor : "rgba(55, 171, 200, 1)",
					strokeColor : document.getElementById('color'+5).value,
					pointColor : "rgba(55, 171, 200, 1)",
					data : [<? getArray("msc_30"); ?>],
					title : "Msstercoin",
					votes : "<? print $output['msc'] ?>"
				};
	var nxt = new Object();
		nxt = {
					fillColor : "rgba(55, 171, 200, 1)",
					strokeColor : document.getElementById('color'+6).value,
					pointColor : "rgba(55, 171, 200, 1)",
					data : [<? getArray("nxt_30"); ?>],
					title : "NXT",
					votes : "<? print $output['nxt'] ?>"
				};
	var qrk = new Object();
		qrk = {
					fillColor : "rgba(55, 171, 200, 1)",
					strokeColor : document.getElementById('color'+7).value,
					pointColor : "rgba(55, 171, 200, 1)",
					data : [<? getArray("qrk_30"); ?>],
					title : "Quark",
					votes : "<? print $output['qrk'] ?>"
				};
	var pts = new Object();
		pts = {
					fillColor : "rgba(55, 171, 200, 1)",
					strokeColor : document.getElementById('color'+8).value,
					pointColor : "rgba(55, 171, 200, 1)",
					data : [<? getArray("pts_30"); ?>],
					title : "ProtoShares",
					votes : "<? print $output['pts'] ?>"
				};
	var mec = new Object();
		mec = {
					fillColor : "rgba(55, 171, 200, 1)",
					strokeColor : document.getElementById('color'+9).value,
					pointColor : "rgba(55, 171, 200, 1)",
					data : [<? getArray("mec_30"); ?>],
					title : "Megacoin",
					votes : "<? print $output['mec'] ?>"
				};
	var wdc = new Object();
		wdc = {
					fillColor : "rgba(55, 171, 200, 1)",
					strokeColor : document.getElementById('color'+10).value,
					pointColor : "rgba(55, 171, 200, 1)",
					data : [<? getArray("wdc_30"); ?>],
					title : "Worldcoin",
					votes : "<? print $output['wdc'] ?>"
				};
	var valueArray = [btc,xrp,ltc,ppc,nmc,msc,nxt,qrk,pts,mec,wdc];
	
	
	var label = new Array();
		label = [
				<?
			   // Labels
			   $last = 0;
			   $times = getTimes("btc_30");
			   for($i = 0; $i<sizeof($times); $i++){
					if($i>$last){
						$last = $last+100;
						print "\"" . gmdate("Y-m-d", $times[$i]/1000) ."\"";
					}else{
						print "\""."\"";
					}
					if ($i != sizeof($times)-1){print ", ";}
			   }
			   ?>
			];
	var dataset = new Array();
	 dataset = [
				btc
			  ];
			
	
	var	data = {
		labels : label,
		datasets : dataset
	};
	
	
	
	function createData(){
		var datasets = new Array();
		document.getElementById("legend").innerHTML = "";
		var boxes = document.getElementsByClassName('box');
		var value = new Object();
		for(var i = 0; i<boxes.length; i++){
			if(boxes[i].checked == true){
            
            // Js-color Fix
			   var scolor = document.getElementById('color'+i).value
				if (scolor.indexOf("#") == -1){
				   scolor = "#" + scolor;
				}
				
				valueArray[i].strokeColor = scolor;
				
				datasets.push(valueArray[i]);
			}
		}
			
		
		var	data = {
			labels : label,
			datasets : datasets
		};
		legend(document.getElementById("legend"), data);
		document.getElementById('graphtitle').innerHTML = 'Crypto Currencies - Market Cap';
		new Chart(ctx).Line(data,options);
	}


   // Chartjs options.
   var options = {
				
	   //Boolean - If we show the scale above the chart data			
	   scaleOverlay : false,
	
	   //Boolean - If we want to override with a hard coded scale
	   scaleOverride : false,
	
	   //** Required if scaleOverride is true **
	   //Number - The number of steps in a hard coded scale
	   scaleSteps : null,
	   //Number - The value jump in the hard coded scale
	   scaleStepWidth : null,
	   //Number - The scale starting value
	   scaleStartValue : null,

	   //String - Colour of the scale line	
	   scaleLineColor : "rgba(0,0,0,.1)",
	
	   //Number - Pixel width of the scale line	
	   scaleLineWidth : 1,

	   //Boolean - Whether to show labels on the scale	
	   scaleShowLabels : true,
	
	   //Interpolated JS string - can access value
	   scaleLabel : "<%=value%>",
	
	   //String - Scale label font declaration for the scale label
	   scaleFontFamily : "'Arial'",
	
	   //Number - Scale label font size in pixels	
	   scaleFontSize : 14,
	
	   //String - Scale label font weight style	
	   scaleFontStyle : "bold",
	
	   //String - Scale label font colour	
	   scaleFontColor : "#666",	
	
	   ///Boolean - Whether grid lines are shown across the chart
	   scaleShowGridLines : true,
	
	   //String - Colour of the grid lines
	   scaleGridLineColor : "rgba(0,0,0,.05)",
	
	   //Number - Width of the grid lines
	   scaleGridLineWidth : 1,	
	
	   //Boolean - Whether the line is curved between points
	   bezierCurve : false,
	
	   //Boolean - Whether to show a dot for each point
	   pointDot : false,
	
	   //Number - Radius of each point dot in pixels
	   pointDotRadius : 3,
	
	   //Number - Pixel width of point dot stroke
	   pointDotStrokeWidth : 1,
	
	   //Boolean - Whether to show a stroke for datasets
	   datasetStroke : true,
	
	   //Number - Pixel width of dataset stroke
	   datasetStrokeWidth : 3,
	
	   //Boolean - Whether to fill the dataset with a colour
	   datasetFill : false,
	
	   //Boolean - Whether to animate the chart
	   animation : true,

	   //Number - Number of animation steps
	   animationSteps : 10,
	
	   //String - Animation easing effect
	   animationEasing : "easeOutQuart",

	   //Function - Fires when the animation is complete
	   onAnimationComplete : null
	
   }
   legend(document.getElementById("legend"), data);
   document.getElementById('graphtitle').innerHTML = 'Crypto Currencies : Market Cap';
   new Chart(ctx).Line(data,options);
   
   // Create chart.
	//for(int i = 0; i<data.length;i++){
		//new Chart(ctx).Line(data,options);
	//}
   </script>
