<?php


class ConsoleReporter
{
    private $metricsStorage;

    public function __construct(MetricsStorage $metricsStorage)
    {
        $this->metricsStorage = $metricsStorage;
    }

    /**
     * 定时将接口统计数据输出到命令行终端
     * @param int $periodInSeconds 统计周期
     * @param int $durationInSeconds 当前时间之前的秒数
     */
    public function startRepeatedReport(int $periodInSeconds, int $durationInSeconds)
    {
        //第4个代码逻辑：定时触发第1、2、3代码逻辑的执行；
        while (true) {
            // 第1个代码逻辑：根据给定的时间区间，从数据库中拉取数据；
            $endTimeInSeconds = time();
            $startTimeSeconds = $endTimeInSeconds - $durationInSeconds;

            $requestInfoMap = $this->metricsStorage->getRequestInfo($startTimeSeconds, $endTimeInSeconds);

            $stats_map = [];
            $aggregator = new Aggregator();
            foreach ($requestInfoMap as $api_name => $requestInfo) {
                // 第2个代码逻辑：根据原始数据，计算得到统计数据；
                $requestStat = $aggregator->aggregate($requestInfo, $durationInSeconds);
                $stats_map[$api_name] = $requestStat;
            }
            // 第3个代码逻辑：将统计数据显示到终端（命令行或邮件）；
            echo sprintf("Time Span: [". $startTimeSeconds.", ".$endTimeInSeconds."]").PHP_EOL;
            echo json_encode($stats_map);

            sleep($periodInSeconds);
        }
    }
}