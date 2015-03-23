<?php
/* @var $this AdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('Admin');
?>

<h1>Activity Log</h1>

<p>
	<strong>Format:</strong><br /> usertype: [u]ser, [o]perator, [b]roker,
	[a]dmin<br /> userid<br /> action: view, add, edit, delete, etc<br />
	targettype: quote, account, settings, etc<br /> targetid: target id or
	-
</p>

<pre>
<?php
$file = "../protected/runtime/activity.log";
$contents = file($file);
$string = implode("", $contents);
echo $string;
?>
</pre>