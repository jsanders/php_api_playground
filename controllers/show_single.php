<?php

include_once $MODEL_DIR . 'visitor.php';

$VISITOR_DATA = Visitor::findByGeneratedId($GENERATED_ID);

include $VIEW_DIR . 'single_visitor.php';

?>
