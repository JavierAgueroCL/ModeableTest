<?php
require_once('class/booster/booster_inc.php');


$booster = new Booster();


if(isset($_GET['mode']) && $_GET['mode'] == "admin") {
  require_once('app/admin.php');
}
else{
  require_once('app/index.php');
}
