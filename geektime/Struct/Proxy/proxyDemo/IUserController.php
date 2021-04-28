<?php


interface IUserController
{
    public function login($telephone, $password);

    public function register($telephone, $password);
}