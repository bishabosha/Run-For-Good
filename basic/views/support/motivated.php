<?php
use yii\helpers\Html;
$this->title = "You Bought Miles";

$date = $motivated['by'];
$distance = $motivated['run'];
$time = $motivated['in'];
$donationVal = $motivated['prize'];
$heroName = $hero['Name']." ".$hero['Surame'];
?>

<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class='col-md-5'>
				<h3>
					<?="You promise that if $distance miles are ran by $date, in less than $time minutes, you will donate $$donationVal.00. to $heroName."?>
                    <br><br><a class="twitter-share-button btn btn-info btn-lg"
                    href="https://twitter.com/intent/tweet?text=I promise that if <?= $distance ?> miles are ran by <?= $date ?>, in less than <?= $time ?> minutes, I will donate $<?= $donationVal ?>.00 to <?=$heroName?>! @savechildrenuk" data-size="large">
                    Tweet this!</a>
				</h3>
			</div>
		</div>
	</div>
</div>