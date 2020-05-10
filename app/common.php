<?php

// フラグのON・OFF切替
function changeFlag( $status ) {
  return $status = ($status == FLAG_ON) ? FLAG_OFF : FLAG_ON;
}

