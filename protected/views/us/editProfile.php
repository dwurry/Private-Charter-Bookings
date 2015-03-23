<?php
/* @var $this UserController */
/* @var $model User */
?>

<div class="modal-header">
	<h4 class="modal-title">Edit Profile</h4>
</div>
<div class="modal-body">

<?php
echo "<div style='display: block; width: -webkit-max-content;'>";
$this->renderPartial('_contact', array('user'=>$user,'broker'=>$broker,'operator'=>$operator));
$this->renderPartial('_password', array('password'=>$password,'user'=>$user));
$this->renderPartial('_picture', array('picture'=>$picture));

if($user->auth_level >= User::USER_BR){
	$this->renderPartial('_brokerSettings', array('user'=>$user,'broker'=>$broker));
}
if($user->auth_level >= User::USER_BR){
	$this->renderPartial('_logo', array('image'=>$image));
}
echo "</div>"; // style='display: inline-block;'>";
echo "</div>"; // modal-body

?>