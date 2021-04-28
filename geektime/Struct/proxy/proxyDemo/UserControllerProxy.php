<?php


class UserControllerProxy implements IUserController
{
    private $metricsController;
    private $userController;

    public function __construct(UserController $userController)
    {
        $this->userController = $userController;
        $this->metricsController = new MetricsCollector(new RedisMetricsStorage());
    }

    public function login($telephone, $password)
    {
        $start_time = time();

        //委托
        $ret = $this->userController->login($telephone, $password);

        $end_time = time();

        $request_info = new RequestInfo('login', $end_time-$start_time, $start_time);
        $this->metricsController->recordRequest($request_info);

        return $ret;
    }

    public function register($telephone, $password)
    {
        $start_time = time();

        //委托
        $ret = $this->userController->register($telephone, $password);

        $end_time = time();

        $request_info = new RequestInfo('register', $end_time-$start_time, $start_time);
        $this->metricsController->recordRequest($request_info);

        return $ret;
    }
}