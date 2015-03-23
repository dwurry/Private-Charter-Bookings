<?php
/**
 * Needed a class to display a button that also stored a name and value so that duplicate rows could be combined in GroupedGridView.php
 */
class ButtonColumn extends CButtonColumn{
	public $name;
	public $value;
}