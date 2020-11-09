<?php


interface Observer
{
    public function update(Message $message);
}