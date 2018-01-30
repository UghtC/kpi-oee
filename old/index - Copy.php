<?php
	session_start();
	$strAMfile = "";
	$strPMfile = "";
	require_once("includes/variables.php");
?>

<!DOCTYPE html>
<html >
<title>KPI</title>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
<meta http-equiv="Pragma" content="no-cache"/>
<meta http-equiv="Expires" content="0"/>
<META HTTP-EQUIV="REFRESH" CONTENT="86400;">
<link rel="stylesheet" href="kpi.css">
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['gauge']}]}"></script>
	<script src='includes/functionsnew.js'></script>
	<script>
	
	$(document).ready(function(){
		arrData = [];
		intTopLine = 0;
		init();
		$.getJSON("rest.php?getdata", function(response) {
			for(var x in response){
			  arrData.push(response[x]);
			  console.log(response[x]);
			}
			
			populateStaticValuesnew(arrData);

			topline = 0;
			linenumber = 0;
			$.get("rest.php?gettopline", function(response) {
				topline=response;
			});	
			
			// Refresh the chart
			refreshTab(1, 0, arrData, topline);
			
			// Check for updates on the csv file
			setInterval(function(){
				$.getJSON("rest.php?checkforupdate", function(response) {
					if(response!='noupdate') {
						arrData = [];
						request.post("rest.php?getdata", {handleAs: "JSON"}).then(function(response){
							var parsed = JSON.parse(response);							
							for(var x in parsed){
							  arrData.push(parsed[x]);
							}
							populateStaticValuesnew(arrData);
						});
					}
				});					
			}, 5000);						
			
			// Timer that cycles through the line data
			setInterval(function(){
				// If line number = then reset it to 0
				if(linenumber == 8) {
					linenumber=0;
				}
				// Refresh the chart
				refreshTab(1, linenumber,  arrData, topline);
				linenumber ++;
			}, 5000);
		});
	});	
	</script>
	<style>

	</style>	
	</head>	
		<body class="claro">
			<!-- Line 1 Div -->
			<div id="div1" class="lineclass" style="background-color: rgb(39,232,51); z-index: 1">
					<div id="marker1"></div>
					<div id="chart_div" style="width: 400px; height: 120px;"></div>
					<div id="div1_stardiv1" class="stardiv1"><img src= "images/star.gif" /></div>
					<div id="div1_stardiv2" class="stardiv2"><img src= "images/star.gif" /></div>
					<div id="div1_container">
					<div id="div1_lineheader" class="lineheader"></div>
					<div id="div1_availabilty" data-title="Gauge"></div>
					<div id="div1_performance"></div>
					<div id="div1_quality"></div>
					<div id="div1_losttime" style="margin-top: 25px; margin-left: 40px;">%</div></td></tr>
					<div id="div1_rejects" style="margin-top: 25px; margin-left: 40px;">%</div></td></tr>
					<div class="linepercentagesright">
						<table>
							<tr><td id="c1" class="infocell" style="height: 80px; background-color: #00ffff;">1</td><td class="infocell2"><div id="div1_line1">L1</div></td></tr>
							<tr><td id="c2" class="infocell" style="height: 80px; background-color: #00ffff;">2</td><td class="infocell2"><div id="div1_line2"></div></td></tr>
							<tr><td id="c3" class="infocell" style="height: 80px; background-color: #00ffff;">3</td><td class="infocell2"><div id="div1_line3"></div></td></tr>
							<tr><td id="c4" class="infocell" style="height: 80px; background-color: #00ffff;">4</td><td class="infocell2"><div id="div1_line4"></div></td></tr>
							<tr><td id="c5" class="infocell" style="height: 80px; background-color: #00ffff;">5</td><td class="infocell2"><div id="div1_line5"></div></td></tr>
							<tr><td id="c6" class="infocell" style="height: 80px; background-color: #00ffff;">6</td><td class="infocell2"><div id="div1_line6"></div></td></tr>
							<tr><td id="c7" class="infocell" style="height: 80px; background-color: #00ffff;">7</td><td class="infocell2"><div id="div1_line7"></div></td></tr>
							<tr><td id="c8" class="infocell" style="height: 80px; background-color: #00ffff;">8</td><td class="infocell2"><div id="div1_line8"></div></td></tr>
						</table>
					</div>
			</div>			

		</body>
	<head>
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
	<META HTTP-EQUIV="Expires" CONTENT="-1">
	</head>
</html>