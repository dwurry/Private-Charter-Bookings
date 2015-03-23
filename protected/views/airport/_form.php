<?php
/* @var $this AirportController */
/* @var $model Airport */
/* @var $form CActiveForm */
?>

<div class="form">

<?php

$form = $this->beginWidget('CActiveForm', array('id'=>'airport-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false));
?>

	<p class="note">
		Fields with <span class="required">*</span> are required.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'site_number'); ?>
		<?php echo $form->textField($model,'site_number',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'site_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location_id'); ?>
		<?php echo $form->textField($model,'location_id',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'location_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'effective_date'); ?>
		<?php echo $form->textField($model,'effective_date'); ?>
		<?php echo $form->error($model,'effective_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'region'); ?>
		<?php echo $form->textField($model,'region',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'region'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'district_office'); ?>
		<?php echo $form->textField($model,'district_office',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'district_office'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state_name'); ?>
		<?php echo $form->textField($model,'state_name',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'state_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'county'); ?>
		<?php echo $form->textField($model,'county',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'county'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'county_state'); ?>
		<?php echo $form->textField($model,'county_state',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'county_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facility_name'); ?>
		<?php echo $form->textField($model,'facility_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'facility_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ownership'); ?>
		<?php echo $form->textField($model,'ownership',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'ownership'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'use'); ?>
		<?php echo $form->textField($model,'use',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'use'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'owner'); ?>
		<?php echo $form->textField($model,'owner',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'owner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'owner_address'); ?>
		<?php echo $form->textField($model,'owner_address',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'owner_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'owner_csz'); ?>
		<?php echo $form->textField($model,'owner_csz',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'owner_csz'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'owner_phone'); ?>
		<?php echo $form->textField($model,'owner_phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'owner_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manager'); ?>
		<?php echo $form->textField($model,'manager',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'manager'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manager_address'); ?>
		<?php echo $form->textField($model,'manager_address',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'manager_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manager_csz'); ?>
		<?php echo $form->textField($model,'manager_csz',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'manager_csz'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manager_phone'); ?>
		<?php echo $form->textField($model,'manager_phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'manager_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arp_latitude'); ?>
		<?php echo $form->textField($model,'arp_latitude',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'arp_latitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arp_latitude_s'); ?>
		<?php echo $form->textField($model,'arp_latitude_s',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'arp_latitude_s'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arp_longitude'); ?>
		<?php echo $form->textField($model,'arp_longitude',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'arp_longitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arp_longitude_s'); ?>
		<?php echo $form->textField($model,'arp_longitude_s',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'arp_longitude_s'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arp_method'); ?>
		<?php echo $form->textField($model,'arp_method',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'arp_method'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arp_elevation'); ?>
		<?php echo $form->textField($model,'arp_elevation'); ?>
		<?php echo $form->error($model,'arp_elevation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arp_elevation_method'); ?>
		<?php echo $form->textField($model,'arp_elevation_method',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'arp_elevation_method'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'magnetic_variation'); ?>
		<?php echo $form->textField($model,'magnetic_variation',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'magnetic_variation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'magnetic_variation_year'); ?>
		<?php echo $form->textField($model,'magnetic_variation_year'); ?>
		<?php echo $form->error($model,'magnetic_variation_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'traffic_pattern_altitude'); ?>
		<?php echo $form->textField($model,'traffic_pattern_altitude'); ?>
		<?php echo $form->error($model,'traffic_pattern_altitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chart_name'); ?>
		<?php echo $form->textField($model,'chart_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'chart_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'distance_from_cbd'); ?>
		<?php echo $form->textField($model,'distance_from_cbd'); ?>
		<?php echo $form->error($model,'distance_from_cbd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direction_from_cbd'); ?>
		<?php echo $form->textField($model,'direction_from_cbd',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'direction_from_cbd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'land_area_covered_by_airport'); ?>
		<?php echo $form->textField($model,'land_area_covered_by_airport'); ?>
		<?php echo $form->error($model,'land_area_covered_by_airport'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'boundary_art_cc_id'); ?>
		<?php echo $form->textField($model,'boundary_art_cc_id',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'boundary_art_cc_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'boundary_art_cc_computer_id'); ?>
		<?php echo $form->textField($model,'boundary_art_cc_computer_id',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'boundary_art_cc_computer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'boundary_art_cc_name'); ?>
		<?php echo $form->textField($model,'boundary_art_cc_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'boundary_art_cc_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'responsible_art_cc_id'); ?>
		<?php echo $form->textField($model,'responsible_art_cc_id',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'responsible_art_cc_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'responsible_art_cc_computer_id'); ?>
		<?php echo $form->textField($model,'responsible_art_cc_computer_id',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'responsible_art_cc_computer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'responsible_art_cc_name'); ?>
		<?php echo $form->textField($model,'responsible_art_cc_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'responsible_art_cc_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tie_in_fss'); ?>
		<?php echo $form->textField($model,'tie_in_fss',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tie_in_fss'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tie_in_fss_id'); ?>
		<?php echo $form->textField($model,'tie_in_fss_id',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'tie_in_fss_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tie_in_fss_name'); ?>
		<?php echo $form->textField($model,'tie_in_fss_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'tie_in_fss_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'airport_to_fss_phone_number'); ?>
		<?php echo $form->textField($model,'airport_to_fss_phone_number',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'airport_to_fss_phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tie_in_fss_toll_free_number'); ?>
		<?php echo $form->textField($model,'tie_in_fss_toll_free_number',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'tie_in_fss_toll_free_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alternate_fss_id'); ?>
		<?php echo $form->textField($model,'alternate_fss_id',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'alternate_fss_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alternate_fss_name'); ?>
		<?php echo $form->textField($model,'alternate_fss_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'alternate_fss_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alternate_fss_toll_free_number'); ?>
		<?php echo $form->textField($model,'alternate_fss_toll_free_number',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'alternate_fss_toll_free_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notam_facility_id'); ?>
		<?php echo $form->textField($model,'notam_facility_id',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'notam_facility_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notam_service'); ?>
		<?php echo $form->textField($model,'notam_service',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'notam_service'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activiation_date'); ?>
		<?php echo $form->textField($model,'activiation_date'); ?>
		<?php echo $form->error($model,'activiation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'airport_status_code'); ?>
		<?php echo $form->textField($model,'airport_status_code',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'airport_status_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'certification_type_date'); ?>
		<?php echo $form->textField($model,'certification_type_date',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'certification_type_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'federal_agreements'); ?>
		<?php echo $form->textField($model,'federal_agreements',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'federal_agreements'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'airspace_determination'); ?>
		<?php echo $form->textField($model,'airspace_determination',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'airspace_determination'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customs_airport_of_entry'); ?>
		<?php echo $form->textField($model,'customs_airport_of_entry',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'customs_airport_of_entry'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customs_landing_rights'); ?>
		<?php echo $form->textField($model,'customs_landing_rights',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'customs_landing_rights'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'military_joint_use'); ?>
		<?php echo $form->textField($model,'military_joint_use',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'military_joint_use'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'military_landing_rights'); ?>
		<?php echo $form->textField($model,'military_landing_rights',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'military_landing_rights'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inspection_method'); ?>
		<?php echo $form->textField($model,'inspection_method',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'inspection_method'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inspection_group'); ?>
		<?php echo $form->textField($model,'inspection_group',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'inspection_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_inspection_date'); ?>
		<?php echo $form->textField($model,'last_inspection_date',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'last_inspection_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_owner_information_date'); ?>
		<?php echo $form->textField($model,'last_owner_information_date',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'last_owner_information_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fuel_types'); ?>
		<?php echo $form->textField($model,'fuel_types',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'fuel_types'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'airframe_repair'); ?>
		<?php echo $form->textField($model,'airframe_repair',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'airframe_repair'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'power_plant_pepair'); ?>
		<?php echo $form->textField($model,'power_plant_pepair',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'power_plant_pepair'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bottled_oxygen_type'); ?>
		<?php echo $form->textField($model,'bottled_oxygen_type',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'bottled_oxygen_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bulk_oxygen_type'); ?>
		<?php echo $form->textField($model,'bulk_oxygen_type',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'bulk_oxygen_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lighting_schedule'); ?>
		<?php echo $form->textField($model,'lighting_schedule',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'lighting_schedule'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beacon_schedule'); ?>
		<?php echo $form->textField($model,'beacon_schedule',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'beacon_schedule'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'atct'); ?>
		<?php echo $form->textField($model,'atct',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'atct'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unicom_frequencies'); ?>
		<?php echo $form->textField($model,'unicom_frequencies',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'unicom_frequencies'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ctaf_frequency'); ?>
		<?php echo $form->textField($model,'ctaf_frequency',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'ctaf_frequency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'segmented_circle'); ?>
		<?php echo $form->textField($model,'segmented_circle',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'segmented_circle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beacon_color'); ?>
		<?php echo $form->textField($model,'beacon_color',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'beacon_color'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'non_commercial_landing_fee'); ?>
		<?php echo $form->textField($model,'non_commercial_landing_fee',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'non_commercial_landing_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'medical_use'); ?>
		<?php echo $form->textField($model,'medical_use',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'medical_use'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'single_engine_ga'); ?>
		<?php echo $form->textField($model,'single_engine_ga'); ?>
		<?php echo $form->error($model,'single_engine_ga'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'multi_engine_ga'); ?>
		<?php echo $form->textField($model,'multi_engine_ga'); ?>
		<?php echo $form->error($model,'multi_engine_ga'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jet_engine_ga'); ?>
		<?php echo $form->textField($model,'jet_engine_ga'); ?>
		<?php echo $form->error($model,'jet_engine_ga'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'helicopters_ga'); ?>
		<?php echo $form->textField($model,'helicopters_ga'); ?>
		<?php echo $form->error($model,'helicopters_ga'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gliders_operational'); ?>
		<?php echo $form->textField($model,'gliders_operational'); ?>
		<?php echo $form->error($model,'gliders_operational'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'military_operational'); ?>
		<?php echo $form->textField($model,'military_operational'); ?>
		<?php echo $form->error($model,'military_operational'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ultralights'); ?>
		<?php echo $form->textField($model,'ultralights'); ?>
		<?php echo $form->error($model,'ultralights'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operations_commercial'); ?>
		<?php echo $form->textField($model,'operations_commercial'); ?>
		<?php echo $form->error($model,'operations_commercial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operations_commuter'); ?>
		<?php echo $form->textField($model,'operations_commuter'); ?>
		<?php echo $form->error($model,'operations_commuter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operations_air_taxi'); ?>
		<?php echo $form->textField($model,'operations_air_taxi'); ?>
		<?php echo $form->error($model,'operations_air_taxi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operations_ga_local'); ?>
		<?php echo $form->textField($model,'operations_ga_local'); ?>
		<?php echo $form->error($model,'operations_ga_local'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operations_ga_itin'); ?>
		<?php echo $form->textField($model,'operations_ga_itin'); ?>
		<?php echo $form->error($model,'operations_ga_itin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operations_military'); ?>
		<?php echo $form->textField($model,'operations_military'); ?>
		<?php echo $form->error($model,'operations_military'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operations_date'); ?>
		<?php echo $form->textField($model,'operations_date'); ?>
		<?php echo $form->error($model,'operations_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'airport_position_source'); ?>
		<?php echo $form->textField($model,'airport_position_source',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'airport_position_source'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'airport_position_source_date'); ?>
		<?php echo $form->textField($model,'airport_position_source_date'); ?>
		<?php echo $form->error($model,'airport_position_source_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'airport_elevation_source'); ?>
		<?php echo $form->textField($model,'airport_elevation_source',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'airport_elevation_source'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'airport_elevation_source_date'); ?>
		<?php echo $form->textField($model,'airport_elevation_source_date'); ?>
		<?php echo $form->error($model,'airport_elevation_source_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_fuel_available'); ?>
		<?php echo $form->textField($model,'contract_fuel_available',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'contract_fuel_available'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transient_storage'); ?>
		<?php echo $form->textField($model,'transient_storage',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'transient_storage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_services'); ?>
		<?php echo $form->textField($model,'other_services',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'other_services'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wind_indicator'); ?>
		<?php echo $form->textField($model,'wind_indicator',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'wind_indicator'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'icao_identifier'); ?>
		<?php echo $form->textField($model,'icao_identifier',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'icao_identifier'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beacon_schedule_alt'); ?>
		<?php echo $form->textField($model,'beacon_schedule_alt',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'beacon_schedule_alt'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->