POST https://api.fitbit.com/oauth2/token
Authorization: Basic <?=base64_encode("229XBT:fd590071df7af3a872eec8d61d80f35e")?>
Content-Type: application/x-www-form-urlencoded

client_id=<?=$clientId?>&grant_type=authorization_code&redirect_uri=<?=Yii::getAlias('@web/index.php?r=login/success')?>&code=<?=$_GET['code']?>
