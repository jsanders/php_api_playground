<?php

include 'database_config.php';

mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD) or die ('Error connecting to database');
mysql_select_db($DB_NAME) or die ('Error selecting database');

?>
