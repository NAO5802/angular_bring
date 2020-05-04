<?php

require_once( realpath('../../database.php') );

$data = json_decode(file_get_contents('php://input'), TRUE);
$itemName = $data['name'];

try {
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // insert
  $stmt = $db->prepare("insert into items (name, insert_datetime, update_datetime) values (:name, :insert_datetime, :update_datetime)");
  $stmt->execute([
    ':name' => $itemName,
    'insert_datetime' => date("Y-m-d H:i:s"),
    ':update_datetime' => date("Y-m-d H:i:s"),
  ]);

} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}

// header('content-type: application/json');
// echo ( json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) );
exit;
