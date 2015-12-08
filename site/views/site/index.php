<?php
$this->title = 'Run 4 Good';
use yii\helpers\Html;
use yii\helpers\Url;
use yii\db\Query;
?>
<div class="jumbotron" style="background: url('img/banner-home.png'); background-size: cover; height: 600px; color: white">
  <div class="container text-center">
    <?= Html::img('@web/img/logo-jpmorgan.png') ?>
    <?= Html::img('@web/img/logo-stc.png') ?>
    <h1>NO CHILD BORN TO DIE</h1>
    <p>
      Join us at a range of running and walking events across the country from marathons to
      5,000 metres where you can increase your fitness, meet a personal challenge, or just have
      lots of fun while raising money for children in need across the world and here at home.
    </p>
  </div>
</div>
<div class="container">
  <div class="row">
    <?php foreach ($events as $key => $event) { ?>
    <?php if ($key % 2 == 0) { ?>
    <div class="col-lg-4" style="padding-bottom: 20px; margin-bottom: 20px; background-color: #1C1E22;">
    <?php } else { ?>
    <div class="col-lg-4" style="padding-bottom: 20px; margin-bottom: 20px;">
    <?php } ?>
      <small><?= $event['Date'] ?></small>
      <a href="<?= Url::to(['/event','id'=>$event['Eid']]) ?>"><h2><?= $event['Name'] ?></h2></a>
      <p><?= $event['Location'] ?></p>
      <p>
        Distance: 5km and 10km routes available<br>
        Registration fee: £22, Santa Suits provided!<br>
        Minimum fundraising target: £100
      </p>
      <hr>
      <div class="text-center">
        <?php
        $q = new Query;
        $q->from('takespart')
            ->innerJoin('hero', 'takespart.HeroId=hero.Hid')
            ->where('EventId=:id', array(':id' => $event['Eid']));
        $participants = $q->all();
        ?>
        <?php foreach ($participants as $k => $participant) { ?>
        <div class="col-sm-3">
          <a href="<?= Url::to(['/site/profile', 'id' => $participant['Hid']]) ?>"><?= Html::img('@web/' . $participant['Pic'], array('class' => 'img-circle', 'width' => '60', 'height' => '60')); ?></a>
          <p><?= $participant['Name'] ?></p>
        </div>
        <?php } ?>
        <?php for ($i = 0; $i < 4 - (sizeof($participants) % 4); $i++) { ?>
        <div class="col-sm-3">
          <?= Html::img('@web/img/anon.png', array('class' => 'img-circle', 'width' => '60', 'height' => '60')); ?>
          <p>...</p>
        </div>
        <?php } ?>
        <a href="<?= Url::to(['/event','id'=>$event['Eid']]) ?>" class="btn btn-lg btn-info">Join Us</a>
      </div>
    </div>
    <?php } ?>
  </div><!--/row-->
</div>