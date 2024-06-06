<?php
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="report-monthly-' . date('Y-m-d') . '.txt"');

    $reportData = "Title: Monthly Report\n";
    $reportData .= "Date: " . date('Y-m-d') . "\n";
    $reportData .= "Content: This is the content of the monthly report.\n";

    echo $reportData;
?>