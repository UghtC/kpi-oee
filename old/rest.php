<?php
	session_start();
	
	if(!isset($_SESSION['emailsent'])){
		$_SESSION['emailsent']= '0';
	}
	// Load variables and classes to handle mail sending, database and CSV actions
	require_once("includes/mailclass.php");
	require_once("includes/databaseclass.php");
	require_once("includes/csvclass.php");
	require("includes/variables.php");
	
	
	/*
		This handles the refresh of OEE data from the csv file and is also used by the client to
		get a dataset of the data by using REST calls.
	*/

	$objcsv = new csvclass();
	$objDb = new databaseclass();

	if(isset($_GET['refreshdata'])) {
		refreshLinesArray();
	}

	if(isset($_GET['lastupdate'])) {
		print_r(getLastUpdate("AM"));
	}	
	
	if(isset($_GET['topline'])) {
		$objDb = new databaseclass();
		echo getTopline();		
	}
	
	function getTopline() {
		$objDb = new databaseclass();
		return $objDb->getTopline();
	}	
	
	function getLastUpdate() {
		$objDb = new databaseclass();
		return $objDb->getLastUpdate();
	}	
	
	function setLastUpdate($zone, $updatestamp) {
		$objDb = new databaseclass();
		return $objDb->setLastUpdate($zone, $updatestamp);
	}
	
	// Loads data from the CSV file into the database
	function refreshLinesArray() {
		$strAMfile = "L:\Continuous Improvement\Resolutions\OEE Screens\Chilled_Prepack_AM.csv";
		$strPMfile = "L:\Continuous Improvement\Resolutions\OEE Screens\Chilled_Prepack_PM.csv";
		
		$db = new databaseclass();		
		// Get the data from the CSV file and store in the database
		// Determine which file to use (AM or PM)		
		
		// set_error_handler("warning_handler", E_WARNING);
		set_error_handler(function(){
			if($_SESSION["emailsent"]=='0') {
				$mail = new mailclass();
				$mail->send("OEE Screens Error","Cannot Access the spreadsheet");
				$_SESSION["emailsent"] = '1';
			}
			EXIT();			
		}, E_WARNING);
		
		$file = '';
		$time = date('H');
		If(($time>=6) && ($time<14)) {
			// PM Data
			$file = fopen($strAMfile, 'r');			
		}
		else
		{
			// AM Data
			$file = fopen($strPMfile, 'r');			
		}

		// We have data so purge the database table......
		$db->purgeTable();
		for($i=0;$i<9;$i++) {
			// ignore the first line which is the header
			$line = fgetcsv($file);
				if($i!=0) {
				$db->insertRow(
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
						)							
					);
				}
			}
	}

	if(isset($_GET['checkforupdate']))  {
			$strAMfile = "L:\Continuous Improvement\Resolutions\OEE Screens\Chilled_Prepack_AM.csv";
			$strPMfile = "L:\Continuous Improvement\Resolutions\OEE Screens\Chilled_Prepack_PM.csv";
			$lastupdate = getLastUpdate()['updatestamp'];
			$time = date('H');
			If(($time>=6) && ($time<14)) {				
				if((string)filemtime($strAMfile)!=$lastupdate) {
					setLastUpdate("AM", filemtime($strAMfile));
					echo "different";
					refreshLinesArray();
					exit();
				}
			} else {
				if((string)filemtime($strPMfile)!=$lastupdate) {
					setLastUpdate("PM", filemtime($strPMfile));
					refreshLinesArray();
					exit();
				}
				else
				{echo "PM";}
			}
	}

	if(isset($_GET['getdata']))  {
		$db = new databaseclass();
		$arrLines = array();
		$arrLines = $db->queryToArray(
						"SELECT 
							linenumber as line,
							total as total,
							availabilty as availability,
							quality as quality,
							performance as performance,
							downtime as downtime,
							losttime as losttime,
							rejects as rejects,
							lineindex
						FROM kpi");
		if(empty($arrLines)) {
				refreshLinesArray();
				$arrLines = $db->queryToArray(
						"SELECT 
							linenumber as line,
							total as total,
							availabilty as availability,
							quality as quality,
							performance as performance,
							downtime as downtime,
							losttime as losttime,
							rejects as rejects,
							lineindex
						FROM kpi");
		}
		echo json_encode($arrLines);
	}
?>