<?php
$breakdown = '<div style=\"line-height: 75%;\">
			<p align=\"right\">Operator Bid:&nbsp;&nbsp;&nbsp;&nbsp;".$data[\'subtotal\']."</p>
			<p align=\"right\">Federal Excize Tax:&nbsp;&nbsp;&nbsp;&nbsp;".$data[\'fet\']."</p>
			<p align=\"right\">Broker fixed (".$data[\'br_fixed\'].") and ".$data[\'br_percent\']."% (".$data[\'br_percent_fee\'].") total:&nbsp;&nbsp;&nbsp;&nbsp;".$data[\'br_total\']."</p>
			<p align=\"right\">Lyfft:&nbsp;&nbsp;&nbsp;&nbsp;".$data[\'lyfft_fee\']."</p>
			<p align=\"right\">Credit Charge:&nbsp;&nbsp;&nbsp;&nbsp;".$data[\'charge_fee\']."</p>
		    </div>';

$buyer = '<p>".$data[\'buyer\']."</p>';
$this->renderPartial('/us/_bid', array('bidId'=>$bidId,'headerMessage'=>$headerMessage,'emptyMessage'=>$emptyMessage,'buyer'=>$buyer,'buttons'=>$buttons,'breakdown'=>$breakdown,'color'=>ColorUtils::BLUE_SET()));

?>
