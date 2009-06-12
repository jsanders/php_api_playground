<?php

include_once $MODEL_DIR . 'visitor.php';

$VISITOR_DATA = Visitor::findAll();

include $VIEW_DIR . 'all_visitors.php';

?>
