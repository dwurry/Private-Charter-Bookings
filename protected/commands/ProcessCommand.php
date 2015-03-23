<?php
class ProcessCommand extends CConsoleCommand{
	public function run(){
		// get status 0s, match with operators
		$newQuotes = Quote::model()->findAllByAttributes(array('status'=>Quote::STATUS_SY_PROCESS));
		
		// loop through, find matching aircraft by home airport, seats
		foreach($newQuotes as $quote){
			// first check if quote is already in rel table
			$checkQuotes = Quote::model()->checkForExistingQuote($quote->id);
			if(empty($checkQuotes)){
				$originLeg = Leg::getFirstLeg($quote->id);
				$lastLeg	= Leg::getLastLeg($quote->id);
				
				// get an array for this quote of matching operator aircraft ids, as o_id
				$matching_ac = Quote::model()->getQuoteMatchingAircraft($originLeg['dist'], $originLeg['num_trav']);
				if(!empty($matching_ac)){
					// insert into db:op_quote
					foreach($matching_ac as $aircraft){
						// Create OpQuote
						$opQuote = new OpQuote();
						$opQuote->quote_id = $quote->id;
						$opQuote->operator_id = $aircraft['operator_id']; 
						$opQuote->aircraft_id = $aircraft['aircraft_id'];
						$opQuote->updateOpQuote($quote, $aircraft, true);
						
						// calculate Broker values
						// we could probably do this later to keep the detail table smaller--perhaps only if edited!
						$brokerSettings = BrokerSettings::model()->findByAttributes(array('user_id'=>$quote->broker_id));
						if(!isset($brokerSettings)){
							// fill in default broker settings:
							$brokerSettings = new BrokerSettings();
							$brokerSettings->percent_commision = BrokerSettings::DEFAULT_COMMISSION;
							$brokerSettings->added_fee = BrokerSettings::DEFAULT_FIXED_FEE;
							$brokerSettings->user_id = $quote->broker_id;
							$user = User::model()->findByPk($brokerSettings->user_id);
							$brokerSettings->company_name = $user->company;
							$brokerSettings->address_street = $user->street;
							$brokerSettings->city = $user->city;
							$brokerSettings->state = $user->state;
							$brokerSettings->zip = $user->zip;
							$brokerSettings->email = $user->email;
							$brokerSettings->save();
						}
						$brokerDetail = new BrokerDetail();
						$brokerDetail->quote_id = $quote->id;
						$brokerDetail->bid_id = $opQuote->id;
						$brokerDetail->percent = $brokerSettings->percent_commision;
						$brokerDetail->percent_fee = $opQuote->total_cost * ($brokerSettings->percent_commision / 100);
						$brokerDetail->fixed_fee = $brokerSettings->added_fee;
						$brokerDetail->save();
						
						$brokerDetail->contract = Utility::completeContract($quote, $opQuote);
						$brokerDetail->save();
						
						Quote::model()->updateQuoteStatus($quote->id, Quote::STATUS_OP_REVIEW);
					}
					// Message operators
					// then, need to show in op account
				}
			}
		}
	}
}