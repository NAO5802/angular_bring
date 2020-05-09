<?php

require_once( realpath('../../database.php') );

$data = json_decode(file_get_contents('php://input'), TRUE);
$itemName = $data['name'];

try {
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // insert
  $stmt = $db->prepare("INSERT INTO items (name, insert_datetime, update_datetime) VALUES (:name, :insert_datetime, :update_datetime)");
  $stmt->execute([
    ':name' => $itemName,
    'insert_datetime' => date("Y-m-d H:i:s"),
    ':update_datetime' => date("Y-m-d H:i:s"),
  ]);

} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}

exit;
