<?php
$this->title = 'Run 4 Good';
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\MapAsset;
use app\assets\MapGlobals;
use app\assets\ChartAsset;
MapAsset::register($this);
MapGlobals::register($this);
ChartAsset::register($this);
?>
<div class="jumbotron" style="background: url('img/banner-event.png'); background-size: cover; height: 600px">
  <div class="container text-center">
    <h1 style="color: white"><?= $detail['Name'] ?></h1>
    <p><a class="btn btn-primary btn-lg" href="<?= Url::to(['/event/success', 'id' => $detail['Eid']]) ?>" role="button">Join</a></p>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <!-- The map -->
      <div id="map-here" onload='init();' class="col-lg-12" style="height: 400px; margin-top: 20px"></div>
    </div>
    <div class="col-lg-4">
      <!-- Leaderboard -->
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <h2>Event details</h2>
      <p>
        Date: <?= $detail['Date'] ?><br>
        Location: <?= $detail['Location'] ?><br>
        Pot: £20<br>
        Detail: Join us and run for the children!
      </p>
    </div>
    <div class="col-lg-6 text-center">
      <h2>Participants</h2>
        <?php foreach ($participants as $key => $hero) { ?>
        <div class="col-sm-3">
          <a href="<?= Url::to(['/site/profile', 'id' => $hero['Hid']]) ?>"><?= Html::img('@web/' . $hero['Pic'], array('class' => 'img-circle', 'width' => '60', 'height' => '60')); ?></a>
          <p><?= $hero['Surame'] ?></p>
        </div>
        <?php } ?>
        <?php for ($i = 0; $i < 4 - (sizeof($participants) % 4); $i++) { ?>
        <div class="col-sm-3">
          <?= Html::img('@web/img/anon.png', array('class' => 'img-circle', 'width' => '60', 'height' => '60')); ?>
          <p>...</p>
        </div>
        <?php } ?>
        <!-- <a href="#" class="btn btn-lg btn-primary">Invite others</a> -->
        <a class="twitter-share-button btn btn-primary btn-lg"
          href="https://twitter.com/intent/tweet?text=Hey, guys, let's join <?= $detail['Name'] ?> and donate for @savechildrenuk!" data-size="large">
          Invite others</a>
    </div>
  </div><!--/row-->
</div>
