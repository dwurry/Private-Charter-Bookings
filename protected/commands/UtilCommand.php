<?php
class UtilCommand extends CConsoleCommand{
	public function actionProcessAirportGeocodes(){
		// Get lat and long for all airports with blank decimal values
		$criteria = new CDbCriteria();
		$criteria->select = 'id, arp_latitude, arp_longitude';
		$criteria->condition = 'latitude_dd="0.0"';
		// $criteria->condition = 'id="2365"'; // SJC only for testing
		$model = Airport::model()->findAll($criteria);
		
		// Loop through airports
		foreach($model as $airport){
			$arplat = $this->getDMSparts($airport->arp_latitude);
			$arplon = $this->getDMSparts($airport->arp_longitude);
			
			$newarplat = $this->convertDMSToDD($arplat[0], $arplat[1], $arplat[2], $arplat[3]);
			$newarplon = $this->convertDMSToDD($arplon[0], $arplon[1], $arplon[2], $arplon[3]);
			
			$airport->latitude_dd = $newarplat;
			$airport->longitude_dd = $newarplon;
			
			$airport->update();
		}
	}
	
	/*
	 * Break apart DMS values from UsController
	 */
	public function getDMSparts($dms){
		$parts = explode("-", $dms);
		$parts[3] = substr($parts[2], -1);
		$parts[2] = substr($parts[2], 0, -1);
		return $parts;
	}
	
	/*
	 * Convert DMS to decimal from UsController
	 */
	public function convertDMSToDD($days, $minutes, $seconds, $direction){
		$dd = $days + $minutes / 60 + $seconds / (60 * 60);
		
		if($direction == "S" || $direction == "W"){
			$dd = $dd * -1;
		} // Don't do anything for N or E
		return $dd;
	}
}