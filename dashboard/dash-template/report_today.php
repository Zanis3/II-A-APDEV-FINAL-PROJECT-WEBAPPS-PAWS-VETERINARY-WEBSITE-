Today Report (report_today.php):
<?php
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="report-today-' . date('Y-m-d') . '.txt"');

    $reportData = "Title: Today's Report\n";
    $reportData .= "Date: " . date('Y-m-d') . "\n";
    $reportData .= "Content: This is the content of today's report.\n";

    echo $reportData;
?>