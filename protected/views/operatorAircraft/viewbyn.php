<?php
/* @var $this OperatorAircraftController */
/* @var $model OperatorAircraft */
?>
<div class="modal-header">
	<h4 class="modal-title">View OperatorAircraft</h4>
</div>
<div class="modal-body">

<?php

$this->widget('zii.widgets.CDetailView', array('data'=>$model,'attributes'=>array('m_id','m_n_number','m_serial_number','m_mfr_mdl_code','m_eng_mfr_mdl','m_year_mfr','m_type_registrant','m_name','m_street','m_street2','m_city','m_state','m_zip_code','m_region','m_county','m_country','m_last_action_date','m_cert_issue_date','m_certification','m_type_aircraft','m_type_engine','m_status_code','m_mode_s_code','m_fract_owner','m_air_worth_date','m_other_names_1','m_other_names_2','m_other_names_3','m_other_names_4','m_other_names_5','m_expiration_date','m_unique_id','m_kit_mfr','m_kit_model','m_mode_s_code_hex','m_operator_id','bid_id','r_code','r_mfr','r_model','r_type_acft','r_type_eng','r_ac_cat','r_build_cert_ind','r_no_eng','r_no_seats','r_ac_weight','r_speed','e_id','e_code','e_mfr','e_model','e_type','e_horsepower','e_thrust')));
?>
</div>
<!-- modal-body -->
