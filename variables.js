var gaugeOEE = new RadialGauge({
	renderTo: 'gauge-oee',
	title: "OEE",
	width: 500,
	height: 500,
	minValue: 0,
	maxValue: 100,
	exactTicks: true,
//	majorTicks: ['0%','50%','70%','100%'],
	majorTicks: [0, 50, 70, 100],
	minorTicks: 5,
	ticksAngle: 250,
	startAngle: 55,
	strokeTicks: true,
	highlights  : [
		{ from : 0,  to : 50, color : 'rgba(225, 7, 23, 0.75)' },
		{ from : 50,  to : 70, color : 'rgba(225, 165, 0, 0.75)' },
		{ from : 70, to : 100, color : 'rgba(11, 152, 11, 0.85)' }
	],
	highlightsWidth: 15,
	valueInt: 1,
	valueDec: 0,
	colorPlate: "#fff",
	colorMajorTicks: "#222222",
	colorMinorTicks: "#555555",
	colorTitle: "#000",
	colorUnits: "#000",
	colorNumbers: "#333333",
	valueBox: true,
	colorValueText: "#000",
	valueBoxStroke: 0,
	colorValueBoxBackground: "#fff",
	colorValueBoxShadow: false,
	colorValueTextShadow: false,
	colorNeedleShadowUp: false,
	colorNeedleShadowDown: false,
	colorNeedle: "rgba(200, 50, 50, .75)",
	colorNeedleEnd: "rgba(200, 50, 50, .75)",
	borderShadowWidth: 1,
	borders: false,
	needleWidth: 8,
	needleCircleOuter: false,
	needleCircleInner: false,
	animationDuration: 1000,
	animationRule: "dequint",
	fontNumbers: "Verdana",
	fontTitle: "Verdana",
	fontValue: "Verdana",
	fontUnits: "Verdana",
	fontValueStyle: 'italic',
	fontNumbersSize: 18,
	fontNumbersStyle: 'italic',
	fontNumbersWeight: 'bold',
	fontTitleSize: 75,
	fontUnitsSize: 50,
	fontValueSize: 70,
	animatedValue: true,
	units: "%"
});

var gaugeQuality = new RadialGauge({
	renderTo: 'gauge-quality',
	title: "Quality",
	width: 230,
	height: 230,
	minValue: 0,
	maxValue: 100,
	exactTicks: true,
	majorTicks: [0, 50, 70, 100],
	minorTicks: 5,
	ticksAngle: 250,
	startAngle: 55,
	strokeTicks: true,
	highlights  : [
		{ from : 0,  to : 50, color : 'rgba(225, 7, 23, 0.75)' },
		{ from : 50,  to : 70, color : 'rgba(225, 165, 0, 0.75)' },
		{ from : 70, to : 100, color : 'rgba(11, 152, 11, 0.85)' }
	],
	highlightsWidth: 15,
	valueInt: 1,
	valueDec: 0,
	colorPlate: "#fff",
	colorMajorTicks: "#222222",
	colorMinorTicks: "#222222",
	colorTitle: "#000",
	colorUnits: "#000",
	colorNumbers: "#333333",
	valueBox: true,
	colorValueText: "#000",
	valueBoxStroke: 0,
	colorValueBoxBackground: "#fff",
	colorValueBoxShadow: false,
	colorValueTextShadow: false,
	colorNeedleShadowUp: false,
	colorNeedleShadowDown: false,
	colorNeedle: "rgba(200, 50, 50, .75)",
	colorNeedleEnd: "rgba(200, 50, 50, .75)",
	borderShadowWidth: 1,
	borders: false,
	needleWidth: 8,
	needleCircleOuter: false,
	needleCircleInner: false,
	animationDuration: 1000,
	animationRule: "dequint",
	fontNumbers: "Verdana",
	fontTitle: "Verdana",
	fontValue: "Verdana",
	fontValueStyle: 'italic',
	fontNumbersSize: 18,
	fontNumbersStyle: 'italic',
	fontNumbersWeight: 'bold',
	fontTitleSize: 55,
	fontUnitsSize: 40,
	fontValueSize: 60,
	animatedValue: true,
	units: "%"
});

var gaugePerformance = new RadialGauge({
	renderTo: 'gauge-performance',
	title: "Performance",
	width: 230,
	height: 230,
	minValue: 0,
	maxValue: 100,
	exactTicks: true,
	majorTicks: [0, 50, 70, 100],
	minorTicks: 5,
	ticksAngle: 250,
	startAngle: 55,
	strokeTicks: true,
	highlights  : [
		{ from : 0,  to : 50, color : 'rgba(225, 7, 23, 0.75)' },
		{ from : 50,  to : 70, color : 'rgba(225, 165, 0, 0.75)' },
		{ from : 70, to : 100, color : 'rgba(11, 152, 11, 0.85)' }
	],
	highlightsWidth: 15,
	valueInt: 1,
	valueDec: 0,
	colorPlate: "#fff",
	colorMajorTicks: "#222222",
	colorMinorTicks: "#222222",
	colorTitle: "#000",
	colorUnits: "#000",
	colorNumbers: "#333333",
	valueBox: true,
	colorValueText: "#000",
	valueBoxStroke: 0,
	colorValueBoxBackground: "#fff",
	colorValueBoxShadow: false,
	colorValueTextShadow: false,
	colorNeedleShadowUp: false,
	colorNeedleShadowDown: false,
	colorNeedle: "rgba(200, 50, 50, .75)",
	colorNeedleEnd: "rgba(200, 50, 50, .75)",
	borderShadowWidth: 1,
	borders: false,
	needleWidth: 8,
	needleCircleOuter: false,
	needleCircleInner: false,
	animationDuration: 1000,
	animationRule: "dequint",
	fontNumbers: "Verdana",
	fontTitle: "Verdana",
	fontValue: "Verdana",
	fontValueStyle: 'italic',
	fontNumbersSize: 18,
	fontNumbersStyle: 'italic',
	fontNumbersWeight: 'bold',
	fontTitleSize: 55,
	fontUnitsSize: 40,
	fontValueSize: 60,
	animatedValue: true,
	units: "%"
});

var gaugeAvailability = new RadialGauge({
	renderTo: 'gauge-availability',
	title: "Availability",
	width: 230,
	height: 230,
	minValue: 0,
	maxValue: 100,
	exactTicks: true,
	majorTicks: [0, 50, 70, 100],
	minorTicks: 5,
	ticksAngle: 250,
	startAngle: 55,
	strokeTicks: true,
	highlights  : [
		{ from : 0,  to : 50, color : 'rgba(225, 7, 23, 0.75)' },
		{ from : 50,  to : 70, color : 'rgba(225, 165, 0, 0.75)' },
		{ from : 70, to : 100, color : 'rgba(11, 152, 11, 0.85)' }
	],
	highlightsWidth: 15,
	valueInt: 1,
	valueDec: 0,
	colorPlate: "#fff",
	colorMajorTicks: "#222222",
	colorMinorTicks: "#222222",
	colorTitle: "#000",
	colorUnits: "#000",
	colorNumbers: "#333333",
	valueBox: true,
	colorValueText: "#000",
	valueBoxStroke: 0,
	colorValueBoxBackground: "#fff",
	colorValueBoxShadow: false,
	colorValueTextShadow: false,
	colorNeedleShadowUp: false,
	colorNeedleShadowDown: false,
	colorNeedle: "rgba(200, 50, 50, .75)",
	colorNeedleEnd: "rgba(200, 50, 50, .75)",
	borderShadowWidth: 1,
	borders: false,
	needleWidth: 8,
	needleCircleOuter: false,
	needleCircleInner: false,
	animationDuration: 1000,
	animationRule: "dequint",
	fontNumbers: "Verdana",
	fontTitle: "Verdana",
	fontValue: "Verdana",
	fontValueStyle: 'italic',
	fontNumbersSize: 18,
	fontNumbersStyle: 'italic',
	fontNumbersWeight: 'bold',
	fontTitleSize: 55,
	fontUnitsSize: 40,
	fontValueSize: 60,
	animatedValue: true,
	units: "%"
});