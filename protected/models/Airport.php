<?php

/**
 * This is the model class for table "airport".
 *
 * The followings are the available columns in table 'airport':
 * 
 * @property integer $id
 * @property string $site_number
 * @property string $type
 * @property string $location_id
 * @property string $effective_date
 * @property string $region
 * @property string $district_office
 * @property string $state
 * @property string $state_name
 * @property string $county
 * @property string $county_state
 * @property string $city
 * @property string $facility_name
 * @property string $ownership
 * @property string $use
 * @property string $owner
 * @property string $owner_address
 * @property string $owner_csz
 * @property string $owner_phone
 * @property string $manager
 * @property string $manager_address
 * @property string $manager_csz
 * @property string $manager_phone
 * @property string $arp_latitude
 * @property string $arp_latitude_s
 * @property string $arp_longitude
 * @property string $arp_longitude_s
 * @property string $arp_method
 * @property integer $arp_elevation
 * @property string $arp_elevation_method
 * @property string $magnetic_variation
 * @property integer $magnetic_variation_year
 * @property integer $traffic_pattern_altitude
 * @property string $chart_name
 * @property integer $distance_from_cbd
 * @property string $direction_from_cbd
 * @property integer $land_area_covered_by_airport
 * @property string $boundary_art_cc_id
 * @property string $boundary_art_cc_computer_id
 * @property string $boundary_art_cc_name
 * @property string $responsible_art_cc_id
 * @property string $responsible_art_cc_computer_id
 * @property string $responsible_art_cc_name
 * @property string $tie_in_fss
 * @property string $tie_in_fss_id
 * @property string $tie_in_fss_name
 * @property string $airport_to_fss_phone_number
 * @property string $tie_in_fss_toll_free_number
 * @property string $alternate_fss_id
 * @property string $alternate_fss_name
 * @property string $alternate_fss_toll_free_number
 * @property string $notam_facility_id
 * @property string $notam_service
 * @property string $activiation_date
 * @property string $airport_status_code
 * @property string $certification_type_date
 * @property string $federal_agreements
 * @property string $airspace_determination
 * @property string $customs_airport_of_entry
 * @property string $customs_landing_rights
 * @property string $military_joint_use
 * @property string $military_landing_rights
 * @property string $inspection_method
 * @property string $inspection_group
 * @property string $last_inspection_date
 * @property string $last_owner_information_date
 * @property string $fuel_types
 * @property string $airframe_repair
 * @property string $power_plant_pepair
 * @property string $bottled_oxygen_type
 * @property string $bulk_oxygen_type
 * @property string $lighting_schedule
 * @property string $beacon_schedule
 * @property string $atct
 * @property string $unicom_frequencies
 * @property string $ctaf_frequency
 * @property string $segmented_circle
 * @property string $beacon_color
 * @property string $non_commercial_landing_fee
 * @property string $medical_use
 * @property integer $single_engine_ga
 * @property integer $multi_engine_ga
 * @property integer $jet_engine_ga
 * @property integer $helicopters_ga
 * @property integer $gliders_operational
 * @property integer $military_operational
 * @property integer $ultralights
 * @property integer $operations_commercial
 * @property integer $operations_commuter
 * @property integer $operations_air_taxi
 * @property integer $operations_ga_local
 * @property integer $operations_ga_itin
 * @property integer $operations_military
 * @property string $operations_date
 * @property string $airport_position_source
 * @property string $airport_position_source_date
 * @property string $airport_elevation_source
 * @property string $airport_elevation_source_date
 * @property string $contract_fuel_available
 * @property string $transient_storage
 * @property string $other_services
 * @property string $wind_indicator
 * @property string $icao_identifier
 * @property string $beacon_schedule_alt
 * @property decimal $latitude_dd
 * @property decimal $longitude_dd
 */
class Airport extends CActiveRecord{
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'airport';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(array('site_number, type, location_id, effective_date, region, district_office, state, state_name, county, county_state, city, facility_name, ownership, use, owner, owner_address, owner_csz, owner_phone, manager, manager_address, manager_csz, manager_phone, arp_latitude, arp_latitude_s, arp_longitude, arp_longitude_s, arp_method, arp_elevation, arp_elevation_method, magnetic_variation, magnetic_variation_year, traffic_pattern_altitude, chart_name, distance_from_cbd, direction_from_cbd, land_area_covered_by_airport, boundary_art_cc_id, boundary_art_cc_computer_id, boundary_art_cc_name, responsible_art_cc_id, responsible_art_cc_computer_id, responsible_art_cc_name, tie_in_fss, tie_in_fss_id, tie_in_fss_name, airport_to_fss_phone_number, tie_in_fss_toll_free_number, alternate_fss_id, alternate_fss_name, alternate_fss_toll_free_number, notam_facility_id, notam_service, activiation_date, airport_status_code, certification_type_date, federal_agreements, airspace_determination, customs_airport_of_entry, customs_landing_rights, military_joint_use, military_landing_rights, inspection_method, inspection_group, last_inspection_date, last_owner_information_date, fuel_types, airframe_repair, power_plant_pepair, bottled_oxygen_type, bulk_oxygen_type, lighting_schedule, beacon_schedule, atct, unicom_frequencies, ctaf_frequency, segmented_circle, beacon_color, non_commercial_landing_fee, medical_use, single_engine_ga, multi_engine_ga, jet_engine_ga, helicopters_ga, gliders_operational, military_operational, ultralights, operations_commercial, operations_commuter, operations_air_taxi, operations_ga_local, operations_ga_itin, operations_military, operations_date, airport_position_source, airport_position_source_date, airport_elevation_source, airport_elevation_source_date, contract_fuel_available, transient_storage, other_services, wind_indicator, icao_identifier, beacon_schedule_alt, latitude_dd, longitude_dd','required'),array('arp_elevation, magnetic_variation_year, traffic_pattern_altitude, distance_from_cbd, land_area_covered_by_airport, single_engine_ga, multi_engine_ga, jet_engine_ga, helicopters_ga, gliders_operational, military_operational, ultralights, operations_commercial, operations_commuter, operations_air_taxi, operations_ga_local, operations_ga_itin, operations_military','numerical','integerOnly'=>true),array('site_number, type, owner_phone, manager_phone, arp_latitude, arp_latitude_s, arp_longitude, arp_longitude_s','length','max'=>20),array('location_id, ctaf_frequency','length','max'=>6),array('latitude_dd, longitude_dd','numerical'),array('region, magnetic_variation, direction_from_cbd, boundary_art_cc_id, boundary_art_cc_computer_id, responsible_art_cc_id, responsible_art_cc_computer_id, tie_in_fss_id, alternate_fss_id, beacon_color','length','max'=>3),array('district_office, notam_facility_id, segmented_circle, icao_identifier','length','max'=>4),array('state, county_state, ownership, use, airport_status_code','length','max'=>2),array('state_name, county, airport_to_fss_phone_number, tie_in_fss_toll_free_number, alternate_fss_toll_free_number','length','max'=>30),array('city','length','max'=>40),array('facility_name, chart_name, boundary_art_cc_name, responsible_art_cc_name, tie_in_fss_name, alternate_fss_name, certification_type_date, airspace_determination, fuel_types, unicom_frequencies, airport_position_source, airport_elevation_source, transient_storage','length','max'=>50),array('owner, owner_address, owner_csz, manager, manager_address, manager_csz, other_services','length','max'=>100),array('arp_method, arp_elevation_method, tie_in_fss, notam_service, customs_airport_of_entry, customs_landing_rights, military_joint_use, military_landing_rights, inspection_method, inspection_group, atct, non_commercial_landing_fee, medical_use, contract_fuel_available','length','max'=>1),array('federal_agreements, bottled_oxygen_type, bulk_oxygen_type, lighting_schedule, beacon_schedule, beacon_schedule_alt','length','max'=>25),array('last_inspection_date, last_owner_information_date','length','max'=>8),array('airframe_repair, power_plant_pepair, wind_indicator','length','max'=>10),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id, site_number, type, location_id, effective_date, region, district_office, state, state_name, county, county_state, city, facility_name, ownership, use, owner, owner_address, owner_csz, owner_phone, manager, manager_address, manager_csz, manager_phone, arp_latitude, arp_latitude_s, arp_longitude, arp_longitude_s, arp_method, arp_elevation, arp_elevation_method, magnetic_variation, magnetic_variation_year, traffic_pattern_altitude, chart_name, distance_from_cbd, direction_from_cbd, land_area_covered_by_airport, boundary_art_cc_id, boundary_art_cc_computer_id, boundary_art_cc_name, responsible_art_cc_id, responsible_art_cc_computer_id, responsible_art_cc_name, tie_in_fss, tie_in_fss_id, tie_in_fss_name, airport_to_fss_phone_number, tie_in_fss_toll_free_number, alternate_fss_id, alternate_fss_name, alternate_fss_toll_free_number, notam_facility_id, notam_service, activiation_date, airport_status_code, certification_type_date, federal_agreements, airspace_determination, customs_airport_of_entry, customs_landing_rights, military_joint_use, military_landing_rights, inspection_method, inspection_group, last_inspection_date, last_owner_information_date, fuel_types, airframe_repair, power_plant_pepair, bottled_oxygen_type, bulk_oxygen_type, lighting_schedule, beacon_schedule, atct, unicom_frequencies, ctaf_frequency, segmented_circle, beacon_color, non_commercial_landing_fee, medical_use, single_engine_ga, multi_engine_ga, jet_engine_ga, helicopters_ga, gliders_operational, military_operational, ultralights, operations_commercial, operations_commuter, operations_air_taxi, operations_ga_local, operations_ga_itin, operations_military, operations_date, airport_position_source, airport_position_source_date, airport_elevation_source, airport_elevation_source_date, contract_fuel_available, transient_storage, other_services, wind_indicator, icao_identifier, beacon_schedule_alt, latitude_dd, longitude_dd','safe','on'=>'search'));
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
		return array('id'=>'ID','site_number'=>'Site Number','type'=>'Type','location_id'=>'Location','effective_date'=>'Effective Date','region'=>'Region','district_office'=>'District Office','state'=>'State','state_name'=>'State Name','county'=>'County','county_state'=>'County State','city'=>'City','facility_name'=>'Facility Name','ownership'=>'Ownership','use'=>'Use','owner'=>'Owner','owner_address'=>'Owner Address','owner_csz'=>'Owner Csz','owner_phone'=>'Owner Phone','manager'=>'Manager','manager_address'=>'Manager Address','manager_csz'=>'Manager Csz','manager_phone'=>'Manager Phone','arp_latitude'=>'Arp Latitude','arp_latitude_s'=>'Arp Latitude S','arp_longitude'=>'Arp Longitude','arp_longitude_s'=>'Arp Longitude S','arp_method'=>'Arp Method','arp_elevation'=>'Arp Elevation','arp_elevation_method'=>'Arp Elevation Method','magnetic_variation'=>'Magnetic Variation','magnetic_variation_year'=>'Magnetic Variation Year','traffic_pattern_altitude'=>'Traffic Pattern Altitude','chart_name'=>'Chart Name','distance_from_cbd'=>'Distance From Cbd','direction_from_cbd'=>'Direction From Cbd','land_area_covered_by_airport'=>'Land Area Covered By Airport','boundary_art_cc_id'=>'Boundary Art Cc','boundary_art_cc_computer_id'=>'Boundary Art Cc Computer','boundary_art_cc_name'=>'Boundary Art Cc Name','responsible_art_cc_id'=>'Responsible Art Cc','responsible_art_cc_computer_id'=>'Responsible Art Cc Computer','responsible_art_cc_name'=>'Responsible Art Cc Name','tie_in_fss'=>'Tie In Fss','tie_in_fss_id'=>'Tie In Fss','tie_in_fss_name'=>'Tie In Fss Name','airport_to_fss_phone_number'=>'Airport To Fss Phone Number','tie_in_fss_toll_free_number'=>'Tie In Fss Toll Free Number','alternate_fss_id'=>'Alternate Fss','alternate_fss_name'=>'Alternate Fss Name','alternate_fss_toll_free_number'=>'Alternate Fss Toll Free Number','notam_facility_id'=>'Notam Facility','notam_service'=>'Notam Service','activiation_date'=>'Activiation Date','airport_status_code'=>'Airport Status Code','certification_type_date'=>'Certification Type Date','federal_agreements'=>'Federal Agreements','airspace_determination'=>'Airspace Determination','customs_airport_of_entry'=>'Customs Airport Of Entry','customs_landing_rights'=>'Customs Landing Rights','military_joint_use'=>'Military Joint Use','military_landing_rights'=>'Military Landing Rights','inspection_method'=>'Inspection Method','inspection_group'=>'Inspection Group','last_inspection_date'=>'Last Inspection Date','last_owner_information_date'=>'Last Owner Information Date','fuel_types'=>'Fuel Types','airframe_repair'=>'Airframe Repair','power_plant_pepair'=>'Power Plant Pepair','bottled_oxygen_type'=>'Bottled Oxygen Type','bulk_oxygen_type'=>'Bulk Oxygen Type','lighting_schedule'=>'Lighting Schedule','beacon_schedule'=>'Beacon Schedule','atct'=>'Atct','unicom_frequencies'=>'Unicom Frequencies','ctaf_frequency'=>'Ctaf Frequency','segmented_circle'=>'Segmented Circle','beacon_color'=>'Beacon Color','non_commercial_landing_fee'=>'Non Commercial Landing Fee','medical_use'=>'Medical Use','single_engine_ga'=>'Single Engine Ga','multi_engine_ga'=>'Multi Engine Ga','jet_engine_ga'=>'Jet Engine Ga','helicopters_ga'=>'Helicopters Ga','gliders_operational'=>'Gliders Operational','military_operational'=>'Military Operational','ultralights'=>'Ultralights','operations_commercial'=>'Operations Commercial','operations_commuter'=>'Operations Commuter','operations_air_taxi'=>'Operations Air Taxi','operations_ga_local'=>'Operations Ga Local','operations_ga_itin'=>'Operations Ga Itin','operations_military'=>'Operations Military','operations_date'=>'Operations Date','airport_position_source'=>'Airport Position Source','airport_position_source_date'=>'Airport Position Source Date','airport_elevation_source'=>'Airport Elevation Source','airport_elevation_source_date'=>'Airport Elevation Source Date','contract_fuel_available'=>'Contract Fuel Available','transient_storage'=>'Transient Storage','other_services'=>'Other Services','wind_indicator'=>'Wind Indicator','icao_identifier'=>'Icao Identifier','beacon_schedule_alt'=>'Beacon Schedule Alt','latitude_dd'=>'Latitude DD','longitude_dd'=>'Longitude DD');
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 *         based on the search/filter conditions.
	 */
	public function search(){
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria = new CDbCriteria();
		
		$criteria->compare('id', $this->id);
		$criteria->compare('site_number', $this->site_number, true);
		$criteria->compare('type', $this->type, true);
		$criteria->compare('location_id', $this->location_id, true);
		$criteria->compare('effective_date', $this->effective_date, true);
		$criteria->compare('region', $this->region, true);
		$criteria->compare('district_office', $this->district_office, true);
		$criteria->compare('state', $this->state, true);
		$criteria->compare('state_name', $this->state_name, true);
		$criteria->compare('county', $this->county, true);
		$criteria->compare('county_state', $this->county_state, true);
		$criteria->compare('city', $this->city, true);
		$criteria->compare('facility_name', $this->facility_name, true);
		$criteria->compare('ownership', $this->ownership, true);
		$criteria->compare('use', $this->use, true);
		$criteria->compare('owner', $this->owner, true);
		$criteria->compare('owner_address', $this->owner_address, true);
		$criteria->compare('owner_csz', $this->owner_csz, true);
		$criteria->compare('owner_phone', $this->owner_phone, true);
		$criteria->compare('manager', $this->manager, true);
		$criteria->compare('manager_address', $this->manager_address, true);
		$criteria->compare('manager_csz', $this->manager_csz, true);
		$criteria->compare('manager_phone', $this->manager_phone, true);
		$criteria->compare('arp_latitude', $this->arp_latitude, true);
		$criteria->compare('arp_latitude_s', $this->arp_latitude_s, true);
		$criteria->compare('arp_longitude', $this->arp_longitude, true);
		$criteria->compare('arp_longitude_s', $this->arp_longitude_s, true);
		$criteria->compare('arp_method', $this->arp_method, true);
		$criteria->compare('arp_elevation', $this->arp_elevation);
		$criteria->compare('arp_elevation_method', $this->arp_elevation_method, true);
		$criteria->compare('magnetic_variation', $this->magnetic_variation, true);
		$criteria->compare('magnetic_variation_year', $this->magnetic_variation_year);
		$criteria->compare('traffic_pattern_altitude', $this->traffic_pattern_altitude);
		$criteria->compare('chart_name', $this->chart_name, true);
		$criteria->compare('distance_from_cbd', $this->distance_from_cbd);
		$criteria->compare('direction_from_cbd', $this->direction_from_cbd, true);
		$criteria->compare('land_area_covered_by_airport', $this->land_area_covered_by_airport);
		$criteria->compare('boundary_art_cc_id', $this->boundary_art_cc_id, true);
		$criteria->compare('boundary_art_cc_computer_id', $this->boundary_art_cc_computer_id, true);
		$criteria->compare('boundary_art_cc_name', $this->boundary_art_cc_name, true);
		$criteria->compare('responsible_art_cc_id', $this->responsible_art_cc_id, true);
		$criteria->compare('responsible_art_cc_computer_id', $this->responsible_art_cc_computer_id, true);
		$criteria->compare('responsible_art_cc_name', $this->responsible_art_cc_name, true);
		$criteria->compare('tie_in_fss', $this->tie_in_fss, true);
		$criteria->compare('tie_in_fss_id', $this->tie_in_fss_id, true);
		$criteria->compare('tie_in_fss_name', $this->tie_in_fss_name, true);
		$criteria->compare('airport_to_fss_phone_number', $this->airport_to_fss_phone_number, true);
		$criteria->compare('tie_in_fss_toll_free_number', $this->tie_in_fss_toll_free_number, true);
		$criteria->compare('alternate_fss_id', $this->alternate_fss_id, true);
		$criteria->compare('alternate_fss_name', $this->alternate_fss_name, true);
		$criteria->compare('alternate_fss_toll_free_number', $this->alternate_fss_toll_free_number, true);
		$criteria->compare('notam_facility_id', $this->notam_facility_id, true);
		$criteria->compare('notam_service', $this->notam_service, true);
		$criteria->compare('activiation_date', $this->activiation_date, true);
		$criteria->compare('airport_status_code', $this->airport_status_code, true);
		$criteria->compare('certification_type_date', $this->certification_type_date, true);
		$criteria->compare('federal_agreements', $this->federal_agreements, true);
		$criteria->compare('airspace_determination', $this->airspace_determination, true);
		$criteria->compare('customs_airport_of_entry', $this->customs_airport_of_entry, true);
		$criteria->compare('customs_landing_rights', $this->customs_landing_rights, true);
		$criteria->compare('military_joint_use', $this->military_joint_use, true);
		$criteria->compare('military_landing_rights', $this->military_landing_rights, true);
		$criteria->compare('inspection_method', $this->inspection_method, true);
		$criteria->compare('inspection_group', $this->inspection_group, true);
		$criteria->compare('last_inspection_date', $this->last_inspection_date, true);
		$criteria->compare('last_owner_information_date', $this->last_owner_information_date, true);
		$criteria->compare('fuel_types', $this->fuel_types, true);
		$criteria->compare('airframe_repair', $this->airframe_repair, true);
		$criteria->compare('power_plant_pepair', $this->power_plant_pepair, true);
		$criteria->compare('bottled_oxygen_type', $this->bottled_oxygen_type, true);
		$criteria->compare('bulk_oxygen_type', $this->bulk_oxygen_type, true);
		$criteria->compare('lighting_schedule', $this->lighting_schedule, true);
		$criteria->compare('beacon_schedule', $this->beacon_schedule, true);
		$criteria->compare('atct', $this->atct, true);
		$criteria->compare('unicom_frequencies', $this->unicom_frequencies, true);
		$criteria->compare('ctaf_frequency', $this->ctaf_frequency, true);
		$criteria->compare('segmented_circle', $this->segmented_circle, true);
		$criteria->compare('beacon_color', $this->beacon_color, true);
		$criteria->compare('non_commercial_landing_fee', $this->non_commercial_landing_fee, true);
		$criteria->compare('medical_use', $this->medical_use, true);
		$criteria->compare('single_engine_ga', $this->single_engine_ga);
		$criteria->compare('multi_engine_ga', $this->multi_engine_ga);
		$criteria->compare('jet_engine_ga', $this->jet_engine_ga);
		$criteria->compare('helicopters_ga', $this->helicopters_ga);
		$criteria->compare('gliders_operational', $this->gliders_operational);
		$criteria->compare('military_operational', $this->military_operational);
		$criteria->compare('ultralights', $this->ultralights);
		$criteria->compare('operations_commercial', $this->operations_commercial);
		$criteria->compare('operations_commuter', $this->operations_commuter);
		$criteria->compare('operations_air_taxi', $this->operations_air_taxi);
		$criteria->compare('operations_ga_local', $this->operations_ga_local);
		$criteria->compare('operations_ga_itin', $this->operations_ga_itin);
		$criteria->compare('operations_military', $this->operations_military);
		$criteria->compare('operations_date', $this->operations_date, true);
		$criteria->compare('airport_position_source', $this->airport_position_source, true);
		$criteria->compare('airport_position_source_date', $this->airport_position_source_date, true);
		$criteria->compare('airport_elevation_source', $this->airport_elevation_source, true);
		$criteria->compare('airport_elevation_source_date', $this->airport_elevation_source_date, true);
		$criteria->compare('contract_fuel_available', $this->contract_fuel_available, true);
		$criteria->compare('transient_storage', $this->transient_storage, true);
		$criteria->compare('other_services', $this->other_services, true);
		$criteria->compare('wind_indicator', $this->wind_indicator, true);
		$criteria->compare('icao_identifier', $this->icao_identifier, true);
		$criteria->compare('beacon_schedule_alt', $this->beacon_schedule_alt, true);
		$criteria->compare('latitude_dd', $this->latitude_dd, true);
		$criteria->compare('longitude_dd', $this->longitude_dd, true);
		
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        active record class name.
	 * @return Airport the static model class
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
}
