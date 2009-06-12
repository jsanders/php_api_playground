<?php
include_once $MODEL_DIR . 'visitor.php';

$visitor = Visitor::create($NAME, $LOCATION, $MESSAGE);
$tinyUrl = file_get_contents("http://tinyurl.com/api-create.php?url=http://{$_SERVER['SERVER_NAME']}/eventvue/map.php?action=single&id=" . $visitor->getGeneratedId(), 'r');
$visitor->setTinyUrl($tinyUrl);
$visitor->save();

$status = "From {$visitor->getName()}: {$visitor->getMessage()} - My TinyUrl: {$visitor->getTinyUrl()}";

$ch = curl_init('http://twitter.com/statuses/update.xml');
curl_setopt($ch, CURLOPT_USERPWD, "{$TWITTER_USERNAME}:{$TWITTER_PASSWORD}");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "status={$status}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);


include 'show_all.php';

?>
