<?php
    $filename = $_REQUEST['url'];
    header('Content-Type: text/xml');
    readfile($filename);
?>