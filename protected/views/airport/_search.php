<?php
/* @var $this AirportController */
/* @var $model Airport */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php

$form = $this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl($this->route),'method'=>'get'));
?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_number'); ?>
		<?php echo $form->textField($model,'site_number',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location_id'); ?>
		<?php echo $form->textField($model,'location_id',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'effective_date'); ?>
		<?php echo $form->textField($model,'effective_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'region'); ?>
		<?php echo $form->textField($model,'region',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'district_office'); ?>
		<?php echo $form->textField($model,'district_office',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'state_name'); ?>
		<?php echo $form->textField($model,'state_name',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'county'); ?>
		<?php echo $form->textField($model,'county',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'county_state'); ?>
		<?php echo $form->textField($model,'county_state',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'facility_name'); ?>
		<?php echo $form->textField($model,'facility_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ownership'); ?>
		<?php echo $form->textField($model,'ownership',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'use'); ?>
		<?php echo $form->textField($model,'use',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'owner'); ?>
		<?php echo $form->textField($model,'owner',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'owner_address'); ?>
		<?php echo $form->textField($model,'owner_address',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'owner_csz'); ?>
		<?php echo $form->textField($model,'owner_csz',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'owner_phone'); ?>
		<?php echo $form->textField($model,'owner_phone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'manager'); ?>
		<?php echo $form->textField($model,'manager',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'manager_address'); ?>
		<?php echo $form->textField($model,'manager_address',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'manager_csz'); ?>
		<?php echo $form->textField($model,'manager_csz',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'manager_phone'); ?>
		<?php echo $form->textField($model,'manager_phone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'arp_latitude'); ?>
		<?php echo $form->textField($model,'arp_latitude',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'arp_latitude_s'); ?>
		<?php echo $form->textField($model,'arp_latitude_s',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'arp_longitude'); ?>
		<?php echo $form->textField($model,'arp_longitude',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'arp_longitude_s'); ?>
		<?php echo $form->textField($model,'arp_longitude_s',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'arp_method'); ?>
		<?php echo $form->textField($model,'arp_method',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'arp_elevation'); ?>
		<?php echo $form->textField($model,'arp_elevation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'arp_elevation_method'); ?>
		<?php echo $form->textField($model,'arp_elevation_method',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'magnetic_variation'); ?>
		<?php echo $form->textField($model,'magnetic_variation',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'magnetic_variation_year'); ?>
		<?php echo $form->textField($model,'magnetic_variation_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'traffic_pattern_altitude'); ?>
		<?php echo $form->textField($model,'traffic_pattern_altitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chart_name'); ?>
		<?php echo $form->textField($model,'chart_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'distance_from_cbd'); ?>
		<?php echo $form->textField($model,'distance_from_cbd'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'direction_from_cbd'); ?>
		<?php echo $form->textField($model,'direction_from_cbd',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'land_area_covered_by_airport'); ?>
		<?php echo $form->textField($model,'land_area_covered_by_airport'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'boundary_art_cc_id'); ?>
		<?php echo $form->textField($model,'boundary_art_cc_id',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'boundary_art_cc_computer_id'); ?>
		<?php echo $form->textField($model,'boundary_art_cc_computer_id',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'boundary_art_cc_name'); ?>
		<?php echo $form->textField($model,'boundary_art_cc_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'responsible_art_cc_id'); ?>
		<?php echo $form->textField($model,'responsible_art_cc_id',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'responsible_art_cc_computer_id'); ?>
		<?php echo $form->textField($model,'responsible_art_cc_computer_id',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'responsible_art_cc_name'); ?>
		<?php echo $form->textField($model,'responsible_art_cc_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tie_in_fss'); ?>
		<?php echo $form->textField($model,'tie_in_fss',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tie_in_fss_id'); ?>
		<?php echo $form->textField($model,'tie_in_fss_id',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tie_in_fss_name'); ?>
		<?php echo $form->textField($model,'tie_in_fss_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'airport_to_fss_phone_number'); ?>
		<?php echo $form->textField($model,'airport_to_fss_phone_number',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tie_in_fss_toll_free_number'); ?>
		<?php echo $form->textField($model,'tie_in_fss_toll_free_number',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alternate_fss_id'); ?>
		<?php echo $form->textField($model,'alternate_fss_id',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alternate_fss_name'); ?>
		<?php echo $form->textField($model,'alternate_fss_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alternate_fss_toll_free_number'); ?>
		<?php echo $form->textField($model,'alternate_fss_toll_free_number',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notam_facility_id'); ?>
		<?php echo $form->textField($model,'notam_facility_id',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notam_service'); ?>
		<?php echo $form->textField($model,'notam_service',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activiation_date'); ?>
		<?php echo $form->textField($model,'activiation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'airport_status_code'); ?>
		<?php echo $form->textField($model,'airport_status_code',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'certification_type_date'); ?>
		<?php echo $form->textField($model,'certification_type_date',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'federal_agreements'); ?>
		<?php echo $form->textField($model,'federal_agreements',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'airspace_determination'); ?>
		<?php echo $form->textField($model,'airspace_determination',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customs_airport_of_entry'); ?>
		<?php echo $form->textField($model,'customs_airport_of_entry',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customs_landing_rights'); ?>
		<?php echo $form->textField($model,'customs_landing_rights',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'military_joint_use'); ?>
		<?php echo $form->textField($model,'military_joint_use',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'military_landing_rights'); ?>
		<?php echo $form->textField($model,'military_landing_rights',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inspection_method'); ?>
		<?php echo $form->textField($model,'inspection_method',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inspection_group'); ?>
		<?php echo $form->textField($model,'inspection_group',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_inspection_date'); ?>
		<?php echo $form->textField($model,'last_inspection_date',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_owner_information_date'); ?>
		<?php echo $form->textField($model,'last_owner_information_date',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fuel_types'); ?>
		<?php echo $form->textField($model,'fuel_types',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'airframe_repair'); ?>
		<?php echo $form->textField($model,'airframe_repair',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'power_plant_pepair'); ?>
		<?php echo $form->textField($model,'power_plant_pepair',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bottled_oxygen_type'); ?>
		<?php echo $form->textField($model,'bottled_oxygen_type',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bulk_oxygen_type'); ?>
		<?php echo $form->textField($model,'bulk_oxygen_type',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lighting_schedule'); ?>
		<?php echo $form->textField($model,'lighting_schedule',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'beacon_schedule'); ?>
		<?php echo $form->textField($model,'beacon_schedule',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'atct'); ?>
		<?php echo $form->textField($model,'atct',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unicom_frequencies'); ?>
		<?php echo $form->textField($model,'unicom_frequencies',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ctaf_frequency'); ?>
		<?php echo $form->textField($model,'ctaf_frequency',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'segmented_circle'); ?>
		<?php echo $form->textField($model,'segmented_circle',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'beacon_color'); ?>
		<?php echo $form->textField($model,'beacon_color',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'non_commercial_landing_fee'); ?>
		<?php echo $form->textField($model,'non_commercial_landing_fee',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'medical_use'); ?>
		<?php echo $form->textField($model,'medical_use',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'single_engine_ga'); ?>
		<?php echo $form->textField($model,'single_engine_ga'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'multi_engine_ga'); ?>
		<?php echo $form->textField($model,'multi_engine_ga'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jet_engine_ga'); ?>
		<?php echo $form->textField($model,'jet_engine_ga'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'helicopters_ga'); ?>
		<?php echo $form->textField($model,'helicopters_ga'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gliders_operational'); ?>
		<?php echo $form->textField($model,'gliders_operational'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'military_operational'); ?>
		<?php echo $form->textField($model,'military_operational'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ultralights'); ?>
		<?php echo $form->textField($model,'ultralights'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'operations_commercial'); ?>
		<?php echo $form->textField($model,'operations_commercial'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'operations_commuter'); ?>
		<?php echo $form->textField($model,'operations_commuter'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'operations_air_taxi'); ?>
		<?php echo $form->textField($model,'operations_air_taxi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'operations_ga_local'); ?>
		<?php echo $form->textField($model,'operations_ga_local'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'operations_ga_itin'); ?>
		<?php echo $form->textField($model,'operations_ga_itin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'operations_military'); ?>
		<?php echo $form->textField($model,'operations_military'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'operations_date'); ?>
		<?php echo $form->textField($model,'operations_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'airport_position_source'); ?>
		<?php echo $form->textField($model,'airport_position_source',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'airport_position_source_date'); ?>
		<?php echo $form->textField($model,'airport_position_source_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'airport_elevation_source'); ?>
		<?php echo $form->textField($model,'airport_elevation_source',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'airport_elevation_source_date'); ?>
		<?php echo $form->textField($model,'airport_elevation_source_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_fuel_available'); ?>
		<?php echo $form->textField($model,'contract_fuel_available',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transient_storage'); ?>
		<?php echo $form->textField($model,'transient_storage',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'other_services'); ?>
		<?php echo $form->textField($model,'other_services',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wind_indicator'); ?>
		<?php echo $form->textField($model,'wind_indicator',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'icao_identifier'); ?>
		<?php echo $form->textField($model,'icao_identifier',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'beacon_schedule_alt'); ?>
		<?php echo $form->textField($model,'beacon_schedule_alt',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- search-form -->