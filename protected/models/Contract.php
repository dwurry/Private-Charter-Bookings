<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Contract extends CFormModel{
	public $user_id;
	public $quote_id;
	public $username;
	public $agree = false;
	public $pre = '1) Engagement. ';
	public $post = ' ("Client") hereby engages LYFFT, INC. to act as a its broker to arrange for the charter services described on the charter itinerary ("Charter Itinerary"), to which this standard terms and conditions charter broker agreement (the "Agreement") is annexed, on behalf of Client from third party certified air carriers operating under Part 135 of the Federal Aviation Administration ("FAA") regulations ("Section 14 Code of Federal Regulations").

2) General Disclosures. LYFFT, INC. does not own or operate aircraft and is a contracted agent of a network of FAA Part 135 Air Carriers. LYFFT, INC.is acting solely as a broker and is not an air carrier and is not operating the flights. Client authorizes LYFFT, INC. to book on Client\'s behalf the charter services set forth on the Charter Itinerary. All requests for service are subject to acceptance by LYFFT, INC.

The air charter suppliers have sole responsibility, liability and control of all aspects of the aircraft charter services provided to Client, including without limitation, (i) aircraft availability and pricing, (ii) the commencement and termination of scheduled flights, (iii) the operation, regulation condition and safety of the flight, and (iv) passengers, baggage, cargo and other people and events associated with your air travel, such as crew performance and catering services. The air charter suppliers and/or their pilots will be solely responsible for all decisions regarding safety determinations with respect to the commencement, operation and termination of flights.

Neither the air charter suppliers nor LYFFT, INC. shall have liability or responsibility for delay, cancellation or failure to furnish any service to be provided to Client when caused by mechanical difficulty, weather conditions, acts of God, acts of nature, acts of civil or military authority, acts of terrorism, civil commotion, war or warlike operations or imminence thereof, strikes or labor disputes, blockade, embargo, government regulation, law, rule of authority, acts or omissions of government authorities including all civil aviation authorities, requisition of aircraft by public authorities, breakdown or accident to the aircraft, mechanical failure, lack of essential supplies or parts, or if the safety of passengers and/or property is deemed by the aircraft commander or the carrier\'s operational supervisors to be in jeopardy, or for any causes beyond their reasonable respective control.

LYFFT, INC.\'s sole responsibility shall be to act as a broker to arrange the flight(s) and, as applicable, ground and other arrangements.  Thereafter, the air charter supplier and/or air carrier shall be solely responsible for any delay, cancellation or failure to furnish flight(s). The air charter supplier and/or air carrier assume responsibility for Client and Client\'s agent, guests, passengers and employees safety, schedule, baggage, cargo, business and personal activities and financial ramifications associated with the reservations and travel arranged by LYFFT, INC. and performed by the air charter suppliers and/or air carrier.

3) Reservations/Charter Itinerary. Your Charter Itinerary will delivered by LYFFT, INC. via facsimile or email. It will provide your (i) confirmation number, (ii) estimated price quote, (iii) date(s) and time(s) of travel, (iv) flight segments, (v) aircraft type, and (vi) other requests that were specified when booking your flight(s). Upon booking your flight(s), we will request that you sign and return a copy of the Charter Itinerary signifying your confirmation of its contents.

4) Cancellations. Any change(s) in your Charter Itinerary, including, but not limited to, date(s) and/or time(s) of flight(s), number of passengers, and type of aircraft may be deemed a cancellation. You will not be charged for any change(s) to your Charter Itinerary or cancelled domestic flight(s) if such changes and/or cancellation(s) are made more than ninety-six (96) hours prior to the scheduled departure date of such flight(s) and more than seven (7) calendar days prior to the departure date of any international flight(s), except for those expenses and/or cancellation fees specifically incurred by LYFFT, INC. directly relating to your flight(s) or when as advance deposit is required and Client has been informed of the cancellation fee(s). Any cancellation of all or any portion of a confirmed Charter Itinerary maybe subject to the terms and conditions imposed by the specific air carrier selected. LYFFT, INC. assumes no responsibility for the disposition or cancellation of any reservation, either by Client or the specific air carrier selected. LYFFT, INC. reserves the right to change the terms of its cancellation policy at anytime.

5) Cancellation Fees. Cancellation fees may include, but are not limited t: (i) costs incurred for specifically positioning and repositioning an aircraft and flight crew as relating to a cancelled flight, (ii) flight charges at the rate of two (2) flight hours of operation for each day of the cancelled Charter Itinerary, and/or (iii) any fees incurred by LYFFT, INC. as a result of Client\'s cancellation. 
	A)  Domestic Flights. Any reservations or portion(s) thereof cancelled within seventy-two (72) hours of the scheduled departure date is subject to a cancellation charge of up to one hundred (100%) percent of the quoted price of the fight(s).
	B)  International Flights. Any reservations or portion(s) thereof cancelled within seven (7) days of the scheduled departure date is subject to a cancellation charge of up to one hundred (100%) percent of the quoted price of the fight(s).
	C)  Peak Travel Periods. The peak travel periods ("Peak Travel Periods") include (i) New Year\'s Day, (ii) Super Bowl Day, (iii) President\'s Day, (iv) Easter Sunday, (v) Passover, (vi) Memorial Day, (vii) July 4th, (viii) Labor Day, (ix) Thanksgiving Day, (x) Christmas Day (xi) the four (4) days prior to any of the foregoing days, and (xii) the two (2) days following any of the foregoing days, except when any of the foregoing days is a Thursday, then the Peak Travel Periods shall include the three (3) days following any of the foregoing days.  The cancellation of any confirmed flight within seven (7) days of departure during Peak Travel Periods will result in a cancellation charge of up to one hundred (100%) percent of the cost of the quoted price for the flight(s).
	D)  Confirmed Departures. Departures confirmed ("Confirmed Departures") within seven (7) days of Peak Travel Periods are non refundable.
	E)  One-Way Charter Flights. All one-way charter flight reservations are non-cancelable and nonrefundable. Cancellations of one-way charter flight(s) will result in a cancellation charge of one hundred (100%) percent of the cost of the quoted price for the flight(s).

6) Price Quotes. All cost estimates provided to Client for each specific Charter Itinerary is subject to the following: 
	A) Federal Excise and Departure Taxes. Domestic and international flights may be subject to certain federal excise and departure taxes.  Client shall pay such any applicable federal excise and departure taxes, using the current rate applicable to each Charter Itinerary, unless otherwise specified.
	B) Additional Charges. The cost estimate provided by LYFFT, INC. to Client will include estimates for certain items, however Client shall pay the actual amount of any applicable taxes, over-flight permits, landing charges, catering costs, flight phone, customs fees, crew trip expenses, deicing, and other expenses relating to the services provided to Client should these charges exceed the original cost estimate provided by LYFFT, INC.. In addition, Client agrees to pay any and all additional charges arising from Client\'s changes to the Charter Itinerary or any other actions taken by Client resulting in an increase in charges from the original cost estimate and/or Charter Itinerary.

7) Payment. Client agrees to pay all costs, fees and expenses as set forth on the cost estimate and/or Charter Itinerary, as well as all additional costs and expenses relating to Client\'s flight(s), including but not limited to taxes, surcharges and fees set forth in Section 6B of this Agreement, and damages set forth in Section 8(g) of this Agreement.
	A) Terms. LYFFT, INC. may require either (i) payment in advance, or (ii) an acceptable credit card guarantee. Any failure to make any requested payment to LYFFT, INC. at least seven (7) days prior to any scheduled flight may result in cancellation of any flight in LYFFT, INC.\'s sole discretion.
	B)  Credit Card Payments. By providing his, her or its credit card information, Client authorizes LYFFT, INC. to obtain payment from the issuer of the credit card and Client agrees to pay an administrative fee of five (5%) percent, if such payment is made by credit card. If Client does not make payment to LYFFT, INC. by other means within five (5) days after completion of Client\'s Charter Itinerary and Client has provided LYFFT, INC. with his, her or its credit card information, thereby authorizing LYFFT, INC. to charge Client\'s credit card, LYFFT, INC. shall charge to Client\'s credit cardany unpaid monies due to LYFFT, INC.. Client agrees to perform the obligations set forth in the agreement with his, her or its credit card issuer and shall not dispute or contest the validity of the charges of LYFFT, INC.
	C)  Late Payments. Client will pay LYFFT, INC. (i) interest at the rate of one (1%) percent per month on any charges outstanding more than thirty(30) days past due, and (ii) any reasonable costs and attorneys\' fees incurred in the collection of any past due fees, expenses and charges due to LYFFT, INC.

8) Force Majeure. LYFFT, INC. will not be deemed to be in breach of its obligations hereunder or have any liability for any delay, cancellation or damage arising in whole or in part from any act of God, act of nature, acts of civil or military authority, strike or labor dispute, mechanical failure, lack of essential supplies or parts or any cause beyond the direct control of LYFFT, INC., the air charter suppliers or the air carrier.

9) Client\'s Responsibilities. Clients and Client\'s agents, guests, passengers and employees, if applicable, shall not engage in any act or possess any substance or allow cargo to contain any substance that may result in the seizure or forfeiture, or unsafe operation of the aircraft used in the charter contracted for Client by LYFFT, INC.

10) Release. Client, on behalf of her, him, or itself, it its agents, employees, guests, invitees, passengers, family members or estate, hereby releases LYFFT, INC., its affiliates, successors or assigns, and any present or former officers, directors, shareholders, employees, agents, legal representatives and attorneys (the "LYFFT, INC. Parties") from any liabilities, losses, damages, penalties, costs and expenses on account of any claim, suit, action, demand, proceeding or anything of a similar nature made or brought against any of the LYFFT, INC. Parties as a result of the services performed by any of them on behalf of Client or such other parties.

11) Damages. In no event will LYFFT, INC. be liable to Client, its agents, employees, guests, passengers, family members or estate for any direct, indirect, incidental or consequential damages, whether arising in contract or in tort. To the extent that any damage release or waiver by Client shall be unenforceable, then in no event shall LYFFT, INC.\'s liability to Client, its agents, employees, guests, passengers, family members or estate for any event or injury be greater that the amounts paid by Client to LYFFT, INC. in connection with such flight.  If the Client\'s trip involves an ultimate destination or stop in a country other than the country of departure, the Warsaw Convention may be applicable and the Convention governs and in most cases limits the liability of the air carrier for death or personal injury and for loss of or damage to baggage.

12) Regulations. This Agreement is subject to all applicable rules, regulations, approvals and certifications in effect from time to time including, but not limited to, those promulgated by the FAA, which now or hereafter may be imposed or required.

13) Termination. In the event of Client\'s breach of any term of this Agreement, LYFFT, INC. may terminate the Agreement and cease to provide any remaining services under this Agreement. Client shall remain responsible for all sums that are due to LYFFT, INC., which shall have the right to damages against Client for all losses and costs arising from Client\'s breach of this Agreement and to all other remedies available to LYFFT, INC. at law or in equity (including, without limitation, attorneys fees, costs and expenses). Notwithstanding the foregoing, Client shall remain liable and responsible for all payment obligations under this agreement.

14) Exclusions, Omissions, Warranties. LYFFT, INC. will not be responsible to Client for any misrepresentations made by any air charter suppliers or air carriers, whether on LYFFT, INC.\'s website or other promotional material or otherwise. Any exclusions or omissions by any air charter suppliers or air carriers, whether express or implied, are not the responsibility of LYFFT, INC.. LYFFT, INC. makes no representations or warranties of any kind, either express or implied, as to any matter including without limitation, implied warranties of fitness of particular purpose, merchantability or otherwise.

15) Severability. If any provision of this Agreement or compliance by any of the parties with any provision of this Agreement constitutes a violation of any law, or is or becomes unenforceable or void, then such provision, to the extent only that it is in violation of law, unenforceable or void, shall be deemed modified to the extent necessary so that it is no longer in violation of law, unenforceable or void, and such provision will be enforced to the fullest extent permitted by law. If such modification is not possible, said provision, to the extent that it is in violation of law, unenforceable or void, shall be deemed severable from the remaining provisions of this Agreement, which provisions will remain binding on the parties.
			
16) Waivers. No failure on the part of either LYFFT, INC. or Client to exercise, and no delay in exercising, any right or remedy hereunder will operate as a waiver thereof; nor will any single or partial waiver of a breach of any provision of this Agreement operate or be construed as a waiver of any subsequent breach; nor will any single or partial exercise of any right or remedy hereunder preclude any other or further exercise thereof or the exercise of any other right or remedy granted hereby or by law.
			
17) Indemnification. Client agrees to save, indemnify, hold harmless and defend the LYFFT, INC. Parties, from and against any and all actions, causes, claims, damages, losses, penalties, demands, obligations or liabilities, expenses or disbursements (including without limitation, reasonable costs and attorney\'s fees) against any loss, damage or expense incurred by LYFFT, INC. by reason of any action or omission of Client, its agents, employees, guests, invitees, passengers, or family members arising from or relating to this Agreement. Furthermore, Client agrees to pay for any damage to the charter aircraft caused by Client, its agents, employees, guests, invitees, passengers, or family members, excluding normal wear and tear to charter aircraft.
			
18) Dispute Resolution/Governing Law. Any claim arising out of Client\'s failure to pay for services rendered or any other amounts due and owing or claims under this Agreement shall be (i) resolved exclusively in the Courts in the State of New York, County of Suffolk, and (ii)be construed, interpreted and enforced in accordance with, and shall be governed by the laws of the State of New York, both procedural and substantive, without regard to the principles of conflicts of laws. Client hereby submits to voluntary jurisdiction in the Courts in the State of New York, County of Suffolk and waves its rights to (i) assert any counterclaim against the LYFFT, INC. Parties, and (ii) claim inconvenient forum.

19) Jurisdiction and Venue. The parties expressly agree and consent to the jurisdiction and venue of the Courts of the State of New York relating to interpretation and the enforcement of this Agreement in any litigation between the parties hereto. Any process involving the Courts or the judiciary shall have as the exclusive place of venue the Supreme Court of the State of New York, Suffolk County and the parties\' consent that this venue is convenient, reasonable and acceptable.

20) Entire Agreement. This agreement constitutes the entire agreement and understanding of the Parties and no amendment, modification or waiver of any provision herein shall be effective unless in writing and executed by LYFFT, INC. and Client. Any and all prior agreements, understandings and representations are hereby terminated and cancelled in their entirety and are of no further force and effect. Any terms and conditions contained within the Charter Itinerary are incorporated by reference herein. Each party acknowledges that no other, or any agent or attorney of any other party, has made any promise, representation or warranty whatsoever, express or implied, not contained in this Agreement concerning its subject matter, to induce such party to enter into the Agreement, and acknowledges that it has not executed this Agreement in reliance on any such promise, representation or warranty, and that there are no other agreements or understandings relating to this Agreement that are not contained in this Agreement.

21) Assignability. This Agreement is binding upon Client and may not be assigned by Client.

22) Counterparts. This Agreement may be executed in on or more counterparts, each of which shall be deemed to be duplicate originals, and one of the same Agreement. Facsimile/Digital signatures shall be considered original, legal and binding signature. By signing this Agreement, Client hereby agrees to all terms and conditions herein for the purposes of each and every flight chartered and/or arranged for Client by LYFFT, INC. until Client is notified by LYFFT, INC. of a change of terms.';
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(array('agree','required','requiredValue'=>1,'message'=>'You must accept term to use our service'));
	}
	
	/**
	 *
	 * @return array relational rules.
	 */
	public function relations(){
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels(){
		return array('agree'=>' I accept the contract terms');
	}
	
	/**
	 * Declares attribute labels.
	 */
	public function getText(){
		$textStr = $this->pre . $this->username . $this->post;
		return $textStr;
	}
	public function setUsername($username){
		$this->username = $username;
	}
}
