<?php
$this->title = 'Run 4 Good';
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="jumbotron" style="background: url('img/banner-profile.png'); background-size: cover; height: 600px">
  <div class="container text-center">
    <?= Html::img('@web/' . $hero['Pic'], array('class' => 'img-circle', 'width' => '100', 'height' => '100')); ?>
    <h3><?= $hero['Name'] . ' ' . $hero['Surame'] ?></h3>
    <p><a class="btn btn-warning btn-lg" href="<?= Url::to(['/support', 'id' => $hero['Hid']]) ?>" role="button">Support me</a></p>
  </div>
</div>
<div class="container">
  <h1>Challenge</h1>
  <?php $form = ActiveForm::begin(['class' => 'challenge-form']);?>
  <div class="row">
    <div class="col-lg-6">
      <?= $form->field($challengeForm, 'forename') ?>
      <?= $form->field($challengeForm, 'surname') ?>
      <div class="form-group">
        <label for="date">Date</label>
        <div class="input-group input-append date" id="datePicker">
          <input type="text" id="challengeform-date" class="form-control" name="ChallengeForm[date]" />
          <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
    	<div class="form-group">
        	<label for="pot">Pot</label>
        	<div class="input-group">
          		<div class="input-group-addon">$</div>
          		<input name="ChallengeForm[pot]" type="text" class="form-control" id="challengeform-pot" placeholder="Amount">
          		<div class="input-group-addon">.00</div>
        	</div>
      	</div>
      	<div class="form-group">
      	<?= $form->field($challengeForm, 'phone') ?>
      	<?= $form->field($challengeForm, 'email') ?>
    </div>
    </div>
    <div class="text-center">
      <input class="btn btn-lg btn-danger" type="submit" value="I challenge you!">
    </div>
  </div>
  </form>
</div>