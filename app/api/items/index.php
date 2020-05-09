<?php

require_once( realpath('../../database.php') );

try {
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // select all items
  $stmt = $db->query('select * from items');
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // 連想配列で取得


} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}

header('content-type: application/json');
echo ( json_encode($result, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) );
exit;
