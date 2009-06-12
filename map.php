<?php 

include 'config/application_config.php';
include $DATABASE_DIR . 'initialize.php';

if( empty($_REQUEST['action']) ) {
  include $CONTROLLER_DIR . 'show_all.php';
} else {
  switch($_REQUEST['action']) {
  case 'single':
    $GENERATED_ID = $_REQUEST['id'];
    include $CONTROLLER_DIR . 'show_single.php';
    break;
  case 'update': 
    $NAME = $_REQUEST['name'];
    $LOCATION = $_REQUEST['location'];
    $MESSAGE = $_REQUEST['message'];
    include $CONTROLLER_DIR . 'update.php';
    break;
  }
}

?>
