<?
ob_start(); // ensures anything dumped out will be caught

$line = '';

$f = fopen('IPlog.txt', 'r');

$cursor = -1;

fseek($f, $cursor, SEEK_END);
$char = fgetc($f);

/**
 * Trim trailing newline chars of the file
 */
while ($char === "\n" || $char === "\r") {
    fseek($f, $cursor--, SEEK_END);
    $char = fgetc($f);
}

/**
 * Read until the start of file or first newline char
 */
while ($char !== false && $char !== "\n" && $char !== "\r") {
    /**
     * Prepend the new char
     */
    $line = $char . $line;
    fseek($f, $cursor--, SEEK_END);
    $char = fgetc($f);
}
$pos = strpos($line, ", ");
$IP = substr($line, $pos+2);

$url = 'http://' . $IP .':9080';

// clear out the output buffer
while (ob_get_status()) 
{
    ob_end_clean();
}

// now redirect
header( "Location: $url" );
?>