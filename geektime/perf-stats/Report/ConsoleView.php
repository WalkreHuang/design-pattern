<?php


class ConsoleView implements StatViewer
{
    public function output(array $stats_map, int $startTimeInSecond, int $endTimeInSecond)
    {
        echo sprintf("Time Span: [". $startTimeInSecond.", ".$endTimeInSecond."]").PHP_EOL;
        echo json_encode($stats_map);
    }

}