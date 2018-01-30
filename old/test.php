<?php
/*
array(
	"linenumber"=>$line[1],
	"total"=>$line[12] * 100, 
	"availability"=>$line[9] * 100, 
	"performance"=>$line[10] * 100,
	"quality"=>$line[11] * 100,
	"downtime"=> 0,
	"losttime"=> $line[8] * 100,
	"rejects"=> (int) $line[3],
	"ampm"=> "AM",
	"lineindex"=> $i
*/



	$file = fopen("Chilled_PrePack_AM.csv","r");
		$csv = array_map('str_getcsv', file($file));
		array_walk($csv, function(&$a) use ($csv) {
			$a = array_combine($csv[0], $a);
		});
		array_shift($csv); # remove column header
	fclose($file);
?> 
<html>
  <head>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Availability', <?php echo $csv[9] ?>],
          ['CPU', 55],
          ['Network', 68]
        ]);

        var options = {
          width: 400, height: 120,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);

        setInterval(function() {
          data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 13000);
        setInterval(function() {
          data.setValue(1, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 5000);
        setInterval(function() {
          data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 26000);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 400px; height: 120px;"></div>
  </body>
</html>