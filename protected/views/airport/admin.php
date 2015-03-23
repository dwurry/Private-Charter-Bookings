<?php
/* @var $this AirportController */
/* @var $model Airport */

$this->breadcrumbs = array('Airports'=>array('index'),'Manage');

$this->menu = array(array('label'=>'List Airport','url'=>array('index')),array('label'=>'Create Airport','url'=>array('create')));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#airport-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Airports</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>,
	<b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the
	beginning of each of your search values to specify how the comparison
	should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display: none">
<?php

$this->renderPartial('_search', array('model'=>$model));
?>
</div>
<!-- search-form -->

<?php

$this->widget('zii.widgets.grid.CGridView', array('id'=>'airport-grid','dataProvider'=>$model->search(),'filter'=>$model,'columns'=>array('id','site_number','type','location_id','effective_date','region',
		/*
		'district_office',
		'state',
		'state_name',
		'county',
		'county_state',
		'city',
		'facility_name',
		'ownership',
		'use',
		'owner',
		'owner_address',
		'owner_csz',
		'owner_phone',
		'manager',
		'manager_address',
		'manager_csz',
		'manager_phone',
		'arp_latitude',
		'arp_latitude_s',
		'arp_longitude',
		'arp_longitude_s',
		'arp_method',
		'arp_elevation',
		'arp_elevation_method',
		'magnetic_variation',
		'magnetic_variation_year',
		'traffic_pattern_altitude',
		'chart_name',
		'distance_from_cbd',
		'direction_from_cbd',
		'land_area_covered_by_airport',
		'boundary_art_cc_id',
		'boundary_art_cc_computer_id',
		'boundary_art_cc_name',
		'responsible_art_cc_id',
		'responsible_art_cc_computer_id',
		'responsible_art_cc_name',
		'tie_in_fss',
		'tie_in_fss_id',
		'tie_in_fss_name',
		'airport_to_fss_phone_number',
		'tie_in_fss_toll_free_number',
		'alternate_fss_id',
		'alternate_fss_name',
		'alternate_fss_toll_free_number',
		'notam_facility_id',
		'notam_service',
		'activiation_date',
		'airport_status_code',
		'certification_type_date',
		'federal_agreements',
		'airspace_determination',
		'customs_airport_of_entry',
		'customs_landing_rights',
		'military_joint_use',
		'military_landing_rights',
		'inspection_method',
		'inspection_group',
		'last_inspection_date',
		'last_owner_information_date',
		'fuel_types',
		'airframe_repair',
		'power_plant_pepair',
		'bottled_oxygen_type',
		'bulk_oxygen_type',
		'lighting_schedule',
		'beacon_schedule',
		'atct',
		'unicom_frequencies',
		'ctaf_frequency',
		'segmented_circle',
		'beacon_color',
		'non_commercial_landing_fee',
		'medical_use',
		'single_engine_ga',
		'multi_engine_ga',
		'jet_engine_ga',
		'helicopters_ga',
		'gliders_operational',
		'military_operational',
		'ultralights',
		'operations_commercial',
		'operations_commuter',
		'operations_air_taxi',
		'operations_ga_local',
		'operations_ga_itin',
		'operations_military',
		'operations_date',
		'airport_position_source',
		'airport_position_source_date',
		'airport_elevation_source',
		'airport_elevation_source_date',
		'contract_fuel_available',
		'transient_storage',
		'other_services',
		'wind_indicator',
		'icao_identifier',
		'beacon_schedule_alt',
		*/
		array('class'=>'CButtonColumn'))));
?>
