
<div class="form">

	<div align='left' style='font-size: 1.5em; color: #333;'>Congratulations!
		Your client has confirmed and paid for a flight.</div>
	<div align='left' style='font-size: 1em; color: #333;'>The following
		aircraft with crew has been reserved.</div>

<?php
$this->renderPartial('/us/_bidSeller', array('bidId'=>$transaction->bid_id,'headerMessage'=>'','emptyMessage'=>'','buttons'=>'','breakdown'=>''));
?>

<div align='left' style='font-size: 1em; color: #333;'>Happy Bookings!</div>
	<div align='left' style='font-size: 1.5em; color: #333;'>-The Lyfft
		Team</div>


</div>