<?php

//常规的写法，会侵入业务代码
class UserController implements IUserController
{
    public function login()
    {
        echo 'login service handle';
    }

    public function register()
    {
        echo 'register service handle';
    }
}