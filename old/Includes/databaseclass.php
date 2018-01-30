<?php
	class databaseclass {
		private $objDB;
		function __construct() {
			$this->objDB = new PDO("mysql:host=localhost; dbname=kpi;", "kpi" , "kpi") or die (mysql_error());
		}

		public function queryToArray($sql) {
			$query = $this->objDB->query($sql);
			$rowcount = $query->rowCount();
			$arrData=array();
			while($row = $query->fetch(PDO::FETCH_ASSOC))
			{
				$arrData[]=$row;
			}
			return ($arrData);
		}
		
		// Returns the line number with the top total
		public function getTopline() {
			$query = $this->objDB->query("select lineindex from kpi where total = (select max(total) FROM kpi)");
			$result = $query->fetch(PDO::FETCH_ASSOC);
			return $result['lineindex'];
		}		
		
		// Returns the last update UNIX timestamp
		public function getLastUpdate() {
			$zone = '';
			$time = date('H');
			If(($time>=6) && ($time<14)) {
				// AM Data
				$zone = "AM";
			}
			else
			{
				// PM Data
				$zone = "PM";		
			}

			$query = $this->objDB->query("select * from lastupdates where zone = '" . $zone . "'");
			$result = $query->fetch(PDO::FETCH_ASSOC);
			return $result;
		}		
		
		public function setLastUpdate($zone, $updatestamp) {
			$stmt = $this->objDB->prepare("UPDATE lastupdates SET updatestamp = :stamp WHERE zone = :zone");
			$stmt->bindValue(':zone', 	$zone, PDO::PARAM_STR);
			$stmt->bindValue(':stamp', 	$updatestamp, PDO::PARAM_STR);					
			$stmt->execute() or die('Error');			
		}

		public function purgeTable() {
			$stmt = $this->objDB->prepare("DELETE FROM kpi");
			$stmt->execute();
		}
		
		public function insertRow($objData) {
			print_r($objData);
			$stmt = $this->objDB->prepare("INSERT INTO 
														kpi (
															linenumber,
															total,
															availabilty,
															performance,
															downtime,
															losttime,
															rejects,
															quality,
															ampm,
															lineindex
														) VALUES (
															:linenumber,
															:total,
															:availability,
															:performance,
															:downtime,
															:losttime,
															:rejects,
															:quality,
															:ampm,
															:lineindex
														)
										");

			$stmt->bindValue(':linenumber', 	$objData['linenumber'], PDO::PARAM_STR);
			$stmt->bindValue(':total', 		$objData['total'], PDO::PARAM_INT);
			$stmt->bindValue(':availability', 	$objData['availability'], PDO::PARAM_INT);
			$stmt->bindValue(':performance', 	$objData['performance'], PDO::PARAM_INT);
			$stmt->bindValue(':downtime',		$objData['downtime'], PDO::PARAM_INT);
			$stmt->bindValue(':losttime',		$objData['losttime'], PDO::PARAM_INT);
			$stmt->bindValue(':rejects',		$objData['rejects'], PDO::PARAM_INT);
			$stmt->bindValue(':quality',		$objData['quality'], PDO::PARAM_INT);
			$stmt->bindValue(':ampm',		$objData['ampm'], PDO::PARAM_STR);
			$stmt->bindValue(':lineindex',		$objData['lineindex'], PDO::PARAM_INT);
			$stmt->execute() or die('Error');			
		}		
	}
?>