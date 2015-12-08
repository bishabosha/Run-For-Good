<?php
$this->title = 'Run 4 Good';
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="jumbotron" style="background: url('img/banner-event.png'); background-size: cover; height: 600px">
  <div class="container text-center">
    <div class="row">
        <form>
          <h1 style="color: white">Event Name</h1>
          <input class="form-control input-lg" type="text" name="event_name">
          <input class="btn btn-lg btn-success" type="submit" value="Create" style="margin-top: 20px">
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <h2>Event details</h2>
      <div class="form-group">
        <label for="date">Date:</label>
        <div class="input-group">
          <input name="date" type="text" class="form-control" id="date" placeholder="yyyy-mm-dd">
          <div class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></div>
        </div>
      </div>
      <div class="form-group">
        <label for="location">Location:</label>
        <div class="input-group">
          <input name="location" type="text" class="form-control" id="location" placeholder="">
          <div class="input-group-addon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></div>
        </div>
      </div>
      <div class="form-group">
        <label for="pot">Pot:</label>
        <div class="input-group">
          <input name="pot" type="text" class="form-control" id="pot" placeholder="">
          <div class="input-group-addon"><span class="glyphicon glyphicon-gbp" aria-hidden="true"></div>
        </div>
      </div>
      <div class="form-group">
        <label for="detail">Detail:</label>
        <textarea name="detail" class="form-control" rows="3"></textarea>
      </div>
      </form>
    </div>
    <div class="col-lg-6 text-center">
      <h2>Participants</h2>
      <?php for ($j = 0; $j < 4; $j++) { ?>
        <div class="col-sm-3">
          <?= Html::img('@web/img/bengio.jpg', array('class' => 'img-circle', 'width' => '60', 'height' => '60')); ?>
          <p>Bengio</p>
          <?= Html::img('@web/img/zoubin.jpg', array('class' => 'img-circle', 'width' => '60', 'height' => '60')); ?>
          <p>Zoubin</p>
        </div>
        <?php } ?>
        <a href="#" class="btn btn-lg btn-primary">Invite</a>
    </div>
    <div class="col-lg-8">
      <!-- The map -->
    </div>
    <div class="col-lg-4">
      <!-- Leaderboard -->
    </div>
  </div><!--/row-->
</div>