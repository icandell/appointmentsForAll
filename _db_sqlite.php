<?php

// other init
date_default_timezone_set("UTC");
session_start();

if (!$db_exists) {
    //create the database
    $db->exec("CREATE TABLE siteOwner (
    siteOwner_id   INTEGER       PRIMARY KEY AUTOINCREMENT NOT NULL,
    siteOwner_name VARCHAR (100) NOT NULL
    );");
    
    $db->exec("CREATE TABLE appointment (
    appointment_id              INTEGER       PRIMARY KEY AUTOINCREMENT NOT NULL,
    appointment_start           DATETIME      NOT NULL,
    appointment_end             DATETIME      NOT NULL,
    appointment_patient_name    VARCHAR (100),
    appointment_status          VARCHAR (100) DEFAULT ('free') NOT NULL,
    appointment_patient_session VARCHAR (100),
    siteOwner_id                   INTEGER       NOT NULL
    );");

    $items = array(
        array('name' => 'Site Owner 1'),
        array('name' => 'Site Owner 2'),        
        array('name' => 'Site Owner 3'),        
        array('name' => 'Site Owner 4'),        
        array('name' => 'Site Owner 5'),        
    );
    $insert = "INSERT INTO [siteOwner] (siteOwner_name) VALUES (:name)";
    $stmt = $db->prepare($insert);
    $stmt->bindParam(':name', $name);
    foreach ($items as $m) {
      $name = $m['name'];
      $stmt->execute();
    }

}
