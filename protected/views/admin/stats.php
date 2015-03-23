<?php
/* @var $this AdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('Admin');
?>

<h1>Stats</h1>

<table style="width: 300px;">

	<tr>
		<td>Claimed Operators</td>
		<td><?php echo $counts["Operators"]; ?></td>
	</tr>
	<tr>
		<td>Quotes</td>
		<td><?php echo $counts["Quotes"]; ?></td>
	</tr>
	<tr>
		<td>Matched Aircraft</td>
		<td><?php echo $counts["CQDAll"]; ?></td>
	</tr>
	<tr>
		<td>Matched Aircraft, rejected</td>
		<td><?php echo $counts["CQD0"]; ?></td>
	</tr>
	<tr>
		<td>Matched Aircraft, new</td>
		<td><?php echo $counts["CQD1"]; ?></td>
	</tr>
	<tr>
		<td>Matched Aircraft, modified by operator</td>
		<td><?php echo $counts["CQD2"]; ?></td>
	</tr>
	<tr>
		<td>Matched Aircraft, submitted to user</td>
		<td><?php echo $counts["CQD3"]; ?></td>
	</tr>
	<tr>
		<td>Matched Aircraft, accepted by user</td>
		<td><?php echo $counts["CQD4"]; ?></td>
	</tr>
	<tr>
		<td>Total Users</td>
		<td><?php echo $counts["UsersAll"]; ?></td>
	</tr>
	<tr>
		<td>Users, unverified</td>
		<td><?php echo $counts["Users0"]; ?></td>
	</tr>
	<tr>
		<td>Users, standard</td>
		<td><?php echo $counts["Users10"]; ?></td>
	</tr>
	<tr>
		<td>Users, operators</td>
		<td><?php echo $counts["Users50"]; ?></td>
	</tr>
	<tr>
		<td>Users, admins</td>
		<td><?php echo $counts["Users100"]; ?></td>
	</tr>
</table>
