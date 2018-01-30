// The positions of the line marker that moves down when each line is shown
markerpositions = [];
markerpositions[1] = 11;
markerpositions[2] = 98;
markerpositions[3] = 183;
markerpositions[4] = 270;
markerpositions[5] = 355;
markerpositions[6] = 442;
markerpositions[7] = 527;
markerpositions[8] = 612;

// The screen colour values
rgbvalues = [];
rgbvalues['red'] = 'rgb(249,21,47)';
rgbvalues['amber'] = 'rgb(255,191,0)';
rgbvalues['green'] = 'rgb(39,232,51)';

// Populate the line percentages boxes
function populateStaticValuesnew(data) {
	console.log("popvalues");
	$("#div1_line1").text(data[0].total + "%");
	$("#div1_line2").text(data[1].total + "%");
	$("#div1_line3").text(data[2].total + "%");
	$("#div1_line4").text(data[3].total + "%");
	$("#div1_line5").text(data[4].total + "%");
	$("#div1_line6").text(data[5].total + "%");
	$("#div1_line7").text(data[6].total + "%");
	$("#div1_line8").text(data[7].total + "%");
}

// Initialise the charts
function init() {
	chart = new google.visualization.Gauge(document.getElementById('chart_div'));
	availabilitychart = new google.visualization.Gauge(document.getElementById('div1_availabilty'));
	performancechart = new google.visualization.Gauge(document.getElementById('div1_performance'));
	qualitychart = new google.visualization.Gauge(document.getElementById('div1_quality'));
}
//====================================================================================
// Draw each of the charts on the screen
function drawChart(value) {
			
	var data = google.visualization.arrayToDataTable([
		['Label', 'Value'],
		['OEE', parseInt(value)]
	]);

	var options = {
	  width: 450, height: 450,
	  redFrom: 0, redTo: 50,
	  yellowFrom:50, yellowTo: 70,
	  greenFrom: 70, greenTo: 100,
	  minorTicks: 5
	};       
	chart.draw(data, options);
}

function drawAvailabiltyChart(value) {
	var data = google.visualization.arrayToDataTable([
	  ['Label', 'Value'],
	  ['Availability', parseInt(value)]
	]);

	var options = {
	  width: 250, height: 250,
	  redFrom: 0, redTo: 50,
	  yellowFrom:50, yellowTo: 70,
	  greenFrom: 70, greenTo: 100,
	  minorTicks: 5
	};       
	availabilitychart.draw(data, options);
}

function drawPerformanceChart(value) {
	console.log("Performance");
	var data = google.visualization.arrayToDataTable([
	  ['Label', 'Value'],
	  ['Performance', parseInt(value)]
	]);

	var options = {
	  width: 250, height: 250,
	  redFrom: 0, redTo: 50,
	  yellowFrom:50, yellowTo: 70,
	  greenFrom: 70, greenTo: 100,
	  minorTicks: 5
	};       
	performancechart.draw(data, options);
}

function drawQualityChart(value) {
	console.log("Performance");
	var data = google.visualization.arrayToDataTable([
	  ['Label', 'Value'],
	  ['Quality', parseInt(value)]
	]);

	var options = {
	  width: 250, height: 250,
	  redFrom: 0, redTo: 50,
	  yellowFrom:50, yellowTo: 70,
	  greenFrom: 70, greenTo: 100,
	  minorTicks: 5
	};       
	qualitychart.draw(data, options);
}
//====================================================================================

// Function to refresh the screen
function refreshTab(divnumber, linenumber, data, topline) {				
	if(divnumber==1) {
		// Update the marker position to show the current line
		$("#marker1").css("top", markerpositions[data[linenumber].lineindex]);
		
		// Change the colour of the screen
		if(data[linenumber].total < 50)	{
			$("#div1").css("background-color", rgbvalues['red']);
		} else if (data[linenumber].total >=50 && data[linenumber].total < 70) {
			$("#div1").css("background-color", rgbvalues['amber']);						
		} else {
			$("#div1").css("background-color", rgbvalues['green']);					
		}
		
		// Display the current line number at the top of the screen
		$("#div1_lineheader").text(data[linenumber].line);					
		
		// Draw each of the guage charts on the screen
		drawChart(data[linenumber].total);
		drawAvailabiltyChart(data[linenumber].availability);
		drawPerformanceChart(data[linenumber].performance);
		drawQualityChart(data[linenumber].quality);
		
		$('#div1_quality svg text:first').attr('font-size', 20);
		$('#div1_availabilty svg text:first').attr('font-size', 20);
		$('#div1_performance svg text:first').attr('font-size', 20);

		$("#div1_losttime").text("Lost time: " + data[linenumber].losttime);
		$("#div1_rejects").text("Rejects: " + data[linenumber].rejects);

		// Show the stars next to the top performing line
		if(data[linenumber].line==topline){
			$("#div1_stardiv1").css("visibility", "visible");
			$("#div1_stardiv2").css("visibility", "visible");
		}
		else
		{
			$("#div1_stardiv1").css("visibility", "hidden");
			$("#div1_stardiv2").css("visibility", "hidden");
			
		}
	}
}
