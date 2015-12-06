<?php
use yii\helpers\Html;
$this->title = "Run 4 Good | Success!";
?>

<div class="jumbotron">
	<div class="container">
		<div class="row text-center">
			<div class="col-md-12">
				<h3>
					You have successfully signed up to the <?= $detail['Name'] ?> in <?= $detail['Location'] ?>!
				</h3>
                <a class="twitter-share-button btn btn-info btn-lg"
                    href="https://twitter.com/intent/tweet?text=I have registered to the <?= $detail['Name'] ?> to support @savechildrenuk!" data-size="large">
                    Tweet this!</a>
			</div>
		</div>
	</div>
</div>