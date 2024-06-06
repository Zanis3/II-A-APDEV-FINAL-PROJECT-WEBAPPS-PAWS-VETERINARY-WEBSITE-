<?php

    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="report-weekly-' . date('Y-m-d') . '.txt"');

    $reportData = "Title: Weekly Report\n";
    $reportData .= "Date: " . date('Y-m-d') . "\n";
    $reportData .= "Content: This is the content of the weekly report.\n";


    echo $reportData;
?>
