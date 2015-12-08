<?php
$this->title = 'Run 4 Good';
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
?>
<div class="jumbotron" style="background: url('img/banner-profile.png'); background-size: cover; height: 600px">
  <div class="container text-center">
    <?= Html::img('@web/' . $hero['Pic'], array('class' => 'img-circle', 'width' => '100', 'height' => '100')); ?>
    <h3><?= $hero['Name'] . ' ' . $hero['Surame'] ?></h3>
    <p><a class="btn btn-warning btn-lg" href="<?= Url::to(['/challenge', 'id' => $hero['Hid']]) ?>" role="button">Challenge me</a></p>
  </div>
</div>
<div class="container">
<div class="row">
  <div class="col-lg-4">
    <h2>Do Better</h2>
    <hr>
    <?php $sForm = ActiveForm::begin(['class' => 'support-form']);?>
      <div class="form-group">
        <label for="date">by</label>
        <div class="input-group input-append date" id="datePicker">
          <input type="text" id="supportform-by" class="form-control" name="SupportForm[by]" />
          <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="run">run</label>
        <div class="input-group">
          <input name="SupportForm[run]" type="text" class="form-control" id="supportform-run" placeholder="">
          <div class="input-group-addon">miles</div>
        </div>
      </div>
      <div class="form-group">
        <label for="time">in</label>
        <div class="input-group">
          <input name="SupportForm[in]" type="text" class="form-control" id="supportform-in" placeholder="">
          <div class="input-group-addon">minutes</div>
        </div>
      </div>
      <div class="form-group">
        <label for="prize">prize</label>
        <div class="input-group">
          <input name="SupportForm[prize]" type="text" class="form-control" id="supportform-prize" placeholder="">
          <div class="input-group-addon"><span class="glyphicon glyphicon-gbp" aria-hidden="true"></div>
        </div>
      </div>
      <input class="btn btn-success" type="submit" value="£ Donate">
    <?php ActiveForm::end();?>
  </div>

  <div class="col-lg-4">
    <h2>Buy a Mile</h2>
    <hr>
    <?php $bForm = ActiveForm::begin(['class' => 'buy-form']);?>
      <div class="form-group">
        <label for="buy_mile">buy</label>
        <div class="input-group">
          <input name="BuyForm[buy]" type="text" class="form-control" id="buy-buy" placeholder="">
          <div class="input-group-addon">miles</div>
        </div>
      </div>
      <div class="form-group">
        <label for="buy_price">for</label>
        <div class="input-group">
          <input name="BuyForm[for]" id='buy-for' style="border: 0; box-shadow: none" type="text" readonly class="form-control" id="buy_price" placeholder="" value="">
          <div class="input-group-addon"><span class="glyphicon glyphicon-gbp" aria-hidden="true"></div>
        </div>
      </div>
      <p>* 1 mile = £50</p>
      <input class="btn btn-success" type="submit" value="£ Donate">
    <?php ActiveForm::end();?>
  </div>

  <div class="col-lg-4">
    <h2>Donate</h2>
    <hr>
    <?php $dForm = ActiveForm::begin(['class' => 'donate-form']);?>
      <div class="form-group">
        <label for="donate">give</label>
        <div class="input-group">
          <input name="DonateForm[give]" type="text" class="form-control" id="donateform-give" placeholder="" value="">
          <div class="input-group-addon"><span class="glyphicon glyphicon-gbp" aria-hidden="true"></div>
        </div>
      </div>
      <div class="form-group">
        <label for="message">Leave a message</label>
        <textarea class='col-md-4' style='width:100%;margin-bottom: 5px;' name="DonateForm[leaveMsg]" id="donateform-leavemsg" "class="form-control" rows="3"></textarea>
      </div>
      <input class="btn btn-success" type="submit" value="$ Donate">
    <?php ActiveForm::end();?>
  </div>
</div><!--/row-->
</div>