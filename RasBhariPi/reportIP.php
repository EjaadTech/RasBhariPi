<?php

  $time = date('m/d/Y h:i:s a');
 
  // Get IP address
  if( ($remote_addr = $_SERVER['REMOTE_ADDR']) == '') {
    $remote_addr = "REMOTE_ADDR_UNKNOWN";
  }

$myFile = "IPlog.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$log = $time . ", " . $remote_addr . "\n";
fwrite($fh, $log);
fclose($fh);

echo $remote_addr;
?>