<html>
<?php
ini_set("allow_url_fopen",1);
$json=file_get_contents('https://location-leaderboard.services.mozilla.com/api/v1/leaders/country/IN/');
$obj = json_decode($json);
echo $obj->results[2]->name;
?>
