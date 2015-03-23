<?php

/**
 * Utility functions used throughout
 */
class Utility extends CApplicationComponent{
	// Payment types:
	const ACH = '1';
	const BRAINTREE = '2';
	const OP_TOTAL = '3';
	const BROKER_TOTAL = '4';
	const FET = '5';
	const BOOK_TOTAL = '6';
	const TOTAL = '7';
	
	const FET_PERCENT = 0.05;
	
	// Payment approval stages
	// Credit Card: Approved->settling->settled. --> DISPUTED
	// ACH: Verified->settling->settled (cleared).
	const APPROVED = '1';
	const REJECTED = '2';
	const AUTHORIZED = '3';
	const SUBMITTED = '4';
	const PENDING = '5';
	const SETTLING = '6';
	const SETTLED = '7';
	const VOIDED = '8';
	const DECLINED = '9';
	const FAILED = '11';
	const EXPIRED = '12';
	const DISPUTED = '13';
	
	// These CSS flight settings are used to highlight different MCW rows in alternating colors.
	// 'even' and 'odd' are the conventions to distinguish rows in the CGridView.php 'class' used
	// to display rows. These values are used to override the row settings for flight settings.
	// Build flight legs() stores the value and $rowCssClassExpression outputs that value in HTML
	// for CSS settings.
	const CSS_FLIGHT_ODD = 'odd';
	const CSS_FLIGHT_EVEN = 'even';
	
	/*
	 * Calculate distance between airports for trip
	 */
	public function tripDistance($dep_arp = "", $arr_arp = "", $dep_lat = "", $dep_lng = "", $arr_lat = "", $arr_lng = ""){
		if(strlen($dep_arp) > 0){
			// $dep_arp = "'".$dep_arp;
			$dep = Airport::model()->find(array('select'=>'latitude_dd, longitude_dd','condition'=>'location_id=:locID','params'=>array(':locID'=>$dep_arp)));
			$deplat = $dep->latitude_dd;
			$deplon = $dep->longitude_dd;
		}else{
			$deplat = $dep_lat;
			$deplon = $dep_lng;
		}
		if(strlen($arr_arp) > 0){
			// $arr_arp = "'".$arr_arp;
			$arr = Airport::model()->find(array('select'=>'latitude_dd, longitude_dd','condition'=>'location_id=:locID','params'=>array(':locID'=>$arr_arp)));
			$arrlat = $arr->latitude_dd;
			$arrlon = $arr->longitude_dd;
		}else{
			$arrlat = $arr_lat;
			$arrlon = $arr_lng;
		}
		
		return $this->calculateDistance($deplat, $deplon, $arrlat, $arrlon, "N");
	}
	public function calculateDistance($lat1, $lon1, $lat2, $lon2, $unit){
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);
		
		if($unit == "K"){
			return ($miles * 1.609344);
		}else if($unit == "N"){
			return ($miles * 0.8684);
		}else{
			return $miles;
		}
	}
	
	/*
	 * Log general activity to activity log for analytics/BI @param string usertype: [u]ser, [o]perator, [b]roker, [a]dmin @param int userid @param string action: view, add, edit, delete, etc @param string targettype: quote, account, settings, etc @param int targetid: target id or - todo: add data param; ex: margin 30% to 32.5%; maybe item, new value?: margin .325
	 */
	public function logActivity($usertype, $userid, $action, $targettype, $targetid = "-"){
		// usertype (u,o,b,a), userid, action (viewed, added, edited), targettype (quote, settings), targetid (quoteid, or 0/none)
		date_default_timezone_set(Yii::app()->params['timezone']);
		$date = date("Y-m-d H:i:s");
		$filepath = Yii::app()->runtimePath . "/activity.log";
		$entry = "[" . $date . "] " . $usertype . " " . $userid . " " . $action . " " . $targettype . " " . $targetid . "\n";
		file_put_contents($filepath, $entry, FILE_APPEND | LOCK_EX);
		return true;
	}
	public static function buildURL($url, $arguments){
		if(count($arguments) > 0){
			$url = $url . '?';
			foreach($arguments as $key=>$value){
				$url = $url . $key . '=' . $value . '&';
			}
		}
		return $url;
	}
	
	/**
	 * Send a POST requst using cURL
	 *
	 * @param string $url
	 *        to request
	 * @param array $post
	 *        values to send
	 * @param array $options
	 *        for cURL
	 * @return string
	 */
	public static function curl_post($url, $post = array(), $options = array()){
		$defaults = array(CURLOPT_POST=>1,CURLOPT_HEADER=>0,CURLOPT_URL=>$url,CURLOPT_FRESH_CONNECT=>1,CURLOPT_RETURNTRANSFER=>1,CURLOPT_FORBID_REUSE=>1,CURLOPT_TIMEOUT=>10,CURLOPT_POSTFIELDS=>http_build_query($post),CURLOPT_SSL_VERIFYPEER=>FALSE);
		
		$ch = curl_init();
		curl_setopt_array($ch, ($options + $defaults));
		if(!$result = curl_exec($ch)){
			trigger_error(curl_error($ch));
		}
		curl_close($ch);
		return $result;
	}
	public static function getTimeZone($time_str, $lat, $long){
		date_default_timezone_set(Yii::app()->params['timezone']);
		$timestamp = strtotime($time_str);
		$url = Utility::buildURL("https://maps.googleapis.com/maps/api/timezone/json", array('location'=>$lat . ',' . $long,'timestamp'=>$timestamp));
		$timezoneInfo = Utility::curl_post($url);
		// $timezoneInfo = Utility::curl_post("https://maps.googleapis.com/maps/api/timezone/json",
		// array('location'=> $lat.','.$long,'timestamp'=>$timestamp));
		$timezoneInfo = json_decode($timezoneInfo);
		return $timezoneInfo->timeZoneId;
	}
	
	/**
	 * Those waky time zones.
	 * The goal here is to have a time in the correct time zone based on the lat/long
	 * of either a person's address or an airport. There are a number of issues here:
	 *
	 * (1) you can't rely on client time zone (they may not be in the same time zone)
	 * (2) you can't rely on server time (that would be silly)
	 * (3) you can't just give people GMT
	 * (4) You can't take a time that exists and add a time zone to it. (that results in a change from GMT to the time)
	 *
	 * So, we do this: We take the time string, change it into a GMT time and send it to google and get back a time zone
	 * for that lat/long at that GMT time. That's incorrect...except with dates where the time stamp crosses the DST chang.
	 * for that, you'd really need to execute this twice to get the correct date...
	 *
	 * The format of the resulting string is: "Y-m-d h:ia T" - which you'll need to turn this back into a usable date.
	 *
	 * The format of the incomming string is: "Y-m-d H:i:s"
	 *
	 * @param unknown $time_str        
	 * @param unknown $lat        
	 * @param unknown $long        
	 */
	public static function applyTimezone($datetime_str, $timezone){
		// Note: This is built from the original $time_str so that we don't chage
		// the base time!
		date_default_timezone_set($timezone);
		$datetime = new DateTime($datetime_str);
		$date_timezone = new DateTimeZone($timezone);
		$datetime->setTimeZone($date_timezone);
		return $datetime->format("Y-m-d h:ia T");
	}
	public static function calcArrivalTime($dep_time_str, $dep_time_zone, $flightTime, $dep_apt_time = 30, $arr_apt_time = 30, $timezone){
		date_default_timezone_set($dep_time_zone);
		$time = DateTime::createFromFormat("Y-m-d h:ia T", $dep_time_str); // our format w/time zone.
		if(!$time){
			$timeStr = Utility::applyTimezone($dep_time_str, $timezone);
			$time = DateTime::createFromFormat("Y-m-d h:ia T", $timeStr);
		}
		$time->modify('+' . $flightTime + $dep_apt_time + $arr_apt_time . ' minutes');
		$newTimeStr = Utility::applyTimezone($time->format('Y-m-d h:ia T'), $timezone);
		return $newTimeStr;
	}
	public static function buildPlaneDataModel($airplane, $airplaneDetail){
		return 'Aircraft:  ' . $airplaneDetail['mfr'] . ' ' . $airplaneDetail['model'] . ' seating:  ' . $airplaneDetail['no_seats'] . '  tail #: ' . $airplane['n_number'] . '  operator: ' . $airplane['name'];
	}
	public static function buildBuyerDataModel($quote){
		$custId = $quote['cust_id'];
		Utility::buildBuyerDataModelFromUID($custId);
	}
	public static function buildBuyerDataModelFromUID($uid){
		$user = User::model()->findByPk($uid);
		return 'Buyer:         ' . $user->fname . ' ' . $user->lname . ' of ' . $user->company;
	}
	public static function buildCostArrayFromBidId($bidId){
		$opQuote = OpQuote::model()->findByPk($bidId);
		return Utility::buildCostArray($opQuote);
	}
	public static function buildCostArray($opQuote, $currency = '$'){
		$brokerDetail = BrokerDetail::model()->findByAttributes(array('bid_id'=>$opQuote['id']));
		$opTotal	= $opQuote->calcSubtotal();
		$fedExcizeTax = $opTotal * Utility::FET_PERCENT;
		$bidPercent_fee = number_format($opTotal * ($brokerDetail['percent'] / 100), 2, '.', '');
		$br_total = $bidPercent_fee + $brokerDetail['fixed_fee'];
		$prebook = $opTotal + $opQuote['fet'] + $br_total;
		$bookFee = number_format($prebook * 0.05, 2, '.', '');
		$postbook = $prebook + $bookFee;
		$chargeFee = number_format($postbook * 0.05, 2, '.', '');
		$costModel = array('subtotal'=>$currency . number_format($opTotal, 2, '.', (isset($currency))?',':''),
							'fet'=>$currency . number_format($fedExcizeTax, 2, '.', (isset($currency))?',':''),
							'br_fixed'=>$currency . number_format($brokerDetail['fixed_fee'], 2, '.', (isset($currency))?',':''),
							'br_percent_fee'=>$currency . number_format($bidPercent_fee, 2, '.', (isset($currency))?',':''),
							'br_percent'=>$brokerDetail['percent'],
							'br_total'=>$currency . number_format($br_total, 2, '.', (isset($currency))?',':''),
							'book_fee'=>$currency . number_format($bookFee, 2, '.', (isset($currency))?',':''),
							'buyer_subtotal'=>$currency . number_format($prebook + $bookFee, 2, '.', (isset($currency))?',':''),
							'charge_fee'=>$currency . number_format($chargeFee, 2, '.', (isset($currency))?',':''),
							'charge_total'=>$currency . number_format($postbook + $chargeFee, 2, '.', (isset($currency))?',':''),
							'cash_total'=>$currency . number_format($postbook, 2, '.', (isset($currency))?',':''));
		return $costModel;
	}
	public static function buildCostModel($cost, $paymentType, $display = true){
		if(isset($paymentType) && $paymentType === Utility::ACH){
			$multiplyer = 1.0;
		}elseif(isset($paymentType) && $paymentType === Utility::BRAINTREE){
			$multiplyer = .05565;
		}elseif(isset($paymentType) && $paymentType === Utility::OP_TOTAL){
			$multiplyer = 1;
		}elseif(isset($paymentType) && $paymentType === Utility::BROKER_TOTAL){
			$multiplyer = 0.05; // TODO Of the broker cost only.
		}elseif(isset($paymentType) && $paymentType === Utility::FET){
			$multiplyer = 0.01; // TODO need FET working.
		}elseif(isset($paymentType) && $paymentType === Utility::BOOK_TOTAL){
			$multiplyer = 0.053;
		}elseif(isset($paymentType) && $paymentType === Utility::TOTAL){
			$multiplyer = 1.116856;
		}
		if($display){
			$currency = "$";
		}
		return $currency . number_format($cost * $multiplyer, 2, '.', (isset($currency))?',':'');
	}
	public static function buildFlightLegsFromBid($bidId, $legs = array(), $action = ''){
		$opQuote = OpQuote::model()->findByPk($bidId);
		$quote = Quote::model()->findByPk($opQuote->quote_id);
		$newLegs = Leg::model()->findAllByAttributes(array('quote_id'=>$quote->id), array('order'=>'dep_ts ASC'));
		$buyer = Utility::buildBuyerDataModel($quote);
		$legs = Utility::buildFlightLegs($legs, $newLegs, $opQuote, '0', $action);
		
		$legId = count($legs);
		if($legId > 0){
 			$costs = Utility::buildCostArray($opQuote);
			$legs[($legId - 1)] = array_merge($legs[($legId - 1)], $costs);
			$legs[($legId - 1)]['buyer'] = $buyer;
		}
		return $legs;
	}
	public static function buildFlightLegs($legs, $addLegs, $opQuote, $total = '', $action = ''){
		$legId = count($legs);
		$currentFlightCssClass = self::CSS_FLIGHT_ODD;
		if($legId > 0){
			$lastLeg = $legs[($legId - 1)];
			$lastFlightCssClass = $lastLeg['css_class'];
			if($lastFlightCssClass == self::CSS_FLIGHT_ODD){
				$currentFlightCssClass = self::CSS_FLIGHT_EVEN;
			}
		}
		// Get airplane for legs -- need "n_number"
		if(isset($opQuote['aircraft_id'])){
			$airplane = OperatorAircraft::model()->findByPk($opQuote['aircraft_id']);
			$airplaneDetail = OperatorAircraftRef::model()->findByAttributes(array('operator_aircraft_id'=>$airplane['id']));
		}
		$i = 0;
		$newLegs = array();
		foreach($addLegs as $leg){
			$depTimeArr = explode(' ', $leg['dep_time']);
			$depTime = $depTimeArr[1];
			$depDate = $depTimeArr[0];
//			$tripId = (isset($opQuote['quote_id']))?$opQuote['quote_id']:$opQuote['id'];
			$tripId = $opQuote['id'];
			if(isset($opQuote['aircraft_id'])){
				$opLeg = OpLeg::model()->findByAttributes(array('leg_id'=>$leg['id'], 'aircraft_id'=>$opQuote['aircraft_id']));
				$arrTimeDate = Utility::calcArrivalTime($leg['dep_time'], $leg['dep_tz'], $opLeg->calcMins(), 30, 30, $leg['arr_tz']);
				$arrTimeArr = explode(' ', $arrTimeDate);
				$arrTime = $arrTimeArr[1];
				$arrDate = $arrTimeArr[0];
				$flightTime = round($opLeg->calcMins()/60, 0).":".($opLeg->calcMins()%60);
			}else{
				$arrDate = $depDate;
				$arrTime = 'TBD';
				$flightTime = 'TBD';
			}
			if(isset($leg['dep_city'])){
				$depCity = $leg['dep_city'];
				$depState = $leg['dep_state'];
				$arrCity = $leg['arr_city'];
				$arrState = $leg['arr_state'];
			} else {
				$depArp = Airport::model()->findByAttributes(array('location_id'=>$leg['dep_arp']));
				$arrArp = Airport::model()->findByAttributes(array('location_id'=>$leg['arr_arp']));
				$depCity = $depArp['city'];
				$depState = $depArp['state'];
				$arrCity = $arrArp['city'];
				$arrState = $arrArp['state'];
			}
			$newLegs[$i] = array('trip'=>$tripId,			// trip #
								'dep_arp'=>$depCity.', '.$depState.' ('.$leg['dep_arp'].')',
								'dep_time'=>$depTime,
								'dep_date'=>$depDate,
								'arr_arp'=>$arrCity.', '.$arrState.' ('.$leg['arr_arp'].')',
								'arr_time'=>$arrTime,
								'arr_date'=>$arrDate,
								'num_trav'=>$leg['num_trav'],
								'flight_time'=>$flightTime,
								'dist'=>$leg['dist'],
								'total'=>$total,
								'action'=>$action,
								'css_class'=>$currentFlightCssClass);
			if(isset($opQuote['aircraft_id'])){
				$planeArray = array('airplane'=>Utility::buildPlaneDataModel($airplane, $airplaneDetail),
									'n_number'=>$airplane['n_number'],				// operator_aircraft n_number
									'aircraft_id'=>$opQuote['aircraft_id']);		//  op_quote aircraft_id
				
				$newLegs[$i] = array_merge($newLegs[$i], $planeArray);
			}
			if(isset($leg['buyer'])){
				$newLegs[$i]['buyer'] = $leg['buyer'];
			}
			$i++;
		}
		$legs = array_merge($legs, $newLegs);
		
		return $legs;
	}
	public static function buildFlightDataModel($legs){
		$legsColumns = array('id'=>'dep_arp','pagination'=>false,'sort'=>false,'totalItemCount'=>false);
		$dataProvider = new CArrayDataProvider($legs, $legsColumns);
		return $dataProvider;
	}
	public static function completeContract($quote, $opQuote){
		$buyer = User::model()->findByPk($quote['cust_id']);
		$operator = Operator::model()->findByPk($opQuote['operator_id']);
		$broker = BrokerSettings::model()->findByAttributes(array('user_id'=>$quote['broker_id']));
		$brokerUs = User::model()->findByPk($quote['broker_id']);
		$itinerary = Utility::buildFlightLegsFromBid($opQuote['id']);
		$itinerary = $itinerary[0];
		$itin_text = 'From        ' . 'to         ' . 'at           \n' . $itinerary['dep_arp'] . ' ' . $itinerary['arr_arp'] . ' ' . $itinerary['dep_time'] . '\n/n' . $itinerary['airplane'] . '\n';
		// TODO: Throw an exception for unfound parts!
		$contract = $broker->contract;
		$variables = array('buyer_full_name'=>$buyer->fname . ' ' . $buyer->lname,'buyer_name_and_co'=>$buyer->fname . ' ' . $buyer->lname . ' of ' . $buyer->company,'buyer_company'=>$buyer->company,'buyer_address'=>$buyer->street . ', ' . $buyer->city . ', ' . $buyer->state . ' ' . $buyer->zip,'broker_full_name'=>$brokerUs->fname . ' ' . $brokerUs->lname,'broker_name_and_co'=>$brokerUs->fname . ' ' . $brokerUs->lname . ' of ' . $brokerUs->company,'broker_company'=>$brokerUs->company,'broker_address'=>$brokerUs->street . ', ' . $brokerUs->city . ', ' . $brokerUs->state . ' ' . $brokerUs->zip,'operator_company'=>$operator->name,'operator_address'=>$operator->street . ', ' . $operator->city . ', ' . $operator->state . ' ' . $operator->zip,'itinerary'=>$itin_text);
		
		foreach($variables as $key=>$value){
			if($value != '') $contract = str_replace('%' . $key . '%', $value, $contract);
		}
		
		return $contract;
	}
	public static function getTemplate($templateId, $quoteDetail, $recipiantEmail){
		$user = Yii::app()->user;
		$recipiant = User::model()->findByAttributes(array('email'=>$recipiantEmail));
		$variables = array('sender_fname'=>$user->fname,'sender_lname'=>$user->lname,'sender_comapny'=>$user->company,'recipiant_fname'=>$recipiant->fname,'recipiant_lname'=>$recipiant->lname,'recipiant_comapny'=>$recipiant->company,'itinerary'=>Utility::buildFlightLegs(array(), $quoteDetail, Utility::buildCostModel($qutoeDetail['total_cost'], Utility::TOTAL, true)),'from'=>$quoteDetail['dep_arp'],'to'=>$quoteDetail['arr_arp'],'operator'=>$quoteDetail['operator'],'broker'=>$quoteDetail['broker'],'pricing'=>Utility::buildCostModel($qutoeDetail['total_cost'], Utility::TOTAL, true),'quote_id'=>$quoteDetail['quote_id'],'quote_id'=>$quoteDetail['bid_id']);
		
		$templateData = Templates::model()->findByPk($templateId);
		$template = $templateData['template'];
		
		foreach($variables as $key=>$value){
			$template = str_replace('%' . $key . '%', $value, $template);
		}
	}
	public static function sendEmailTemplate($templateId, $quoteDetail, $recipiantEmail){
		$to = $recipiantEmail;
		// DEBUG!
		$to = 'dwurry@lyfft.com';
		
		$templateData = Templates::model()->findByPk($templateId);
		
		$subject = $templateData->subject;
		
		$headers = "From: support@lyfft.com\r\n" . "Reply-To: support@lyfft.com\r\n" . "CC: sentMail@lyfft.com\r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		$body = renderPartial('templates/' . $templateData['view'], array($quoteDetail,$recipiantEmail), true);
		
		mail($to, $subject, $body, $headers);
	}
}