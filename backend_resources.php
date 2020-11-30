<?php
require_once '_db.php';

$scheduler_siteOwners = $db->query('SELECT * FROM siteOwner ORDER BY siteOwner_name');

class Resource {}

$result = array();

foreach($scheduler_siteOwners as $siteOwner) {
  $r = new Resource();
  $r->id = $siteOwner['siteOwner_id'];
  $r->name = $siteOwner['siteOwner_name'];
  $result[] = $r;
}

header('Content-Type: application/json');
echo json_encode($result);
