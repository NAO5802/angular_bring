<?php

require_once( realpath('../../database.php') );
require_once( realpath('../../common.php') );
require_once( realpath('../../define.php') );


$data = json_decode(file_get_contents('php://input'), TRUE);
$item = $data['item'];
$updateKind = $data['updateKind'];

try {
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  switch( $updateKind ) {
    case 'changeItemStatus':
      // is_archiveのステータス変更
      $item['is_archive'] = changeFlag( $item['is_archive'] );

      // update
      $stmt = $db->prepare('UPDATE items SET is_archive = :is_archive WHERE id = :id');
      $stmt->execute([
        ':id' => $item['id'],
        ':is_archive' => $item['is_archive']
      ]);
      break;

    default:
      // 全体のUPDATE処理
      break;
  }

} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}

exit;
