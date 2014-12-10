<!doctype html>
<html>
   <head>
      <?php require "retrieve.php"; session_start();?>
      <title>COINR</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <link href="css/style.css" type="text/css" rel="stylesheet" />
      <script src="js/modernizr.js"></script>
      <script src="js/jquery-2.0.3.min.js"></script>
      <script src="js/Chart.js"></script>
      <script src="js/Legend.js"></script>
      <script src="js/control.js"></script>
      
      <!-- Load jscolor to support HTML5 color input type for browsers that do not support it --> 
      <script>
         Modernizr.load({
            test:  Modernizr.inputtypes.color,
            nope: 'jscolor/jscolor.js'
         });
      </script>
   </head>
   <body>
      <div class="head">
         <div class="top">
            <span class="coinr">Coinr</span>
            <a id="settings" href="#">Settings</a>
            <a id="register-button" href="#">Log in/Sign up</a>
            <a id="logged-button" href="#">Info</a>
         </div>
         <div class="tabs">
            <?php
            	// Make tab active depending on which page is shown.
               if (isset($_GET['tab'])){
                  if ($_GET['tab'] == "pie"){
                     echo "<a href=\"?tab=graph\">Graph</a>";
                     echo "<a href=\"?tab=pie\" class='active'>Votes</a>";
                  } else {
                     echo "<a href=\"?tab=graph\" class='active'>Graph</a>";
                     echo "<a href=\"?tab=pie\">Votes</a>";
                  }
               } else {
                     echo "<a href=\"?tab=graph\" class='active'>Graph</a>";
                     echo "<a href=\"?tab=pie\">Votes</a>";
               }
               ?>
         </div>
      </div>
      <div class="graph">
      	<!-- Show a loader animation until the document is fully loaded -->
         <img class="loader" src="img/loader.gif"/>
         <script>
         	$(document).ready(function(){
            	$(".loader").hide();
            });
         </script>
         <p id="data"></p>
         
         <!-- Chart-canvas -->
         <canvas id="myChart" width="1000" height="500" class="center"></canvas>
         
         <!-- Graph title -->
         <h3 id='graphtitle'>Graph Title</h3>
         
			<!-- Legend -->         
         <div id="legend"></div>
         
         <!-- Options -->
         <form id="options">
            <input checked id="box-0" class="box" type="checkbox" name="add[]" value="btc_30" onchange="javascript:createData()">
            <label for="box-0">Bitcoin:</label>
            <input id="color0" type="color" name="favcolor" value="#1abc9c" onchange="javascript:createData()"/>
            <a href="#" class="up" id="btc" ></a><a href="#" class="down" id="btc" ></a>
            <br/>
            <input id="box-1" class="box" type="checkbox" name="add[]" value="xrp_30" onchange="javascript:createData()">
            <label for="box-1">Ripples:</label>
            <input id="color1" type="color" name="favcolor" value="#2ecc71" onchange="javascript:createData()"/>
            <a href="#" class="up" id="xrp" ></a><a href="#" class="down" id="xrp" ></a>
            <br/>           
            <input id="box-2" class="box" type="checkbox" name="add[]" value="ltc_30" onchange="javascript:createData()">
            <label for="box-2">Litecoin:</label>
            <input id="color2" type="color" name="favcolor" value="#3498db" onchange="javascript:createData()"/>
            <a href="#" class="up" id="ltc" ></a><a href="#" class="down" id="ltc" ></a>
            <br/>
            <input id="box-3" class="box" type="checkbox" name="add[]" value="ppc_30" onchange="javascript:createData()">
            <label for="box-3">Peercoin:</label>
            <input id="color3" type="color" name="favcolor" value="#9b59b6" onchange="javascript:createData()"/>
            <a href="#" class="up" id="ppc" ></a><a href="#" class="down" id="ppc" ></a>
            <br/>
            <input id="box-4" class="box" type="checkbox" name="add[]" value="btc_30" onchange="javascript:createData()">
            <label for="box-4">Namecoin:</label>
            <input id="color4" type="color" name="favcolor" value="#34495e" onchange="javascript:createData()"/>
            <a href="#" class="up" id="nmc" ></a><a href="#" class="down" id="nmc" ></a>
            <br/>
            <input id="box-5" class="box" type="checkbox" name="add[]" value="btc_30" onchange="javascript:createData()">
            <label for="box-5">Mastercoin:</label>
            <input id="color5" type="color" name="favcolor" value="#f1c40f" onchange="javascript:createData()"/>
            <a href="#" class="up" id="msc" ></a><a href="#" class="down" id="msc" ></a>
            <br/>
            <input id="box-6" class="box" type="checkbox" name="add[]" value="btc_30" onchange="javascript:createData()">
            <label for="box-6">NXT:</label>
            <input id="color6" type="color" name="favcolor" value="#e67e22" onchange="javascript:createData()"/>
            <a href="#" class="up" id="nxt" ></a><a href="#" class="down" id="nxt" ></a>
            <br/>
            <input id="box-7" class="box" type="checkbox" name="add[]" value="btc_30" onchange="javascript:createData()">
            <label for="box-7">Quark:</label>
            <input id="color7" type="color" name="favcolor" value="#e74c3c" onchange="javascript:createData()"/>
            <a href="#" class="up" id="qrk" ></a><a href="#" class="down" id="qrk" ></a>
            <br/>           
            <input id="box-8" class="box" type="checkbox" name="add[]" value="btc_30" onchange="javascript:createData()">
            <label for="box-8">ProtoShares:</label>
            <input id="color8" type="color" name="favcolor" value="#61210B" onchange="javascript:createData()"/>
            <a href="#" class="up" id="pts" ></a><a href="#" class="down" id="pts" ></a>
            <br/>
            <input id="box-9" class="box" type="checkbox" name="add[]" value="btc_30" onchange="javascript:createData()">
            <label for="box-9">Megacoin:</label>
            <input id="color9" type="color" name="favcolor" value="#95a5a6" onchange="javascript:createData()"/>
            <a href="#" class="up" id="mec" ></a><a href="#" class="down" id="mec" ></a>
            <br/>           
            <input id="box-10" class="box" type="checkbox" name="add[]" value="btc_30" onchange="javascript:createData()">
            <label for="box-10">Worldcoin:</label>
            <input id="color10" type="color" name="favcolor" value="#af66cf" onchange="javascript:createData()"/>
            <a href="#" class="up" id="wdc" ></a><a href="#" class="down" id="wdc" ></a>
         </form>
         
         <!-- Login form -->
         <div id="login-form">
            <? require "login.php";require "register.php"; require "logout.php"; ?>
         </div>
         <div id="logged-form">
            <? require "newlogged.php"; ?>
         </div>
      </div>
      
      <?php 
			// Hide checkboxes if the pie chart is shown.      	
      	
         if (isset($_GET['tab'])){
            $tab = $_GET['tab'];
         } else {
            $tab = "graph";
         }
         
         if ($tab == 'pie'){
            require "pie.php";
            echo "<style>label:before{display:none;} label{cursor:default; padding-left:0px}</style>";
            echo "<script>$(document).ready(function(){\$('#options input[type=checkbox]').attr('type', 'hidden');});</script>";
         } else {
            require "graph.php";
         }
         require "vote.php"; 
         
         ?>
      <!-- Fixes hidden up/down buttons bug -->
      <script>$(".up").attr("style", "display:inline-block;"); $(".down").attr("style", "display:inline-block;");</script>
   </body>
</html>