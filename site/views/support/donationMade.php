<?php
use yii\helpers\Html;
$this->title = "You Bought Miles";

$donationVal = $donationMade['give'];
$message = $donationMade['leaveMsg'];
$heroName = $hero['Name']." ".$hero['Surame'];
?>

<div class="jumbotron">
	<div class="container">
		<div class="row">
			<h3>
				<?="You wished:"?>
			</h3>
				<div class="col-md-4">
					<h4>
						<?=$message?>
					</h4>
				</div>
				<?=Html::beginTag('br')?>
				<?=Html::beginTag('br')?>
			<h3>
				<?="You promise to donate $$donationVal.00 to $heroName."?>
			</h3>
		</div>
	</div>
</div>