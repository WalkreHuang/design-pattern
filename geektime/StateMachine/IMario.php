<?php


interface IMario
{
    public function getName();

    //事件
    public function obtainMushRoom();
    public function obtainCape();
    public function obtainFireFlower();
    public function meetMonster();
}