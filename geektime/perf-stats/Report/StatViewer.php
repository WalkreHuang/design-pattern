<?php


interface StatViewer
{
    public function output(array $stats_map, int $startTimeInSecond, int $endTimeInSecond);
}